<?php

class ControlSesion
{

    public static function IniciarSesion($cod_usuario, $nombre_usuario)
    {
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['name_usuario'] = $cod_usuario;
        $_SESSION['codigo_user'] = $nombre_usuario;
    }


    public static function CerrarSesion()
    {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['name_usuario'])) {
            unset($_SESSION['name_usuario']);
        }
        if (isset($_SESSION['codigo_user'])) {
            unset($_SESSION['codigo_user']);
        }
        session_destroy();
    }

    public static function SesionIniciada()
    {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['name_usuario']) && ($_SESSION['codigo_user'])) {
            return true;
        } else {
            return false;
        }
    }
}
