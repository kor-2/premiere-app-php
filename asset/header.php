<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <title>Ajout produit</title>
</head>
<body>

    <header>

        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="recap.php">Récapitulatif des produits</a></li>
                <li>
                    <?php
                    session_start();

                    if (isset($_SESSION['products'])) {
                        echo '<span>Nombre de produit :'.count($_SESSION['products']).'</span>';
                    } else {
                        echo '<span>Nombre de produit : 0 <span>';
                    }
                    ?>
                </li>
            </ul>
        </nav>
        <h1>Ajouter un produit</h1>
    </header>