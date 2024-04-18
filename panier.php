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
    <h1>Votre Panier</h1>
    <br>
    <table style="width:80%" align="center">
        <tr>
            <th>Produit</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
            <th>Montant</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        if (isset($_SESSION["panier"])) {
            if ($_SESSION['panier'] > 1) {
                include "connexionPDO.php";
                $bdd = connect();
                $total = 0;
                foreach ($_SESSION['panier'] as $id => $quantite) {
                    $sql = "select * from produit where id=$id";
                    $resultat = $bdd->query($sql);
                    $produit = $resultat->fetch(PDO::FETCH_OBJ);
                    echo "
            <tr>
            <td>" . $produit->nom . "</td>
            <td>" . $produit->prix . "</td>
            <td>" . $quantite . "</td>
            <td>" . $montant = $produit->prix * $quantite . "</td>
            <td> <a href='ajoutPanier2.php?Id=$produit->id'>
            <img border='0' alt='plus' src='Images/plus.jpg' width='50' height='50'>
            </a> </td>
            <td> <a href='retrait_panier.php?Id=$produit->id'>
            <img border='0' alt='moins' src='Images/moins.png' width='50' height='50'>
            </a> </td>
            </tr>";

                    $total += (float)$montant;
                }
            }
        }
        ?>
    </table>
    <br>
    <br>
    <?php
    $tva = round($total * 0.196, 2);
    $fdp = 5;
    $ttc = $total + $fdp;
    ?>
    <table style="width:40%" align="right">
        <?php
        echo "
        <tr>
            <th>Total HT</th>
            <td>" . $total . "€</td>
        </tr>
        <tr>
            <th>TVA(19,6%)</th>
            <td>" . $tva . "€</td>
        </tr>
        <tr>
            <th>Frais de port</th>
            <td>" . $fdp . "€</td>
        </tr>
        <tr>
            <th>TOTAL TTC</th>
            <td>" . $ttc . "€</td>          

        </tr>"
        ?>
        <tr>
            <td>
                <a href="index.php">
                    <button class="btn btn-outline-success" type="button">
                        Continuer mes achats
                    </button>
                    <br>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php">
                    <button class="btn btn-outline-success" type="button">
                        Payer
                    </button>
                    <br>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="vider.php">
                    <button class="btn btn-outline-success" type="button">
                        Vider le panier
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="voirPdf.php">
                    <button class="btn btn-outline-success" type="button">
                        Facture format PDF
                    </button>
                </a>
            </td>
        </tr>
    </table>
</body>

</html>