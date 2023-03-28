<?php
 
include_once '../config/database.php';
include_once '../objects/favorite.php';

$database = new Database();
$db = $database->getConnection();
 
$favorite = new Favorite($db);
 
$favorite->product_id = $_GET['product_id'];
 
if($favorite->deleteFavorites()){
    $favorite_arr=array(
        "status" => true,
    );
}
else{
    $favorite_arr=array(
        "status" => false,
    );
}
print_r(json_encode($favorite_arr));
?>