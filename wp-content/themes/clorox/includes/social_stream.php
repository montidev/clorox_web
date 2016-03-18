<?php

require_once __DIR__ . '/celestream/vendor/autoload.php';

use Celestream\SocialStreams as SocialStreams;

$credentials = [
  'facebook' => [
    'app_id' => get_option('fb_app_id'),
    'app_secret' => get_option('fb_app_secret'),
    'default_graph_version' => 'v2.5'
  ],
  'youtube' => [
    'app-name' => get_option('yt_app_name'),
    'api-key' => get_option('yt_api_key')
  ]
];

$feed_args = [
  'facebook' => [
    'page' => get_option('fb_page_name'),
    'params' => [
      'limit' => 5,
      'fields' => 'id,name,attachments,link,message'
    ]
  ],
  'youtube' => [
    'fields' => 'snippet',
    'channelId' => get_option('yt_channel_id'),
    'maxResults' => 5,
    'order' => 'date',
    'type' => 'video'
  ]
];



function get_social_feed() {
	global $credentials;
	global $feed_args;
	$API = new SocialStreams($credentials);
	$res = $API->getFeeds($feed_args);

	return $res;
}
