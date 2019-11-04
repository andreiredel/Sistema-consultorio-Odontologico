<?php

namespace App\Model;

class Conexao{

    private static $instance;

    public static function getInstance()
   {
        if(!isset(self::$instance)){
            try {
                //charser=utf8; adicionar no objeto pdo
                self::$instance = new \PDO("pgsql:host=localhost;dbname=SGDIntegrador", "postgres", "1234");
                // echo 'abriu a conexão';
            } catch (\PDOException $e) {
              
                echo  $e->getMessage();
            }
        }
        return self::$instance;
    }
}
