<?php
require "../config/database.php";

class getUsuarios extends Conexion {

    public function mostrarDatos() {
        $txtSearch = $_GET['txtSearch'];
        $min = $_GET['min'];
        $max = $_GET['max'];
        $categoryID = $_GET['categoryID'];
        $categorySex = $_GET['categorySex'];
        $talla = $_GET['talla'];
        $params = ['tags' => new \MongoDB\BSON\Regex($txtSearch)];
        if($categoryID !== '0') {
            $params += ['categoryID' => $categoryID];
        }
        if($talla !== '0') {
            $params += ['talla' => $talla];
        }
        if($categorySex !== '0') {
            $params += ['categorySex' => $categorySex];
        }
        if($min >= 0 && $max >= 0) {
            $params += ['precio' => ['$gte' => intval($min), '$lte' => intval($max)]];
        }
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\Query($params);
            // print_r($query);
            $cursor = $conexion->executeQuery($this->database_name.$this->col_products, $query);
            return json_decode(json_encode($cursor->toArray()),JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

$obj = new getUsuarios();
echo json_encode($obj->mostrarDatos())
?>