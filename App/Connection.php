<?php

namespace App;

use PDOException;
use PDO;

class Connection extends PDO{

    public static function getDb()
    {
       //criando uma conexao com o banco
       try {
           $conn = new PDO(
                "mysql:host=localhost;dbname=financaTCC;charset=utf8",
                "root",
                ""
           );

           return $conn;
       } catch (PDOException $erro) {
           //throw $th;
       }
    }

}

?>