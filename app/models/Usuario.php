<?php 

class Usuario  {
private $db;
    public function __construct() {
$this->db=new Base;
    }
    public function login($datos){
        $this->db->query(" SELECT us.id as id_usuario, us.nom_usuario as nom_usuario, us.clave as clave, r.id as id_rol, r.rol as rol FROM usuario_roles usr INNER JOIN roles r ON usr.id_rol = r.id INNER JOIN usuarios us on us.id=usr.id_usuario WHERE nom_usuario=:nom_usuario AND clave=:pass");
        $this->db->bind(':nom_usuario',$datos['nom_usuario']);
        $this->db->bind(':pass',md5($datos['clave']));
        $this->db->execute();
        if ($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }

    }

   

public function listar(){

$this->db->query('SELECT us.*, p.nombres as nombres FROM usuarios us INNER JOIN personas p ON us.id_persona=p.id WHERE us.estado=1
');
return $this->db->registros();

}
public function listarPersona(){
    $this->db->query('SELECT * FROM personas WHERE estado = 1');
    return $this->db->registros();

}

public function optenerId($id){
    $this->db->query('SELECT * FROM usuarios WHERE estado =1 AND id=:id');
    $this->db->bind(':id',$id);
    $fila=$this->db->registro();
    return $fila;

}
public function insertar($datos){
    $this->db->query('INSERT INTO `usuarios`(`id`, `id_persona`, `nom_usuario`, `clave`, `fec_insercion`, `fec_modificacion`, `usuario`, `estado`) VALUES (null,:id_persona,:nom_usuario,:clave,now(),now(),1,1)');
    $this->db->bind(':id_persona',$datos['id_persona']);
$this->db->bind(':nom_usuario',$datos['nom_usuario']);
$this->db->bind(':clave',$datos['clave']);
if($this->db->execute()){
    return true;
}else{
    return false;
}
}
public function actualizar($datos){
    $this->db->query('UPDATE usuarios SET  id_persona=:id_persona, nom_usuario=:nom_usuario, clave=:clave WHERE id=:id ');
    $this->db->bind(':id',$datos['id']);
    $this->db->bind(':id_persona',$datos['id_persona']);
$this->db->bind(':nom_usuario',$datos['nom_usuario']);
$this->db->bind(':clave',$datos['clave']);
if($this->db->execute()){
    return true;
}else{
    return false;
}

}
public function eliminar($datos){
    $this->db->query('UPDATE usuarios SET  estado=0 WHERE id=:id ');
    $this->db->bind(':id',$datos['id']);
  
if($this->db->execute()){
    return true;
}else{
    return false;
}


}

}



?>