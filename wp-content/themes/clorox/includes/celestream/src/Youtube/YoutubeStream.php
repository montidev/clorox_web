<?php namespace Celestream\Youtube;

use Celestream\Interfaces\StreamInterface;
use Celestream\Items\YoutubeItem;

class YoutubeStream implements StreamInterface {

  private $youtube;
  private $google_client;

  public function __construct(array $args) {
    $this->google_client = new \Google_Client();
    $this->google_client->setApplicationName($args['app-name']);
    $this->google_client->setDeveloperKey($args['api-key']);
    $this->youtube = new \Google_Service_YouTube($this->google_client);
  }

  public function getFeeds(array $args = []) {
    $fields = 'snippet';

    if ( array_key_exists('fields', $args) ) {
      $fields = $args['fields'];
      unset($args['fields']);
    }

    $result = $this->youtube->search->listSearch($fields, $args);

    $items = [];

    foreach ($result['items'] as $feed) {
      $id = $feed->id->videoId;
      $name = $feed->snippet->title;
      $img_url = $feed->snippet->thumbnails['high']['url'];
      $link = "http://youtube.com/watch?v={$id}";
      $items[] = new YoutubeItem($id, $name, $link, $img_url);
    }

    return $items;
  }
}
