<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $date = $_GET['date'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['date'=> $date]);
            $conexion->executeBulkWrite($this->database_name.$this->col_dumps, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>