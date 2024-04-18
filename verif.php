<?php
session_start();
$login = htmlspecialchars($_POST["login"]);
$mdp = htmlspecialchars(md5($_POST["mdp"]));
require "connexionPDO.php";
$bdd = connect();
$sql = $bdd->prepare("select * from admin where login=:login and mdp=:mdp");
$sql->execute(array("login" => $login, "mdp" => $mdp));
$produit = $sql->fetch(PDO::FETCH_OBJ);
$nb_lignes = $sql->rowCount();
if ($nb_lignes == 0) {
    header("Location:admin.php");
} else {
    $_SESSION["admin"] = $rep->login;
    $_SESSION["autorisation"] = "OK";
    header("Location:accueilAdmin.php");
}
