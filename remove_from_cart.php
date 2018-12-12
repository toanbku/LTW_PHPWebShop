<?php

    session_start();

    $product_id = isset($_GET['id']) ? $_GET['id'] : "";
    echo $_SESSION['cart'][$product_id];
    unset($_SESSION['cart'][$product_id]); 

    header('Location: shopping-cart.php');

?>