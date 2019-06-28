<?php


class Grupo {
    private $codigo;
    private $nombre;
    private $capacidad;
    private $owner;

//
//Constructor
//
public function __construct($codigo, $nombre, $capacidad, $owner){
    $this -> codigo = $codigo;
    $this -> nombre = $nombre;
    $this -> capacidad = $capacidad;
    $this -> owner = $owner;
}

//
//Getters
//
public function getCodigo(){
    return $this -> codigo;
}
public function getNombre(){
    return $this -> nombre;
}
public function getCapacidad(){
    return $this -> capacidad;
}
public function getOwner(){
    return $this -> owner;
}

//
//Setters
//
public function setNombre($nombre){
    $this -> nombre = $nombre;
}
public function setCapacidad($capacidad){
    $this -> capacidad = $capacidad;
}
public function setOwner($owner){
    $this -> owner = $owner;
}