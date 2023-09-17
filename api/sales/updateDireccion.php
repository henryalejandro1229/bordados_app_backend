<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $id = $_GET['id'];
        $clienteID = $_GET['clienteID'];
        $nombre = $_GET['nombre'];
        $estado = $_GET['estado'];
        $municipio = $_GET['municipio'];
        $colonia = $_GET['colonia'];
        $calle = $_GET['calle'];
        $telefono = $_GET['telefono'];
        $indicaciones = $_GET['indicaciones'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->update(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => ['clienteID'=>$clienteID, 'nombre'=>$nombre, 'estado'=>$estado, 'municipio'=>$municipio, 
            'colonia'=>$colonia, 'calle'=>$calle, 'telefono'=>$telefono, 'indicaciones'=>$indicaciones]]);
            $conexion->executeBulkWrite($this->database_name.$this->col_addresses, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>