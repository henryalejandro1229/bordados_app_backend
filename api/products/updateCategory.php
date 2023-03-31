<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $description = $_GET['description'];
        $sex = $_GET['categorySex'];
        $image = $_GET['imageUrl'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->update(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['name'=>$name, 'description'=>$description, 'categorySex'=>$sex, 'imageUrl'=>$image]]);
            $conexion->executeBulkWrite($this->database_name.$this->col_categories, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>