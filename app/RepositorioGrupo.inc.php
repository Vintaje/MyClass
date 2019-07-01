<?php








public static function UpdGrupo($codigo, $modificar, $datosModificados){
    $conexion = conexion::getConexion();

    if (isset($conexion)) {
        
        try {
            
            $sqlUpdate = "update usuarios set $modificar=$datosModificados where codigo=$codigo";

        } catch (\PDOException $ex) {
            print 'ERROR' . $ex->getMessage();
        }

    }

}