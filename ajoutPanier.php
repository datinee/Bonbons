<?php
session_start();
$id = $_GET["Id"];
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
if (isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id]++;
} else {
    $_SESSION['panier'][$id] = 1;
}
$_SESSION['succes'] = "le produit été ajouté au panier !";
header("Location:index.php");
