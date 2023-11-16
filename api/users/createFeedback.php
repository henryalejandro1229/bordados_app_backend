<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $clienteID = $_GET['clienteID'];
        $preguntas = $_GET['preguntas'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['clienteID'=>$clienteID, 'preguntas'=>json_decode($preguntas)]);
            $conexion->executeBulkWrite($this->database_name.$this->col_feedbacks, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>