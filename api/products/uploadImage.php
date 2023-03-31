<?php
    class getUsuarios {
        public function mostrarDatos() {
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
            
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $nombreArchivo = $params->nombreArchivo;
            $imagen = $params->base64textString;
            $imagen = base64_decode($imagen);
            try {
                $filePath = $_SERVER['DOCUMENT_ROOT']."/api/products/imageProducts/".$nombreArchivo;
                file_put_contents($filePath, $imagen);
                $jsonData= '[
                    {"response":"ok"},
                 ]';
  
                return json_decode($jsonData, true);
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }
    $obj = new getUsuarios();
    echo json_encode($obj->mostrarDatos());
?>