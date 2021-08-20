<?php 
class Sistema {
    private $db;
    public function __construct(){
  $this->db=new Base;
    }
public function listar(){
$this->db->query("SELECT * FROM sistema_reclamos WHERE estado =1");
return $this->db->registros();
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO `sistema_reclamos`(`id`, `nombre`, `nombre_creador`, `logo`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES (null,:nombre,:nombre_creador,:logo,now(),now(),1,1)');
   

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':nombre_creador',$datos['nombre_creador']);
   $this->db->bind(':logo',$datos['logo']);


   if($this->db->execute()){
     return true;

   }else {

  return true;
}
}
public function optenerId($id){
  $this->db->query('SELECT *FROM sistema_reclamos WHERE id=:id');
  $this->db->bind(':id',$id);
  $fila=$this->db->registro();
  return $fila;
}
public function actualizar($datos){
  $this->db->query('UPDATE `sistema_reclamos` SET `nombre`= :nombre,`nombre_creador`= :nombre_creador,`logo`= :logo  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':nombre',$datos['nombre']);

  $this->db->bind(':nombre_creador',$datos['nombre_creador']);
  $this->db->bind(':logo',$datos['logo']);


  if($this->db->execute()){
    return true;


  }else{
    return false;
  }

}
public function eliminar($datos){
  $this->db->query('UPDATE sistema_reclamos SET estado=0  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
}
?>