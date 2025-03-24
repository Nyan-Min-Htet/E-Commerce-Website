<?php
include("connect.php");
include("data.php");

session_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $goto = filter_input(INPUT_POST, 'goto', FILTER_SANITIZE_STRING);

    if (!$id || !$goto) {
        echo "Invalid product ID or redirection parameter.";
        exit;
    }

    $product = showSpecificProduct($conn, $id);
    if (empty($product)) {
        echo "Product not found.";
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = $product;
        $_SESSION['cart'][$id]['qty'] = 1;
    } else {
        $_SESSION['cart'][$id]['qty']++;
    }

    $allowed_pages = ['productpage', 'viewpage'];
    if (!in_array($goto, $allowed_pages)) {
        echo "Invalid page redirection!";
        exit;
    }

    switch ($goto) {
        case "productpage":
            header("Location: cart.php");
            break;
        case "viewpage":
            header("Location: productview.php?id=$id");
            break;
    }
    exit;
}
?>
