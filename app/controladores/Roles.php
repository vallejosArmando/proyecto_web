<?php 

class Roles extends Controlador{
private $model;
private $grupo;
private $opcion;
    public function __construct()
  
    {
        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        $this->model=$this->modelo('Rol');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $roles=$this->model->listar();
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'roles'=>$roles,
            'grupos'=>$grupo,
            'opciones'=>$opcion
        ];
        $this->vista('roles/inicio',$datos);

    }
 
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        
'rol'=>trim($_POST['rol']),

    ];
if($this->model->insertar($datos)){

    redireccionar('/roles');


}else{
    die('algo sali mal');
}

 }else{
    $grupo=$this->grupo->listar();
    $opcion=$this->opcion->listar();
     $datos=[
         'rol'=>'',
         'grupos'=>$grupo,
         'opciones'=>$opcion
     ];
     $this->vista('roles/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
            'id'=>$id,
       'rol'=>trim($_POST['rol']),
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/roles');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $rol=$this->model->optenerId($id);
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$rol->id,
                'rol'=>$rol->rol,
                'grupos'=>$grupo,
                'opciones'=>$opcion
            ];
            $this->vista('roles/editar',$datos);
        }
           }
           public function borrar($id){
            $rol=$this->model->optenerId($id);
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$rol->id,
                'rol'=>$rol->rol,
                'grupos'=>$grupo,
                'opciones'=>$opcion
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/roles');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('roles/borrar',$datos);                        
     
}}
?>