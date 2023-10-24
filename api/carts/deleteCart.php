<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $id = $_GET['clienteID'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->delete(['clienteID' => $id]);
            $conexion->executeBulkWrite($this->database_name.$this->col_carts, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>