

<?php
 class Menu{
private $db;

  public function __construct(){
$this->db= new Base;

  }

public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opciones op INNER JOIN accesos acc ON acc.id_opcion=op.id INNER JOIN grupos gr ON op.id_grupo=gr.id and op.id_grupo=:id_grupo ");
  $this->db->bind(':id_grupo',$id_grupo);

  return $this->db->registros();
  
}
public function opcionMenu($id_grupo){ 
  ///get the sub menu id 

  $this->db->query("SELECT * FROM opciones op
  INNER JOIN accesos acc ON acc.id_opcion=op.id INNER JOIN grupos gr ON op.id_grupo=gr.id
where op.estado=1 AND op.id_grupo=:id AND op.mostrar='si' AND acc.permisos='a' order by gr.id ");
  $this->db->bind(':id',$id_grupo);

  return $this->db->registros();
  
}

  public function permiso($id_opcion){
  $this->db->query("SELECT permisos FROM accesos WHERE id_opcion=:id_opcion AND id_rol=1");
  $this->db->bind(':id_opcion',$id_opcion);
  return $this->db->registros();
  
  }
  public function grupo(){
  $this->db->query("SELECT *FROM grupos WHERE estado=1");
  return $this->db->registros();
  }
  public function acceso($id_opcion,$id_rol){
    $this->db->query("SELECT  * FROM accesos acc INNER JOIN opciones op ON acc.id_opcion=op.id INNER JOIN roles r ON acc.id_rol=r.id WHERE acc.permisos='a' AND op.mostrar='si' AND acc.id_opcion=:id_opcion AND acc.id_rol=:id ");
    $this->db->bind(':id_opcion',$id_opcion);
    $this->db->bind(':id',$id_rol);
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
  