<?php

class SQL {
   const USERNAME = 'root';
   const ADDRESS = 'localhost';
   const PASSWORD = '';
   const DATABASE = 'toolShop';
   
   private static $pdo = null;
   
   private static function connect() {
      self::$pdo = new PDO('mysql:host='.self::ADDRESS.';dbname='.self::DATABASE, self::USERNAME, self::PASSWORD);
   }
   private static function disconnect() {
      self::$pdo = null;
   }
   public static function select($sql) {
      self::connect();
      $result = self::$pdo->query($sql);
      self::disconnect();
      return $result;
   }
   public function insert($sql) {
      self::connect();
      if(self::$pdo->query($sql) == true) {
         //do nothing
      }
      self::disconnect();
   }
}