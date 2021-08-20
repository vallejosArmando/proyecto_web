<?php 

class Tipos extends Controlador{
private $model;
    public function __construct()
  
    {
        $this->model=$this->modelo('Tipo');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $tipos=$this->model->listar();
        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'tipos'=>$tipos
        ];
        $this->vista('tipos/inicio',$datos);

    }
    public function insertar(){

     $this->vista('tipos/agregar');


    }
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        
'nombre'=>trim($_POST['nombre']),
'descripcion'=>trim($_POST['descripcion']),

    ];
if($this->model->insertar($datos)){

    redireccionar('/tipos');


}else{
    die('algo sali mal');
}

 }else{
     $datos=[
         'nombre'=>'',
         'descripcion'=>'',
        
     ];
     $this->vista('tipos/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
            'id'=>$id,
       'nombre'=>trim($_POST['nombre']),
       'descripcion'=>trim($_POST['descripcion']),
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/tipos');
       
       
       }else{
           die('algo sali mal');
       }
       
        }else{
            $tipo=$this->model->optenerId($id);

            $datos=[
                'id'=>$tipo->id,
                'nombre'=>$tipo->nombre,
                'descripcion'=>$tipo->descripcion,
            ];
            $this->vista('tipos/editar',$datos);
        }
           }
           public function borrar($id){
            $tipo=$this->model->optenerId($id);

            $datos=[
                'id'=>$tipo->id,
                'nombre'=>$tipo->nombre,
                'descripcion'=>$tipo->descripcion,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/tipos');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('tipos/borrar',$datos);                        
     
}}
?>