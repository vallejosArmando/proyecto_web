<?php 
class Fichapersona {
    private $db;
    public function __construct() {
$this->db=new Base;
    }
    public function listarNombre(){

        $this->db->query("SELECT nombres FROM personas WHERE estado=1 ");
        if($fila=$this->db->registros()){
            return $fila;
        }else{
            return false;
        };


    }
    public function listarAp(){
        $this->db->query("SELECT ap FROM personas WHERE estado=1 ");
        if($fila=$this->db->registros()){
            return $fila;
        }else{
            return false;
        };

    }
    public function listarAm(){
        $this->db->query("SELECT am FROM personas WHERE estado=1 ");
        if($fila=$this->db->registros()){
            return $fila;
        }else{
            return false;
        };

    }
    
}
?>