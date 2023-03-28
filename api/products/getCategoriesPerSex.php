<?php
require "../config/database.php";

class getUsuarios extends Conexion {

    public function mostrarDatos() {
        $categorySex = $_GET['categorySex'];
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\Query(['categorySex' => $categorySex]);
            $cursor = $conexion->executeQuery($this->database_name.$this->col_categories, $query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

$obj = new getUsuarios();
echo json_encode($obj->mostrarDatos())
?>