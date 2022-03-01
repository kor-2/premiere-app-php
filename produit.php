<?php require 'asset/header.php';?>


    <main>

    

        <?php 
        var_dump($_FILES);


        if (!isset($_GET['id']) && !isset($_SESSION['products'][$_GET['id']])) {

            $_SESSION['error'][0] = '<p>Erreur produit introuvable</p>';
            header('Location:recap.php');
        }
        $_SESSION['error'][0] = '';

        $produit = $_SESSION['products'][$_GET['id']];?>
        <h1><?= $produit['name'];?></h1>
        <div class="cont-img">
            <img src="<?= $produit['images'] ?>" alt="image">
        </div>
        <div class="details">
            <p>Prix : <?= $produit['price'];?> € </p>
            <p>Déscription : <?= $produit['description'];?> </p>
        </div>
        <div class="cont-img">
            <img src="images/<?= $produit['file'] ?>" alt="image">
        </div>
        


        
       


    </main>
</body>
</html>