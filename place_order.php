<?php
    include_once 'layout_head.php';
    include 'config/database.php';  
    include_once "objects/cart_item.php";

    // tell the user order has been placed

    $database = new Database();
    $db = $database->getConnection();

    $cart_item = new CartItem($db);
    if (!isset($_SESSION['id'])){
        echo "<script>alert('Please login before using this feature'); window.location = 'login.php'</script>";    
    }
    else{    
        if (isset($_SESSION['cart'])){
            $cart_item->user_id = $_SESSION['id'];
            $cart_item->total_cost = $_SESSION['total_cost'];
            if ($cart_item->create()){
                echo "<div class='alert alert-success'>";
                echo "<strong>Your order has been placed!</strong> Thank you very much!";
                echo "</div>";
                unset($_SESSION['cart']);   
            }
            else{
                echo "<div class='alert alert-danger'>";
                echo "<strong>Something wrong!</strong> Please try again or contact admin!";
                echo "</div>";   
            }
        }
        else {
            echo "<div class='alert alert-danger'>";
            echo "<strong>Something wrong!</strong>Nothing here!";
            echo "</div>";  
        }
    }

     

    // include page footer HTML
    include_once 'layout_foot.php';
?>