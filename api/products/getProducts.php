<?php
require "../config/database.php";

class getUsuarios extends Conexion {
    public function mostrarDatos() {
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\Query([]);
            $cursor = $conexion->executeQuery($this->database_name.$this->col_products, $query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new getUsuarios();
echo json_encode($obj->mostrarDatos());
?>