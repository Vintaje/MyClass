<?php
include_once 'config.inc.php';

class conexion {
    
    function conectarBD(){
       return $conexion=mysqli_connect(NOMBRE_SERVIDOR,NOMBRE_USUARIO,PASSWORD,NOMBRE_DB);
     }
    
     function desconectarBD(){
         if ($conexion!=null){
            $conexion=null;
         }
    }
}


?>