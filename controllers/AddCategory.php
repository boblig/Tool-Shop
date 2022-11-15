<?php

class AddCategory extends Controller {
   public function set() {
      $user = new User();
      if($user->check()) {
         if(isset($_POST['name'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $this->add($name);
         }
         header('Location: /admin');
         die();
      } else {
         header('Location: /home');
         die();
      }
   }
   private function add($name) {
      $sql = "INSERT INTO categories (name) VALUES ('$name')";
      SQL::insert($sql);
   }
}