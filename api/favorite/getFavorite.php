<?php
 
include_once '../config/database.php';
include_once '../objects/favorite.php';

$database = new Database();
$db = $database->getConnection();
 
$favorite = new Favorite($db);
 
$favorite->user_id = $_GET['user_id'];




$stmt = $favorite->getFavorites();
$num = $stmt->rowCount();
if($num>0){
 
    $favorite_arr=array();
    $favorite_arr["favorite"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $favorites_item=array(
            "favorite_id" => $row['favorite_id'],
            "product_id" => $row['product_id'],
            "user_id" => $row['user_id'],
            "product_name" => $row['product_name'],
            "product_slug" => $row['product_slug'],
            "product_description" => $row['product_description'],
            "product_price" => $row['product_price'],
            "product_quantity" => $row['product_quantity'],
            "product_status" => $row['product_status'],
            "product_image" => $row['product_image'],
        );
        array_push($favorite_arr["favorite"], $favorites_item);
    }
 
    echo json_encode($favorite_arr["favorite"]);
}
else{
    echo json_encode(array());
}
?>