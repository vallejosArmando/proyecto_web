<?php 

class Grupos extends Controlador{
private $model;
private $grupo;
private $opcion;
    public function __construct()
  
    {
        $this->opcion=$this->modelo('Opcion');
        $this->model=$this->modelo('Grupo');
        //echo 'pagina contgrupoador cargada';
    }
    public function index(){
        $grupos=$this->model->listar();
        $opcion=$this->opcion->listar();

        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'grupos'=>$grupos,
            'opciones'=>$opcion,
        ];
        $this->vista('grupos/inicio',$datos);



    }
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        
'grupo'=>trim($_POST['grupo']),
'icono'=>trim($_POST['icono']),


    ];
if($this->model->insertar($datos)){

    redireccionar('/grupos');


}else{
    die('algo sali mal');
}

 }else{
    $grupos=$this->model->listar();
    $opcion=$this->opcion->listar();
     $datos=[
         'grupo'=>'',
         'icono'=>'',
         'grupos'=>$grupos,
         'opciones'=>$opcion,
     ];
     $this->vista('grupos/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
            'id'=>$id,
       'grupo'=>trim($_POST['grupo']),
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/grupos');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $grupo=$this->model->optenerId($id);
            $grupos=$this->model->listar();
            $opcion=$this->opcion->listar();

            $datos=[
                'id'=>$grupo->id,
                'grupo'=>$grupo->grupo,
                
                'grupos'=>$grupos,
                'opciones'=>$opcion,
                
            ];
            $this->vista('grupos/editar',$datos);
        }
           }
           public function borrar($id){
            $grupo=$this->model->optenerId($id);
            $grupos=$this->model->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$grupo->id,
                'grupo'=>$grupo->grupo,
                'grupos'=>$grupos,
                'opciones'=>$opcion,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/grupos');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('grupos/borrar',$datos);                        
     
}}
