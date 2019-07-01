<?php
include_once 'Usuario.class.php';

public static function insertar_usuario($conexion, $usuario){
    $usuario_insertado = false;
        
    if(isset($conexion)){
        try {
            $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";
                
            $sentencia = $conexion -> prepare($sql);
                
            $nombretemp = $usuario -> GetNombre();
            $emailtemp = $usuario-> GetEmail();
            $passwordtemp = $usuario-> GetPassword();
            
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
            $sentencia -> bindParam(':email', $emailtemp, PDO::PARAM_STR);
            $sentencia -> bindParam(':password', $passwordtemp, PDO::PARAM_STR);
                
            $usuario_insertado = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
        }
    }
        
    return $usuario_insertado;
}