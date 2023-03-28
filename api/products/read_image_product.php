<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);

$product->imageable_id = $_GET['id'];
 
$stmt = $product->read_image_product();
$num = $stmt->rowCount();
if($num>0){
 
    $products_arr=array();
    $products_arr["products"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $row['id'],
            "url" => $row['url'],
            "imageable_id" => $row['imageable_id'],
            "imageable_type" => $row['imageable_type'],
        );
        array_push($products_arr["products"], $product_item);
    }
 
    echo json_encode($products_arr["products"]);
}
else{
    echo json_encode(array());
}
?>