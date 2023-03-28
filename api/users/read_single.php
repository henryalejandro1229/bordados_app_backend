<?php
require "../config/database.php";

class getUsuarios extends Conexion {

    public function mostrarDatos() {
        $txtEmail = $_GET['email'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\Query(['email' => $txtEmail]);
            $cursor = $conexion->executeQuery($this->database_name.$this->col_users, $query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

$obj = new getUsuarios();
echo json_encode($obj->mostrarDatos())
?>