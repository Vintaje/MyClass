<?php
include_once 'Usuario.class.php';

class RepositorioUsuario
{
    public static function insertar_usuario($conexion, $usuario)
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
                $sentencia->bindParam(':codigo', $codigotemp, PDO::PARAM_STR);
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
}
