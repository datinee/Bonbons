<?php session_start();
if (isset($_SESSION["autorisation"]) and $_SESSION["autorisation"] == "OK") {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a href="index.php">
                    <img border="0" alt="logo" src="Images/logo.jpg" width="200" height="100">
                </a>
                <form class="d-flex" role="search" method="POST" action="recup.php">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ajout.php">Ajouter</a></li>
                        <li><a class="dropdown-item" href="modifie.php">Modifier ou Supprimer</a></li>
                    </ul>
                </div>
                <a href="admin.php">
                    <button class="btn btn-outline-success" type="button">
                        Administateur
                    </button>
                </a>
                <a href="#">
                    <img border="0" alt="logo" src="Images/panier.jpg" width="100" height="100">
                </a>
        </nav>
        <h1>Nos produits</h1>
        <?php
        $nom = $_GET["nom"];
        $prix = $_GET["prix"];
        $photo = $_GET["photo"];
        $_SESSION["Id"] =  $_GET["Id"];
        include "connexionPDO.php";
        $bdd = connect();
        //requête sql
        $sql = "select * from produit";
        //exécution de la requête
        $resultat = $bdd->query($sql);
        //rangement des resultats dans un objet
        if ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {
        ?>

            <center>
                <div class="card">
                    <div class="card-body" _msttexthash="7914751" _msthash="219">
                        <form method="POST" action="recupModif.php" enctype="multipart/form-data">
                            <label for="nomProd" class="nomProd">Nom du produit</label>
                            <input type="text" class="form-control" name="nom" placeholder="<?= $nom ?> "><br>
                            <label for="prix" class="prix">Prix du produit</label>
                            <input type="text" class="form-control" name="prix" placeholder="<?= $prix ?>"><br>
                            <label for="photo" class="photo">Image du produit</label>
                            <input type="file" class="form-control" name="photo" placeholder="<?= $photo ?>"><br>
                            <a class="btn" href="recupModif.php?nom=<?= $produit->nom ?>&prix=<?= $produit->prix ?>&photo=<?= $produit->photo ?>">
                                <input class="btn btn-outline-success" type="submit" value="Valider les modifications">
                            </a>
                        </form>
                    </div>
                </div>
            </center>
    <?php }
    } else {
        echo "page reservé admin";
    } ?>
    </body>

    </html>