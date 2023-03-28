<?php
 
include_once '../config/database.php';
include_once '../objects/shopping_cart.php';

$database = new Database();
$db = $database->getConnection();
 
$shopping_cart = new Shopping_cart($db);
 
$shopping_cart->user_id = $_GET['user_id'];


$stmt = $shopping_cart->read_shopping_cart();
$num = $stmt->rowCount();
if($num>0){
 
    $shopping_cart_arr=array();
    $shopping_cart_arr["shopping_cart"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $shopping_carts_item=array(
            "identifier" => $row['identifier'],
            "id_product" => $row['id_product'],
            "id_user" => $row['id_user'],
            "size" => $row['size'],
            "color_size" => $row['color_size'],
            "color" => $row['color'],
            "quantity" => $row['quantity'],
        );
        array_push($shopping_cart_arr["shopping_cart"], $shopping_carts_item);
    }
 
    echo json_encode($shopping_cart_arr["shopping_cart"]);
}
else{
    echo json_encode(array());
}
?>