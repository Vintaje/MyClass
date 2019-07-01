<?php

include_once 'Grupo.class.php';

class RepositorioGrupo{


    
    //  INSERT
    //Metodo para insertar grupos
    //
    public static function setGrupo($conexion, $grupo){
        $grupo_insertado = false;

        if (isset($conexion)) {
            
            try {
                
                $sqlInsert = "INSERT INTO grupo(codigo,nombre, capacidad) VALUES(:codigo, :nombre, :capacidad)";

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



    //  UPDATE
    // Metodo para modificar datos de la tabla grupos
    //
    public static function updGrupo($conexion, $codigo, $modificar, $datosModificados){
        $grupo_modificado = false;

        if (isset($conexion)) {
            
            try {
                
                $sqlUpdate = "UPDATE usuarios SET $modificar=$datosModificados WHERE codigo=$codigo";

                $grupo_modificado = $sqlUpdate -> execute();


            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_modificado;
    }



    //  SELECT
    // SELECT DE LA TABLA GRUPO
    //
    public static function getGrupo($conexion, $codigo){
        $grupo = null;

        if (isset($conexion)) {
            
            try {
                
                $sqlSelect = "SELECT codigo, nombre, capacidad,cod_owner FROM grupo WHERE codigo=$codigo";
                $sentencia= $conexion-> prepare($sqlSelect);
                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia-> fetch();

                if (!empty($resultado)) {
                    $grupo = new Grupo(
                        $resultado['codigo'],
                        $resultado['nombre'],
                        $resultado['capacidad'],
                        $resultado['cod_owner']
                    );
                }

            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo;
    }



    //  DELETE
    //  METODO QUE BORRA UN GRUPO
    //
    public static function delGrupo($conexion, $codigo){
        $grupo_borrado=false;

        if (isset($conexion)) {
            
            try {
                $sqlDelete = "DELETE FROM grupo WHERE codigo= $codigo";

                $grupo_borrado = $sqlDelete -> execute();

            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_borrado;
    }



}