<?php

class noticias
{
    public $agregador;
    public $familia_prof;


    public function __construct($agregador, $familia_prof)
    {
        $this->agregador = $agregador;
        $this->familia_prof = $familia_prof;
    }


    public function getAgregador()
    {
        return $this->agregador;
    }

    public function setTitle($agregador)
    {
        $this->agregador = $agregador;
    }

    public function getFamilia()
    {
        return $this->familia_prof;
    }

    public function setFamilia($familia_prof)
    {
        $this->familia_prof = $familia_prof;
    }
}
