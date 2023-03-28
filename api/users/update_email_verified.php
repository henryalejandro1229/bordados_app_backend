<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// set user property values
$user->email = $_GET['email'];
 
// create the user
if($user->update_email_verified()){
    header('Location: https://amantoli.com.mx/');
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Error al actualizar!"
    );
}
print_r(json_encode($user_arr));
?>