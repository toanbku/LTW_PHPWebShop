<?php
// parameters
session_start();

$page = 1;

$id = isset($_GET['id']) ? $_GET['id'] : "0";
echo "id nhan duoc la: ".$id;


$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
 
// make quantity a minimum of 1
$quantity = $quantity <= 0 ? 1 : $quantity;
 
// add new item on array
$cart_item=array(
    'quantity'=>$quantity
);

/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: products.php?action=exists&id=' . $id . '&page=' . $page);
}
 
// else, add the item to the array
else{
    $_SESSION['cart'][$id]=$cart_item;

    // for debug
    // var_dump($_SESSION['cart']);

    // redirect to product list and tell the user it was added to cart
    header('Location: products.php?action=added&page=' . $page);
}
 
// include object
// include_once "objects/cart_item.php";
 
// // get database connection
// $database = new Database();
// $db = $database->getConnection();
 
// // initialize objects
// $cart_item = new CartItem($db);
 
// // set cart item values
// $cart_item->user_id= $_SESSION["id"]; 
// $cart_item->product_id=$product_id;
// $cart_item->quantity=$quantity;
 
// // check if the item is in the cart, if it is, do not add
// if($cart_item->exists()){
//     // redirect to product list and tell the user it was added to cart
//     header("Location: cart.php?action=exists");
// }
 
// // else, add the item to cart
// else{
//     // add to cart
//     if($cart_item->create()){
//         // redirect to product list and tell the user it was added to cart
//         header("Location: product.php?id={$product_id}&action=added");
//     }else{
//         header("Location: product.php?id={$product_id}&action=unable_to_add");
//     }
// }
?>