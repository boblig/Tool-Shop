<?php

class User {
   public function logIn($username, $password) {
      $username = htmlspecialchars(trim($username));
      $password = htmlspecialchars(trim($password));
      $sql = "SELECT u.username, u.password, ut.title_id AS title FROM users AS u LEFT JOIN users_titles AS ut ON u.id = ut.title_id WHERE u.username = '$username'";
      $result = SQL::select($sql);
      foreach($result as $r) {
         if($username == $r['username'] and $password == $r['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['title'] = $r['title'];
            $_SESSION['loggedin'] = true;
         }
      }
   }
   public function logOut() {
      unset($_SESSION['username']);
      unset($_SESSION['title']);
      unset($_SESSION['loggedin']);
   }
   public function check() {
      if(isset($_SESSION['loggedin']) and isset($_SESSION['title'])) {
         if($_SESSION['loggedin'] == true and $_SESSION['title'] == 1) {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }
}