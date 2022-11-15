<?php

class Controller {
   public function createView($viewName) {
      $file = './views/'.$viewName.'.php';
      if(file_exists($file)) {
         include_once($file);
      }
   }
   public function set() {
      //do nothing
   }
}