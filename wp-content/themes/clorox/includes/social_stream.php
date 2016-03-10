<?php

require_once __DIR__ . '/celestream/vendor/autoload.php';

use Celestream\SocialStreams as SocialStreams;

$credentials = [
  'facebook' => [
    'app_id' => '1580257675630207',
    'app_secret' => '4d91886ed95fd72a59652c7ed9f7b58f',
    'default_graph_version' => 'v2.5'
  ],
  'youtube' => [
    'app-name' => "Clorox",
    'api-key' => "AIzaSyAR5xR7quRHswB-92WUfhRI-GxfSo_mVRs"
  ]
];

$feed_args = [
  'facebook' => [
    'page' => 'Clorox',
    'params' => [
      'limit' => 5,
      'fields' => 'id,name,attachments,link,message'
    ]
  ],
  'youtube' => [
    'fields' => 'snippet',
    'channelId' => 'UCSsUEf0vY2ghWC10lj_oVrw',
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
