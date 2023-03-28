<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);

$product->search = $_GET['search'];
 
$stmt = $product->search();
$num = $stmt->rowCount();
if($num>0){
 
    $products_arr=array();
    $products_arr["products"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "product_id" => $row['product_id'],
            "product_name" => $row['product_name'],
            "product_price" => $row['product_price'],
            "product_image" => $row['product_image']
        );
        array_push($products_arr["products"], $product_item);
    }
 
    echo json_encode($products_arr["products"]);
}
else{
    echo json_encode(array());
}
?>