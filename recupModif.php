<?php
session_start();
$nom = htmlspecialchars($_POST["nom"]);
$prix = htmlspecialchars($_POST["prix"]);
$photo = $_FILES["photo"]["name"];
$id = $_SESSION["Id"];
require "connexionPDO.php";
$bdd = connect();
move_uploaded_file($_FILES["photo"]["tmp_name"], "Images/$photo");
try {
    $sql = "update produit set nom='$nom', prix='$prix', photo='Images/$photo' where id='$id'";
    echo $sql;
    $resultat = $bdd->exec($sql);
} catch (PDOException $e) {
    echo "erreur dans la requête <br>" . $e->getMessage();
}
header("location:index.php");
