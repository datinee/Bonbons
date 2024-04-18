<?php
session_start();
$id = $_GET["Id"];
require "connexionPDO.php";
$bdd = connect();
try {
    $sql = "delete from produit where id='$id'";
    echo $sql;
    $resultat = $bdd->exec($sql);
    echo "$id produit supprimer";
} catch (PDOException $e) {
    echo "erreur dans la requête <br>" . $e->getMessage();
}
//header("location:index.php");
