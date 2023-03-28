<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);


$product->search = $_GET['search'];
($_GET['min_price']=="")?$product->min_price="0":$product->min_price=$_GET['min_price'];
($_GET['max_price']=="")?$product->max_price="50000":$product->max_price=$_GET['max_price'];
($_GET['category_name']=="seleccionar")?$product->category_name="":$product->category_name=$_GET['category_name'];
($_GET['brand_name']=="seleccionar")?$product->brand_name="":$product->brand_name=$_GET['brand_name'];
 
$stmt = $product->searchFilter();
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