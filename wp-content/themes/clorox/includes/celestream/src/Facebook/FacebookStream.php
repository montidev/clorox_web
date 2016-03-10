<?php namespace Celestream\Facebook;

use Celestream\Interfaces\StreamInterface;
use Celestream\Items\FacebookItem;
use Facebook\Facebook;

class FacebookStream implements StreamInterface {

  private $facebook;

  public function __construct(array $args) {
    $this->facebook = new Facebook([
      'app_id' => $args['app_id'],
      'app_secret' => $args['app_secret'],
      'default_graph_version' => $args['default_graph_version']
    ]);
    // access token
    // https://developers.facebook.com/docs/facebook-login/access-tokens
    $accessToken = $args['app_id'] . '|'. $args['app_secret'];
    $this->facebook->setDefaultAccessToken($accessToken);
  }

  public function getFeeds(array $args = []) {
    // query params
    $endpoint = "/{$args['page']}/posts";
    $params = $args['params'];
    // Get feeds
    $feeds = $this->facebook->sendRequest('GET', $endpoint, $params);
    $feeds = json_decode($feeds->getBody())->data;
    $items = [];

    foreach ($feeds as $feed) {
      $img_url = $feed->attachments->data[0]->media->image->src;
      $link = 'https://facebook.com/'.$feed->id;
      $description = '';
      $items[] = new FacebookItem($feed->id, $feed->message, $link, $img_url, $description);
    }

    return $items;

  }
}
