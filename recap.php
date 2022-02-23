    
<?php
require 'asset/header.php'; ?>
<main>
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
                if (isset($_POST['delete_unite_'.$index])) {
                    unset($_SESSION['products'][$index]);
                    header('Location:recap.php');
                }
                if (isset($_POST['plus_'.$index])) {
                    ++$_SESSION['products'][$index]['qtt'];
                    $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $product['price'];
                    header('Location:recap.php');
                }
                if (isset($_POST['moins_'.$index])) {
                    if ($_SESSION['products'][$index]['qtt'] > 1) {
                        --$_SESSION['products'][$index]['qtt'];
                        $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $product['price'];
                    } else {
                        unset($_SESSION['products'][$index]);
                        header('Location:recap.php');
                    }
                    header('Location:recap.php');
                }

                echo
                    '<tr>',
                        '<td>'.$index.'</td>',
                        '<td>'.$product['name'].'</td>',
                        '<td>'.number_format($product['price'], 2, ',', '&nbsp').' €</td>',
                        '<td>
                            <form method="post">
                                <input type="submit" name="plus_'.$index.'" value="+" class="plm">
                                '.$product['qtt'].'
                                <input type="submit" name="moins_'.$index.'" value="-" class="plm">
                            </form>  
                        </td>',
                        '<td>'.number_format($product['total'], 2, ',', '&nbsp').' €</td>',
                        '<td><form method="post"><input type="submit" name="delete_unite_'.$index.'" value="Supprimer" class="ajout" ></form></td>',
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


        <form action="traitement.php" method="post">
            <input type="submit" name="delete" value="Supprimer les produits" class="ajout">
            
            

        </form>
        
        <?php
        }
        ?>
    </main>
</body>
</html>