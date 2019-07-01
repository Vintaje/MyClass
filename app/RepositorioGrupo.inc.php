<?php

include_once 'Grupo.class.php';

class RepositorioGrupo{


    //Metodo para insertar grupos
    public static function SetGrupo($conexion, $grupo){
        $grupo_insertado = false;

        if (isset($conexion)) {
            
            try {
                
                $sqlInsert = "INSERT INTO grupo(codigo,nombre, capacidad) VALUES(:codigo, :nombre, :capacidad, 0)";

                $sentencia = $conexion -> prepare($sqlInsert);
                
                $codigotemp = $grupo -> GetCodigo();
                $nombretemp = $grupo-> GetNombre();
                $capacidadtemp = $grupo-> GetCapacidad();
                
                $sentencia = $conexion -> prepare($sqlInsert);
                
                $sentencia -> bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':capacidad', $capacidadtemp, PDO::PARAM_INT);
                    
                $grupo_insertado = $sentencia -> execute();


            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_insertado;

    }


    //Metodo para modificar datos de la tabla grupos
    public static function UpdGrupo($conexion, $codigo, $modificar, $datosModificados){
        $grupo_modificado = false;

        if (isset($conexion)) {
            
            try {
                
                $sqlUpdate = "update usuarios set $modificar=$datosModificados where codigo=$codigo";

                $grupo_modificado = $sqlUpdate -> execute();


            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_modificado;
    }

    //
    // SELECT DE LA TABLA GRUPO
    //
    public static function GetGrupo($conexion, $codigo){
        $grupo_seleccionado = false;

        if (isset($conexion)) {
            
            try {
                
                $sqlSelect = "select * from grupo where codigo=$codigo";

                $grupo_modificado = $sqlSelect -> execute();


            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_seleccionado;
    }

}