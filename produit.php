<?php require 'asset/header.php'; ?>


    <main>

    

        <?php
        var_dump($_FILES);

        if (!isset($_GET['id']) && !isset($_SESSION['products'][$_GET['id']])) {
            $_SESSION['error'][0] = '<p>Erreur produit introuvable</p>';
            header('Location:recap.php');
        }
        $_SESSION['error'][0] = '';

        $produit = $_SESSION['products'][$_GET['id']]; ?>
        <h1><?= $produit['name']; ?></h1>
        <div id="big-img">
            <div class="cont-img">
                <img src="<?= $produit['images']; ?>" alt="image">
            </div>
            <div class="cont-img">
                <img src="images/<?= $produit['file']; ?>" alt="image">
            </div>

        </div>
        <div class="details">
            <p>Prix : <?= $produit['price']; ?> € </p>
            <p>Déscription : <?= $produit['description']; ?> </p>
        </div>
        <div class="error">
        <?php

                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'][0];
                } else {
                    echo '';
                }
                var_dump($_SESSION['error']);

        ?>
        </div>

        <h2>Modification de <?= $produit['name']; ?> </h2>
        <div id="cont-modif">
            <div class="cont-form">
                <form action="traitement.php" method="get" class="form-modif">
                    <p>
                        <label>
                            <input type="hidden" name="id" value="<?=$_GET['id']; ?>">
                            <input type="text" step="any" name="name_modif" placeholder="Nom du produit" class="input-modif">
                        </label>
                    </p>
                    <p>
                        <button class="modif"name="action" value="modif_name">Modifier le nom</button>

                    </p>
                </form>
            </div>
            <div class="cont-form">
                <form action="traitement.php" method="get" class="form-modif">
                    <p>
                        <label>
                            <input type="hidden" name="id" value="<?=$_GET['id']; ?>">
                            <input type="number" step="any" name="price_modif" placeholder="Prix du produit" class="input-modif">
                        </label>
                    </p>
                    <p>
                        <button class="modif"name="action" value="modif_price">Modifier le prix</button>

                    </p>
                </form>
            </div>
            
        </div>

        <div class="cont-form-desc">
            <form action="traitement.php" method="get" class="form-modif">
                <p>
                    <label>
                        <input type="hidden" name="id" value="<?=$_GET['id']; ?>">
                        <textarea name="desc_modif" id="desc-modif"  placeholder="Déscription" ></textarea>

                        
                    </label>
                </p>
                <p>
                    <button class="modif"name="action" value="modif_desc">Modifier la description</button>

                </p>
            </form>
        </div>


        
       


    </main>
</body>
</html>