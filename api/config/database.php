<?php
class Conexion
{
    public $conn;
    public $database_name = "LosPajaritos.";
    public $col_users = "users";
    public $col_categories = "categories";
    public $col_products = "products";
    // $cadenaAnterior =  "mongodb+srv://user_all_privileges:pwd_mongodb@cluster0.vrmzrp9.mongodb.net/?retryWrites=true&w=majority";

    public function conectar()
    {
        try {
            $cadenaConexion = "mongodb+srv://sastrerialospajaritos:fUIRMRzwPDAtkV9u@cluster43000.2ddxg0t.mongodb.net/?retryWrites=true&w=majority";
            $cliente = new MongoDB\Driver\Manager($cadenaConexion);
            return $cliente;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
?>