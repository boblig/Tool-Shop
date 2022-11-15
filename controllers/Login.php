<?php

class Login extends Controller {
   public function set() {
      if(isset($_POST['username']) and isset($_POST['password'])) {
         $username = $_POST['username'];
         $password = $_POST['password'];
         $user = new User();
         $user->logIn($username, $password);
         header('Location: /admin');
         die();
      }
   }
}