<?php
//Carlos González Díez
//Incluimos la clase que vamos a necesitar
include_once 'Tarea.class.php';
class RepositorioTarea
{

    //Método para obtener todas las tareas
    public static function getTareas($codGrupo)
    {
        $conexion = conexion::getConexion();
        $tareas = array();

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM TAREAS WHERE COD_GRUPO = ' $codGrupo ' ";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $tareas[] = new Tarea(
                            $fila['CODIGO'],
                            $fila['COD_GRUPO'],
                            $fila['TITLE_TAREA'],
                            $fila['BODY_TAREA'],
                            $fila["FECHA_ENTREGA"]
                        );
                    }
                } else {
                    print 'No hay tareas para este grupo o usuario';
                }
            } catch (PDOException $ex) {
                print 'Error de SQL' . $ex->getMessage();
            }
        }
        return $tareas;
    }

    //Método para crear una tarea e insertarla en la base de datos
    public static function setTareas($tarea)
    {
        $conexion = conexion::getConexion();
        $tarea_insertada = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO TAREAS (CODIGO, COD_GRUPO, TITLE_TAREA, BODY_TAREA, 
                FECHA_ENTREGA) VALUES (:codigo, :cod_grupo, :title_tarea, :body_tarea,
                :fecha_entrega)";

                $sentencia = $conexion->prepare($sql);

                //Se meten los datos del objeto en variables
                $codigotemp = $tarea->getCodigo();
                $cod_grup_temp = $tarea->getCodGrupo();
                $titletemp = $tarea->getTitle();
                $bodytemp = $tarea->getBody();
                $fechatemp = $tarea->getFechaEntrega();

                //Hacemos el insert sustituyendo las variables creadas por las de la sentencia

                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':cod_grupo', $cod_grup_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':title_tarea', $titletemp, PDO::PARAM_STR);
                $sentencia->bindParam(':body_tarea', $bodytemp, PDO::PARAM_STR);

                //Se cambia el formato de la fecha al de la Base de Datos
                $sentencia->bindParam(':fecha_entrega', date("Y-m-d H:i:s", strtotime($fechatemp)), PDO::PARAM_STR);

                $tarea_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error al crear la tarea' . $ex->getMessage();
            }
        }
        return $tarea_insertada;
    }

    //Método para modificar la fecha de entraga de una tarea
    public static function updateFechaEntrega($tarea)
    {
        $conexion = conexion::getConexion();
        $actualizadas = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE FROM TAREAS WHERE CODIGO = ':codigo '";

                $sentencia = $conexion->prepare($sql);
                $oldCodigo = $tarea->getCodigo();

                $sentencia = bindParam(':codigo', $oldCodigo, PDO::PARAM_STR);
                $actualizadas = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error al actualizar la fecha' . $ex->getMessage();
            }
        }
        return $actualizadas;
    }

    //Método para borrar una tarea
    public static function delTarea($tarea)
    {
        $conexion = conexion::getConexion();
        $borradas = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM TAREAS WHERE CODIGO = ':codigo'";
                $sentencia = $conexion->prepare($sql);

                $oldCodigo = $tarea->getCodigo();
                $sentencia = bindParam(':codigo', $oldCodigo, PDO::PARAM_STR);
                $borradas = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'Error en el borrado' . $ex->getMessage();
            }
        }
        return $borradas;
    }


    public static function buscarTareasGrupo($conexion, $codigogrupo)
    {

        $res = [];

        if (isset($conexion)) {

            try {

                $sqlSelect = 'SELECT * FROM tareas WHERE cod_grupo = :cod_grupo';
                $sentencia = $conexion->prepare($sqlSelect);
                $sentencia->bindParam(':cod_grupo', $codigogrupo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $res[] = new Tarea(
                            $fila['codigo'],
                            $fila['cod_grupo'],
                            $fila['title_tarea'],
                            $fila['body_tarea'],
                            $fila['fecha_entrega']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $res;
    }

    public static function recogerTareas($conexion, $codigogrupo){
        $tareas = [];

        $tareas = self::buscarTareasGrupo($conexion, $codigogrupo);

        foreach($tareas as $tarea){
            self::mostrarTarea($tarea);
        }
        

    }

    public static function mostrarTarea($tarea){
        
    }
}
