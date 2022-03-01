    
<?php
require 'asset/header.php'; ?>
<main class="main-center">
<h1>Récapitulatif des produits</h1>
<?php

        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo '<p>Aucun produit en session...</p>';
        } else {
            echo '<table>',
                    '<thead>',
                        '<tr>',
                            '<th>#</th>',
                            '<th>Nom</th>',
                            '<th>Prix</th>',
                            '<th>Quantité</th>',
                            '<th>Total</th>',
                            '<th>Supprimer</th>',
                        '</tr>',
                    '</thead>',
                    '<tbody>';
            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                
                echo
                    '<tr>',
                        '<td>'.$index.'</td>',
                        '<td><a class="prod" href="produit.php?id='.$index.'">'.$product['name'].'</a></td>',
                        '<td>'.number_format($product['price'], 2, ',', '&nbsp').' €</td>',
                        '<td>
                            <a class="plm" href="traitement.php?action=upqte&id='.$index.'">&nbsp+&nbsp</a>
                            '.$product['qtt'].'
                            <a class="plm" href="traitement.php?action=downqte&id='.$index.'">&nbsp-&nbsp</a>
                        </td>',
                        '<td>'.number_format($product['total'], 2, ',', '&nbsp').' €</td>',
                        '<td><a class="plm" href="traitement.php?action=del-unite&id='.$index.'">Supprimer</a></td>',
                    '</tr>';
                $totalGeneral += $product['total'];
            }

            echo '<tr>',
                    '<td colspan="5">Total général : </td>',
                    '<td><strong>'.number_format($totalGeneral, 2, ',', '&nbsp').'&nbsp;€</strong></td>',
                '</tr>',
            '</tbody>
            </table>';
        }

        if (isset($_SESSION['products']) && $_SESSION['products']) {
            ?>

        
        
        <a class="ajout" href="traitement.php?action=delete">Supprimer</a>

        
            

        
        <?php
        }
        ?>
        <div class="error">
        <?php

            

            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'][0];
            } else {
                echo '';
            }
    ?>
    </div>
    </main>
</body>
</html>