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

    </head>

    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a href="#">
                    <img border="0" alt="logo" src="Images/logo.jpg" width="200" height="100">
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ajout.php">Ajouter</a></li>
                        <li><a class="dropdown-item" href="modifie.php">Modifier ou Supprimer</a></li>
                    </ul>
                </div>
        </nav>
        <center>
            <h1>Quel bonbons voulez-vous supprimer ou modifier ?</h1>
            <?php
            //connexion a la BDD
            include "connexionPDO.php";
            $bdd = connect();
            //requête sql
            $sql = "select * from produit";
            //exécution de la requête
            $resultat = $bdd->query($sql);
            //rangement des resultats dans un objet

            if ($_SESSION["autorisation"] = "OK") {
                while ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {
            ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $produit->photo ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produit->nom ?></h5>
                            <p class="card-text"><?php echo $produit->prix ?>€</p>
                            <a href="modif.php?Id=<?= $produit->id ?>&nom=<?= $produit->nom ?>&prix=<?= $produit->prix ?>&photo=<?= $produit->photo ?>" class="btn btn-outline-success">Modifier</a>
                            <a href="recupSup.php?Id=<?= $produit->id ?>" class="btn btn-outline-success" onclick="return confirm('êtes vous sûr de votre choix ?');">Supprimer</a>
                        </div>
                    </div>
        <?php
                }
            }
        } else {
            echo "page reservé admin";
        }
        ?>
        </center>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    </body>

    </html>