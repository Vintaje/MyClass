<?php
include_once 'config.inc.php';

class conexion {
    private static $conexion;

    function conectarBD(){
        if(!isset($conexion)){
       return $conexion=mysqli_connect(NOMBRE_SERVIDOR,NOMBRE_USUARIO,PASSWORD,NOMBRE_DB);
        }
     }
    
    function desconectarBD(){
         if ($conexion!=null){
            $conexion=null;
         }
    }
}
