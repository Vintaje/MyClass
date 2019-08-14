<?php
include_once 'Usuario.class.php';
include_once 'conexion.inc.php';

class RepositorioUsuario
{
    public static function setUsuario($conexion, $usuario)
    {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuario(CODIGO,CORREO,PASSWD,AVATAR,NOMBRE_FULL,FAMILIA_PROF,FECHA_REG,EDAD,DNI,SEXO) 
                VALUES(:codigo, :correo, :passwd,:avatar,:nombre_full,:familia_prof, NOW(),:edad,:dni,:sexo)";


                $codigotemp = $usuario->GetCodigo();
                $correotemp = $usuario->GetCorreo();
                $passwdtemp = $usuario->getPassword();
                $avatartemp = $usuario->GetAvatar();
                $nombretemp = $usuario->GetNombreCompleto();
                $familia_proftemp = $usuario->getFamiliaProf();
                $edadtemp = $usuario->getEdad();
                $dnitemp = $usuario->getDni();
                $sexotemp = $usuario->getSexo();

                $conexion = conexion::getConexion();


                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':passwd', $passwdtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':avatar', $avatartemp, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_full', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':familia_prof', $familia_proftemp, PDO::PARAM_STR);
                $sentencia->bindParam(':edad', $edadtemp, PDO::PARAM_INT);
                $sentencia->bindParam(':dni', $dnitemp, PDO::PARAM_STR);
                $sentencia->bindParam(':sexo', $sexotemp, PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                if ($ex->getCode() == 23000) {
                    $_SESSION['modal']  = algo;
                    Redireccion::redirigir("../ErrorRegistro");
                }
            }
        }

        return $usuario_insertado;
    }

    //codigo cambiado por correo.

    public static function getUsuario($conexion, $correo_user)
    {
        $correo = strval($correo_user);
        $usuario = null;

        $conexion = conexion::getConexion();

        if (isset($conexion)) {
            try {
                $sql = "select CODIGO,CORREO,PASSWD,AVATAR,NOMBRE_FULL,FAMILIA_PROF,FECHA_REG,EDAD,DNI,SEXO from usuario where correo = :correo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR, 255);

                $sentencia->execute();

                $resultado = $sentencia->fetch();


                if (!empty($resultado)) {

                    $usuario = new Usuario(
                        $resultado['CORREO'],
                        $resultado['NOMBRE_FULL'],
                        $resultado['CODIGO'],
                        $resultado['PASSWD'],
                        $resultado['SEXO'],
                        $resultado['FAMILIA_PROF'],
                        $resultado['FECHA_REG'],
                        $resultado['EDAD'],
                        $resultado['DNI'],
                        $resultado['AVATAR']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        conexion::desconectarBD();

        return $usuario;
    }

    /**
     * Buscar usuario por Codigo
     */
    public static function getUsuarioCod($conexion, $codigo_user)
    {
        $codigo = strval($codigo_user);
        $usuario = null;

        $conexion = conexion::getConexion();

        if (isset($conexion)) {
            try {
                $sql = "select CODIGO,CORREO,PASSWD,AVATAR,NOMBRE_FULL,FAMILIA_PROF,FECHA_REG,EDAD,DNI,SEXO from usuario where codigo = :codigo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR, 255);

                $sentencia->execute();

                $resultado = $sentencia->fetch();


                if (!empty($resultado)) {

                    $usuario = new Usuario(
                        $resultado['CORREO'],
                        $resultado['NOMBRE_FULL'],
                        $resultado['CODIGO'],
                        $resultado['PASSWD'],
                        $resultado['SEXO'],
                        $resultado['FAMILIA_PROF'],
                        $resultado['FECHA_REG'],
                        $resultado['EDAD'],
                        $resultado['DNI'],
                        $resultado['AVATAR']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        conexion::desconectarBD();

        return $usuario;
    }

    public static function updUsuario($conexion, $usuario, $modo)
    {
        $usuario_actualizado = false;

        if (isset($conexion)) {
            try {

                switch ($modo) {
                    case 1: //modo 1 actualizar nombre de usuario.

                        $sql = "update usuario set NOMBRE_FULL = :nombre_full where codigo = :codigo";
                        break;
                    case 2: //modo 2 actualizar passwd de usuario.

                        $sql = "update usuario set passwd = :passwd where codigo = :codigo";
                        break;
                    case 3: //modo 3 actualizar avatar de usuario.
                        $sql = "update usuario set avatar = :avatar where codigo = :codigo";
                        break;
                    case 4: //modo 4 actualizar sexo de usuario.
                        $sql = "update usuario set sexo = :sexo where codigo = :codigo";
                        break;
                    case 5: //modo 5 actualizar correo de usuario.
                        $sql = "update usuario set correo = :correo where codigo = :codigo";
                        break;
                    case 6: //modo 6 actualizar familia_prof de usuario.
                        $sql = "update usuario set familia_prof = :familia_prof where codigo = :codigo";
                        break;
                }





                $codigotemp = $usuario->GetCodigo();
                $correotemp = $usuario->GetCorreo();
                $passwdtemp = $usuario->getPassword();
                $avatartemp = $usuario->GetAvatar();
                $nombretemp = $usuario->GetNombreCompleto();
                $familia_proftemp = $usuario->getFamiliaProf();
                $sexotemp = $usuario->getSexo();

                $conexion = conexion::getConexion();


                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':passwd', $passwdtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':avatar', $avatartemp, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_full', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':familia_prof', $familia_proftemp, PDO::PARAM_STR);
                $sentencia->bindParam(':sexo', $sexotemp, PDO::PARAM_STR);

                $usuario_actualizado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_actualizado;
    }

    public static function delUsuario($conexion, $usuario)
    {
        $usuario_borrado = false;

        if (isset($conexion)) {
            try {


                $sql = "delete from usuarios where codigo = :codigo";


                $codigotemp = $usuario->GetCodigo();

                $conexion = conexion::getConexion();


                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);


                $usuario_borrado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_borrado;
    }


    public static function agregarAmigo($conexion, $codigo)
    {

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO amigos(user1, user2, estado) values(:user1, :user2, 0)";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':user1', $_SESSION['codigo_user'], PDO::PARAM_STR, 255);
                $sentencia->bindParam(':user2', $codigo, PDO::PARAM_STR, 255);
                $sentencia->execute();
            } catch (Exception $ex) {
                echo 'El usuario no existe';
            }
        }
    }

    public static function rechazarAmigo($conexion, $codigo)
    {
        if (isset($conexion)) {

            try {
                $user1 = $_SESSION['codigo_user'];
                $sql = "DELETE FROM amigos WHERE USER1 = :user1 AND USER2 = :user2";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':user1', $user1, PDO::PARAM_STR, 255);
                $sentencia->bindParam(':user2', $codigo, PDO::PARAM_STR, 255);
                $sentencia->execute();

                if ($sentencia) {
                    echo 'borrado';
                }
            } catch (Exception $ex) {
                echo 'Error inesperado, por favor contacte con el administrador';
            }
        }
    }

    public static function aceptarAmigo($conexion, $codigo)
    {
        if (isset($conexion)) {
            try {
                $user1 = $_SESSION['codigo_user'];
                $sql = "UPDATE amigos SET estado = 1 WHERE user1 = :user1 AND user2 = :user2";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':user1', $user1, PDO::PARAM_STR, 255);
                $sentencia->bindParam(':user2', $codigo, PDO::PARAM_STR, 255);
                $sentencia->execute();

                if ($sentencia) {

                    $sql2 = "INSERT INTO amigos(user1, user2, estado) values(:user1, :user2, 0)";

                    $sentencia2 = $conexion->prepare($sql2);

                    $sentencia2->bindParam(':user1', $codigo, PDO::PARAM_STR, 255);
                    $sentencia2->bindParam(':user2', $_SESSION['codigo_user'], PDO::PARAM_STR, 255);
                    $sentencia2->execute();
                    if ($sentencia2) {
                        echo 'Agregado correctamente';
                    }
                }
            } catch (Exception $ex) {
                echo 'Error inesperado, por favor contacte con el administrador';
            }
        }
    }

    public static function solicitudes($conexion)
    {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM amigos WHERE user1 = :user1 AND estado = 0";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':user1', $_SESSION['cod_user'], PDO::PARAM_STR, 255);

                $sentencia->execute();

                $resultado = $sentencia->fetch();


                if (!empty($resultado)) {

                    $solicitudes = new Solicitudes(
                        $resultado['id'],
                        $resultado['user1'],
                        RepositorioUsuario::getUsuarioCod($conexion, $resultado[user2]),
                        $resultado['estado']
                    );
                }
            } catch (Exception $ex) {
                echo 'Error interno, por favor contacte con un administrador';
            }
        }
    }

    public static function getAmigos($conexion)
    {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM amigos WHERE user1 = :user1 AND estado = 1";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':user1', $_SESSION['cod_user'], PDO::PARAM_STR, 255);

                $sentencia->execute();

                $resultado = $sentencia->fetch();


                if (!empty($resultado)) {

                    $solicitudes = new Solicitudes(
                        $resultado['id'],
                        $resultado['user1'],
                        RepositorioUsuario::getUsuarioCod($conexion, $resultado[user2]),
                        $resultado['estado']
                    );
                }
            } catch (Exception $ex) {
                echo 'Error interno, por favor contacte con un administrador';
            }
        }
    }

    public static function GenerarCodigoUsuario($conexion){
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud= strlen($caracteres);
        $solucion='';
        //$veces = 1; 
        $salida = false; 

        $conexion = conexion::getConexion();
        //bucle que generará un codigo y lo comparará con la base de datos
        do {

            $solucion = ''; 

            //bucle que genera un codigo de 5 caracteres segun el array dado
            for ($i=0; $i <= 4 ; $i++) { 
                $numero= rand(0,$longitud);
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
                    $sql = "SELECT codigo FROM usuario WHERE codigo= :solucion";
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':solucion', $solucion, PDO::PARAM_STR);
                    $sentencia->execute();
    
                    $resultado = $sentencia->fetch();
                     

                    if (empty($resultado)) {
                        $salida= true;
                    }
                } catch (Exception $ex) {
                    print 'ERROR' . $ex->getMessage();
                }
            }
        } while (!$salida);

        

        return $solucion;
    }

}