<?php

    class Tarea{
        private $codigo;
        private $cod_grupo;
        private $title_tarea;
        private $body_tarea;
        private $fecha_entrega;

        /*Estructura de la clase*/

        public function __construct($codigo, $cod_grupo, $title_tarea, $body_tarea,
        $fecha_entrega){
            $this -> codigo = $codigo;
            $this -> cod_grupo = $cod_grupo; 
            $this -> title_tarea = $title_tarea;
            $this -> body_tarea = $body_tarea;
            $this -> fecha_entrega = $fecha_entrega; 
        }

        /* Getters & Setters */

        //El código del grupo y de la tarea solo tienen Getter
        public function getCodigo(){
            return $this -> codigo; 
        }

        public function getCodGrupo(){
            return $this -> cod_grupo; 
        }

        public function getTitle(){
            return $this -> title_tarea; 
        }

        public function setTitle($title_tarea){
            $this -> title_tarea = $title_tarea; 
        }

        public function getBody(){
            return $this -> body_tarea; 
        }

        public function setBody($body_tarea){
            $this -> body_tarea = $body_tarea; 
        }

        public function getFechaEntrega(){
            return $this -> fecha_entrega; 
        }

        public function setFechaEntrega($fecha_entrega){
            $this -> fecha_entrega = $fecha_entrega; 
        }
    }