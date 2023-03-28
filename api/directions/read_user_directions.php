<?php
 
include_once '../config/database.php';
include_once '../objects/direction.php';

$database = new Database();
$db = $database->getConnection();
 
$direction = new Direction($db);
 
$direction->id_user = $_GET['user_id'];


$stmt = $direction->read_user_directions();
$num = $stmt->rowCount();
if($num>0){
 
    $direction_arr=array();
    $direction_arr["direction"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $directions_item=array(
            "id" => $row['id'],
            "user_id" => $row['user_id'],
            "title" => $row['title'],
            "name" => $row['name'],
            "postal_code" => $row['postal_code'],
            "country" => $row['country'],
            "state" => $row['state'],
            "city" => $row['city'],
            "references" => $row['references'],
            "phone" => $row['phone'],
        );
        array_push($direction_arr["direction"], $directions_item);
    }
 
    echo json_encode($direction_arr["direction"]);
}
else{
    echo json_encode(array());
}
?>