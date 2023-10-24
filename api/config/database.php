<?php
class Conexion
{
    public $conn;
    public $database_name = "LosPajaritos.";
    public $col_users = "users";
    public $col_categories = "categories";
    public $col_products = "products";
    public $col_dumps = "dumps";
    public $col_restorations = "restorations";
    public $col_sales = "sales";
    public $col_addresses = "addresses";
    public $col_carts = "carts";

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