<?php
 
include_once '../config/database.php';
include_once '../objects/direction.php';

$database = new Database();
$db = $database->getConnection();
 
$direction = new Direction($db);
 
$direction->id_user = $_GET['user_id'];
$direction->title = $_GET['title'];
$direction->name = $_GET['name'];
$direction->postal_code = $_GET['postal_code'];
$direction->country = $_GET['country'];
$direction->state = $_GET['state'];
$direction->city = $_GET['city'];
$direction->references = $_GET['references'];
$direction->phone = $_GET['phone'];

if($direction->add_user_direction()){
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