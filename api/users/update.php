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
$user->id = $_GET['id'];
$user->name = $_GET['name'];
$user->email = $_GET['email'];
$user->password = password_hash($_GET['password'], PASSWORD_BCRYPT);
 
// create the user
if($user->update()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Updated!"
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Email already exists!"
    );
}
print_r(json_encode($user_arr));
?>