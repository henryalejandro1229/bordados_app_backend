<?php
 
include_once '../config/database.php';
include_once '../objects/favorite.php';

$database = new Database();
$db = $database->getConnection();
 
$favorite = new Favorite($db);
 
$favorite->product_id = $_GET['product_id'];
$favorite->user_id = $_GET['user_id'];

if($favorite->addFavorite()){
    $favorite_arr=array(
        "status" => true,
        "id" => $favorite->id,
        "product_id" => $favorite->product_id,
        "user_id" => $favorite->user_id,
    );
}
else{
    $favorite_arr=array(
        "status" => false,
    );
}
print_r(json_encode($favorite_arr));
?>