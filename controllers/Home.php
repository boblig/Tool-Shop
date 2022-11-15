<?php

class Home extends Controller {
   public function set() {
      $list = new ListFrom();
      $list->categories();
      $list->items();
   }
}