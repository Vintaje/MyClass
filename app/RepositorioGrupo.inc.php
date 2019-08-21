<?php

include_once 'Grupo.class.php';

class RepositorioGrupo
{



    //  INSERT
    //Metodo para insertar grupos
    //
    public static function setGrupo($conexion, $grupo)
    {
        $grupo_insertado = false;

        if (isset($conexion)) {

            try {

                $sqlInsert = 'INSERT INTO grupo(codigo,nombre, capacidad, cod_owner, privado, tematica, descripcion) 
                VALUES(:codigo, :nombre, :capacidad, :cod_owner, :privado, :tematica, :descripcion)';

                $sentencia = $conexion->prepare($sqlInsert);

                $codigotemp = $grupo->GetCodigo();
                $nombretemp = $grupo->GetNombre();
                $capacidadtemp = $grupo->GetCapacidad();
                $ownertemp = $grupo->getOwner();
                $privadotemp = $grupo->getPrivacidad();
                $tematicatemp = $grupo->getTematica();
                $descripciontemp = $grupo->getDescripcion();


                $sentencia = $conexion->prepare($sqlInsert);

                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':capacidad', $capacidadtemp, PDO::PARAM_INT);
                $sentencia->bindParam(':cod_owner', $ownertemp, PDO::PARAM_INT);
                $sentencia->bindParam(':privado', $privadotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':tematica', $tematicatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripciontemp, PDO::PARAM_INT);

                $grupo_insertado = $sentencia->execute();
            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_insertado;
    }



    //  UPDATE
    // Metodo para modificar datos de la tabla grupos
    //
    public static function updGrupo($conexion, $codigo, $modificar, $datosModificados)
    {
        $grupo_modificado = false;

        if (isset($conexion)) {

            try {

                $sqlUpdate = 'UPDATE usuarios SET $modificar=$datosModificados WHERE codigo=$codigo';

                $grupo_modificado = $sqlUpdate->execute();
            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_modificado;
    }



    //  SELECT
    // SELECT DE LA TABLA GRUPO
    //
    public static function getGrupo($conexion, $codigo)
    {
        $grupo = null;

        if (isset($conexion)) {

            try {

                $sqlSelect = 'SELECT codigo, nombre, capacidad,cod_owner, privado,
                 tematica, descripcion FROM grupo WHERE codigo=:codigo';
                $sentencia = $conexion->prepare($sqlSelect);
                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $grupo = new Grupo(
                        $resultado['CODIGO'],
                        $resultado['NOMBRE'],
                        $resultado['CAPACIDAD'],
                        $resultado['COD_OWNER'],
                        $resultado['PRIVADO'],
                        $resultado['TEMATICA'],
                        $resultado['DESCRIPCION']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo;
    }



    //  DELETE
    //  METODO QUE BORRA UN GRUPO
    //
    public static function delGrupo($conexion, $codigo)
    {
        $grupo_borrado = false;

        if (isset($conexion)) {

            try {
                $sqlDelete = 'DELETE FROM grupo WHERE codigo= $codigo';

                $grupo_borrado = $sqlDelete->execute();
            } catch (\PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $grupo_borrado;
    }

    public static function GenerarCodigoClases($conexion)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = strlen($caracteres);
        $solucion = '';
        //$veces = 1; 
        $salida = false;

        $conexion = conexion::getConexion();
        //bucle que generará un codigo y lo comparará con la base de datos
        do {

            $solucion = '';

            //bucle que genera un codigo de 5 caracteres segun el array dado
            for ($i = 0; $i <= 4; $i++) {
                $numero = rand(0, $longitud);
                $solucion = $solucion . $caracteres[$numero];
            }

            /*
            if($veces == 1){
                $solucion = 'JSCNz'; 
                $veces++; 
            }
            */
            //metodo para realizar la consulta y ver si se encuentra el codigo en la base de datos
            if (isset($conexion)) {

                try {
                    $sql = 'SELECT codigo FROM grupo WHERE codigo= :solucion';
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':solucion', $solucion, PDO::PARAM_STR);
                    $sentencia->execute();

                    $resultado = $sentencia->fetch();


                    if (empty($resultado)) {
                        $salida = true;
                    }
                } catch (Exception $ex) {
                    print 'ERROR' . $ex->getMessage();
                }
            }
        } while (!$salida);



        return $solucion;
    }

    public static function UnirseAClase($conexion, $usuariocod, $grupocod)
    {
        $sqlInsert = 'INSERT INTO usergroup(cod_user, cod_group) 
        VALUES(:cod_user, :cod_group)';

        $sentencia = $conexion->prepare($sqlInsert);




        $sentencia = $conexion->prepare($sqlInsert);

        $sentencia->bindParam(':cod_user', $usuariocod, PDO::PARAM_STR);
        $sentencia->bindParam(':cod_group', $grupocod, PDO::PARAM_STR);

        $completado = $sentencia->execute();

        if (!$completado) {
            echo 'Error desconocido, por favor contacte con el administrador';
        }
    }

    public static function buscarPorUsuario($conexion)
    {


        if (isset($conexion)) {

            try {

                $sqlSelect = 'SELECT cod_group FROM usergroup WHERE cod_user = :cod_user';
                $sentencia = $conexion->prepare($sqlSelect);
                $sentencia->bindParam(':cod_user', $_SESSION['codigo_user'], PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (!empty($resultado)) {
                    return $resultado;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return null;
    }


    public static function recogerGrupos($conexion)
    {
        $codigosgrupos = self::buscarPorUsuario($conexion);
        $grupos = null;
        if(count($codigosgrupos) != 0){
        foreach ($codigosgrupos as $cod_grupo) {
            array_push($grupos, self::getGrupo($conexion, $cod_grupo));
        }

        foreach($grupos as $grupo){
            self::mostrarGrupo($grupo);
        }
    }else{
        ?>
            <h1>
                Nada que listar
            </h1>
        <?php
    }
    }


    public static function mostrarGrupo($grupo)
    {
        if (!isset($grupo)) {
            return;
        }

        ?>
<div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?php
                        $grupo->getNombre();
                        ?>
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <?php
                    $grupo->getDescripcion();
                    ?>
            <div class="card-body d-flex">
                <a class="btn btn-primary ml-auto" href="mis-clases" role="button">Ir</a>
            </div>
        </div>
    </div>
</div>
<?php

    }
}
