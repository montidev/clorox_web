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
    return [];
  }
}
