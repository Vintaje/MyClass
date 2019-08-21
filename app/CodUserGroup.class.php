<?php



class CodUserGroup{
    private $cod_user;
    private $cod_group;


    public function __construct($cod_user,$cod_group)
    {
       $this->cod_user = $cod_user;
       $this->cod_group = $cod_group;

    }
    
    public function getCodigoUser()
    {
        return $this->cod_user;
    }
    public function getCodigoGrupo()
    {
        return $this->cod_group;
    }
}