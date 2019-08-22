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
                            $fila['codigo'],
                            $fila['cod_grupo'],
                            $fila['title_tarea'],
                            $fila['body_tarea'],
                            $fila['tipo'],
                            $fila["fecha_entrega"]
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
    public static function setTareas($tarea, $codigogrupo)
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
                $titletemp = $tarea->getTitle();
                $bodytemp = $tarea->getBody();
                $fechatemp = $tarea->getFechaEntrega();

                //Hacemos el insert sustituyendo las variables creadas por las de la sentencia

                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':cod_grupo', $codigogrupo, PDO::PARAM_STR);
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


    /**
     * Busca unicamente las tareas que sean entregas(valor tipo = 1)
     * 
     */
    public static function buscarEntregas($conexion, $codigogrupo)
    {

        $res = [];

        if (isset($conexion)) {

            try {

                $sqlSelect = 'SELECT * FROM tareas WHERE cod_grupo = :cod_grupo AND TIPO = 1';
                $sentencia = $conexion->prepare($sqlSelect);
                $sentencia->bindParam(':cod_grupo', $codigogrupo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $res[] = new Tarea(
                            $fila['CODIGO'],
                            $fila['COD_GRUPO'],
                            $fila['TITLE_TAREA'],
                            $fila['BODY_TAREA'],
                            $fila['TIPO'],
                            $fila['FECHA_ENTREGA']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $res;
    }


    /**
     * 
     * Busca unicamente los temarios(valor tipo = 0)
     */
    public static function buscarTemario($conexion, $codigogrupo)
    {

        $res = [];

        if (isset($conexion)) {

            try {

                $sqlSelect = 'SELECT * FROM tareas WHERE cod_grupo = :cod_grupo AND tipo = 0';
                $sentencia = $conexion->prepare($sqlSelect);
                $sentencia->bindParam(':cod_grupo', $codigogrupo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $res[] = new Tarea(
                            $fila['CODIGO'],
                            $fila['COD_GRUPO'],
                            $fila['TITLE_TAREA'],
                            $fila['BODY_TAREA'],
                            $fila['TIPO'],
                            $fila['FECHA_ENTREGA']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $res;
    }

    /**
     * Recoge las tareas y las muestra llamando a mostrarTarea()
     * 
     */
    public static function recogerTareas($conexion, $codigogrupo, $modo)
    {
        $tareas = [];

        if ($modo == 1) {
            $tareas = self::buscarEntregas($conexion, $codigogrupo);
        } else if ($modo == 0) {
            $tareas = self::buscarTemario($conexion, $codigogrupo);
        }
        if (count($tareas) != 0) {
            foreach ($tareas as $tarea) {
                self::mostrarTarea($tarea);
            }
        } else {
            ?>
<h1>
    Nada que listar
</h1>
<?php

        }
    }
    /**
     * 
     * Muestra la tarea de manera diferente si es temario(0) o entrega(1)
     */
    public static function mostrarTarea($tarea)
    {
        if ($tarea->getTipo() == 1) {
            ?>

<div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?php
                            echo $tarea->getTitle();

                            ?>
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                <?php
                            echo $tarea->getFechaEntrega();

                            ?></h6>
            <?php

                        echo $tarea->getBody();
                        ?>
            <div class="card-body d-flex">
                <a class="btn btn-primary ml-auto" href="tarea" role="button">Ir</a>
            </div>
        </div>
    </div>
</div>

<?php
        } else if ($tarea->getTipo() == 0) {
            ?>

<div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?php
                            echo $tarea->getTitle();

                            ?>
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <?php

                        echo $tarea->getBody();
                        ?>
            <div class="card-body d-flex">
                <a class="btn btn-primary ml-auto" href="tarea" role="button">Ir</a>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }
}
