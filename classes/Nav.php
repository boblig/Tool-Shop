<?php

class Nav {
   public function __construct() {
      $user = new User();
      if($user->check()) {
         echo '<a href="/admin">Admin Panel</a>';
      }
   }
}