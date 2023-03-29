<?php
require "../config/database.php";

class query extends Conexion {
    public function config() {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $isAdmin = $_GET['isAdmin'] === 'true'? true: false;
        try {
            $conexion = parent::conectar();
            $query = new MongoDB\Driver\BulkWrite;
            $query->insert(['name'=>$name, 'email'=>$email, 'password'=>$password, 'isAdmin'=>$isAdmin]);
            $conexion->executeBulkWrite($this->database_name.$this->col_users, $query);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
$obj = new query();
echo json_encode($obj->config());
?>