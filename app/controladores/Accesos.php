<?php 

class Accesos extends Controlador{
public $model;
public $grupo;
public $opcion;
public $rol;
public $menu;

    public function __construct()
  
    {
        $this->model=$this->modelo('Acceso');
        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        $this->rol=$this->modelo('Rol');
        $this->menu=$this->modelo('Menu');

  
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $this->model->listar();
        $this->grupo->listar();
        $this->opcion->listar();
        $this->rol->listar();


        $this->vista('accesos/inicio');

    }
  
    public function agregar(){
       
 if($_SERVER['REQUEST_METHOD']=='POST'){
$datos=[
'id_opcion'=>trim($_POST['id_opcion']),
'id_rol'=>trim($_POST['id_rol']),
'permisos'=>trim($_POST['permisos']),

];
if($this->model->insertar($datos)){

    redireccionar('/accesos');


}else{
    die('Algo salio mal');
}

 }else{
    $opcion=$this->model->listarOpcion();
    $rol=$this->model->listarRol();

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
       if($this->model->actualizar($datos)){
       
           redireccionar('/accesos');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{


            
            $acceso=$this->model->optenerId($id);
            $opcion=$this->model->listarOpcion();
            $rol=$this->model->listarRol();
            $grupos=$this->grupo->listar();
            $opciones=$this->opcion->listar();
            $datos=[
                'id'=>$acceso->id,
                'id_grupo'=>$acceso->id_grupo,
                'id_opcion'=>$acceso->id_opcion,
                'id_rol'=>$acceso->id_rol,
                'permisos'=>$acceso->permisos,
                'opcion'=>$opcion,
                'rol'=>$rol, 
                'opciones'=>$opcion,
            ];
            $this->vista('accesos/editar',$datos);
        }
           }
           public function borrar($id){
            $acceso=$this->model->optenerId($id);
            $opcion=$this->model->listarOpcion();
            $rol=$this->model->listarRol();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$acceso->id,
                'id_opcion'=>$acceso->id_opcion,
                'id_rol'=>$acceso->id_rol,
                'permisos'=>$acceso->permisos,
                'grupo'=>$grupo,
                'opcion'=>$opcion,
                'rol'=>$rol,
                'opciones'=>$opcion,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
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
    
    ];
    if($this->model->insertar($datos)){
    
        redireccionar('/accesos');
    
    
    }else{
        die('Algo salio mal');
    }
    
     }else{
        $opcion=$this->model->listarOpcion();
        $rol=$this->model->listarRol();
        $permisos=$this->model->permisos();
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