<?php
 
include_once '../config/database.php';
include_once '../objects/shopping_cart.php';

$database = new Database();
$db = $database->getConnection();
 
$shopping_cart = new Shopping_cart($db);
 
$shopping_cart->product_id = $_GET['product_id'];
$shopping_cart->user_id = $_GET['user_id'];
$shopping_cart->size = $_GET['size'];
$shopping_cart->size_color = $_GET['size_color'];
$shopping_cart->color = $_GET['color'];
$shopping_cart->quantity = $_GET['quantity'];

if($shopping_cart->add_product_shopping_cart()){
    $shopping_cart_arr=array(
        "status" => true,
    );
}
else{
    $shopping_cart_arr=array(
        "status" => false,
    );
}
print_r(json_encode($shopping_cart_arr));
?>