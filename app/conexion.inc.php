<?php
include_once 'config.inc.php';

class conexion
{
    private static $conexion;

    function conectarBD()
    {
        if (!isset($conexion)) {
            return self::$conexion = mysqli_connect(NOMBRE_SERVIDOR, NOMBRE_USUARIO, PASSWORD, NOMBRE_DB);
        }
    }

    function desconectarBD()
    {
        if (isset(self::$conexion)) {
            $conexion = null;
        }
    }

    function getConexion(){

        return self::$conexion;

    }

    
}
