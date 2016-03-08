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
    $facebook_feeds = $this->facebook->getFeeds($args['facebook']);
    $youtube_feeds = $this->youtube->getFeeds($args['youtube']);

    return array('facebook' => $facebook_feeds, 'youtube' => $youtube_feeds);
  }
}
