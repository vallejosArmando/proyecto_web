<?php 
 class Menu{
private $db;
  public function __construct(){

$this->db= new Base;
  }

public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * from opciones op INNER JOIN grupos gr ON op.id_grupo=gr.id WHERE op.id_grupo=:id_grupo  ");
  $this->db->bind(':id_grupo',$id_grupo);

  return $this->db->registros();
  
}
public function opcionContar($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * from opciones op INNER JOIN grupos gr ON op.id_grupo=:id_grupo  ");
  $this->db->bind(':id_grupo',$id_grupo);

  return $this->db->rowCount();
  
}

  public function permiso($id_opcion){
  ///check menu access
  $this->db->query("SELECT permisos FROM accesos WHERE id_opcion=:id_opcion AND id_rol=1");
  $this->db->bind(':id_opcion',$id_opcion);
  return $this->db->registros();
  
  }
  public function grupo(){
  $this->db->query("SELECT *FROM grupos WHERE estado=1");
  return $this->db->registros();
  }
  public function acceso(){
    $this->db->query("SELECT gr.grupo as grupo, op.op_url as op_url, op.nombre as nombre FROM accesos acc INNER JOIN grupos gr ON gr.id=acc.id_grupo INNER JOIN opciones op ON acc.id_opcion=op.id WHERE op.id_grupo=acc.id_grupo ORDER BY gr.id");
    return $this->db->registros();

  }
  public function opciones($id_grupo){
    
  $this->db->query("SELECT * FROM opciones 
  inner join accesos on accesos.id_opcion=opciones.id
where opciones.estado='1' AND opciones.id_grupo=:id_grupo AND opciones.mostrar='si' AND accesos.permisos='a' AND accesos.id_rol=1 order by orden asc");
$this->db->bind(':id_grupo',$id_grupo);
return  $this->db->registros();

  }}
  
  ?>
  