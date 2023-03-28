<?php
class Conexion
{
    public $conn;
    public $database_name = "bordados.";
    public $col_users = "usuarios";
    public $col_categories = "categories";
    public $col_products = "products";

    public function conectar()
    {
        try {
            $cadenaConexion = "mongodb+srv://user_all_privileges:pwd_mongodb@cluster0.vrmzrp9.mongodb.net/?retryWrites=true&w=majority";
            $cliente = new MongoDB\Driver\Manager($cadenaConexion);
            return $cliente;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
?>