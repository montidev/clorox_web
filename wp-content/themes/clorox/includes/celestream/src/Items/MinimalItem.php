<?php namespace Celestream\Items;

use Celestream\Interfaces\ItemInterface;

class MinimalItem implements ItemInterface {

  private $id;
  private $title;
  private $link;
  private $image_url;

  public function __construct($id, $title, $link, $image_url = null) {
    $this->id = $id;
    $this->title = $title;
    $this->link = $link;
    $this->image_url = $image_url;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getLink() {
    return $this->link;
  }

  public function getImageUrl() {
    return $this->image_url;
  }

  public function hasImage() {
    return !empty($this->$image_url);
  }

  public function getSocialName() {
    return 'base';
  }
}
