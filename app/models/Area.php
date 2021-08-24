<?php 
class Area {
    private $db;
    public function __construct(){
  $this->db=new Base;
    }
public function listar(){
$this->db->query("SELECT * FROM areas WHERE estado =1");
return $this->db->registros();
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO areas(id, id_sistema, nombre, descripcion, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,1,:nombre,:descripcion,now(),now(),1,1)');
   

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':descripcion',$datos['descripcion']);

   if($this->db->execute()){
     return true;

   }else {

  return true;
}
}
public function optenerId($id){
  $this->db->query('SELECT *FROM areas WHERE id=:id');
  $this->db->bind(':id',$id);
  $fila=$this->db->registro();
  return $fila;
}
public function actualizar($datos){
  $this->db->query('UPDATE areas SET nombre=:nombre, descripcion=:descripcion WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':nombre',$datos['nombre']);

  $this->db->bind(':descripcion',$datos['descripcion']);

  if($this->db->execute()){
    return true;


  }else{
    return false;
  }

}
public function eliminar($datos){
  $this->db->query('UPDATE areas SET estado=0  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
}
?>