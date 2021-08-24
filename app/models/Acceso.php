<?php 
class Acceso {
    private $db;
    public function __construct(){
  $this->db=new Base;

    }
public function listar(){
  //$this->db->query('SELECT *FROM accesos //WHERE estado  = 1');
 // return $this->db->registros();
 $this->db->query("SELECT * FROM accesos acc  INNER JOIN opciones op ON op.id=acc.id_opcion INNER JOIN roles r ON acc.id_rol=r.id and op.mostrar='si' and acc.permisos = 'a' AND acc.estado=1 ");
 return $this->db->registros();

}

public function listarGrupo(){
  $this->db->query('SELECT *FROM grupos WHERE estado  = 1');
  return $this->db->registros();

}
public function listarOpcion(){
  $this->db->query('SELECT *FROM opciones WHERE estado  = 1');
  return $this->db->registros();

}
public function listarRol(){
  $this->db->query('SELECT *FROM roles WHERE estado  = 1');
  return $this->db->registros();

}
public function optenerId($id)
{
 $this->db->query('SELECT * FROM accesos WHERE id=:id');
 $this->db->bind(':id',$id);
 $fila=$this->db->registro();
 return $fila;
      
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO accesos(id, id_grupo, id_opcion, id_rol, permisos, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_grupo,:id_opcion,:id_rol,:permisos,now(),now(),1,1)');
   
  
    $this->db->bind(':id_grupo',$datos['id_grupo']);
    $this->db->bind(':id_opcion',$datos['id_opcion']);
    $this->db->bind(':id_rol',$datos['id_rol']);
    $this->db->bind('permisos',$datos['permisos']);
 
    
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }

  


}
public function actualizar($datos){
  // insertar
  $this->db->query('UPDATE accesos SET  id_grupo=:id_grupo, id_opcion=:id_opcion, id_rol=:id_rol, permisos=:permisos WHERE id=:id');
   
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_grupo',$datos['id_grupo']);
  $this->db->bind(':id_opcion',$datos['id_opcion']);
  $this->db->bind(':id_rol',$datos['id_rol']);
  $this->db->bind(':permisos',$datos['permisos']);

  
  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
public function Eliminar($datos){
  $this->db->query('UPDATE accesos SET estado=0 WHERE id=:id');
  $this->db->bind(':id',$datos['id']);
  if($this->db->execute()){
    return true;

  }else{
    return false;
  }

}
public function permisos($datos){
  $this->db->query('SELECT permisos FROM accesos WHERE id_opcion=:id_opcion AND id_rol=:id_rol');
  $this->db->bind(':id_opcion',$datos['id_opcion']);
  $this->db->bind(':id_rol',$datos['id_rol']);
    
  if($this->db->execute()){
    return true;
  }else{
    return false;
  }
}
public function accesos($id_opcion,$id_rol){
  $this->db->query("SELECT  * FROM accesos acc INNER JOIN opciones op ON acc.id_opcion=op.id INNER JOIN roles r ON acc.id_rol=r.id WHERE acc.permisos='a' AND op.mostrar='si' AND acc.id_opcion=:id_opcion AND acc.id_rol=:id ");
  $this->db->bind(':id_opcion',$id_opcion);
  $this->db->bind(':id',$id_rol);
  return $this->db->registros();

}
public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opciones op INNER JOIN accesos acc ON op.id=acc.id_opcion INNER JOIN grupos gr ON op.id_grupo=gr.id WHERE op.id_grupo=:id_grupo and acc.permisos='a' ");
  $this->db->bind(':id_grupo',$id_grupo);

    
   return $this->db->registros();
}
}
?>