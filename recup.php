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
    <center>
        <?php
        $search = htmlspecialchars($_POST["search"]);
        include "connexionPDO.php";
        $bdd = connect();
        //requête sql
        $search = strtolower($search);
        $sql = $bdd->prepare("select * from produit where lower(nom) like :search");
        //exécution de la requête
        $sql->execute(array("search" => $search . "%"));
        while ($produit = $sql->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $produit->photo ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit->nom ?></h5>
                    <p class="card-text"><?php echo $produit->prix ?>€</p>
                    <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                </div>
            </div>
        <?php
        }
        ?>
    </center>
</body>

</html>