<?php
 
include_once '../config/database.php';
include_once '../objects/shopping_cart.php';

$database = new Database();
$db = $database->getConnection();
 
$shopping_cart = new Shopping_cart($db);
 
$shopping_cart->user_id = $_GET['user_id'];
$shopping_cart->payment_data = $_GET['payment_data'];
$shopping_cart->payment_method = $_GET['payment_method'];
$shopping_cart->contact = $_GET['contact'];
$shopping_cart->phone = $_GET['phone'];
$shopping_cart->shipping_cost = $_GET['shipping_cost'];
$shopping_cart->total = $_GET['total'];
$shopping_cart->content = $_GET['content'];
$shopping_cart->envio = $_GET['envio'];

if($shopping_cart->pay_shopping_cart()){
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