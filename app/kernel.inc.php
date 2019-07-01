<?php

class kernel{

    public static function encrypt($param){
        $salt = "MyClassCEOS++_??*";

        $encrypted = hash('sha256',$salt.$param);

        return $encrypted;
    }
}