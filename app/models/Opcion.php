<?php 
class Opcion {
    private $db;
    public function __construct(){
  $this->db=new Base;
    }
public function listar(){
$this->db->query('SELECT op.*, gr.grupo as grupo  FROM opciones op INNER JOIN grupos gr ON op.id_grupo=gr.id WHERE  op.estado=1 
');
return $this->db->registros();
}
public function opcion($id_grupo){ 
  ///get the sub menu id 
  $this->db->query("SELECT * FROM opciones op INNER JOIN accesos acc ON acc.id_opcion=op.id INNER JOIN grupos gr ON op.id_grupo=gr.id and op.id_grupo=:id_grupo ");
  $this->db->bind(':id_grupo',$id_grupo);

  return $this->db->registros();
  
}
public function listarGrupo(){
    $this->db->query("SELECT * FROM grupos WHERE estado =1");
    return $this->db->registros();
    }
public function insertar($datos){
  // insertar
  
  $this->db->query('INSERT INTO opciones(id, id_grupo, nombre, op_url,mostrar,orden, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_grupo,:nombre,:op_url, :mostrar, :orden ,now(),now(),1,1)');
  $this->db->bind(':id_grupo',$datos['id_grupo']);

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':op_url',$datos['op_url']);
   $this->db->bind(':mostrar',$datos['mostrar']);
   $this->db->bind(':orden',$datos['orden']);

   if($this->db->execute()){
     return true;

   }else {

  return true;
}
}
public function optenerId($id){
  $this->db->query('SELECT *FROM opciones WHERE id=:id');
  $this->db->bind(':id',$id);
  $fila=$this->db->registro();
  return $fila;
}
public function actualizar($datos){
  $this->db->query('UPDATE opciones SET id_grupo=:id_grupo,nombre=:nombre,op_url=:op_url ,mostrar=:mostrar , orden=:orden WHERE id=:id ' );
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_grupo',$datos['id_grupo']);

   $this->db->bind(':nombre',$datos['nombre']);

   $this->db->bind(':op_url',$datos['op_url']);
   $this->db->bind(':mostrar',$datos['mostrar']);
   $this->db->bind(':orden',$datos['orden']);

  if($this->db->execute()){
    return true;


  }else{
    return false;
  }

}
public function eliminar($datos){
  $this->db->query('UPDATE opciones SET estado=0  WHERE id=:id ' );

  $this->db->bind(':id',$datos['id']);

  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}

}
?>