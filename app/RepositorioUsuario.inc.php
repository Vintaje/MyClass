<?php
include_once 'Usuario.class.php';

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

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam('codigo', $codigotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':passwd', $passwdtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':avatar', $avatartemp, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_full', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':familia_prof', $familia_proftemp, PDO::PARAM_STR);
                $sentencia->bindParam(':edad', $edadtemp, PDO::PARAM_INT);
                $sentencia->bindParam(':dni', $dnitemp, PDO::PARAM_STR);
                $sentencia->bindParam(':sexo', $sexotemp, PDO::PARAM_STR_CHAR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }

    public static function getUsuario($conexion, $codigo)
    {
        $usuario = null;

        if (isset($conexion)) {
            try {
                $sql = "select CODIGO,CORREO,PASSWD,AVATAR,NOMBRE_FULL,FAMILIA_PROF,FECHA_REG,EDAD,DNI,SEXO from usuario where codigo = :codigo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();


                if (!empty($resultado)) {
                    $usuario = new Usuario(
                        $resultado['correo'],
                        $resultado['nombre_full'],
                        $resultado['codigo'],
                        $resultado['passwd'],
                        $resultado['sexo'],
                        $resultado['familia_prof'],
                        $resultado['fecha_reg'],
                        $resultado['edad'],
                        $resultado['dni'],
                        $resultado['avatar']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario;
    }
}
