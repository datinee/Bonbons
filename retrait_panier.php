<?php
session_start();
$id = $_GET["Id"];
if ($_SESSION['panier'][$id] == 1) {
    unset($_SESSION['panier'][$id]);
} else {
    $_SESSION['panier'][$id]--;
}
$_SESSION['succes'] = "le produit été ajouté au panier !";
header("Location:panier.php");
