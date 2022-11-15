<?php

class Router {
   public function __construct() {
      if(isset($_GET['page'])) {
         $controllerName = ucfirst($_GET['page']);
         $file = 'controllers/'.$controllerName.'.php';       
         if($controllerName == '' or $controllerName == 'Controller') {
            $this->setController('Home');
         } else if(file_exists($file)) {
            $this->setController($controllerName);
         } else {
            $this->setController();
         }
      } else {
         $this->setController();
      }
   }
   private function setController($controllerName = 'PageNotFound') {
      $controller = new $controllerName();
      $controller->createView($controllerName);
      $controller->set();
   }
}