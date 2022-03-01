<?php

session_start();

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
    $qtt < 1 ? $qtt = 1: $qtt;
    $desc = filter_input(INPUT_POST, 'desc');
    $img = filter_input(INPUT_POST, 'img',FILTER_SANITIZE_URL);
    ///////////////////////upload file///////////////////////////
    if(!empty($_FILES['file']))
    {
        $path = "images/";
        $path = $path . basename( $_FILES['file']['name']);
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $_SESSION['error'][0] = '';
        } else{
            $_SESSION['error'][0] = '<p>Fichier invalide</p>';
        }
    }
    $file = $_FILES['file']['name'];

    ////////////////////fin upload file /////////////////////////////
        


    $_SESSION['error'];

    if ($name && $price && $qtt && $desc && $img && $file) {
        
        $product = [
            'name' => $name,
            'price' => $price,
            'qtt' => $qtt,
            'total' => $price * $qtt,
            'description' => $desc,
            'images' => $img,
            'file' => $file

        ];
        $_SESSION['products'][] = $product;
        $_SESSION['error'][0] = '';
//////////////////////Tableau erreur/////////////////////
    } elseif (!$name) {
        $_SESSION['error'][0] = '<p>Nom invalide</p>';
    } elseif (!$price) {
        $_SESSION['error'][0] = '<p>Prix invalide</p>';
    } elseif (!$qtt) {
        $_SESSION['error'][0] = '<p>Quantité invalide</p>';
    } elseif (!$desc) {
        $_SESSION['error'][0] = '<p>Déscription invalide</p>';
    }elseif (!$img) {
        $_SESSION['error'][0] = '<p>Image invalide</p>';
    }
    elseif (!$file) {
        $_SESSION['error'][0] = '<p>Fichier invalide</p>';
    }
     else {
        $_SESSION['error'][0] = '<p>Erreur Veuillez réessayer ultérieurement</p>';
    }
    header('Location:index.php');
}



/////////////switch plus moins spprimer  ////////////
switch ($_GET['action']) {
    case 'delete':

        unset($_SESSION['products']);
        $_SESSION['error'][0] = '<p></p>';
        header('Location:recap.php');
        break;

    case 'del-unite':
        if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {

            unlink("images/".$_SESSION['products'][$_GET['id']]['file']);
            unset($_SESSION['products'][$_GET['id']]);
            header('Location:recap.php');
        }else {
            $_SESSION['error'][0] = '<p>Erreur produit</p>';
        }
        break;
    case 'downqte':

        if ($_SESSION['products'][$_GET['id']]['qtt'] > 1) {
            --$_SESSION['products'][$_GET['id']]['qtt'];

            $_SESSION['products'][$_GET['id']]['total'] = 
            $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
            

        }else {

            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
            unset($_SESSION['products'][$_GET['id']]);
            header('Location:recap.php');
            }else {
            $_SESSION['error'][0] = '<p>Erreur produit</p>';
            }
        }
        header('Location:recap.php');

        break;
    case 'upqte':
        ++$_SESSION['products'][$_GET['id']]['qtt'];

        $_SESSION['products'][$_GET['id']]['total'] = 
        $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
        $_SESSION['error'][0] = '<p></p>';
        header('Location:recap.php');
        break;
}
