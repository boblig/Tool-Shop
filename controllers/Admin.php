<?php

class Admin extends Controller {
   public function set() {
      $user = new User();
      if(!$user->check()) {
         header('Location: /login');
         die();
      }
   }
   public function listOptions($sql) {
      $result = SQL::select($sql);
      $string = '';
      foreach($result as $i) {
         $string .= '<option value="'.$i['id'].'">'.$i['name'].'</option>';
      }
      echo $string;
   }
}