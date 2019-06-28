<?php
include_once 'config.inc.php';

class conexion
{
    private static $conexion;

    public static function conectarBD()
    {  
        //Conexion con PDO
        try {
            if (!isset($conexion)) {
                self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_DB, NOMBRE_USUARIO, PASSWORD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion -> exec("SET CHARACTER SET utf8mb4");
            }
        } catch (PDOException $ex) {
            print "ERROR:" . $ex -> getMessage() . "<br>";
            die();
        }
    }


    public static function desconectarBD()
    {
        if (isset(self::$conexion)) {
            $conexion = null;
        }
    }

    public static function getConexion(){

        return self::$conexion;
    }
}
