<?php namespace Celestream\Interfaces;

interface ItemInterface {

  public function getId();

  public function getLink();

  public function getTitle();

  public function hasImage();

  public function getImageUrl();
}
