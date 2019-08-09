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
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }

    //codigo cambiado por correo.

    public static function getUsuario($conexion,$correo_user)
    {
        $correo=strval($correo_user);
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
}
