<?php 
class Empleado {
    private $con;
    public function __construct(){
  $this->db=new Base;

    }
public function listar(){
  $this->db->query('SELECT *FROM empleados WHERE estado  = 1');
  return $this->db->registros();

}
public function listarArea(){
  $this->db->query('SELECT *FROM areas WHERE estado  = 1');
  return $this->db->registros();

}
public function listarTipo(){
  $this->db->query('SELECT *FROM tipo_empleados WHERE estado  = 1');
  return $this->db->registros();

}
public function optenerId($id)
{
 $this->db->query('SELECT * FROM empleados WHERE id=:id');
 $this->db->bind(':id',$id);
 $fila=$this->db->registro();
 return $fila;
      
}
public function insertar($datos){
  // insertar
   $this->db->query('INSERT INTO empleados (id, id_tipo_empleado, id_area, id_sistema_reclamo, nombres, ap, am, ci, tel_fijo, tel_cel, direccion, fec_insercion, fec_modificacion, usuario, estado) VALUES (null,:id_tipo_empleado, :id_area, 1, :nombres, :ap, :am, :ci,:tel_fijo,:tel_cel,:direccion,now(),now(),1,1)');
   
  
    $this->db->bind(':id_tipo_empleado',$datos['id_tipo_empleado']);
    $this->db->bind(':id_area',$datos['id_area']);
    $this->db->bind(':nombres',$datos['nombres']);
    $this->db->bind(':ap',$datos['ap']);
    $this->db->bind(':am',$datos['am']);
    $this->db->bind(':ci',$datos['ci']);
    $this->db->bind(':tel_fijo',$datos['tel_fijo']);
    $this->db->bind(':tel_cel',$datos['tel_cel']);
    $this->db->bind(':direccion',$datos['direccion']);
    
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }

  


}
public function actualizar($datos){
  // insertar
  $this->db->query('UPDATE empleados SET  id_tipo_empleado=:id_tipo_empleado, id_area=:id_area, nombres=:nombres, ap=:ap, am=:am, ci=:ci, tel_fijo=:tel_fijo, tel_cel=:tel_cel, direccion=:direccion WHERE id=:id');
   
  $this->db->bind(':id',$datos['id']);

  $this->db->bind(':id_tipo_empleado',$datos['id_tipo_empleado']);
  $this->db->bind(':id_area',$datos['id_area']);
  $this->db->bind(':nombres',$datos['nombres']);
  $this->db->bind(':ap',$datos['ap']);
  $this->db->bind(':am',$datos['am']);
  $this->db->bind(':ci',$datos['ci']);
  $this->db->bind(':tel_fijo',$datos['tel_fijo']);
  $this->db->bind(':tel_cel',$datos['tel_cel']);
  $this->db->bind(':direccion',$datos['direccion']);
  
  if($this->db->execute()){
    return true;
  }else{
    return false;
  }

}
public function Eliminar($datos){
$this->db->query("UPDATE empleados SET estado=0  WHERE id=:id ");
$this->db->bind(':id',$datos['id']);
if ($this->db->execute()) {
  return true;
} else {
  return  false;
}

}
}

?>