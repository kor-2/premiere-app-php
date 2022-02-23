<?php

session_start();

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
    $_SESSION['error'];
    if ($name && $price && $qtt) {
        $product = [
            'name' => $name,
            'price' => $price,
            'qtt' => $qtt,
            'total' => $price * $qtt,
        ];
        $_SESSION['products'][] = $product;
        $_SESSION['error'][0] = '';
    } elseif (!$name) {
        $_SESSION['error'][0] = '<p>Nom invalide</p>';
    } elseif (!$price) {
        $_SESSION['error'][0] = '<p>Prix invalide</p>';
    } elseif (!$qtt) {
        $_SESSION['error'][0] = '<p>Quantité invalide</p>';
    } else {
        $_SESSION['error'][0] = '<p>Erreur Veuillez réessayer ultérieurement</p>';
    }
    header('Location:index.php');
}

if (isset($_POST['delete'])) {
    $_SESSION['products'] = [];
    header('Location:recap.php');
}
