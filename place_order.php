<?php
    include_once 'layout_head.php';
    include_once 'navigation.php';

    include_once 'config/database.php';  
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
                $statusMsgType = 'alert alert-success';
                $statusMsg = 'Your order has been placed! Thank you very much!'; 
                unset($_SESSION['cart']);   
            }
            else{
                $statusMsgType = 'alert alert-danger';
                $statusMsg = 'Something wrong! Please try again or contact admin!'; 
            }
        }
        else {
            $statusMsgType = 'alert alert-danger';
            $statusMsg = 'Something wrong! Nothing here!'; 
        }
    }
   echo '<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: 100px auto;">';

    echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; 
    echo '</div>';

    // include page footer HTML
    include_once 'layout_foot.php';
?>