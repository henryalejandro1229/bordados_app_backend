<?php
include_once '../config/database.php';
include_once '../objects/shopping_cart.php';
 
$database = new Database();
$db = $database->getConnection();
 
$shopping_cart = new Shopping_cart($db);

$shopping_cart->user_id = $_GET['user_id'];
$shopping_cart->product_id = $_GET['product_id'];
 
$stmt = $shopping_cart->read_product_shopping_cart();

if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $shopping_cart_arr=array(
        "identifier" => $row['identifier'],
        "id_product" => $row['id_product'],
        "id_user" => $row['id_user'],
        "size" => $row['size'],
        "color_size" => $row['color_size'],
        "color" => $row['color'],
        "quantity" => $row['quantity'],
    );
}
print_r(json_encode($shopping_cart_arr));
?>