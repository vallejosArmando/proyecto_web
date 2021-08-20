<?php 

class Areas extends Controlador{
private $model;
    public function __construct()
  
    {
        $this->model=$this->modelo('Area');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $areas=$this->model->listar();
        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'areas'=>$areas
        ];
        $this->vista('areas/inicio',$datos);

    }
    public function insertar(){

     $this->vista('areas/agregar');


    }
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        
'nombre'=>trim($_POST['nombre']),
'descripcion'=>trim($_POST['descripcion']),

    ];
if($this->model->insertar($datos)){

    redireccionar('/areas');


}else{
    die('algo sali mal');
}

 }else{
     $datos=[
         'nombre'=>'',
         'descripcion'=>'',
        
     ];
     $this->vista('areas/agregar',$datos);
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
       
           redireccionar('/areas');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $area=$this->model->optenerId($id);

            $datos=[
                'id'=>$area->id,
                'nombre'=>$area->nombre,
                'descripcion'=>$area->descripcion,
            ];
            $this->vista('areas/editar',$datos);
        }
           }
           public function borrar($id){
            $area=$this->model->optenerId($id);

            $datos=[
                'id'=>$area->id,
                'nombre'=>$area->nombre,
                'descripcion'=>$area->descripcion,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/areas');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('areas/borrar',$datos);                        
     
}}
?>