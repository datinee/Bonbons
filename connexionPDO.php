<?php
//connexion a la BDD
define("BDD", "bonbons");
function connect()
{
    try {
        $connect = new PDO("mysql:host=localhost;dbname=bonbons", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    } catch (PDOException $e) {
        echo "problème de connexion à la BDD <br>" . $e->getMessage();
    }
    return $connect;
}
