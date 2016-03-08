<?php namespace Celestream\Facebook;

use Celestream\Interfaces\StreamInterface;
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
    $endpoint = $args['endpoint'];
    $params = $args['params'];

    // Get feeds
    $feeds = $this->facebook->sendRequest('GET', $endpoint, $params);

    // Get feeds ids
    $feeds = json_decode($feeds->getBody())->data;
    $feeds_ids = array_map(function($f){ return $f->id; }, $feeds);

    // Prepare requests for feeds (retrive more info)
    $requests = [];
    foreach ($feeds_ids as $feed_id) {
      $requests[] = $this->facebook->request('GET', "/{$feed_id}/attachments");
    }

    $feeds = json_decode($this->facebook->sendBatchRequest($requests)->getBody());
    $feeds = array_map(function($feed){
      return json_decode($feed->body)->data[0];
    }, $feeds);

    // dd($feeds);

    return $feeds;
  }
}
