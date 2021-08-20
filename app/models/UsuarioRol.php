<?php 
class UsuarioRol {
    private $db;
    public function __construct(){
  $this->db=new Base;

    }
public function listar(){
  $this->db->query('SELECT usr.*, us.nom_usuario as nom_usuario, r.rol as rol FROM usuario_roles usr INNER JOIN usuarios us ON usr.id_usuario= us.id INNER JOIN roles r ON  usr.id_rol= r.id WHERE usr.estado=1');
  return $this->db->registros();

}
public function listarUsuario(){
  $this->db->query('SELECT *FROM usuarios WHERE estado  = 1');
  return $this->db->registros();

}
public function listarRol(){
  $this->db->query('SELECT *FROM roles WHERE estado  = 1');
  return $this->db->registros();

}
public function optenerId($id)
{
 $this->db->query('SELECT * FROM usuario_roles WHERE id=:id');
 $this->db->bind(':id',$id);
 $fila=$this->db->registro();
 return $fila;
      
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO usuario_roles (id, id_usuario, id_rol,fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_usuario, :id_rol, now(),now(),1,1)');
   
      $this->db->bind(':id_usuario',$datos['id_usuario']);
    $this->db->bind(':id_rol',$datos['id_rol']);
  
    
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }

  


}
public function actualizar($datos){
  // insertar
  $this->db->query('UPDATE usuario_roles SET  id_usuario=:id_usuario, id_rol=:id_rol WHERE id=:id');
   
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_usuario',$datos['id_usuario']);
  $this->db->bind(':id_rol',$datos['id_rol']);
  
  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
public function Eliminar($datos){
    $this->db->query('UPDATE usuario_roles SET estado=0 WHERE id=:id');
   
    $this->db->bind(':id',$datos['id']);
  
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }
}
}

?>