<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $id = $_GET['id'];
        $title = $_GET['title'];
        $categoryID = $_GET['categoryID'];
        $description = $_GET['description'];
        $sex = $_GET['categorySex'];
        $precio = $_GET['precio'];
        $image = $_GET['imageUrl'];
        $inventario = $_GET['inventario'];
        $tags = strtolower($description);
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->update(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['title'=>$title, 'description'=>$description, 'categorySex'=>$sex, 'precio'=>floatval($precio), 'categoryID'=>$categoryID, 'imageUrl'=>$image, 'inventario'=>json_decode($inventario), 'tags' => $tags]]);
            $conexion->executeBulkWrite($this->database_name.$this->col_products, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>