<?php
class Usuario

//Atributos

{
    private $codigo;
    private $password;
    private $correo;
    private $nombre_completo;
    private $sexo;
    private $familia_prof;
    private $fecha_reg;
    private $edad;
    private $dni;
    private $avatar;

//constructor

    public function __construct($correo, $nombre_completo, $codigo, $password, $sexo, $familia_prof, $fecha_reg, $edad, $dni, $avatar)
    {
        $this->correo = $correo;
        $this->nombre_completo = $nombre_completo;
        $this->codigo = $codigo;
        $this->password = $password;
        $this->familia_prof = $familia_prof;
        $this->edad = $edad;
        $this->dni = $dni;
        $this->avatar = $avatar;
        $this->sexo = $sexo;
        $this->fecha_reg = $fecha_reg;
    }

//getter && setter

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getFamiliaProf()
    {
        return $this->familia_prof;
    }
    public function getFechaReg()
    {
        return $this->fecha_reg;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }



    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setNombreCompleto($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setFamiliaProf($familia_prof)
    {
        $this->familia_prof = $familia_prof;
    }
    public function setFechaReg($fecha_reg)
    {
        $this->fecha_reg = $fecha_reg;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }








}
