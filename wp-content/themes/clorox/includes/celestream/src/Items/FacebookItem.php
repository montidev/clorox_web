<?php namespace Celestream\Items;

class FacebookItem extends MinimalItem {

  public function __construct($id, $title, $link, $image_url = null, $description) {
    parent::__construct($id, $title, $link, $image_url, $description);
  }
}
