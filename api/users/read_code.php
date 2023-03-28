<?php
include_once '../config/database.php';
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);

$user->email = $_GET['email'];

$stmt = $user->read_code();

if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_arr=array(
        "code_to_reset_pass" => $row['code_to_reset_pass'],
    );
}
print_r(json_encode($user_arr));
?>