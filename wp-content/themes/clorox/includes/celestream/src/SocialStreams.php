<?php namespace Celestream;

use Celestream\Interfaces\StreamInterface;
use Celestream\Facebook\FacebookStream;
use Celestream\Youtube\YoutubeStream;

class SocialStreams implements StreamInterface {

  private $youtube;
  private $facebook;

  public function __construct(array $args) {
    if ( array_key_exists('youtube', $args) ) {
      $this->youtube = new YoutubeStream($args['youtube']);
    }

    if ( array_key_exists('facebook', $args) ) {

      $this->facebook = new FacebookStream($args['facebook']);
    }
  }

  public function getFeeds(array $args = []) {
    $facebook_feeds = [];
    $youtube_feeds = [];

    try {
      $facebook_feeds = $this->facebook->getFeeds($args['facebook']);
    } catch (Exception $e) {
      error_log(var_dump($e));
    }

    try {
      $youtube_feeds = $this->youtube->getFeeds($args['youtube']);
    } catch (Exception $e) {
      error_log(var_dump($e));
    }

    return array('facebook' => $facebook_feeds, 'youtube' => $youtube_feeds);
  }
}
