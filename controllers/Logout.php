<?php

class Logout extends Controller {
   public function set() {
      $user = new User();
      if($user->check()) {
         $user->logOut();
      }
      header('Location: /home');
      die();
   }
}