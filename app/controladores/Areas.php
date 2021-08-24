<?php 

class Areas extends Controlador{
private $model;
    public function __construct()
  
    {
        $this->model=$this->modelo('Area');

        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        //echo 'pagina controlador cargada';
    }
    public function index(){


        $area=$this->model->listar();
        $opcion=$this->opcion->listar();


    $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
    $datos=[
        'area'=>$area,
        'opciones'=>$opcion,
        'grupos'=>$grupos
    ];
        $this->vista('areas/inicio',$datos);

    }
    public function insertar(){

        $area=$this->model->listar();
        $opcion=$this->opcion->listar();


    $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
    $datos=[
        'area'=>$area,
        'opciones'=>$opcion,
        'grupos'=>$grupos
    ];
        $this->vista('areas/agregar',$datos);


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
            $opcion=$this->opcion->listar();

            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
            $datos=[
                'id'=>$area->id,
                'nombre'=>$area->nombre,
                'descripcion'=>$area->descripcion,
                'opciones'=>$opcion,
                'grupos'=>$grupos
            ];
            $this->vista('areas/editar',$datos);
        }
           }
           public function borrar($id){
            $area=$this->model->optenerId($id);
            $opcion=$this->opcion->listar();

            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
            $datos=[
                'id'=>$area->id,
                'nombre'=>$area->nombre,
                'descripcion'=>$area->descripcion,
                'opciones'=>$opcion,
                'grupos'=>$grupos
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