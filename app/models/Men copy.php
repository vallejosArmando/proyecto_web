<?php 

class Men{
private $con;
    public function __construct(){
 $this->con=new Base;
    }
    public function listar(){
        $this->con->query('SELECT acc.*, gr.grupo as grupo, op.nombre as nombre ,op.op_url as op_url,  r.rol as rol FROM accesos acc INNER JOIN grupos gr ON acc.id_grupo=gr.id INNER JOIN opciones op ON op.id=acc.id_opcion INNER JOIN roles r ON acc.id_rol=r.id where acc.id_grupo=gr.id and acc.permisos = "a" AND acc.estado=1 ');
        
        
        return $this->con->registros();
        }
    public function listarOpcion(){


$this->con->query("SELECT * FROM opciones op INNER JOIN grupos gr ON  op.id_grupo=gr.id   WHERE   op.estado=1");
return $this->con->registro();

    }
    public function listarPermission($datos){
        $this->con->query("SELECT permisos  FROM accesos WHERE id_opcion=:id AND id_rol=1");
        $this->con->bind(':id',$datos['id']);
        if($this->con->execute()){
            return true;
        }else
        {return false;
        }
    }
    public function listarMenu(){
   $this->con->query("SELECT gr.grupo as grupo FROM grupos gr INNER JOIN accesos acc ON acc.id_grupo=gr.id  WHERE gr.estado=1  and acc.estado = 1  ");
   if($this->con->registros()){
       return true;
   }else{return false;};

    
}public function listarIdgrupo($id){
    $this->con->query("SELECT * FROM accesos WHERE id_grupo=:id AND accesos.permisos='a'");
    $this->con->bind(':id',$id);
    if($this->con->registro()){
        return true;

    }else{
        return false;
    }
}

    public function listarSubmenu(){
$this->con->query("SELECT * FROM opciones op  
        inner join grupos gr on op.id_grupo=gr.id
where  op.id_grupo=1 AND op.estado=1 ");
if($this->con->registros()){
    return true;

}else{
    return false;

    
}}

public function optenerId($id){
    $this->db->query('SELECT *FROM grupos WHERE id=:id');
    $this->db->bind(':id',$id);
    $fila=$this->db->registro();
    return $fila;
  }

  //copy
  public function getMenu(){
    $this->db->query("SELECT * FROM opciones op INNER JOIN grupos gr ON op.id_grupo=gr.id INNER JOIN accesos acc ON op.id=acc.id_opcion  WHERE op.id_grupo=gr.id AND acc.id_grupo=op.id_grupo AND acc.id_grupo=gr.id AND op.mostrar='si'  AND op.estado=1");
    return $this->db->registros();
      }
    public function Grupo(){
    
      $this->db->query('SELECT * FROM grupos WHERE  estado=1');
      if($this->db->registros()){
        return true;
      }else{
        return false;
      }}
    public function opciones(){
      $this->db->query('SELECT id_grupo,id_opcion, (SELECT grupo FROM grupos WHERE id=accesos.id_grupo ) AS grupo, (SELECT nombre FROM opciones WHERE id=accesos.id_opcion) AS nombre FROM accesos ORDER BY accesos.id
      ');
       return $this->db->registros();
    }
    public function optenerIds($id)
    {
     $this->db->query('SELECT * FROM opciones WHERE id_grupo=:id');
     $this->db->bind(':id',$id);
     $fila=$this->db->registro();
     return $fila;
          
    }
}
?>

