<?php
require "connexionPDO.php";
$bdd = connect();
$nomProd = htmlspecialchars($_POST["nomProd"]);
$prix = htmlspecialchars($_POST["prix"]);
$photo = $_FILES["photo"]["name"];

move_uploaded_file($_FILES["photo"]["tmp_name"], "Images/$photo");
try {
    $sql = $bdd->prepare("insert into produit (nom, prix, photo) values (:nomProd, :prix, :Images/photo)");
    $sql->execute(array());
    echo "$resultat produit ajouter";
} catch (PDOException $e) {
    echo "erreur dans la requête <br>" . $e->getMessage();
}
header("location:index.php");
