<?php
include_once '../config/database.php';
include_once '../objects/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$category = new Category($db);
 
$stmt = $category->read();
$num = $stmt->rowCount();
if($num>0){
 
    $categories_arr=array();
    $categories_arr["categories"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $row['id'],
            "name" => $row['name'],
            "image" => $row['image'],
        );
        array_push($categories_arr["categories"], $product_item);
    }
 
    echo json_encode($categories_arr["categories"]);
}
else{
    echo json_encode(array());
}
?>