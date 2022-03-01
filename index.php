<?php require 'asset/header.php';
?>
    

<main class="main-center">
    <h1>Ajouter un produit</h1>
    <form enctype="multipart/form-data" action="traitement.php" method="post" id="form-ajout">
        <p>
            <label>
                <input type="text" step="any" name="name" placeholder="Nom du produit" class="input-ajout">
            </label>
        </p>
        <p>
            <label>
                <input type="number" step="any" name="price" placeholder="Prix du produit"class="input-ajout">
            </label>
        </p>
        <p>
            Quantité désirée : <br>
            <label>
                
                <input type="number" name="qtt" value="1"placeholder="Quantité désirée"class="input-ajout">
            </label>
        </p>
        <p>
            Image : <br>
            <label>
                
                <input type="url" name="img" placeholder="Lien img"class="input-ajout">
            </label>
        </p>
        <p>
            Image a evoyer : <br>
            <label>
                <input type="file" name="file" placeholder="Lien img"class="input-ajout" accept="image/*">
            </label>
        </p>
        <p>
            <label>
                <textarea name="desc" id="desc"  placeholder="Déscription"></textarea>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit" class="ajout" >
        </p>
    </form>

    <div class="error">
    <?php

            //marche

            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'][0];
            } else {
                echo '';
            }


            // marche pas
        //isset($_SESSION['error']) ? $_SESSION['error'][0] : '';
    ?>
    </div>
</main>    
    
</body>
</html>