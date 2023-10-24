<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $clienteID = $_GET['clienteID'];
        $productos = $_GET['productos'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['clienteID'=>$clienteID, 'productos'=> json_decode($productos)]);
            $conexion->executeBulkWrite($this->database_name.$this->col_carts, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>