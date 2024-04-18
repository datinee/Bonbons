<?php
session_start();
$id = $_GET["Id"];
if (isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id]++;
}
$_SESSION['succes'] = "le produit été ajouté au panier !";
header("Location:panier.php");
