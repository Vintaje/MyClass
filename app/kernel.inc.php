<?php

class kernel
{
    //-------------------------------------------------------------------------------------- Emilio
    public static function encrypt($param)
    {
        $hash = password_hash($param, PASSWORD_DEFAULT);

        return $hash;
    }
}
