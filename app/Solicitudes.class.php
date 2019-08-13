<?php
class Solicitudes

//Atributos

{
    private $id;
    private $user1;
    private $user2;
    private $estado;

    //constructor

    public function __construct($id, $user1, $user2, $estado)
    {
        $this->id = $id;
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->estado = $estado;
    }


    //getter && setter

    public function getId()
    {
        return $this->id;
    }
    public function getUser1()
    {
        return $this->user1;
    }
    public function getUser2()
    {
        return $this->user2;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    


    public function setUser1($user1)
    {
        $this->user1 = $user1;
    }
    public function setUser2($user2)
    {
        $this->user2 = $user2;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
   
}
