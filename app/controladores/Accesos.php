<?php 
class Accesos extends Controlador{
    private $acceso;
    private $grupo;
    private $opcion;
    private $rol;
    private $menu;
    
    public function __construct()
    
    {
        $this->acceso=$this->modelo('Acceso');
        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        $this->rol=$this->modelo('Rol');
        
        
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $acceso= $this->acceso->listar();
        $grupos=$this->grupo->listar();
        $opcion=$this->acceso->listarOpcion();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
        $rol= $this->rol->listar();

$datos=[
    'acceso'=>$acceso,
    'grupos'=>$grupos,
    'opciones'=>$opcion,
    'rol'=>$rol
  

];

        $this->vista('accesos/inicio',$datos);

    }
  
    public function agregar(){
       
 if($_SERVER['REQUEST_METHOD']=='POST'){
$datos=[
'id_opcion'=>trim($_POST['id_opcion']),
'id_rol'=>trim($_POST['id_rol']),
'permisos'=>trim($_POST['permisos']),

];
if($this->acceso->insertar($datos)){

    redireccionar('/accesos');


}else{
    die('Algo salio mal');
}

 }else{
    $opcion=$this->acceso->listarOpcion();
    $rol=$this->acceso->listarRol();
  

     $datos=[
  
        'id'=>'',
        'id_opcion'=>'',
        'id_rol'=>'',
        'permisos'=>'',
        'opcion'=>$opcion,
      
        'rol'=>$rol,
     ];
     $this->vista('accesos/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
               'id'=>$id,
               'id_opcion'=>trim($_POST['id_opcion']),
               'id_rol'=>trim($_POST['id_rol']),
               'permisos'=>trim($_POST['permisos']),
            
       
           ];
       if($this->acceso->actualizar($datos)){
       
           redireccionar('/accesos');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{


            
            $acceso=$this->acceso->optenerId($id);
            $opcion=$this->acceso->listarOpcion();
            $rol=$this->acceso->listarRol();
            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
            $datos=[
                'id'=>$acceso->id,
                'id_grupo'=>$acceso->id_grupo,
                'id_opcion'=>$acceso->id_opcion,
                'id_rol'=>$acceso->id_rol,
                'permisos'=>$acceso->permisos,
                'opcion'=>$opcion,
                'rol'=>$rol, 
                'opciones'=>$opcion,
                'grupos'=>$grupos
            ];
            $this->vista('accesos/editar',$datos);
        }
           }
           public function borrar($id){
            $acceso=$this->acceso->optenerId($id);
            $opcion=$this->acceso->listarOpcion();
            $rol=$this->acceso->listarRol();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$acceso->id,
                'id_opcion'=>$acceso->id_opcion,
                'id_rol'=>$acceso->id_rol,
                'permisos'=>$acceso->permisos,
                'grupos'=>$grupo,
                'opcion'=>$opcion,
                'rol'=>$rol,
                'opciones'=>$opcion,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->acceso->eliminar($datos)){
            
                redireccionar('/accesos');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('accesos/borrar',$datos);                        
     
}public function permisos(){
           
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $datos=[
    'id_opcion'=>trim($_POST['id_opcion']),
    'id_rol'=>trim($_POST['id_rol']),
    'permisos'=>trim($_POST['permisos']),
    'id_grupo'=>trim($_POST['id_grupo']),

    
    ];
    if($this->acceso->insertar($datos)){
    
        redireccionar('/accesos');
    
    
    }else{
        die('Algo salio mal');
    }
    
     }else{
        $opcion=$this->acceso->listarOpcion();
        $rol=$this->acceso->listarRol();
        $permisos=$this->acceso->permisos();
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
    
      
         $datos=[
      
            'id'=>'',
            'id_opcion'=>'',
            'id_rol'=>'',
            'permisos'=>'',
      
            'rol'=>$rol,
            'permisos'=>$permisos,
            'grupos'=>$grupo,
            'opciones'=>$opcion
         ];
         $this->vista('accesos/agregar',$datos);
     }
}


}
?>