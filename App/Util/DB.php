<?php 
require_once 'configBD.php';

class DB{

    private static $instance;

    public static function getInstance(){
        if(!asset(self::$instance)){
            try {
                  self::$instance == new PDO("psql:host=localhost;dbname=SGDIntegrador", "postgres", "1234");
                  echo 'conectado com o banco';
                  self::$instance->seAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo  $e->getMessage();
            }
        }
        return self::$instance;
    }

    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}