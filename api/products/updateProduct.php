<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $id = $_GET['id'];
        $title = $_GET['title'];
        $description = $_GET['description'];
        $sex = $_GET['categorySex'];
        $marca = $_GET['marca'];
        $precio = $_GET['precio'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->update(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['title'=>$title, 'description'=>$description, 'categorySex'=>$sex, 'marca'=>$marca, 'precio'=>$precio]]);
            $conexion->executeBulkWrite($this->database_name.$this->col_products, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>