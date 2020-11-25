<?php

include 'config.php';

class Database
{

    private static $pdo;
    static function connection()
    {

        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                echo  $e->getMessage();
            }
        }

        return self::$pdo;
        
    }

   static function prepare($sql){
     return  self::connection()->prepare($sql);
   }
}
