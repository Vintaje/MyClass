<?php

class Grupo
{
    private $codigo;
    private $nombre;
    private $capacidad;
    private $owner;
    private $privado;
    private $tematica;
    private $descripcion;

    //
    //  Constructor
    //
    public function __construct($codigo, $nombre, $capacidad, $owner, $privado, $tematica, $descripcion)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
        $this->owner = $owner;
        $this->privado = $privado;
        $this->tematica = $tematica;
        $this->descripcion = $descripcion;
    }

    //
    //  Getters
    //
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCapacidad()
    {
        return $this->capacidad;
    }
    public function getOwner()
    {
        return $this->owner;
    }
    public function getPrivacidad()
    {
        return $this->privado;
    }
    public function getTematica()
    {
        return $this->tematica;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    //
    //Setters
    //
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }
    public function setPrivacidad($privado)
    {
        $this->privado = $privado;
    }
    public function setTematica($tematica)
    {
        $this->tematica = $tematica;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    
}
