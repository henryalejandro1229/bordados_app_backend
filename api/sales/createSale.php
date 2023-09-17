<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $clienteID = $_GET['clienteID'];
        $nombreCliente = $_GET['nombreCliente'];
        $emailCliente = $_GET['emailCliente'];
        $fechaVenta = $_GET['fechaVenta'];
        $total = $_GET['total'];
        $productos = $_GET['productos'];
        $direccionEntrega = $_GET['direccionEntrega'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['clienteID'=>$clienteID, 'nombreCliente'=>$nombreCliente, 'emailCliente'=>$emailCliente, 'fechaVenta'=>$fechaVenta, 'total'=>floatval($total), 'productos'=> json_decode($productos), 
            'direccionEntrega'=>json_decode($direccionEntrega)]);
            $conexion->executeBulkWrite($this->database_name.$this->col_sales, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>