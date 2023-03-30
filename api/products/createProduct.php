<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $title = $_GET['title'];
        $description = $_GET['description'];
        $categoryID = $_GET['categoryID'];
        $sex = $_GET['categorySex'];
        $marca = $_GET['marca'];
        $precio = $_GET['precio'];
        $image = $_GET['imageUrl'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['title'=>$title, 'description'=>$description, 'categorySex'=>$sex, 'marca'=>$marca, 'precio'=>$precio, 'imageUrl'=>$image, 'categoryID'=>$categoryID]);
            $conexion->executeBulkWrite($this->database_name.$this->col_products, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>