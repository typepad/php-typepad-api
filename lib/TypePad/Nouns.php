<?php

/**
 * Noun classes for the TypePad API.
 *
 * AUTO-GENERATED FILE - DO NOT EDIT
 *
 * @package TypePad-Nouns
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
 * @package TypePad-Nouns
 * @subpackage TPFavorites
 */
class TPFavorites extends TPNoun {

    /**
     * Delete the selected favorite.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/favorites/<id>
     * @return TPFavorite
     */
    function delete($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('favorites', $params['id']);
        return $this->typepad->delete($path_chunks, 'Favorite');
    }

    /**
     * Get basic information about the selected favorite, including its owner and the target asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/favorites/<id>
     * @return TPFavorite
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('favorites', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Favorite');
    }

}
TypePad::addNoun('favorites');

/**
 * @package TypePad-Nouns
 * @subpackage TPBlogs
 */
class TPBlogs extends TPNoun {

    /**
     * Get basic information about the selected blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>
     * @return TPBlog
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Blog');
    }

    /**
     * Send label argument to remove a category from the blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/add-category
     */
    function addCategory($params) {
        $path_chunks = array('blogs', $params['id'], 'add-category');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Get a list of categories which are defined for the selected blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/categories
     * @return TPList TPList of string
     */
    function getCategories($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'categories');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<string>');
    }

    /**
     * Get the commenting-related settings for this blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/commenting-settings
     * @return TPBlogCommentingSettings
     */
    function getCommentingSettings($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'commenting-settings');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'BlogCommentingSettings');
    }

    /**
     * Return a pageable list of published comments associated with the selected blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/comments/@published
     * @return TPList TPList of TPComment
     */
    function getPublishedComments($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'comments', '@published');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Comment>');
    }

    /**
     * Return the fifty most recent published comments associated with the selected blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/comments/@published/@recent
     * @return TPList TPList of TPComment
     */
    function getPublishedRecentComments($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'comments', '@published', '@recent');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Comment>');
    }

    /**
     * Get  a list of accounts that can be used for crossposting with this blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/crosspost-accounts
     * @return TPList TPList of TPAccount
     */
    function getCrosspostAccounts($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'crosspost-accounts');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Account>');
    }

    /**
     * If the selected blog is a connected blog, create or retrieve the external post stub for the given permalink.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/discover-external-post-asset
     * @return TPAsset The asset that acts as a stub for the given permalink.
     */
    function discoverExternalPostAsset($params) {
        $path_chunks = array('blogs', $params['id'], 'discover-external-post-asset');
        return $this->typepad->post($path_chunks, $params['payload'], 'asset:Asset');
    }

    /**
     * Add a new media asset to the account that owns this blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/media-assets
     * @return TPAsset
     */
    function postToMediaAssets($params) {
        $path_chunks = array('blogs', $params['id'], 'media-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Asset');
    }

    /**
     * Add a new page to a blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/page-assets
     * @return TPPage
     */
    function postToPageAssets($params) {
        $path_chunks = array('blogs', $params['id'], 'page-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Page');
    }

    /**
     * Get a list of pages associated with the selected blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/page-assets
     * @return TPList TPList of TPPage
     */
    function getPageAssets($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'page-assets');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Page>');
    }

    /**
     * Add a new post to a blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-assets
     * @return TPPost
     */
    function postToPostAssets($params) {
        $path_chunks = array('blogs', $params['id'], 'post-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Post');
    }

    /**
     * Get a list of posts associated with the selected blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-assets
     * @return TPList TPList of TPPost
     */
    function getPostAssets($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'post-assets');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Post>');
    }

    /**
     * Get all visibile posts in the selected blog that have been assigned to the given category.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-assets/@by-category/<id>
     * @return TPList TPList of TPPost
     */
    function getPostAssetsByCategory($params) {
        $path_chunks = array('blogs', $params['id'], 'post-assets', '@by-category', $params['category']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Post>');
    }

    /**
     * Get all visible posts in the selected blog that have a publication date within the selected month, specified as a string of the form "YYYY-MM".
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-assets/@by-month/<id>
     * @return TPList TPList of TPPost
     */
    function getPostAssetsByMonth($params) {
        $path_chunks = array('blogs', $params['id'], 'post-assets', '@by-month', $params['month']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Post>');
    }

    /**
     * Get the most recent 50 posts in the selected blog, including draft and scheduled posts.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-assets/@recent
     * @return TPList TPList of TPPost
     */
    function getRecentPostAssets($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'post-assets', '@recent');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Post>');
    }

    /**
     * Get the selected user's post-by-email address
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/post-by-email-settings/@by-user/<id>
     * @return TPPostByEmailAddress
     */
    function getPostByEmailSettingsByUser($params) {
        $path_chunks = array('blogs', $params['id'], 'post-by-email-settings', '@by-user', $params['userId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'PostByEmailAddress');
    }

    /**
     * Send label argument to remove a category from the blog
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/remove-category
     */
    function removeCategory($params) {
        $path_chunks = array('blogs', $params['id'], 'remove-category');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Get data about the pageviews for the selected blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/blogs/<id>/stats
     * @return TPBlogStats
     */
    function getStats($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('blogs', $params['id'], 'stats');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'BlogStats');
    }

}
TypePad::addNoun('blogs');

/**
 * @package TypePad-Nouns
 * @subpackage TPRelationships
 */
class TPRelationships extends TPNoun {

    /**
     * Get basic information about the selected relationship.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/relationships/<id>
     * @return TPRelationship
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('relationships', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Relationship');
    }

    /**
     * Get the status information for the selected relationship, including its types.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/relationships/<id>/status
     * @return TPRelationshipStatus
     */
    function getStatus($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('relationships', $params['id'], 'status');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'RelationshipStatus');
    }

    /**
     * Change the status information for the selected relationship, including its types.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/relationships/<id>/status
     * @return TPRelationshipStatus
     */
    function putStatus($params) {
        $path_chunks = array('relationships', $params['id'], 'status');
        return $this->typepad->put($path_chunks, $params['payload'], 'RelationshipStatus');
    }

}
TypePad::addNoun('relationships');

/**
 * @package TypePad-Nouns
 * @subpackage TPObjectTypes
 */
class TPObjectTypes extends TPNoun {

    /**
     * Get information about all of the object types in the API, including the names and types of their properties.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/object-types
     * @return TPList TPList of TPObjectType
     */
    function getAll($params) {
        $path_chunks = array('object-types');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'List<ObjectType>');
    }

    /**
     * Get information about the selected object type and its properties.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/object-types/<id>
     * @return TPObjectType
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('object-types', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'ObjectType');
    }

}
TypePad::addNoun('objectTypes');

/**
 * @package TypePad-Nouns
 * @subpackage TPApplications
 */
class TPApplications extends TPNoun {

    /**
     * Get basic information about the selected application.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/applications/<id>
     * @return TPApplication
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('applications', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Application');
    }

    /**
     * Get a list of badges defined by this application.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/applications/<id>/badges
     * @return TPList TPList of TPBadge
     */
    function getBadges($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('applications', $params['id'], 'badges');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Badge>');
    }

    /**
     * Subscribe the application to one or more external feeds.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/applications/<id>/create-external-feed-subscription
     * @return TPExternalFeedSubscription The subscription object that was created.
     */
    function createExternalFeedSubscription($params) {
        $path_chunks = array('applications', $params['id'], 'create-external-feed-subscription');
        return $this->typepad->post($path_chunks, $params['payload'], 'subscription:ExternalFeedSubscription');
    }

    /**
     * Get a list of the application's active external feed subscriptions.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/applications/<id>/external-feed-subscriptions
     * @return TPList TPList of TPExternalFeedSubscription
     */
    function getExternalFeedSubscriptions($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('applications', $params['id'], 'external-feed-subscriptions');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<ExternalFeedSubscription>');
    }

    /**
     * Get a list of groups in which a client using a C<app_full> access auth token from this application can act.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/applications/<id>/groups
     * @return TPList TPList of TPGroup
     */
    function getGroups($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('applications', $params['id'], 'groups');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Group>');
    }

}
TypePad::addNoun('applications');

/**
 * @package TypePad-Nouns
 * @subpackage TPUsers
 */
class TPUsers extends TPNoun {

    /**
     * Get basic information about the selected user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>
     * @return TPUser
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'User');
    }

    /**
     * Get a list of badges that the selected user has won.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/badges
     * @return TPList TPList of TPUserBadge
     */
    function getBadges($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'badges');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<UserBadge>');
    }

    /**
     * Get a list of blogs that the selected user has access to.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/blogs
     * @return TPList TPList of TPBlog
     */
    function getBlogs($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'blogs');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Blog>');
    }

    /**
     * Get a list of elsewhere accounts for the selected user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/elsewhere-accounts
     * @return TPList TPList of TPAccount
     */
    function getElsewhereAccounts($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'elsewhere-accounts');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Account>');
    }

    /**
     * Get a list of events describing actions that the selected user performed.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/events
     * @return TPStream<Event>
     */
    function getEvents($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'events');
        $query_params = array();
        if (array_key_exists('startToken', $params)) $query_params['start-token'] = $params['startToken'];
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        return $this->typepad->get($path_chunks, $query_params, 'Stream<Event>');
    }

    /**
     * Get a list of events describing actions that the selected user performed in a particular group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/events/@by-group/<id>
     * @return TPList TPList of TPEvent
     */
    function getEventsByGroup($params) {
        $path_chunks = array('users', $params['id'], 'events', '@by-group', $params['groupId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Event>');
    }

    /**
     * Create a new favorite in the selected user's list of favorites.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/favorites
     * @return TPFavorite
     */
    function postToFavorites($params) {
        $path_chunks = array('users', $params['id'], 'favorites');
        return $this->typepad->post($path_chunks, $params['payload'], 'Favorite');
    }

    /**
     * Get a list of favorites that were listed by the selected user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/favorites
     * @return TPList TPList of TPFavorite
     */
    function getFavorites($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'favorites');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Favorite>');
    }

    /**
     * Get a list of relationships that the selected user has with groups.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/memberships
     * @return TPList TPList of TPRelationship
     */
    function getMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'memberships');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have an Admin type that the selected user has with groups.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/memberships/@admin
     * @return TPList TPList of TPRelationship
     */
    function getAdminMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'memberships', '@admin');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list containing only the relationship between the selected user and a particular group, or an empty list if the user has no relationship with the group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/memberships/@by-group/<id>
     * @return TPList TPList of TPRelationship
     */
    function getMembershipsByGroup($params) {
        $path_chunks = array('users', $params['id'], 'memberships', '@by-group', $params['groupId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have a Member type that the selected user has with groups.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/memberships/@member
     * @return TPList TPList of TPRelationship
     */
    function getMemberMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'memberships', '@member');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of events describing actions by users that the selected user is following.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/notifications
     * @return TPList TPList of TPEvent
     */
    function getNotifications($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'notifications');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Event>');
    }

    /**
     * Get a list of events describing actions in a particular group by users that the selected user is following.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/notifications/@by-group/<id>
     * @return TPList TPList of TPEvent
     */
    function getNotificationsByGroup($params) {
        $path_chunks = array('users', $params['id'], 'notifications', '@by-group', $params['groupId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Event>');
    }

    /**
     * Get a more extensive set of user properties that can be used to build a user profile page.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/profile
     * @return TPUserProfile
     */
    function getProfile($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'profile');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'UserProfile');
    }

    /**
     * Get a list of relationships that the selected user has with other users, and that other users have with the selected user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/relationships
     * @return TPList TPList of TPRelationship
     */
    function getRelationships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'relationships');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that the selected user has with other users, and that other users have with the selected user, constrained to members of a particular group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/relationships/@by-group/<id>
     * @return TPList TPList of TPRelationship
     */
    function getRelationshipsByGroup($params) {
        $path_chunks = array('users', $params['id'], 'relationships', '@by-group', $params['groupId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that the selected user has with a single other user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/relationships/@by-user/<id>
     * @return TPList TPList of TPRelationship
     */
    function getRelationshipsByUser($params) {
        $path_chunks = array('users', $params['id'], 'relationships', '@by-user', $params['userId']);
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have the Contact type that the selected user has with other users.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/relationships/@follower
     * @return TPList TPList of TPRelationship
     */
    function getFollowerRelationships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'relationships', '@follower');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have the Contact type that other users have with the selected user.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/users/<id>/relationships/@following
     * @return TPList TPList of TPRelationship
     */
    function getFollowingRelationships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('users', $params['id'], 'relationships', '@following');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

}
TypePad::addNoun('users');

/**
 * @package TypePad-Nouns
 * @subpackage TPBadges
 */
class TPBadges extends TPNoun {

    /**
     * Get basic information about the selected badge.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/badges/<id>
     * @return TPBadge
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('badges', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Badge');
    }

}
TypePad::addNoun('badges');

/**
 * @package TypePad-Nouns
 * @subpackage TPAssets
 */
class TPAssets extends TPNoun {

    /**
     * Search for user-created content across the whole of TypePad.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets
     * @return TPStream<Asset>
     */
    function search($params) {
        $path_chunks = array('assets');
        $query_params = array();
        if (array_key_exists('filterByGroup', $params)) $query_params['filter.group'] = $params['filterByGroup'];
        if (array_key_exists('filterByAuthor', $params)) $query_params['filter.author'] = $params['filterByAuthor'];
        if (array_key_exists('startToken', $params)) $query_params['start-token'] = $params['startToken'];
        if (array_key_exists('filterByAssetRank', $params)) $query_params['filter.asset-rank'] = $params['filterByAssetRank'];
        if (array_key_exists('filterByOwner', $params)) $query_params['filter.owner'] = $params['filterByOwner'];
        if (array_key_exists('sort', $params)) $query_params['sort'] = $params['sort'];
        if (array_key_exists('q', $params)) $query_params['q'] = $params['q'];
        if (array_key_exists('filterByBlog', $params)) $query_params['filter.blog'] = $params['filterByBlog'];
        if (array_key_exists('filterByAssetType', $params)) $query_params['filter.asset-type'] = $params['filterByAssetType'];
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        return $this->typepad->get($path_chunks, $query_params, 'Stream<Asset>');
    }

    /**
     * Delete the selected asset and its associated events, comments and favorites.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>
     * @return TPAsset
     */
    function delete($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id']);
        return $this->typepad->delete($path_chunks, 'Asset');
    }

    /**
     * Get basic information about the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>
     * @return TPAsset
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Asset');
    }

    /**
     * Update the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>
     * @return TPAsset
     */
    function put($params) {
        $path_chunks = array('assets', $params['id']);
        return $this->typepad->put($path_chunks, $params['payload'], 'Asset');
    }

    /**
     * Send label argument to add a category to an asset
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/add-category
     */
    function addCategory($params) {
        $path_chunks = array('assets', $params['id'], 'add-category');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Get a list of categories into which this asset has been placed within its blog. Currently supported only for O<Post> assets that are posted within a blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/categories
     * @return TPList TPList of string
     */
    function getCategories($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'categories');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<string>');
    }

    /**
     * Get a list of assets that were posted in response to the selected asset and their depth in the response tree
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/comment-tree
     * @return TPList TPList of TPCommentTreeItem
     */
    function getCommentTree($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'comment-tree');
        $query_params = array();
        if (array_key_exists('selectedItem', $params)) $query_params['selected-item'] = $params['selectedItem'];
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<CommentTreeItem>');
    }

    /**
     * Create a new Comment asset as a response to the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/comments
     * @return TPComment
     */
    function postToComments($params) {
        $path_chunks = array('assets', $params['id'], 'comments');
        return $this->typepad->post($path_chunks, $params['payload'], 'Comment');
    }

    /**
     * Get a list of assets that were posted in response to the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/comments
     * @return TPList TPList of TPComment
     */
    function getComments($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'comments');
        $query_params = array();
        if (array_key_exists('selectedItem', $params)) $query_params['selected-item'] = $params['selectedItem'];
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Comment>');
    }

    /**
     * Get the extended content for the asset, if any. Currently supported only for O<Post> assets that are posted within a blog.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/extended-content
     * @return TPAssetExtendedContent
     */
    function getExtendedContent($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'extended-content');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'AssetExtendedContent');
    }

    /**
     * Get a list of favorites that have been created for the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/favorites
     * @return TPList TPList of TPFavorite
     */
    function getFavorites($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'favorites');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Favorite>');
    }

    /**
     * Get the feedback status of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/feedback-status
     * @return TPFeedbackStatus
     */
    function getFeedbackStatus($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'feedback-status');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'FeedbackStatus');
    }

    /**
     * Set the feedback status of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/feedback-status
     * @return TPFeedbackStatus
     */
    function putFeedbackStatus($params) {
        $path_chunks = array('assets', $params['id'], 'feedback-status');
        return $this->typepad->put($path_chunks, $params['payload'], 'FeedbackStatus');
    }

    /**
     * Send relevant data to get back a model of what the submitted comment will look like.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/make-comment-preview
     * @return TPAsset A mockup of the future comment.
     */
    function makeCommentPreview($params) {
        $path_chunks = array('assets', $params['id'], 'make-comment-preview');
        return $this->typepad->post($path_chunks, $params['payload'], 'comment:Asset');
    }

    /**
     * Get a list of media assets that are embedded in the content of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/media-assets
     * @return TPList TPList of TPAsset
     */
    function getMediaAssets($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'media-assets');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Asset>');
    }

    /**
     * Get the publication status of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/publication-status
     * @return TPPublicationStatus
     */
    function getPublicationStatus($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'publication-status');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'PublicationStatus');
    }

    /**
     * Set the publication status of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/publication-status
     * @return TPPublicationStatus
     */
    function putPublicationStatus($params) {
        $path_chunks = array('assets', $params['id'], 'publication-status');
        return $this->typepad->put($path_chunks, $params['payload'], 'PublicationStatus');
    }

    /**
     * Get a list of posts that were posted as reblogs of the selected asset.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/reblogs
     * @return TPList TPList of TPPost
     */
    function getReblogs($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('assets', $params['id'], 'reblogs');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Post>');
    }

    /**
     * Send label argument to remove a category from an asset
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/remove-category
     */
    function removeCategory($params) {
        $path_chunks = array('assets', $params['id'], 'remove-category');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Adjust publication status of an asset
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/assets/<id>/update-publication-status
     */
    function updatePublicationStatus($params) {
        $path_chunks = array('assets', $params['id'], 'update-publication-status');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

}
TypePad::addNoun('assets');

/**
 * @package TypePad-Nouns
 * @subpackage TPNouns
 */
class TPNouns extends TPNoun {

    /**
     * Get information about all of the nouns in the API, along with their sub-resources and filters.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/nouns
     * @return TPList TPList of TPEndpoint
     */
    function getAll($params) {
        $path_chunks = array('nouns');
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'List<Endpoint>');
    }

    /**
     * Get information about the selected noun, its sub-resources and their filters.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/nouns/<id>
     * @return TPEndpoint
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('nouns', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Endpoint');
    }

}
TypePad::addNoun('nouns');

/**
 * @package TypePad-Nouns
 * @subpackage TPApiKeys
 */
class TPApiKeys extends TPNoun {

    /**
     * Get basic information about the selected API key, including what application it belongs to.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/api-keys/<id>
     * @return TPApiKey
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('api-keys', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'ApiKey');
    }

}
TypePad::addNoun('apiKeys');

/**
 * @package TypePad-Nouns
 * @subpackage TPEvents
 */
class TPEvents extends TPNoun {

    /**
     * Get basic information about the selected event.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/events/<id>
     * @return TPEvent
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('events', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Event');
    }

}
TypePad::addNoun('events');

/**
 * @package TypePad-Nouns
 * @subpackage TPGroups
 */
class TPGroups extends TPNoun {

    /**
     * Get basic information about the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>
     * @return TPGroup
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'Group');
    }

    /**
     * Add a given user as a member of the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/add-member
     */
    function addMember($params) {
        $path_chunks = array('groups', $params['id'], 'add-member');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Create a new Audio asset within the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/audio-assets
     * @return TPAudio
     */
    function postToAudioAssets($params) {
        $path_chunks = array('groups', $params['id'], 'audio-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Audio');
    }

    /**
     * Block the given user from joining the selected group, removing that user as a member in the process.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/block-user
     */
    function blockUser($params) {
        $path_chunks = array('groups', $params['id'], 'block-user');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Subscribe the group to one or more external feeds.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/create-external-feed-subscription
     * @return TPExternalFeedSubscription The subscription object that was created.
     */
    function createExternalFeedSubscription($params) {
        $path_chunks = array('groups', $params['id'], 'create-external-feed-subscription');
        return $this->typepad->post($path_chunks, $params['payload'], 'subscription:ExternalFeedSubscription');
    }

    /**
     * Get a list of events describing actions performed in the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/events
     * @return TPList TPList of TPEvent
     */
    function getEvents($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'events');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Event>');
    }

    /**
     * Get a list of the group's active external feed subscriptions.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/external-feed-subscriptions
     * @return TPList TPList of TPExternalFeedSubscription
     */
    function getExternalFeedSubscriptions($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'external-feed-subscriptions');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<ExternalFeedSubscription>');
    }

    /**
     * Create a new Link asset within the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/link-assets
     * @return TPLink
     */
    function postToLinkAssets($params) {
        $path_chunks = array('groups', $params['id'], 'link-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Link');
    }

    /**
     * Get a list of relationships between users and the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/memberships
     * @return TPList TPList of TPRelationship
     */
    function getMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'memberships');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have the Admin type between users and the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/memberships/@admin
     * @return TPList TPList of TPRelationship
     */
    function getAdminMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'memberships', '@admin');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have the Blocked type between users and the selected groups. (Restricted to group admin.)
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/memberships/@blocked
     * @return TPList TPList of TPRelationship
     */
    function getBlockedMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'memberships', '@blocked');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Get a list of relationships that have the Member type between users and the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/memberships/@member
     * @return TPList TPList of TPRelationship
     */
    function getMemberMemberships($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('groups', $params['id'], 'memberships', '@member');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<Relationship>');
    }

    /**
     * Create a new Photo asset within the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/photo-assets
     * @return TPPhoto
     */
    function postToPhotoAssets($params) {
        $path_chunks = array('groups', $params['id'], 'photo-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Photo');
    }

    /**
     * Create a new Post asset within the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/post-assets
     * @return TPPost
     */
    function postToPostAssets($params) {
        $path_chunks = array('groups', $params['id'], 'post-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Post');
    }

    /**
     * Remove a given user as a member of the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/remove-member
     */
    function removeMember($params) {
        $path_chunks = array('groups', $params['id'], 'remove-member');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Remove the block preventing the given user from joining the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/unblock-user
     */
    function unblockUser($params) {
        $path_chunks = array('groups', $params['id'], 'unblock-user');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Create a new Video asset within the selected group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/groups/<id>/video-assets
     * @return TPVideo
     */
    function postToVideoAssets($params) {
        $path_chunks = array('groups', $params['id'], 'video-assets');
        return $this->typepad->post($path_chunks, $params['payload'], 'Video');
    }

}
TypePad::addNoun('groups');

/**
 * @package TypePad-Nouns
 * @subpackage TPExternalFeedSubscriptions
 */
class TPExternalFeedSubscriptions extends TPNoun {

    /**
     * Remove the selected subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>
     * @return TPExternalFeedSubscription
     */
    function delete($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('external-feed-subscriptions', $params['id']);
        return $this->typepad->delete($path_chunks, 'ExternalFeedSubscription');
    }

    /**
     * Get basic information about the selected subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>
     * @return TPExternalFeedSubscription
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('external-feed-subscriptions', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'ExternalFeedSubscription');
    }

    /**
     * Add one or more feed identifiers to the subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/add-feeds
     */
    function addFeeds($params) {
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'add-feeds');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Get a list of strings containing the identifiers of the feeds to which this subscription is subscribed.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/feeds
     * @return TPList TPList of string
     */
    function getFeeds($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'feeds');
        $query_params = array();
        if (array_key_exists('limit', $params)) $query_params['max-results'] = $params['limit'];
        if (array_key_exists('offset', $params)) $query_params['start-index'] = $params['offset'] + 1;
        return $this->typepad->get($path_chunks, $query_params, 'List<string>');
    }

    /**
     * Remove one or more feed identifiers from the subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/remove-feeds
     */
    function removeFeeds($params) {
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'remove-feeds');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Change the filtering rules for the subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/update-filters
     */
    function updateFilters($params) {
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'update-filters');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Change the callback URL and/or secret for the subscription.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/update-notification-settings
     */
    function updateNotificationSettings($params) {
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'update-notification-settings');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

    /**
     * Change the "post as" user for a subscription owned by a group.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/external-feed-subscriptions/<id>/update-user
     */
    function updateUser($params) {
        $path_chunks = array('external-feed-subscriptions', $params['id'], 'update-user');
        return $this->typepad->post($path_chunks, $params['payload'], '');
    }

}
TypePad::addNoun('externalFeedSubscriptions');

/**
 * @package TypePad-Nouns
 * @subpackage TPAuthTokens
 */
class TPAuthTokens extends TPNoun {

    /**
     * Get basic information about the selected auth token, including what object it grants access to.
     *
     * @link http://www.typepad.com/services/apidocs/endpoints/auth-tokens/<id>
     * @return TPAuthToken
     */
    function get($params) {
       if (!is_array($params)) $params = array('id' => $params);
        $path_chunks = array('auth-tokens', $params['id']);
        $query_params = array();
        return $this->typepad->get($path_chunks, $query_params, 'AuthToken');
    }

}
TypePad::addNoun('authTokens');

