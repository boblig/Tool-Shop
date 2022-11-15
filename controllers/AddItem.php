<?php

class AddItem extends Controller {
   public function set() {
      $user = new User();
      if($user->check()) {
         if(isset($_POST['name']) and isset($_POST['manufacturer']) and isset($_POST['category']) and isset($_POST['price'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $manufacturer = htmlspecialchars(trim($_POST['manufacturer']));
            $category = htmlspecialchars(trim($_POST['category']));
            $price = htmlspecialchars(trim($_POST['price']));
            if(!empty($manufacturer) or !empty($category)) {
               $this->add($name, $manufacturer, $category, $price);
            }
         }
         header('Location: /admin');
         die();
      } else {
         header('Location: /home');
         die();
      }
   }
   private function add($name, $manufacturer, $category, $price) {
      $sql = "
         INSERT INTO items (name, price) VALUES ('$name', '$price');
         INSERT INTO manufacturers_items (manufacturer_id, item_id) VALUES ('$manufacturer', LAST_INSERT_ID());
         INSERT INTO items_categories (item_id, category_id) VALUES (LAST_INSERT_ID(), '$category');"
      ;
      SQL::insert($sql);
   }
}