<?php

/**
 * Configuration settings for your site.
 *
 * This file holds configuration information about the site from which you're
 * going to access the TypePad API. Copy it to your site's directory,
 * rename it to config.php, and include() it on each page that has any TypePad
 * interaction. Then edit the settings for your API keys, site, and database.
 *
 * This file calls in the main TypePad library, which in turn loads the other
 * necessary libraries. You may have to edit the path in the include_once()
 * at the bottom of this file.
 *
 * @package config
 */

/**
 * The name of the cookie that will hold the session ID for a logged-in user.
 */
define ('TP_COOKIE_NAME', 'tp-session');

/**
 * The consumer key generated by signing up for an TypePad API key
 * (http://www.typepad.com/account/access/developer when logged in to TypePad).
 */
define ('TP_CONSUMER_KEY', '');
/**
 * The consumer secret generated by signing up for an TypePad API key.
 */
define ('TP_CONSUMER_SECRET', '');
/**
 * The anonymous access key generated by signing up for an TypePad API key.
 */
define ('TP_GENERAL_PURPOSE_KEY', '');
/**
 * The anonymous access secret generated by signing up for an TypePad API key.
 */
define ('TP_GENERAL_PURPOSE_SECRET', '');
/**
 * The type of access that this application will request from TypePad on behalf
 * of a user who signs up for it. 'app_full' will give the user access to 
 * content owned by the application; 'typepad_full' will give the user access
 * to TypePad content.
 */
define ('TP_ACCESS_TYPE', 'app_full');

/**
 * The default URL to which TypePad should redirect the browser after login
 * or logout. 
 */
define ('TP_RETURN_URL', 'http://www.example.com/');
/**
 * The default URL to which TypePad should redirect the browser in order to
 * synchronize this application's session with TypePad's. This must be an empty
 * page (nothing outside of a php block) that calls $tp->syncSession().
 */
define ('TP_SYNC_URL', 'http://www.example.com/sync.php');
/**
 * The hostname to use when connecting to a MySQL database.
 */
define ('TP_DB_HOST', 'localhost');
/**
 * The username to use when connecting to a MySQL database.
 */
define ('TP_DB_USERNAME', 'root');
/**
 * The password to use when connecting to a MySQL database.
 */
define ('TP_DB_PASSWORD', '');
/**
 * The MySQL database to connect to. Required if this application allows users
 * to log in via TypePad; if the application only accesses the API anonymously,
 * the TypePad library can work without a database.
 */
define ('TP_DB_NAME', 'typepad');
/**
 * The location of the non-secure TypePad API endpoints. 
 */
define ('TP_API_BASE', 'http://api.typepad.com');
/**
 * The location of the secure TypePad API endpoints. 
 */
define ('TP_API_BASE_SECURE', 'https://api.typepad.com');
/**
 * Set this to true if hitting dev API backends with no SSL certs.
 */
define ('TP_INSECURE', false);

include_once('../lib/TypePad.php');

?>
