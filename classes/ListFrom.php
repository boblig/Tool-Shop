<?php

class ListFrom {
   private $category = null;
   private function checkCategory() {
      if(isset($_GET['c'])) {
         $c = $_GET['c'];
         if(is_numeric($c) and $c > 0) {
            $this->category = $c;
         }
      }
   }
   public function categories() {
      $sql = "SELECT c.id, c.name FROM categories AS c";
      $result = SQL::select($sql);
      echo '<h4>Categories</h4><p>| <a href="/home?c=0">All</a> |';
      if(is_object($result)) {
         foreach($result as $r) {
            echo ' <a href="/home?c='.$r['id'].'">'.$r['name'].'</a> |';
         }
         echo '</p>';
      }
   }
   public function items() {
      $user = new User();
      $sql = "
         SELECT i.id, i.name, i.price, c.id AS category_id, c.name AS category, m.name AS manufacturer FROM items AS i
         LEFT JOIN manufacturers_items AS mi
         ON i.id = mi.item_id
         LEFT JOIN manufacturers AS m
         ON mi.manufacturer_id = m.id
         LEFT JOIN items_categories AS ic
         ON i.id = ic.item_id
         LEFT JOIN categories AS c
         ON ic.category_id = c.id
      ";
      $this->checkCategory();
      if($this->category != null) {
         $sql .= " WHERE category_id = ".$this->category;
      }
      $result = SQL::select($sql);
      
      $html = $this->createHtml();
      if(is_object($result)) {
         if($user->check()) {
            foreach($result as $i) {
               $html .= "
                     <tr>
                        <td>".$i['id']."</td>
                        <td>".$i['name']."</td>
                        <td>\$".$i['price']."</td>
                        <td>".$i['category']."</td>
                        <td>".$i['manufacturer']."</td>
                     </tr>
               ";
            }
         } else {
            foreach($result as $i) {
               $html .= "
                     <tr>
                        <td>".$i['name']."</td>
                        <td>\$".$i['price']."</td>
                        <td>".$i['category']."</td>
                        <td>".$i['manufacturer']."</td>
                     </tr>
               ";
            }
         }
         echo $html."</table>";
      }
   }
   private function createHtml() {
      $user = new User();
      $html = "
         <table>
            <tr>
      ";
      if($user->check()) {
         $html .= "<th>ID</th>";
      }
      $html .= "<th>Item</th>
               <th>Price</th>
               <th>Category</th>
               <th>Manufacturer</th>
            </tr>
      ";
      return $html;
   }
}
