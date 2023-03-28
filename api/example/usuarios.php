<?php
require "../config/database.php";

class getUsuarios extends Conexion {
    public function mostrarDatos() {
        try {
            $conexion = parent::conectar();
            $coleccion = "usuarios";
            $query = new MongoDB\Driver\Query([]);
            $cursor = $conexion->executeQuery($this->database_name.$coleccion, $query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

$obj = new getUsuarios();
var_dump($obj->mostrarDatos())
?>