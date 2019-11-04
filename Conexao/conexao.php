<?php

try {
    $myPDO = new PDO("pgsql:host=localhost;dbname=SGD", "postgres", "1234");
    echo"conectado";
} catch (PDOException $ex) {
    echo $e->getMessage();
}
