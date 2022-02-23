<?php require 'asset/header.php';
?>
    

<main>
    <form action="traitement.php" method="post" id="form-ajout">
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