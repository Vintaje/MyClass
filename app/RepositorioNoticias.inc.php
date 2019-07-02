<?php



class RepositorioNoticias{


    public static function getNoticias(){
        $conexion = conexion::getConexion(); 
        $noticia = array(); 

        if(isset($conexion)){
            try{
                
                $sql = "SELECT * FROM NOTICIAS"; 
                
                $sentencia = $conexion -> prepare($sql); 
                $sentencia -> execute(); 
                $resultado = $sentencia->fetchAll(); 

                if(count($resultado)){
                    foreach($resultado as $fila){
                        $noticia[] = new Noticia(
                        $fila['agregador'],
                        $fila['familia_prof'];
                    }
                } else {
                    print 'No hay noticias';
                }
            } catch (PDOException $ex) {
                print 'Error de SQL' . $ex->getMessage(); 
            }
        }
        return $noticias; 

    }

    public static function getFamilias(){
        $conexion = conexion::getConexion(); 
        $tareas = array(); 

        if(isset($conexion)){
            try{
                
                $sql = "SELECT FAMILIA_PROF FROM NOTICIAS"; 
                
                $sentencia = $conexion -> prepare($sql); 
                $sentencia -> execute(); 
                $resultado = $sentencia->fetchAll(); 

                if(count($resultado)){
                    foreach($resultado as $fila){
                        $noticia[] = $fila['familia_prof'];
                    }
                } else {
                    print 'No hay noticias';
                }
            } catch (PDOException $ex) {
                print 'Error de SQL' . $ex->getMessage(); 
            }
        }
        return $noticias;
    }




    public static function setNoticia($noticia){
        $conexion = conexion::getConexion();
        $noticia_insertada = false; 

        if(isset($conexion)){
            try{
                $sql = "INSERT INTO NOTICIAS (AGREGADOR, FAMILIA_PROF) VALUES (:agregador, :familia_prof)";

                $sentencia = $conexion -> prepare($sql); 

                //Se meten los datos del objeto en variables
                $agregador = $noticia-> getAgreagador();
                $familia_prof = $noticia-> getFamilia();


                //Hacemos el insert sustituyendo las variables creadas por las de la sentencia

                $sentencia -> bindParam(':agregador', $agregador, PDO::PARAM_STR); 
                $sentencia -> bindParam(':familia_prof', $familia_prof, PDO::PARAM_STR); 

                
                $noticia_insertada = $sentencia-> execute(); 

            } catch (PDOException $ex){
                print 'Error al crear la noticia' . $ex->getMessage();
            }
        }
        return $noticia_insertada;
    }


}