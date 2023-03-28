<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);

$product->id = $_GET['product_id'];

$stmt = $product->read_single();

if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $product_arr=array(
        "category_id" => $row['category_id'],
        "category_name" => $row['category_name'],
        "category_image" => $row['category_image'],
        "subcategory_name" => $row['subcategory_name'],
        "product_id" => $row['product_id'],
        "product_name" => $row['product_name'],
        "product_slug" => $row['product_slug'],
        "product_description" => $row['product_description'],
        "product_price" => $row['product_price'],
        "product_quantity" => $row['product_quantity'],
        "product_status" => $row['product_status'],
        "product_image" => $row['product_image'],
        "brand_name" => $row['brand_name'],
    );
}
print_r(json_encode($product_arr));
?>