<?php
include_once '../config/database.php';
include_once '../objects/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$category = new Category($db);

$category->category_name = $_GET['category_name'];
 
$stmt = $category->read_only_category();
$num = $stmt->rowCount();
if($num>0){
 
    $categories_arr=array();
    $categories_arr["categories"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_item=array(
            "product_id" => $row['product_id'],
            "product_name" => $row['product_name'],
            "product_image" => $row['product_image'],
            "product_description" => $row['product_description'],
            "product_price" => $row['product_price'],
            "product_quantity" => $row['product_quantity'],
        );
        array_push($categories_arr["categories"], $category_item);
    }
 
    echo json_encode($categories_arr["categories"]);
}
else{
    echo json_encode(array());
}
?>