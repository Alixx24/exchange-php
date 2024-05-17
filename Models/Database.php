<?php

namespace Models;

use PDO;
use PDOException;

class Database
{
   private $host = 'localhost';
   private $db_name = 'ooplogin_dbs';
   private $username = 'admint';
   private $password = '12345678';
   private $pdo;

  
   public function connect()
   {
      $this->pdo = null;

      try {
         $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->pdo;
   }
}
