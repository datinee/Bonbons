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
                <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h1>Connexion</h1>
    <center>
        <div class="card">
            <div class="card-body" _msttexthash="7914751" _msthash="219">
                <form action="verif.php" method="POST">
                    <label for="login" class="login">Identifiant</label>
                    <input type="text" class="form-control" name="login"><br>
                    <label for="mdp" class="mdp">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp"><br>
                    <a class="btn" href="verif.php">
                        <input class="btn btn-outline-success" type="submit" value="Envoyer">
                    </a>
                    <a class="btn" href="index.php">
                        <input class="btn btn-outline-success" type="submit" value="Annuler">
                    </a>
                </form>
            </div>
        </div>
    </center>
</body>

</html>