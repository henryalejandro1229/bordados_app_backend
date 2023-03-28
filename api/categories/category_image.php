<?php
include_once '../config/database.php';
include_once '../objects/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$category = new Category($db);

$category->category_name = $_GET['category_name'];

$stmt = $category->category_image();

if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $category_arr=array(
        "id" => $row['id'],
        "name" => $row['name'],
        "image" => $row['image'],
    );
}
print_r(json_encode($category_arr));
?>