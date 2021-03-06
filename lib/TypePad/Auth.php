<?php

/**
 * Authentication for the TypePad API.
 *
 * @package TypePad-Auth
 */

/**
 * Copyright (c) 2010 Six Apart Ltd.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice,
 *   this list of conditions and the following disclaimer.
 *
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * * Neither the name of Six Apart Ltd. nor the names of its contributors may
 *   be used to endorse or promote products derived from this software without
 *   specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Object class representing a TypePad user session.
 *
 * @package TypePad-Auth
 * @subpackage TPSession
 */
class TPSession {
    protected $store;
    protected $oauth_token;
    protected $oauth_verifier;
    protected $user_id;
    protected $user_url_id;
    protected $session_id;
    protected $session_sync_token;
    protected $user;
    protected $api_endpoints;

    static protected $user_session_map = array();
    static protected $session_user_map = array();

    /**
     * Return the ID (cookie value) associated with this session.
     *
     * @return string
     */
    function sessionId() {
        if (!$this->user_id && !$this->session_id) return NULL;
        if (!$this->session_id) $this->_setSessionId();
        return $this->session_id;
    }

    /**
     * Return the user ID associated with this session.
     *
     * @return string
     */
    function userId() {
        if (!$this->user_id && !$this->session_id) return NULL;
        if (!$this->user_id) $this->_setUserId();
        return $this->user_id;
    }

    /**
     * Return the TypePad user urlId associated with this session.
     *
     * @return string
     */
    function userUrlId() {
        if (!$this->user_url_id && !$this->session_id) return NULL;
        if (!$this->user_url_id) $this->_setUserId();
        return $this->user_url_id;
    }

    /**
     * Return the OAuth token associated with this session.
     *
     * @return string
     */
    function getOauthToken() {
        return $this->oauth_token;
    }

    /**
     * Return true if the session has a logged-in user, false otherwise.
     *
     * @return boolean
     */
    function isLoggedIn() {
        if ($this->oauth_token) return 1;
        return 0;
    }

    /**
     * Create a new user session object.
     *
     * The TPSession constructor looks at the session ID in the local cookie,
     * the OAuth tokens in the database (if a database is configured),
     * and communicates with TypePad to determine whether the
     * user is legitimately logged in.
     *
     * @param TypePad $typepad An instance of the TypePad class. The TPSession
     *                         session will be stored as the instance's user session.
     */
    function __construct($typepad = NULL) {
        if (!$typepad) {
            $typepad = new TypePad();
        }
        // define the DB store.
        if (!$this->store) $this->store = OAuthStore::instance('MySQL', self::_getDbOptions());

        if (array_key_exists(TP_COOKIE_NAME, $_COOKIE)) {
            $this->session_id = $_COOKIE[TP_COOKIE_NAME];
            $this->_setUserId();
        }

        // If there's no user_id in the cookie, then there's no session -- not logged in.
        if (!$this->user_id) return 0;

        // This method looks up the OAuth token in one of two ways:
        //   1. the _GET parameters -- if this is the last step of the OAuth dance.
        //   2. the Database -- if the user already completed the OAuth dance.
        $this->oauth_token = self::_lookupOauthToken($_GET, $this->store);

        // Somebody wanted to log out!  You should let them.
        if (array_key_exists('logout', $_GET)) {
            $this->doLogout();
        } else if (array_key_exists('oauth_verifier', $_GET)) {
            // Just got back from the Access token request, so we need to make one final call
            // to verify it.  This call will also update $this->oauth_token.
            $this->oauth_verifier = $_GET['oauth_verifier'];

            // if we don't do this, the TypePad instance won't have this session until
            // we return; but updateUserRecord() makes an API call for @self... so
            // TypePad would try to construct another session ==> infinite recursion.
            $typepad->setUserSession($this);

            $this->_verifyAccessToken();
            $this->_updateUserRecord($typepad, $_GET['session_sync_token']);
        }
    }

    /**
     * Synchronize this session with a TypePad user session.
     *
     * @link http://www.typepad.com/services/apidocs/authentication#session_synchronization
     */
    function syncSession() {
        if (!array_key_exists('session_sync_token', $_GET)) return;
        mysql_connect(TP_DB_HOST, TP_DB_USERNAME, TP_DB_PASSWORD);
        mysql_select_db(TP_DB_NAME);
        $session_id = self::_lookupSessionSyncToken($_GET['session_sync_token']);
        if (!$session_id) {
            // Obtain a Request token from TypePad.
            $this->_requestAndVerifyRequestToken();
            // Next step in the OAuth Dance: Redirect your user to the Provider.
            // this redirect() method is courtesy of our OAuthPHP lib. Parameters:
            //   1 = the URL to redirect to
            //   2 = a list of parameters. In our case, it's the Request token.
            OAuthRequest::redirect($this->getApiEndpoint('oauthAuthorizationUrl'), array(
                'oauth_token' => $this->getOauthToken(),
                'access' => TP_ACCESS_TYPE
            ));
            return;
        }
        setcookie(TP_COOKIE_NAME, $session_id);
        header('Location: ' . $_GET['callback_next']);
    }

    /**
     * Return the URL of the session sync JavaScript hosted on typepad.com.
     *
     * @param string $callback_url  The local URL to redirect to for sync.
     * @param string $callback_next (Optional) The local URL to redirect to *after* sync.
     * @return string
     */
    function sessionSyncScriptUrl($callback_url, $callback_next = TP_RETURN_URL) {
        $auth_string = preg_replace('/&/', '&amp;', $this->authString('url'));
        $url = $this->getApiEndpoint('sessionSyncScriptUrl')
            . '?' . $auth_string
            . "&amp;callback_url=" . urlencode("$callback_url?callback_next=$callback_next")
            . "&amp;session_sync_token=" . $this->session_sync_token;

        return $url;
    }

    /**
     * Return an API endpoint URL.
     *
     * Looks up and returns an authentication-related API endpoint URL for the
     * application whose API keys are specified in config.php.
     *
     * These endpoints will be retrieved from the API itself the first time,
     * and then cached in the database. If the TP_CONSUMER_KEY in config.php
     * is changed, the cached data will be discarded.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/api-keys/%253Cid%253E
     * @param string $endpoint The type of endpoint.
     * @return string
     */
    function getApiEndpoint($endpoint) {
        if (!$this->store) return "";

        $old_key = '';
        if (!$this->api_endpoints) {
            $result = mysql_query("SELECT * FROM config");
            if ($result && mysql_num_rows($result)) {
                $row = mysql_fetch_array($result);
                if ($row['consumer_key'] == TP_CONSUMER_KEY) {
                    $this->api_endpoints = get_object_vars(TypePad::_json_decode($row['urls']));
                    return $this->api_endpoints[$endpoint];
                } else {
                    // if the consumer key has changed in the config file from what it was
                    // when we stashed the endpoints in the db, we need to re-fetch and update
                    $old_key = $row['consumer_key'];
                }
            }
            $url = TP_API_BASE . '/api-keys/' . TP_CONSUMER_KEY . '.json';
            $request = new HttpRequest('GET', $url);
            TypePad::setCurlopts($request);
            $doc = TypePad::_json_decode($request->getResponse()->getContent());

            $vars = get_object_vars($doc->owner);
            foreach (preg_grep('/Url$/', array_keys($vars)) as $key) {
                $this->api_endpoints[$key] = $vars[$key];
            }
            // store in db
            $urls = mysql_real_escape_string(TypePad::_json_encode($this->api_endpoints));
            $key = mysql_real_escape_string(TP_CONSUMER_KEY);
            if ($old_key) {
                mysql_query("UPDATE config SET consumer_key = '$key', urls = '$urls'");
            } else {
                mysql_query("INSERT INTO config (consumer_key, urls) VALUES('$key', '$urls')");
            }
        }

        return $this->api_endpoints[$endpoint];
    }

    /**
     * Generate an authentication string.
     *
     * Generates and returns a string with this user session's credentials
     * according to the OAuth specification. The string can be returned as a
     * comma-delimited list of key="value" pairs, suitable for use in an
     * Authentication: header, or as an &-delimited list of key=value pairs,
     * suitable for use in a URL.
     *
     * @param string $format (Optional) 'header' (the default) or 'url'
     * @return string
     */
    function authString($format = 'header') {
        // Make a dummy OAuth Request object so we can use its signed parameters
        $oauth = new OAuthRequester($this->getApiEndpoint('oauthAccessTokenUrl'), 'GET');

        $use_anon_keys = 0;
        if ($this->user_id) {
            // Grab the access secret_token
            try {
                $r = $this->store->getServerToken(TP_CONSUMER_KEY, $this->oauth_token, $this->user_id);
            } catch (Exception $e) {
                $use_anon_keys = 1;
            }
        } else {
            $use_anon_keys = 1;
        }
        if ($use_anon_keys) {
            $r = array(
                'consumer_key' => TP_CONSUMER_KEY,
                'consumer_secret' => TP_CONSUMER_SECRET,
                'token' => TP_GENERAL_PURPOSE_KEY,
                'token_secret' => TP_GENERAL_PURPOSE_SECRET
            );
        }

        // this will croak on a string vs array object if we don't rewrite the current value
        $signature_methods = array('PLAINTEXT');
        $r['signature_methods'] = $signature_methods;

        // this should work whether or not we have a user_id because if not,
        // we've populated $r manually so it won't try to do a lookup
        $oauth->sign($this->user_id, $r);
        $parameters = array('timestamp', 'nonce', 'consumer_key',
        'version', 'signature_method', 'signature');

        $auth_string = '';

        if ($format == 'header') {
            // Build the Authorization value, starting with the realm.
            $auth_string = 'OAuth realm="' . 'api.typepad.com' . '", ';
        }

        // Then append each value in the $parameters array...
        foreach ($parameters as $parm) {
            $auth_string .= self::_authPair($oauth, $parm, $format);
        }

        // ...ending with the access token from the DB.
        if ($format == 'header') {
            $auth_string .= 'oauth_token="' . $r['token'] . '"';
        } else {
            $auth_string .= "oauth_token={$r['token']}";
        }

        return $auth_string;
    }

    private static function _authPair($oauth, $key, $format = 'header') {
        $key = 'oauth_' . $key;
        if ($format == 'header') {
            return $key . '="' . $oauth->getParam($key) . '", ';
        } elseif ($format == 'url') {
            return $key . '=' . $oauth->getParam($key) . '&';
        }
    }

    private function _updateUserRecord($typepad, $session_sync_token) {

        $this->user = $typepad->users->get('@self');
        $this->session_sync_token = $session_sync_token;
        // this writes the user record to the db.
        $oauth_user_id = self::_rememberUser($this->user, $session_sync_token);

        $old_oauth_id = $this->user_id;
        // this is important for other services using this obj...
        $this->user_id = $oauth_user_id;
        setcookie(TP_COOKIE_NAME, $this->sessionId());

        // When you begin the sign-on process, you're given a temporary user record
        // without its TypePad XID -- even if you already existed.  This block
        // makes the temporary request/access token your actual request/access tokens.
        $this->session_id = $_COOKIE[TP_COOKIE_NAME];
          if (($old_oauth_id != $oauth_user_id) && ($oauth_user_id)){
            // Update the OAuth table to user our user lookup.
            self::_replaceOauthUser($old_oauth_id, $oauth_user_id);

            // Remove the temporary user.
            self::_deleteUser($old_oauth_id);
        }
    }

    private function _verifyAccessToken() {
        try {
            $r = $this->store->getServerTokenSecrets(TP_CONSUMER_KEY, $_GET['oauth_token'],
            'request', $this->user_id);
        } catch (OAuthException2 $e) {
            var_dump($e);
            // If we're catching an exception here, it's likely that a user is refreshing the page after
            // they've submitted once.  Try to use the DB-stored oauth token instead...
            try {
                $r = $this->store->getServerTokenSecrets(TP_CONSUMER_KEY,
                $this->_lookupOauthTokenFromDb($_COOKIE[TP_COOKIE_NAME], $_GET, $this->store),
                    'request', $this->user_id);
            } catch (OAuthException2 $e) {
                var_dump($e);
            }
        }

        // make a generic Request object, and then sign it with the secret token
        $oauth     = new OAuthRequester($this->getApiEndpoint('oauthAccessTokenUrl'),'GET');
        $oauth->sign($this->user_id, $r);

        $final_url = $this->getApiEndpoint('oauthAccessTokenUrl') . "?";

        $parameters = array('timestamp', 'nonce', 'consumer_key',
            'version', 'signature_method', 'signature', 'token');

        foreach ($parameters as $parm) {
            $final_url .= 'oauth_' . $parm . '=' . $oauth->getParam('oauth_' . $parm) . '&';
        }

        // don't forget the verifier!
        $final_url .= 'oauth_verifier=' . $this->oauth_verifier;

        $request = new HttpRequest('GET', $final_url);
        TypePad::setCurlopts($request);
        $doc = $request->getResponse()->getContent();

        // Successful verification.
        if ($doc) {
            $response = array();
            $response_array = explode("&", $doc);
            foreach ($response_array as $response_str) {
                $pair = explode("=", $response_str);
                $response[$pair[0]] = $pair[1];
            }

            $r = $this->store->getServerTokenSecrets(TP_CONSUMER_KEY, $_GET['oauth_token'],
                'request', $this->user_id);
            $token_name    = $r['token_name'];
            $opts = array();
            $opts['name'] = $token_name;
            $this->store->addServerToken(TP_CONSUMER_KEY, 'access',
            $response['oauth_token'], $response['oauth_token_secret'],
                $this->user_id, $opts);

            // Ignore what's in the URL -- use what's in the DB.
            $this->oauth_token = $this->_lookupOauthTokenFromDb($this->user_id, $_GET, $this->store);
        } else {
            $this->oauth_token = "";
        }
    }

    /**
     * Initiate an OAuth login via TypePad.
     *
     * If the user is not already logged in, requests a token from TypePad,
     * then redirects to the application's oauthIdentificationUrl.
     *
     * @param string $return_url (Optional) The URL on the application's site to
     *                                      redirect to after login.
     */
    function doLogin($return_url = TP_RETURN_URL) {
        if ($this->isLoggedIn()) {
            header('Location: ' . $return_url);
            return;
        }
        // Obtain a Request token from TypePad.
        $this->_requestAndVerifyRequestToken();
        header(
            'Location: '
            . $this->getApiEndpoint('oauthIdentificationUrl')
            . '?' . $this->authString('url')
            . '&callback_url=' . TP_SYNC_URL . urlencode('?callback_next=' . $return_url)
        );
    }

    /**
     * Log the user out of the application and (optionally) TypePad.
     *
     * @param boolean $redirect Whether to attempt to redirect the user to the
     *                          application's signoutUrl on TypePad after deleting
     *                          the local cookie.
     */
    function doLogout($redirect = false) {
        if ($this->user_id) $this->store->deleteConsumer(TP_CONSUMER_KEY, $this->user_id);

        setcookie(TP_COOKIE_NAME, '', time()-3600);

        // Clear the locally defined oauth_token to indicate that the user
        // is NOT logged in.
        $this->oauth_token = "";
        $this->user_id = 0;

        if ($redirect) {
            header(
                'Location: '
                . $this->getApiEndpoint('signoutUrl')
                . '?callback_url=' . TP_RETURN_URL
            );
        }
    }

   // This is a wrapper method for the first Login page of the OAuth process, and does the following:
   //  1. Formulates a request to TypePad for a Request Token
   //  2. Makes the request to TypePad
   //  3. Parses the request result, makes sure everything's okay.
   // It does NOT redirect to TypePad for login.
    private function _requestAndVerifyRequestToken() {

        if (!$this->user_id) {
            // create a temp user and make a cookie for his record
            $this->user_id = self::_createTempUser();
            setcookie(TP_COOKIE_NAME, $this->sessionId());
        }

        // At this point, we shouldn't have anything in the DB with a record of this transaction.
        // Set up the required parameters to recognize an OAuth provider -- known in this OAuthPHP lib as
        // a record in the oauth_consumer_registry table.

        $server = array(
            'consumer_key'      => TP_CONSUMER_KEY,
            'consumer_secret'   => TP_CONSUMER_SECRET,
            'server_uri'        => TP_API_BASE,
            'signature_methods' => array('PLAINTEXT'),
            'request_token_uri' => $this->getApiEndpoint('oauthRequestTokenUrl'),
            'authorize_uri'     => $this->getApiEndpoint('oauthAuthorizationUrl'),
            'access_token_uri'  => $this->getApiEndpoint('oauthAccessTokenUrl')
        );

        // See which known services exist for this user
        $servers = $this->store->listServers('', $this->user_id);

        // Refresh the known OAuth providers for this user by deleting them if they already exist...
        foreach ($servers as $server_item) {
            if (($server_item['consumer_key'] == TP_CONSUMER_KEY) &&
                ($server_item['user_id'] == $this->user_id)) {
                    $this->store->deleteServer(TP_CONSUMER_KEY, $this->user_id);
            }
        }

        // otherwise, create a new record of this OAuth provider.
        $consumer_key = $this->store->updateServer($server, $this->user_id);

        $r = $this->store->getServer(TP_CONSUMER_KEY, $this->user_id);

        // This creates a generic Request object, so we'll have to fill in the rest...
        $oauth = new OAuthRequester($this->getApiEndpoint('oauthRequestTokenUrl'), '', '');
        $oauth->setParam('oauth_callback', TP_RETURN_URL);

        // ..and this adds more parameters, like the timestamp, nonce, version, signature method, etc
        $oauth->sign($this->user_id, $r);

        // Begin to build the URL string with the request token endpoint
        $final_url = $this->getApiEndpoint('oauthRequestTokenUrl') . "?";

        $parameters = array('timestamp', 'callback', 'nonce', 'consumer_key',
            'version', 'signature_method', 'signature');

        foreach ($parameters as $parm) {
            $final_url .= 'oauth_' . $parm . '=' . $oauth->getParam('oauth_' . $parm) . '&';
        }

        /* Now execute the long query that may look something like this:

        https://www.typepad.com/secure/services/oauth/request_token ?
        oauth_signature=n3lQROBcPnBZvEgplUzHcgkUCrA%3D &
        oauth_timestamp=1269811986 &
        oauth_callback=http%3A%2F%2F127.0.0.1%3A5000%2Flogin-callback &
        oauth_nonce=853433351 &
        oauth_consumer_key=c5139cef2985b86d &
        oauth_version=1.0 &
        oauth_signature_method=HMAC-SHA1
        */

        // and go ahead and execute the request.
        $request = new HttpRequest('GET', $final_url);
        TypePad::setCurlopts($request);
        $doc = $request->getResponse()->getContent();
        $response_array = explode("&", $doc);

        // TODO: Verbose error handling

        // Store the results!
        $response = array();
        foreach ($response_array as $response_str) {
            $pair = explode("=", $response_str);
            $response[$pair[0]] = $pair[1];
        }

        // Instead of storing the Request token as a cookie, write it to the db.
        $this->store->addServerToken(TP_CONSUMER_KEY, 'request', $response['oauth_token'],
                      $response['oauth_token_secret'], $this->user_id, '');

        $this->oauth_token = $response['oauth_token'];
    }

    private static function _getDbOptions() {
        return array(
            'server'     => TP_DB_HOST,
            'username'   => TP_DB_USERNAME,
            'password'   => TP_DB_PASSWORD,
            'database'   => TP_DB_NAME
        );
    }

    private static function _lookupSessionSyncToken($token) {
        $query = "SELECT * FROM user WHERE session_sync_token = '"
            . mysql_real_escape_string($token) . "'";
        $result = mysql_query($query);

        if (!$result || !mysql_num_rows($result)) return 0;

        return mysql_result($result, 0, 'session_id');
    }

    private function _lookupOauthToken($params, $store) {
        // The OAuth token is in one of two places:
        $oauth_token = "";

        // 1. The URL parameter (as in, it's super new.)
        if (array_key_exists('oauth_token', $params)) {
            $oauth_token = $params['oauth_token'];
            // Make sure it's been written to the DB for this user.
        } else if (array_key_exists(TP_COOKIE_NAME, $_COOKIE)) {
            // 2. it resides in the DB.  key off of the user_id cookie.
            $this->session_id = $_COOKIE[TP_COOKIE_NAME];
            $oauth_token = $this->_lookupOauthTokenFromDb($this->userId(), $params, $store);
        }

        return $oauth_token;
    }

    private function _lookupOauthTokenFromDb($user_id, $params, $store) {
        $tokens = $store->listServerTokens($user_id);

        if (sizeof($tokens) >= 1) {
            return $oauth_token = $tokens[0]['token'];
        } else {
            return 0;
        }
    }

    private function _setSessionId() {
        if (isset(self::$user_session_map[$this->user_id])) return self::$user_session_map[$this->user_id];
        $query = "SELECT * FROM user where id='" . mysql_real_escape_string($this->user_id) . "'";
        $result = mysql_query($query);

        if (!$result || !mysql_num_rows($result)) {
            self::$user_session_map[$this->user_id] = 0;
            return 0;
        }

        // otherwise, it exists
        $this->session_id = mysql_result($result, 0, "session_id");
        $this->session_sync_token = mysql_result($result, 0, "session_sync_token");
        self::$user_session_map[$this->user_id] = $this->session_id;

    }

    private function _setUserId() {
        if (isset(self::$session_user_map[$this->session_id])) return self::$session_user_map[$this->session_id];
        $query = "SELECT id, tp_id, session_sync_token FROM user where session_id='" . mysql_real_escape_string($this->session_id) . "'";
        $result = mysql_query($query);

        if (!$result || !mysql_num_rows($result)) {
            self::$session_user_map[$this->session_id] = 0;
            return 0;
        }

        // otherwise, it exists
        $this->user_id = mysql_result($result, 0, "id");
        $this->user_url_id = mysql_result($result, 0, "tp_id");
        $this->session_sync_token = mysql_result($result, 0, "session_sync_token");
        self::$session_user_map[$this->session_id] = $this->user_id;
    }

    private static function _createTempUser() {
        // Make a temporary row.

        $rando = uniqid();
        $rando_2 = uniqid();
        $query = "INSERT INTO user (tp_id, name, session_id) VALUES ('$rando', '', '$rando_2')";
        $result = mysql_query($query);

        if (!$result) print ("[_createTempUser] QUERY INSERT WENT BAD");

        return self::_getId($rando);
    }

    private static function _replaceOauthUser($old_user, $new_user) {
        // Update the token record first...
        $query = "update oauth_consumer_token set oct_usa_id_ref=$new_user where oct_usa_id_ref=$old_user";
        $result = mysql_query($query);

        // You cannot have duplicate entries for ocr_usa_id_ref records, so delete any if they already exist.
        $query = "delete from oauth_consumer_registry where ocr_usa_id_ref=$new_user";
        $result = mysql_query($query);

        // Then update the server registry record.
        $query = "update oauth_consumer_registry set ocr_usa_id_ref=$new_user where ocr_usa_id_ref=$old_user";
        $result = mysql_query($query);

        // Finally, link the oauth_consumer_token record to the updated server registry record.
        $query = "select ocr_id from oauth_consumer_registry where ocr_usa_id_ref=$new_user";
        $result = mysql_query($query);

        if ($result && mysql_num_rows($result)) {
            // otherwise, it exists
            $id = mysql_result($result, 0, "ocr_id");

            // update the oauth_consumer_token to be associated with this row's registry.
            $query = "update oauth_consumer_token set oct_ocr_id_ref=$id where oct_usa_id_ref=$new_user";
            $result = mysql_query($query);
        } else {
            print ("[replaceOauthUser] There was an error with the query $query");
        }
    }

    private static function _deleteUser($id) {
        $query = "DELETE FROM user where id=$id";
        $result = mysql_query($query);
    }

    private static function _getId($xid) {
        $query = "SELECT * FROM user where tp_id='" . mysql_real_escape_string($xid) . "'";
        $result = mysql_query($query);

        if (!$result || !mysql_num_rows($result)) return 0;

        // otherwise, it exists
        return mysql_result($result, 0, "id");
    }

    private static function _rememberUser($user, $session_sync_token) {
        // check if the user exists.
        $id = self::_getId($user->urlId);

        if ($id) return $id;

        $rando = uniqid();

        // otherwise, create a new record.
        $query = "INSERT INTO user (tp_id, name, session_id, session_sync_token) VALUES ('" .
            mysql_real_escape_string($user->urlId)
            . "', '" . mysql_real_escape_string($user->displayName) . "', '$rando', '"
            . mysql_real_escape_string($session_sync_token) .  "')";
        $result = mysql_query($query);
        // Now, get the user's id from the db.
        return self::_getId($user->urlId);
    }

}

require_once ("oauth-php-98/library/OAuthStore.php");
require_once ("oauth-php-98/library/OAuthRequester.php");

