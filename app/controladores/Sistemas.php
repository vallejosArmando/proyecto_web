<?php 

class Sistemas extends Controlador{
private $model;
    public function __construct()
  
    {
        $this->model=$this->modelo('Sistema');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $sistemas=$this->model->listar();
        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'sistemas'=>$sistemas
        ];
        $this->vista('sistemas/inicio',$datos);

    }
    public function insertar(){

        $this->vista('sistemas/agregar');
   
   
       }
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        
'nombre'=>trim($_POST['nombre']),
'nombre_creador'=>trim($_POST['nombre_creador']),
        
'logo'=>trim($_POST['logo']),

    ];
if($this->model->insertar($datos)){

    redireccionar('/sistemas');


}else{
    die('algo sali mal');
}

 }else{
     $datos=[
         'nombre'=>'',
         'nombre_creador'=>'',
         'logo'=>'',
        
     ];
     $this->vista('sistemas/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
            'id'=>$id,
       'nombre'=>trim($_POST['nombre']),
       'nombre_creador'=>trim($_POST['nombre_creador']),
       'logo'=>trim($_POST['logo']),

       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/sistemas');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $sistema=$this->model->optenerId($id);

            $datos=[
                'id'=>$sistema->id,
                'nombre'=>$sistema->nombre,
                'nombre_creador'=>$sistema->nombre_creador,
                'logo'=>$sistema->logo,

            ];
            $this->vista('sistemas/editar',$datos);
        }
           }
           public function borrar($id){
            $sistema=$this->model->optenerId($id);

            $datos=[
                'id'=>$sistema->id,
                'nombre'=>$sistema->nombre,
                'nombre_creador'=>$sistema->nombre_creador,
                'logo'=>$sistema->logo,

            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/sistemas');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('sistemas/borrar',$datos);                        
     
}}
?>