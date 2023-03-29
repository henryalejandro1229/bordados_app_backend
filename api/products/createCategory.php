<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $name = $_GET['name'];
        $description = $_GET['description'];
        $sex = $_GET['categorySex'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['name'=>$name, 'description'=>$description, 'categorySex'=>$sex]);
            $conexion->executeBulkWrite($this->database_name.$this->col_categories, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>