<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $title = $_GET['title'];
        $description = $_GET['description'];
        $categoryID = $_GET['categoryID'];
        $sex = $_GET['categorySex'];
        $precio = $_GET['precio'];
        $image = $_GET['imageUrl'];
        $inventario = $_GET['inventario'];
        $tags = strtolower($description);
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['title'=>$title, 'description'=>$description, 'categorySex'=>$sex, 'precio'=>floatval($precio), 'imageUrl'=>$image, 'categoryID'=>$categoryID, 'inventario'=>json_decode($inventario), 'tags' => $tags]);
            $conexion->executeBulkWrite($this->database_name.$this->col_products, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>