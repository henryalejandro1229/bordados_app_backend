<?php
 
include_once '../config/database.php';
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
$user->email = $_GET['email'];
$user->code = $_GET['code'];

$stmt = $user->save_code();

if($stmt){
    print_r(1);
} else {
    print_r(null);
}
?>