<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $clienteID = $_GET['clienteID'];
        $productoID = $_GET['productoID'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->delete(['clienteID' => $clienteID, 'productoID' => $productoID]);
            $conexion->executeBulkWrite($this->database_name.$this->col_favorites, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>