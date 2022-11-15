<?php

class DeleteItem extends Controller {
   public function set() {
      $user = new User();
      if($user->check()) {
         if(isset($_POST['id'])) {
            $id = htmlspecialchars(trim($_POST['id']));
            echo $id.'<br>';
            $this->remove($id);
         }
         header('Location: /admin');
         die();
      } else {
         header('Location: /home');
         die();
      }
   }
   private function remove($id) {
      $tokens = explode(',', $id);
      foreach($tokens as $i) {
         $id = trim($i);
         if(is_numeric($id)) {
            $sql = "
               DELETE FROM items_categories WHERE item_id = $id;
               DELETE FROM manufacturers_items WHERE item_id = $id;
               DELETE FROM items WHERE id = $id;
            ";
            SQL::insert($sql);
         }
      }
   }
}