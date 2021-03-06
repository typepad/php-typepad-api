<?php

/**
 * Object type classes for the TypePad API.
 *
 * AUTO-GENERATED FILE - DO NOT EDIT
 *
 * @package TypePad-ObjectTypes
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
 * A Base object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Base
 * @package TypePad-ObjectTypes
 * @subpackage TPBase
 */
class TPBase extends TPObject {

    protected static $properties = array(
        
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return true; }

}

/**
 * An Account object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Account
 * @package TypePad-ObjectTypes
 * @subpackage TPAccount
 */
class TPAccount extends TPBase {

    protected static $properties = array(
        'providerURL' => array('T<Deprecated> The URL of the home page of the service that provides this account.', 'string'),
        'urlId' => array('An opaque string that serves as a globally unique identifier for the account.', 'string'),
        'providerIconURL' => array('T<Deprecated> The URL of a 16-by-16 pixel icon that represents the service that provides this account.', 'string'),
        'userId' => array('The machine identifier or primary key for the account, if known. (Some sites only have a M<username>.)', 'string'),
        'crosspostable' => array('C<true> if this account can be used to crosspost, or C<false> otherwise. An account can be used to crosspost if its service supports crossposting and the user has enabled crossposting for the specific account.', 'boolean'),
        'providerIconUrl' => array('The URL of a 16-by-16 pixel icon that represents the service that provides this account.', 'string'),
        'username' => array('The username of the account, if known. (Some sites only have a M<userId>.)', 'string'),
        'providerName' => array('A human-friendly name for the service that provides this account.', 'string'),
        'domain' => array('The DNS domain of the service that provides the account.', 'string'),
        'providerUrl' => array('The URL of the home page of the service that provides this account.', 'string'),
        'url' => array('The URL of the user\'s profile or primary page on the remote site, if known.', 'string'),
        'id' => array('A URI that serves as a globally unique identifier for the account.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An ApiKey object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ApiKey
 * @package TypePad-ObjectTypes
 * @subpackage TPApiKey
 */
class TPApiKey extends TPBase {

    protected static $properties = array(
        'owner' => array('The application that owns this API key.', 'Application'),
        'apiKey' => array('The actual API key string. Use this as the consumer key when making an OAuth request.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->owner) && (get_class($data->owner) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->owner->objectType) ? $data->owner->objectType : 'Application');
            $this->owner = new $ot_class($data->owner);
        }
    }
}

/**
 * An Asset object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Asset
 * @package TypePad-ObjectTypes
 * @subpackage TPAsset
 */
class TPAsset extends TPBase {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this asset. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('The description of the asset.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return true; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * An Audio object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Audio
 * @package TypePad-ObjectTypes
 * @subpackage TPAudio
 */
class TPAudio extends TPAsset {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'audioLink' => array('A link to the audio stream that is this Audio asset\'s content.', 'AudioLink'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this asset. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('The description of the asset.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->audioLink) && (get_class($data->audioLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->audioLink->objectType) ? $data->audioLink->objectType : 'AudioLink');
            $this->audioLink = new $ot_class($data->audioLink);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * A Comment object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Comment
 * @package TypePad-ObjectTypes
 * @subpackage TPComment
 */
class TPComment extends TPAsset {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this page. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'root' => array('A reference to the root asset that this comment is descended from. This will be the same as M<inReplyTo> unless this comment is a reply to another comment.', 'AssetRef'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'inReplyTo' => array('A reference to the asset that this comment is in reply to.', 'AssetRef'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('The description of the asset.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->inReplyTo) && (get_class($data->inReplyTo) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->inReplyTo->objectType) ? $data->inReplyTo->objectType : 'AssetRef');
            $this->inReplyTo = new $ot_class($data->inReplyTo);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->root) && (get_class($data->root) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->root->objectType) ? $data->root->objectType : 'AssetRef');
            $this->root = new $ot_class($data->root);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * A Link object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Link
 * @package TypePad-ObjectTypes
 * @subpackage TPLink
 */
class TPLink extends TPAsset {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this asset. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('The description of the asset.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'targetUrl' => array('The URL that is the target of this link.', 'string'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * A Page object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Page
 * @package TypePad-ObjectTypes
 * @subpackage TPPage
 */
class TPPage extends TPAsset {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'publicationStatus' => array('T<Editable> An object describing the draft status and publication date for this page.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'feedbackStatus' => array('T<Editable> An object describing the comment and trackback behavior for this page.', 'FeedbackStatus'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('T<Editable> The description of the page.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'textFormat' => array('T<Editable> A keyword that indicates what formatting mode to use for the content of this page. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'embeddedImageLinks' => array('A list of links to the images that are embedded within the content of this page.', 'array<ImageLink>'),
        'filename' => array('T<Editable> The base name of the page, used to create the M<permalinkUrl>.', 'string'),
        'title' => array('T<Editable> The title of the page.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->embeddedImageLinks)) $this->embeddedImageLinks = new TPList($data->embeddedImageLinks, 'TPImageLink');
        if (isset($data->feedbackStatus) && (get_class($data->feedbackStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->feedbackStatus->objectType) ? $data->feedbackStatus->objectType : 'FeedbackStatus');
            $this->feedbackStatus = new $ot_class($data->feedbackStatus);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * A Photo object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Photo
 * @package TypePad-ObjectTypes
 * @subpackage TPPhoto
 */
class TPPhoto extends TPAsset {

    protected static $properties = array(
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this asset. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'description' => array('The description of the asset.', 'string'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'imageLink' => array('A link to the image that is this Photo asset\'s content.', 'ImageLink'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->imageLink) && (get_class($data->imageLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->imageLink->objectType) ? $data->imageLink->objectType : 'ImageLink');
            $this->imageLink = new $ot_class($data->imageLink);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
    }
}

/**
 * A Post object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Post
 * @package TypePad-ObjectTypes
 * @subpackage TPPost
 */
class TPPost extends TPAsset {

    protected static $properties = array(
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'embeddedAudioLinks' => array('A list of links to the audio streams that are embedded within the content of this post.', 'array<AudioLink>'),
        'content' => array('T<Editable> The raw post content. The M<textFormat> property defines what format this data is in.', 'string'),
        'reblogCount' => array('The number of times this post has been reblogged by other people.', 'integer'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'feedbackStatus' => array('T<Editable> An object describing the comment and trackback behavior for this post.', 'FeedbackStatus'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'reblogOf' => array('A reference to a post of which this post is a reblog.', 'AssetRef'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'embeddedVideoLinks' => array('A list of links to the videos that are embedded within the content of this post.', 'array<VideoLink>'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'createConversation' => array('An optional, write-only flag indicating that the asset is starting a new conversation.', 'boolean'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'description' => array('T<Editable> The description of the post.', 'string'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'textFormat' => array('T<Editable> A keyword that indicates what formatting mode to use for the content of this post. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'title' => array('T<Editable> The title of the post.', 'string'),
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'author' => array('The user who created the selected asset.', 'User'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'publicationStatus' => array('T<Editable> An object describing the draft status and publication date for this post.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'conversationId' => array('If assigned, identifies the O<Conversation> object this asset is related to.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'categories' => array('T<Editable> A list of categories associated with the post.', 'array<string>'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'embeddedImageLinks' => array('A list of links to the images that are embedded within the content of this post.', 'array<ImageLink>'),
        'filename' => array('T<Editable> The base name of the post to use when creating its M<permalinkUrl>.', 'string'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->embeddedVideoLinks)) $this->embeddedVideoLinks = new TPList($data->embeddedVideoLinks, 'TPVideoLink');
        if (isset($data->embeddedAudioLinks)) $this->embeddedAudioLinks = new TPList($data->embeddedAudioLinks, 'TPAudioLink');
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
        if (isset($data->embeddedImageLinks)) $this->embeddedImageLinks = new TPList($data->embeddedImageLinks, 'TPImageLink');
        if (isset($data->feedbackStatus) && (get_class($data->feedbackStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->feedbackStatus->objectType) ? $data->feedbackStatus->objectType : 'FeedbackStatus');
            $this->feedbackStatus = new $ot_class($data->feedbackStatus);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
    }
}

/**
 * A Video object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Video
 * @package TypePad-ObjectTypes
 * @subpackage TPVideo
 */
class TPVideo extends TPAsset {

    protected static $properties = array(
        'excerpt' => array('A short, plain-text excerpt of the entry content. This is currently available only for O<Post> assets.', 'string'),
        'videoLink' => array('A link to the video that is this Video asset\'s content.', 'VideoLink'),
        'content' => array('The raw asset content. The M<textFormat> property describes how to format this data. Use this property to set the asset content in write operations. An asset posted in a group may have a M<content> value up to 10,000 bytes long, while a O<Post> asset in a blog may have up to 65,000 bytes of content.', 'string'),
        'isFavoriteForCurrentUser' => array('C<true> if this asset is a favorite for the currently authenticated user, or C<false> otherwise. This property is omitted from responses to anonymous requests.', 'boolean'),
        'suppressEvents' => array('T<Editable> An optional, write-only flag indicating that asset creation should not trigger notification events such
 as emails or dashboard entries. Not available to all applications.', 'boolean'),
        'reblogOf' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset, this property describes the original asset.', 'AssetRef'),
        'groups' => array('T<Deprecated> An array of strings containing the M<id> URI of the O<Group> object that this asset is mapped into, if any. This property has been superseded by the M<container> property.', 'array<string>'),
        'previewImageLink' => array('A link to a preview image or poster frame for this video. This property is omitted if no such image is available.', 'ImageLink'),
        'id' => array('A URI that serves as a globally unique identifier for the user.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of this asset. Only the one object type URI for the particular type of asset this asset is will be present.', 'set<string>'),
        'description' => array('The description of the asset.', 'string'),
        'published' => array('The time at which the asset was created, as a W3CDTF timestamp.', 'datetime'),
        'textFormat' => array('A keyword that indicates what formatting mode to use for the content of this asset. This can be C<html> for assets the content of which is HTML, C<html_convert_linebreaks> for assets the content of which is HTML but where paragraph tags should be added automatically, or C<markdown> for assets the content of which is Markdown source. Other formatting modes may be added in future. Applications that present assets for editing should use this property to present an appropriate editor.', 'string'),
        'permalinkUrl' => array('The URL that is this asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'title' => array('The title of the asset.', 'string'),
        'source' => array('An object describing the site from which this asset was retrieved, if the asset was obtained from an external source.', 'AssetSource'),
        'favoriteCount' => array('The number of distinct users who have added this asset as a favorite.', 'integer'),
        'author' => array('The user who created the selected asset.', 'User'),
        'publicationStatus' => array('T<Editable> An object describing the visibility status and publication date for this asset. Only visibility status is editable.', 'PublicationStatus'),
        'renderedContent' => array('The content of this asset rendered to HTML. This is currently available only for O<Post> and O<Page> assets.', 'string'),
        'crosspostAccounts' => array('T<Editable> A set of identifiers for O<Account> objects to which to crosspost this asset when it\'s posted. This property is omitted when retrieving existing assets.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of asset this is.', 'string'),
        'reblogOfUrl' => array('T<Deprecated> If this asset was created by \'reblogging\' another asset or some other arbitrary web page, this property contains the URL of the item that was reblogged.', 'string'),
        'container' => array('An object describing the group or blog to which this asset belongs.', 'ContainerRef'),
        'commentCount' => array('The number of comments that have been posted in reply to this asset. This number includes comments that have been posted in response to other comments.', 'integer'),
        'isConversationsAnswer' => array('T<Deprecated> C<true> if this asset is an answer to a TypePad Conversations question, or absent otherwise. This property is deprecated and will be replaced with something more useful in future.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'AssetSource');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->videoLink) && (get_class($data->videoLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->videoLink->objectType) ? $data->videoLink->objectType : 'VideoLink');
            $this->videoLink = new $ot_class($data->videoLink);
        }
        if (isset($data->container) && (get_class($data->container) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->container->objectType) ? $data->container->objectType : 'ContainerRef');
            $this->container = new $ot_class($data->container);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
        if (isset($data->publicationStatus) && (get_class($data->publicationStatus) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->publicationStatus->objectType) ? $data->publicationStatus->objectType : 'PublicationStatus');
            $this->publicationStatus = new $ot_class($data->publicationStatus);
        }
        if (isset($data->reblogOf) && (get_class($data->reblogOf) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->reblogOf->objectType) ? $data->reblogOf->objectType : 'AssetRef');
            $this->reblogOf = new $ot_class($data->reblogOf);
        }
        if (isset($data->previewImageLink) && (get_class($data->previewImageLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->previewImageLink->objectType) ? $data->previewImageLink->objectType : 'ImageLink');
            $this->previewImageLink = new $ot_class($data->previewImageLink);
        }
    }
}

/**
 * An AssetExtendedContent object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/AssetExtendedContent
 * @package TypePad-ObjectTypes
 * @subpackage TPAssetExtendedContent
 */
class TPAssetExtendedContent extends TPBase {

    protected static $properties = array(
        'renderedExtendedContent' => array('The HTML rendered version of this asset\'s extended content, if it has any. Otherwise, this property is omitted.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An AssetRef object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/AssetRef
 * @package TypePad-ObjectTypes
 * @subpackage TPAssetRef
 */
class TPAssetRef extends TPBase {

    protected static $properties = array(
        'excerpt' => array('A short, plain-text excerpt of the referenced asset\'s content. This is currently available only for O<Post> assets.', 'string'),
        'author' => array('The user who created the referenced asset.', 'User'),
        'objectType' => array('The keyword identifying the type of asset the referenced O<Asset> object is.', 'string'),
        'href' => array('The URL of a representation of the referenced asset.', 'string'),
        'id' => array('The URI from the referenced O<Asset> object\'s M<id> property.', 'string'),
        'urlId' => array('The canonical identifier from the referenced O<Asset> object\'s M<urlId> property.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs identifying the type of the referenced asset. Only the one object type URI for the particular type of asset the referenced asset is will be present.', 'array<string>'),
        'permalinkUrl' => array('The URL that is the referenced asset\'s permalink. This will be omitted if the asset does not have a permalink of its own (for example, if it\'s embedded in another asset) or if TypePad does not know its permalink.', 'string'),
        'type' => array('The MIME type of the representation at the URL given in the M<href> property.', 'string'),
        'title' => array('The title of the referenced asset, if it has one.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * An AssetSource object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/AssetSource
 * @package TypePad-ObjectTypes
 * @subpackage TPAssetSource
 */
class TPAssetSource extends TPBase {

    protected static $properties = array(
        'provider' => array('T<Deprecated> Description of the external service provider from which this content was imported, if known. Contains C<name>, C<icon>, and C<uri> properties. This property will be omitted if the service from which the related asset was imported is not recognized.', 'map<string>'),
        'byUser' => array('T<Deprecated> C<true> if this content is considered to be created by its author, or C<false> if it\'s actually someone else\'s content imported by the asset author.', 'boolean'),
        'permalinkUrl' => array('The permalink URL of the resource from which the related asset was imported.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An AudioLink object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/AudioLink
 * @package TypePad-ObjectTypes
 * @subpackage TPAudioLink
 */
class TPAudioLink extends TPBase {

    protected static $properties = array(
        'url' => array('The URL of an MP3 representation of the audio stream.', 'string'),
        'duration' => array('The duration of the audio stream in seconds. This property will be omitted if the length of the audio stream could not be determined.', 'integer')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An AuthToken object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/AuthToken
 * @package TypePad-ObjectTypes
 * @subpackage TPAuthToken
 */
class TPAuthToken extends TPBase {

    protected static $properties = array(
        'targetObject' => array('T<Deprecated> The root object to which this auth token grants access. This is a legacy field maintained for backwards compatibility with older clients, as auth tokens are no longer scoped to specific objects.', 'Base'),
        'authToken' => array('The actual auth token string. Use this as the access token when making an OAuth request.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->targetObject) && (get_class($data->targetObject) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->targetObject->objectType) ? $data->targetObject->objectType : 'Base');
            $this->targetObject = new $ot_class($data->targetObject);
        }
    }
}

/**
 * A Badge object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Badge
 * @package TypePad-ObjectTypes
 * @subpackage TPBadge
 */
class TPBadge extends TPBase {

    protected static $properties = array(
        'id' => array('The canonical identifier that can be used to identify this badge in URLs.  This can be used to recognise where the same badge is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'isLearning' => array('A learning badge is given for a special achievement a user accomplishes while filling out a new account. C<true> if this is a learning badge, or C<false> if this is a normal badge.', 'boolean'),
        'displayName' => array('A human-readable name for this badge.', 'string'),
        'description' => array('A human-readable description of what a user must do to win this badge.', 'string'),
        'imageLink' => array('A link to the image that depicts this badge to users.', 'ImageLink')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->imageLink) && (get_class($data->imageLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->imageLink->objectType) ? $data->imageLink->objectType : 'ImageLink');
            $this->imageLink = new $ot_class($data->imageLink);
        }
    }
}

/**
 * A Blog object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Blog
 * @package TypePad-ObjectTypes
 * @subpackage TPBlog
 */
class TPBlog extends TPBase {

    protected static $properties = array(
        'objectType' => array('The keyword identifying the type of object this is. For a Blog object, M<objectType> will be C<Blog>.', 'string'),
        'id' => array('A URI that serves as a globally unique identifier for the object.', 'string'),
        'owner' => array('The user who owns the blog.', 'User'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs. This set will contain the string C<tag:api.typepad.com,2009:Blog> for a Blog object.', 'set<string>'),
        'description' => array('The description of the blog as provided by its owner.', 'string'),
        'title' => array('The title of the blog.', 'string'),
        'homeUrl' => array('The URL of the blog\'s home page.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->owner) && (get_class($data->owner) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->owner->objectType) ? $data->owner->objectType : 'User');
            $this->owner = new $ot_class($data->owner);
        }
    }
}

/**
 * A BlogCommentingSettings object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/BlogCommentingSettings
 * @package TypePad-ObjectTypes
 * @subpackage TPBlogCommentingSettings
 */
class TPBlogCommentingSettings extends TPBase {

    protected static $properties = array(
        'signinRequired' => array('C<true> if this blog requires users to be logged in in order to leave a comment, or C<false> if anonymous comments will be rejected.', 'boolean'),
        'moderationEnabled' => array('C<true> if this blog places new comments into a moderation queue for approval before they are displayed, or C<false> if new comments may be available immediately.', 'boolean'),
        'emailAddressRequired' => array('C<true> if this blog requires anonymous comments to be submitted with an email address, or C<false> otherwise.', 'boolean'),
        'signinAllowed' => array('C<true> if this blog allows users to sign in to comment, or C<false> if all new comments are anonymous.', 'boolean'),
        'htmlAllowed' => array('C<true> if this blog allows commenters to use basic HTML formatting in comments, or C<false> if HTML will be removed.', 'boolean'),
        'urlsAutoLinked' => array('C<true> if comments in this blog will automatically have any bare URLs turned into links, or C<false> if URLs will be shown unlinked.', 'boolean'),
        'captchaRequired' => array('C<true> if this blog requires anonymous commenters to pass a CAPTCHA before submitting a comment, or C<false> otherwise.', 'boolean'),
        'timeLimit' => array('Number of days after a post is published that comments will be allowed. If the blog has no time limit for comments, this property will be omitted.', 'integer')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A BlogStats object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/BlogStats
 * @package TypePad-ObjectTypes
 * @subpackage TPBlogStats
 */
class TPBlogStats extends TPBase {

    protected static $properties = array(
        'totalPageViews' => array('The total number of page views received by the blog for all time.', 'integer'),
        'dailyPageViews' => array('A map containing the daily page views on the blog for the last 120 days. The keys of the map are dates in W3CDTF format, and the values are the integer number of page views on the blog for that date.', 'map<integer>')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A CommentTreeItem object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/CommentTreeItem
 * @package TypePad-ObjectTypes
 * @subpackage TPCommentTreeItem
 */
class TPCommentTreeItem extends TPBase {

    protected static $properties = array(
        'depth' => array('The number of levels deep this comment is in the tree. A comment that is directly in reply to the root asset is 1 level deep. If a given comment has a depth of 1, all of the direct replies to that comment will have a depth of 2; their replies will have depth 3, and so forth.', 'integer'),
        'comment' => array('The comment asset at this point in the tree.', 'Asset')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->comment) && (get_class($data->comment) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->comment->objectType) ? $data->comment->objectType : 'Asset');
            $this->comment = new $ot_class($data->comment);
        }
    }
}

/**
 * A ContainerRef object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ContainerRef
 * @package TypePad-ObjectTypes
 * @subpackage TPContainerRef
 */
class TPContainerRef extends TPBase {

    protected static $properties = array(
        'objectType' => array('The keyword identifying the type of object the referenced container is.', 'string'),
        'id' => array('The URI from the M<id> property of the referenced blog or group.', 'string'),
        'displayName' => array('The display name of the blog or group, as set by its owner.', 'string'),
        'urlId' => array('The canonical identifier from the M<urlId> property of the referenced blog or group.', 'string'),
        'homeUrl' => array('The URL of the home page of the referenced blog or group.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A Conversation object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Conversation
 * @package TypePad-ObjectTypes
 * @subpackage TPConversation
 */
class TPConversation extends TPBase {

    protected static $properties = array(
        'id' => array('A string containing the canonical identifier that can be used to identify this conversation in URLs. This can be used to recognize where the same conversation is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'asset' => array('Original post that marks the starting point of this thread of conversation.', 'Asset'),
        'isVisible' => array('Flag indicating whether this conversation is publicly visible or not.', 'boolean'),
        'tags' => array('An array of tag names associated with this conversation.', 'array<string>'),
        'responseCount' => array('Holds the total number of responses collected for this thread of conversation.', 'integer'),
        'permalinkUrl' => array('Permalink for the conversation itself.', 'string'),
        'adCampaignId' => array('Optional; identifies the AdCampaign instance related to this conversation.', 'string'),
        'isFeatured' => array('Flag indicating whether this conversation is to be featured on the TypePad Conversations web site.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->asset) && (get_class($data->asset) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->asset->objectType) ? $data->asset->objectType : 'Asset');
            $this->asset = new $ot_class($data->asset);
        }
    }
}

/**
 * A Domain object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Domain
 * @package TypePad-ObjectTypes
 * @subpackage TPDomain
 */
class TPDomain extends TPBase {

    protected static $properties = array(
        'domain' => array('The domain that this object describes.', 'string'),
        'owner' => array('The user that owns this domain in TypePad.', 'User')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->owner) && (get_class($data->owner) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->owner->objectType) ? $data->owner->objectType : 'User');
            $this->owner = new $ot_class($data->owner);
        }
    }
}

/**
 * An Entity object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Entity
 * @package TypePad-ObjectTypes
 * @subpackage TPEntity
 */
class TPEntity extends TPBase {

    protected static $properties = array(
        'id' => array('A URI that serves as a globally unique identifier for the object.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return true; }

}

/**
 * An Application object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Application
 * @package TypePad-ObjectTypes
 * @subpackage TPApplication
 */
class TPApplication extends TPEntity {

    protected static $properties = array(
        'sessionSyncScriptUrl' => array('The URL of the session sync script.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'oauthIdentificationUrl' => array('The URL to send the user\'s browser to in order to identify who is logged in (that is, the "sign in" link).', 'string'),
        'objectTypes' => array('T<Deprecated> The object types for this object. This set will contain the string C<tag:api.typepad.com,2009:Application> for an Application object.', 'set<string>'),
        'name' => array('The name of the application as provided by its developer.', 'string'),
        'oauthAuthorizationUrl' => array('The URL to send the user\'s browser to for the user authorization step.', 'string'),
        'signoutUrl' => array('The URL to send the user\'s browser to in order to sign them out of TypePad.', 'string'),
        'userFlyoutsScriptUrl' => array('The URL of a script to embed to enable the user flyouts functionality.', 'string'),
        'objectType' => array('The keyword identifying the type of object this is. For an Application object, M<objectType> will be C<Application>.', 'string'),
        'oauthRequestTokenUrl' => array('The URL of the OAuth request token endpoint for this application.', 'string'),
        'id' => array('A string containing the canonical identifier that can be used to identify this application in URLs.', 'string'),
        'oauthAccessTokenUrl' => array('The URL of the OAuth access token endpoint for this application.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A Group object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Group
 * @package TypePad-ObjectTypes
 * @subpackage TPGroup
 */
class TPGroup extends TPEntity {

    protected static $properties = array(
        'objectType' => array('A keyword describing the type of this object. For a group object, M<objectType> will be C<Group>.', 'string'),
        'id' => array('A URI that serves as a globally unique identifier for the object.', 'string'),
        'avatarLink' => array('A link to an image representing this group.', 'ImageLink'),
        'displayName' => array('The display name set by the group\'s owner.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs.', 'set<string>'),
        'siteUrl' => array('The URL to the front page of the group website.', 'string'),
        'tagline' => array('A tagline describing the group, as set by the group\'s owner.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->avatarLink) && (get_class($data->avatarLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->avatarLink->objectType) ? $data->avatarLink->objectType : 'ImageLink');
            $this->avatarLink = new $ot_class($data->avatarLink);
        }
    }
}

/**
 * An User object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/User
 * @package TypePad-ObjectTypes
 * @subpackage TPUser
 */
class TPUser extends TPEntity {

    protected static $properties = array(
        'email' => array('T<Deprecated> The user\'s email address. This property is only provided for authenticated requests if the user has shared it with the authenticated application, and the authenticated user is allowed to view it (as with administrators of groups the user has joined). In all other cases, this property is omitted.', 'string'),
        'id' => array('A URI that serves as a globally unique identifier for the object.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'location' => array('T<Deprecated> The user\'s location, as a free-form string provided by them. Use the the M<location> property of the related O<UserProfile> object, which can be retrieved from the N</users/{id}/profile> endpoint.', 'string'),
        'objectTypes' => array('T<Deprecated> An array of object type identifier URIs.', 'set<string>'),
        'objectType' => array('The keyword identifying the type of object this is. For a User object, M<objectType> will be C<User>.', 'string'),
        'preferredUsername' => array('The name the user has chosen for use in the URL of their TypePad profile page. This property can be used to select this user in URLs, although it is not a persistent key, as the user can change it at any time.', 'string'),
        'avatarLink' => array('A link to an image representing this user.', 'ImageLink'),
        'gender' => array('T<Deprecated> The user\'s gender, as they provided it. This property is only provided for authenticated requests if the user has shared it with the authenticated application, and the authenticated user is allowed to view it (as with administrators of groups the user has joined). In all other cases, this property is omitted.', 'string'),
        'displayName' => array('The user\'s chosen display name.', 'string'),
        'interests' => array('T<Deprecated> A list of interests provided by the user and displayed on the user\'s profile page. Use the M<interests> property of the O<UserProfile> object, which can be retrieved from the N</users/{id}/profile> endpoint.', 'array<string>'),
        'profilePageUrl' => array('The URL of the user\'s TypePad profile page.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->avatarLink) && (get_class($data->avatarLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->avatarLink->objectType) ? $data->avatarLink->objectType : 'ImageLink');
            $this->avatarLink = new $ot_class($data->avatarLink);
        }
    }
}

/**
 * An Event object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Event
 * @package TypePad-ObjectTypes
 * @subpackage TPEvent
 */
class TPEvent extends TPBase {

    protected static $properties = array(
        'object' => array('The object to which the action described by this event was performed.', 'Base'),
        'verbs' => array('T<Deprecated> An array of verb identifier URIs. This set will contain one verb identifier URI.', 'set<string>'),
        'verb' => array('A keyword identifying the type of event this is.', 'string'),
        'id' => array('A URI that serves as a globally unique identifier for the event.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same event is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'actor' => array('The user who performed the action described by this event.', 'Entity'),
        'published' => array('The time at which the event was performed, as a W3CDTF timestamp.', 'datetime')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->object) && (get_class($data->object) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->object->objectType) ? $data->object->objectType : 'Base');
            $this->object = new $ot_class($data->object);
        }
        if (isset($data->actor) && (get_class($data->actor) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->actor->objectType) ? $data->actor->objectType : 'Entity');
            $this->actor = new $ot_class($data->actor);
        }
    }
}

/**
 * An ExternalFeedSubscription object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ExternalFeedSubscription
 * @package TypePad-ObjectTypes
 * @subpackage TPExternalFeedSubscription
 */
class TPExternalFeedSubscription extends TPBase {

    protected static $properties = array(
        'filterRules' => array('A list of rules for filtering notifications to this subscription. Each rule is a full-text search query string, like those used with the N</assets> endpoint. An item will be delivered to the M<callbackUrl> if it matches any one of these query strings.', 'array<string>'),
        'postAsUserId' => array('For a Group-owned subscription, the urlId of the User who will own the items posted into the group by the subscription.', 'array<string>'),
        'callbackStatus' => array('The HTTP status code that was returned by the last call to the subscription\'s callback URL.', 'string'),
        'urlId' => array('The canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same user is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'callbackUrl' => array('The URL to which to send notifications of new items in this subscription\'s feeds.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A Favorite object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Favorite
 * @package TypePad-ObjectTypes
 * @subpackage TPFavorite
 */
class TPFavorite extends TPBase {

    protected static $properties = array(
        'author' => array('The user who saved this favorite. That is, this property is the user who saved the target asset as a favorite, not the creator of that asset.', 'User'),
        'id' => array('A URI that serves as a globally unique identifier for the favorite.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this favorite in URLs. This can be used to recognise where the same favorite is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'inReplyTo' => array('A reference to the target asset that has been marked as a favorite.', 'AssetRef'),
        'published' => array('The time that the favorite was created, as a W3CDTF timestamp.', 'datetime')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->inReplyTo) && (get_class($data->inReplyTo) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->inReplyTo->objectType) ? $data->inReplyTo->objectType : 'AssetRef');
            $this->inReplyTo = new $ot_class($data->inReplyTo);
        }
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'User');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * A FeedbackStatus object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/FeedbackStatus
 * @package TypePad-ObjectTypes
 * @subpackage TPFeedbackStatus
 */
class TPFeedbackStatus extends TPBase {

    protected static $properties = array(
        'allowComments' => array('C<true> if new comments may be posted to the related asset, or C<false> if no new comments are accepted.', 'boolean'),
        'allowTrackback' => array('C<true> if new trackback pings may be posted to the related asset, or C<false> if no new pings are accepted.', 'boolean'),
        'showComments' => array('C<true> if comments should be displayed on the related asset\'s permalink page, or C<false> if they should be hidden.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An ImageLink object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImageLink
 * @package TypePad-ObjectTypes
 * @subpackage TPImageLink
 */
class TPImageLink extends TPBase {

    protected static $properties = array(
        'width' => array('The width of the original image in pixels. If the width of the image is not available (for example, if the image isn\'t hosted on TypePad), this property will be omitted.', 'integer'),
        'url' => array('The URL for the original, full size version of the image.', 'string'),
        'height' => array('The height of the original image in pixels. If the height of the image is not available (for example, if the image isn\'t hosted on TypePad), this property will be omitted.', 'integer'),
        'urlTemplate' => array('An URL template with which to build alternate sizes of this image. If present, replace the placeholder string C<{spec}> with a valid sizing specifier to generate the URL for an alternate version of this image. This property is omitted if TypePad is unable to provide a scaled version of this image (for example, if the image isn\'t hosted on TypePad).', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An ImportAsset object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImportAsset
 * @package TypePad-ObjectTypes
 * @subpackage TPImportAsset
 */
class TPImportAsset extends TPBase {

    protected static $properties = array(
        'content' => array('Body or content of the imported asset', 'string'),
        'author' => array('Object representing as much detail as available about the author of the imported asset', 'ImportAuthor'),
        'foreignId' => array('Foreign site ID for the asset', 'string'),
        'objectType' => array('The type of the imported asset', 'string'),
        'published' => array('The time at which the asset was published, as a W3CDTF timestamp', 'string'),
        'title' => array('Title of the imported asset', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return true; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'ImportAuthor');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * An ImportComment object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImportComment
 * @package TypePad-ObjectTypes
 * @subpackage TPImportComment
 */
class TPImportComment extends TPImportAsset {

    protected static $properties = array(
        'status' => array('Keyword indicating publication status of comment', 'string'),
        'inReplyToForeignId' => array('Foreign site ID for the parent of this comment', 'string'),
        'content' => array('Body or content of the imported asset', 'string'),
        'author' => array('Object representing as much detail as available about the author of the imported asset', 'ImportAuthor'),
        'foreignId' => array('Foreign site ID for the asset', 'string'),
        'objectType' => array('The type of the imported asset', 'string'),
        'published' => array('The time at which the asset was published, as a W3CDTF timestamp', 'string'),
        'title' => array('Title of the imported asset', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'ImportAuthor');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * An ImportPage object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImportPage
 * @package TypePad-ObjectTypes
 * @subpackage TPImportPage
 */
class TPImportPage extends TPImportAsset {

    protected static $properties = array(
        'content' => array('Body or content of the imported asset', 'string'),
        'author' => array('Object representing as much detail as available about the author of the imported asset', 'ImportAuthor'),
        'foreignId' => array('Foreign site ID for the asset', 'string'),
        'objectType' => array('The type of the imported asset', 'string'),
        'published' => array('The time at which the asset was published, as a W3CDTF timestamp', 'string'),
        'title' => array('Title of the imported asset', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'ImportAuthor');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * An ImportPost object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImportPost
 * @package TypePad-ObjectTypes
 * @subpackage TPImportPost
 */
class TPImportPost extends TPImportAsset {

    protected static $properties = array(
        'content' => array('Body or content of the imported asset', 'string'),
        'author' => array('Object representing as much detail as available about the author of the imported asset', 'ImportAuthor'),
        'foreignId' => array('Foreign site ID for the asset', 'string'),
        'objectType' => array('The type of the imported asset', 'string'),
        'published' => array('The time at which the asset was published, as a W3CDTF timestamp', 'string'),
        'title' => array('Title of the imported asset', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->author) && (get_class($data->author) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->author->objectType) ? $data->author->objectType : 'ImportAuthor');
            $this->author = new $ot_class($data->author);
        }
    }
}

/**
 * An ImportAuthor object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImportAuthor
 * @package TypePad-ObjectTypes
 * @subpackage TPImportAuthor
 */
class TPImportAuthor extends TPBase {

    protected static $properties = array(
        'email' => array('Foreign author\'s email address', 'string'),
        'typepadUserId' => array('Known TypePad user id for foreign author', 'string'),
        'homepageUrl' => array('URL for foreign author\'s homepage', 'string'),
        'openidIdentifier' => array('Foreign author\'s OpenID identifier', 'string'),
        'displayName' => array('Foreign author\'s displayed name', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An ImporterJob object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/ImporterJob
 * @package TypePad-ObjectTypes
 * @subpackage TPImporterJob
 */
class TPImporterJob extends TPBase {

    protected static $properties = array(
        'lastSubmitTime' => array('The time the last asset was submitted, as a W3CDTF timestamp.', 'string'),
        'urlId' => array('ID of the import job', 'integer'),
        'assetsImported' => array('Number of assets imported by this job', 'integer'),
        'lastForeignId' => array('The foreign ID of the last asset importered', 'string'),
        'createUsers' => array('C<true> if TypePad will create new users for the auther information given in the submitted payloads.', 'boolean'),
        'matchUsers' => array('C<true> if TypePad will attempt to find matching users for the author information given in the submitted payloads.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A PostByEmailAddress object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/PostByEmailAddress
 * @package TypePad-ObjectTypes
 * @subpackage TPPostByEmailAddress
 */
class TPPostByEmailAddress extends TPBase {

    protected static $properties = array(
        'emailAddress' => array('A private email address for posting via email.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A PublicationStatus object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/PublicationStatus
 * @package TypePad-ObjectTypes
 * @subpackage TPPublicationStatus
 */
class TPPublicationStatus extends TPBase {

    protected static $properties = array(
        'publicationDate' => array('The time at which the related asset was (or will be) published, as a W3CDTF timestamp. If the related asset has been scheduled to be posted later, this property\'s timestamp will be in the future.', 'string'),
        'draft' => array('C<true> if this asset is private (not yet published), or C<false> if it has been published.', 'boolean')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A RelationshipStatus object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/RelationshipStatus
 * @package TypePad-ObjectTypes
 * @subpackage TPRelationshipStatus
 */
class TPRelationshipStatus extends TPBase {

    protected static $properties = array(
        'types' => array('A list of relationship type URIs describing the types of the related relationship.', 'array<string>')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A RequestProperties object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/RequestProperties
 * @package TypePad-ObjectTypes
 * @subpackage TPRequestProperties
 */
class TPRequestProperties extends TPBase {

    protected static $properties = array(
        'remoteIpAddress' => array('The IP address of the requesting client, expressed in dotted-decimal notation.', 'string'),
        'canModifyTypepadContent' => array('True if the caller for this request could modify content that is part of the main TypePad application, or false otherwise.', 'boolean'),
        'clientIsInternal' => array('True if this request came in on a channel that has access to internal-only API features.', 'boolean'),
        'applicationId' => array('The M<urlId> of the authenticated application for this request. Ommitted if there is no authenticated application.', 'string'),
        'userId' => array('The M<urlId> of the authenticated user for this request. Ommitted if there is no authenticated user.', 'string'),
        'canModifyApplicationContent' => array('True if the caller for this request could modify content connected to the authenticated application, or false otherwise.', 'boolean'),
        'apiKey' => array('The API key that was used for this request, if the request is using OAuth. Ommitted if the request is not using OAuth.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A TrendingAssets object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/TrendingAssets
 * @package TypePad-ObjectTypes
 * @subpackage TPTrendingAssets
 */
class TPTrendingAssets extends TPBase {

    protected static $properties = array(
        
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * An UserBadge object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/UserBadge
 * @package TypePad-ObjectTypes
 * @subpackage TPUserBadge
 */
class TPUserBadge extends TPBase {

    protected static $properties = array(
        'badge' => array('The badge that was won.', 'Badge'),
        'earnedTime' => array('The time that the user earned the badge given in M<badge>.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->badge) && (get_class($data->badge) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->badge->objectType) ? $data->badge->objectType : 'Badge');
            $this->badge = new $ot_class($data->badge);
        }
    }
}

/**
 * An UserProfile object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/UserProfile
 * @package TypePad-ObjectTypes
 * @subpackage TPUserProfile
 */
class TPUserProfile extends TPBase {

    protected static $properties = array(
        'profileEditPageUrl' => array('The URL of a page where this user can edit their profile information. If this is not the authenticated user\'s UserProfile object, this property is omitted.', 'string'),
        'email' => array('The user\'s email address. This property is only provided for authenticated requests if the user has shared it with the authenticated application, and the authenticated user is allowed to view it (as with administrators of groups the user has joined). In all other cases, this property is omitted.', 'string'),
        'aboutMe' => array('The user\'s long description or biography, as a free-form string they provided.', 'string'),
        'id' => array('The URI from the related O<User> object\'s M<id> property.', 'string'),
        'urlId' => array('The canonical identifier from the related O<User> object\'s M<urlId> property.', 'string'),
        'location' => array('The user\'s location, as a free-form string they provided.', 'string'),
        'membershipManagementPageUrl' => array('The URL of a page where this user can manage their group memberships. If this is not the authenticated user\'s UserProfile object, this property is omitted.', 'string'),
        'followFrameContentUrl' => array('The URL of a widget that, when rendered in an C<iframe>, allows viewers to follow this user. Render this widget in an C<iframe> 300 pixels wide and 125 pixels high.', 'string'),
        'homepageUrl' => array('The address of the user\'s homepage, as a URL they provided. This property is omitted if the user has not provided a homepage.', 'string'),
        'preferredUsername' => array('The name the user has chosen for use in the URL of their TypePad profile page. This property can be used to select this user in URLs, although it is not a persistent key, as the user can change it at any time.', 'string'),
        'avatarLink' => array('A link to an image representing this user.', 'ImageLink'),
        'gender' => array('The user\'s gender, as they provided it. This property is only provided for authenticated requests if the user has shared it with the authenticated application, and the authenticated user is allowed to view it (as with administrators of groups the user has joined). In all other cases, this property is omitted.', 'string'),
        'displayName' => array('The user\'s chosen display name.', 'string'),
        'interests' => array('A list of interests provided by the user and displayed on their profile page.', 'array<string>'),
        'profilePageUrl' => array('The URL of the user\'s TypePad profile page.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->avatarLink) && (get_class($data->avatarLink) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->avatarLink->objectType) ? $data->avatarLink->objectType : 'ImageLink');
            $this->avatarLink = new $ot_class($data->avatarLink);
        }
    }
}

/**
 * A Vertical object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Vertical
 * @package TypePad-ObjectTypes
 * @subpackage TPVertical
 */
class TPVertical extends TPBase {

    protected static $properties = array(
        'keyword' => array('A keyword that uniquely represents this vertical.', 'string'),
        'displayName' => array('A human-friendly display name for this vertical.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A VideoLink object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/VideoLink
 * @package TypePad-ObjectTypes
 * @subpackage TPVideoLink
 */
class TPVideoLink extends TPBase {

    protected static $properties = array(
        'permalinkUrl' => array('T<Editable> The permalink URL for the video on its own site. When posting a new video, send only the M<permalinkUrl> property; videos on supported sites will be discovered and the embed code generated automatically.', 'string'),
        'embedCode' => array('An opaque HTML fragment that, when embedded in a HTML page, provides an inline player for the video.', 'string')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

}

/**
 * A Relationship object from the TypePad API.
 *
 * @link http://www.typepad.com/services/apidocs/objecttypes/Relationship
 * @package TypePad-ObjectTypes
 * @subpackage TPRelationship
 */
class TPRelationship extends TPObject {

    protected static $properties = array(
        'target' => array('The target entity of the relationship.', 'Entity'),
        'id' => array('A URI that serves as a globally unique identifier for the relationship.', 'string'),
        'urlId' => array('A string containing the canonical identifier that can be used to identify this object in URLs. This can be used to recognise where the same relationship is returned in response to different requests, and as a mapping key for an application\'s local data store.', 'string'),
        'source' => array('The source entity of the relationship.', 'Entity'),
        'status' => array('An object describing all the types of relationship that currently exist between the source and target objects.', 'RelationshipStatus'),
        'created' => array('A mapping of the relationship types present between the source and target objects to the times those types of relationship were established. The keys of the map are the relationship type URIs present in the relationship\'s M<status> property; the values are W3CDTF timestamps for the times those relationship edges were created.', 'map<datetime>')
    );

    function __get($name) { return $this->get($name, self::$properties); }
    function __set($name, $value) { $this->set($name, $value, self::$properties); }
    static function propertyDocString($name) { return self::$properties[$name][0]; }
    static function propertyType($name) { return self::$properties[$name][1]; }
    function asPayload($properties = NULL, $want_json = 1) { return parent::asPayload($properties ? $properties : self::$properties, $want_json); }

    static function isAbstract() { return false; }

    function fulfill($data) {
        parent::fulfill($data);
        if (isset($data->source) && (get_class($data->source) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->source->objectType) ? $data->source->objectType : 'Entity');
            $this->source = new $ot_class($data->source);
        }
        if (isset($data->status) && (get_class($data->status) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->status->objectType) ? $data->status->objectType : 'RelationshipStatus');
            $this->status = new $ot_class($data->status);
        }
        if (isset($data->target) && (get_class($data->target) == 'stdClass')) {
            $ot_class = 'TP' . (isset($data->target->objectType) ? $data->target->objectType : 'Entity');
            $this->target = new $ot_class($data->target);
        }
    }
}

