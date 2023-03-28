<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);

$product->category_name = $_GET['category_name'];
 
$stmt = $product->read_products_for_category();
$num = $stmt->rowCount();
if($num>0){
 
    $products_arr=array();
    $products_arr["products"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "category_id" => $row['category_id'],
            "category_name" => $row['category_name'],
            "category_image" => $row['category_image'],
            "subcategory_name" => $row['subcategory_name'],
            "product_id" => $row['product_id'],
            "product_name" => $row['product_name'],
            "product_image" => $row['product_image'],
            "product_slug" => $row['product_slug'],
            "product_description" => $row['product_description'],
            "product_price" => $row['product_price'],
            "product_quantity" => $row['product_quantity'],
            "product_status" => $row['product_status'],
            "brand_name" => $row['brand_name'],
        );
        array_push($products_arr["products"], $product_item);
    }
 
    echo json_encode($products_arr["products"]);
}
else{
    echo json_encode(array());
}
?>