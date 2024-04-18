<?php
session_start();
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
    <script src="bootstrap-auto-dismiss-alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

</head>
<?php
if (!empty($_SESSION['succes'])) {
?>
    <div class="alert alert-success" role="alert" data-auto-dismiss="2000">
        <?php echo $_SESSION['succes']; ?>
    </div>
<?php
    unset($_SESSION["succes"]);
}

?>

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
            <a href="admin.php">
                <button class="btn btn-outline-success" type="button">
                    Administateur
                </button>
            </a>
            <a href="panier.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                    <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z" />
                </svg>
            </a>
    </nav>
    <h1>Nos produits</h1>
    <center>
        <?php
        //connexion a la BDD
        include "connexionPDO.php";
        $bdd = connect();
        //requête sql
        $sql = "select * from produit";
        //exécution de la requête
        $resultat = $bdd->query($sql);
        //rangement des resultats dans un objet
        while ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {
        ?>

            <div class="card" style="width: 18rem;">
                <img src="Images\<?php echo $produit->photo ?>" class="card-img-top" height="300" width="300" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit->nom ?></h5>
                    <p class="card-text"><?php echo $produit->prix ?>€</p>
                    <a href="ajoutPanier.php?Id=<?= $produit->id ?>" class="btn btn-outline-success">Ajouter au panier</a>
                </div>
            </div>
        <?php } ?>

    </center>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

</body>

</html>
