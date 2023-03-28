<?php
include_once '../config/database.php';
include_once '../objects/order.php';
 
$database = new Database();
$db = $database->getConnection();
 
$order = new Order($db);

$order->user_id = $_GET['user_id'];

$stmt = $order->read_single_order();
$num = $stmt->rowCount();

if($num>0){
    $order_arr=array();
    $order_arr["orders"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         extract($row);

        $order_item=array(
            "id" => $row['id'],
            "user_id" => $row['user_id'],
            "contact" => $row['contact'],
            "phone" => $row['phone'],
            "status" => $row['status'],
            "envio_type" => $row['envio_type'],
            "total" => $row['total'],
            "state_id" => $row['state_id'],
            "city_id" => $row['city_id'],
            "colony_id" => $row['colony_id'],
            "address" => $row['address'],
            "references" => $row['references'],
            "created_at" => $row['created_at'],
            "updated_at" => $row['updated_at']
        );
        array_push($order_arr["orders"], $order_item);
    }
 
    echo json_encode($order_arr["orders"]);
}
else{
    echo json_encode(array());
}
?>