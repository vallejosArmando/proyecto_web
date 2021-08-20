<?php 
class Rol {
    private $db;
    public function __construct(){
  $this->db=new Base;
    }
public function listar(){
$this->db->query("SELECT * FROM roles WHERE estado =1");
return $this->db->registros();
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO `roles`(`id`, `rol`,  `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES (null,:rol ,now(),now(),1,1)');
   

   $this->db->bind(':rol',$datos['rol']);

   if($this->db->execute()){
     return true;

   }else {

  return true;
}
}
public function optenerId($id){
  $this->db->query('SELECT *FROM roles WHERE id=:id');
  $this->db->bind(':id',$id);
  $fila=$this->db->registro();
  return $fila;
}
public function actualizar($datos){
  $this->db->query('UPDATE `roles` SET `rol`=:rol WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':rol',$datos['rol']);

  if($this->db->execute()){
    return true;


  }else{
    return false;
  }

}
public function eliminar($datos){
  $this->db->query('UPDATE roles SET estado=0  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
}
?>