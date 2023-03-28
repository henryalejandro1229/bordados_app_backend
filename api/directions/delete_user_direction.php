<?php
 
include_once '../config/database.php';
include_once '../objects/direction.php';

$database = new Database();
$db = $database->getConnection();
 
$direction = new Direction($db);
 
$direction->user_id = $_GET['user_id'];
$direction->product_id = $_GET['product_id'];
 
if($direction->delete_product_direction()){
    $direction_arr=array(
        "status" => true,
    );
}
else{
    $direction_arr=array(
        "status" => false,
    );
}
print_r(json_encode($direction_arr));
?>