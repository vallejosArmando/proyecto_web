<?php 

class Empleados extends Controlador{
private $model;
private $modelA;
private $modelT;
    public function __construct()
  
    {
        $this->model=$this->modelo('Empleado');
        $this->modelArea=$this->modelo('Area');
        $this->modelTipo=$this->modelo('Tipo');

        //echo 'pagina controlador cargada';
    }
    public function index(){
        $empleado=$this->model->listar();
        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'empleado'=>$empleado
        ];
        $this->vista('empleados/inicio',$datos);

    }
  
    public function agregar(){
       
 if($_SERVER['REQUEST_METHOD']=='POST'){
$datos=[
'id'=>trim($_POST['id']),
'id_area'=>trim($_POST['id_area']),
'nombres'=>trim($_POST['nombres']),
'ap'=>trim($_POST['ap']),
'am'=>trim($_POST['am']),
'ci'=>trim($_POST['ci']),
'tel_fijo'=>trim($_POST['tel_fijo']),
'tel_cel' =>trim( $_POST['tel_cel']),
'direccion'=>trim($_POST['direccion']),

];
if($this->model->insertar($datos)){

    redireccionar('/empleados');


}else{
    die('Algo salio mal');
}

 }else{
    $area=$this->model->listarArea();
    $tipo=$this->model->listarTipo();

  
     $datos=[
  
        'id'=>'',
        'id_area'=>'',
        'nombres'=>'',
        'ap'=>'',
        'am'=>'',
        'ci'=>'',
        'tel_fijo'=>'',
        'tel_cel'=>'',
        'direccion'=>'',
        'tipo'=>$tipo,
        'area'=>$area,
        
     ];
     $this->vista('empleados/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
               'id_empleado'=>$id,
            'id'=>trim($_POST['id']),
            'id_area'=>trim($_POST['id_area']),
            'nombres'=>trim($_POST['nombres']),
            'ap'=>trim($_POST['ap']),
            'am'=>trim($_POST['am']),
            'ci'=>trim($_POST['ci']),
            'tel_fijo'=>trim($_POST['tel_fijo']),
            'tel_cel' =>trim( $_POST['tel_cel']),
            'direccion'=>trim($_POST['direccion']),
            
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/empleados');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{


            
            $empleado=$this->model->optenerId($id);
            $area=$this->model->listarArea();
            $tipo=$this->model->listarTipo();
            $datos=[
                'id_empleado'=>$empleado->id_empleado,
                 'id'=>$empleado->id,
                'id_area'=>$empleado->id_area,
                'nombres'=>$empleado->nombres,
                'ap'=>$empleado->ap,
                'am'=>$empleado->am,
                'ci'=>$empleado->ci,
                'tel_fijo'=>$empleado->tel_fijo,
                'tel_cel' =>$empleado->tel_cel,
                'direccion'=>$empleado->direccion,
                'tipo'=>$tipo,
                'area'=>$area,
            ];
            $this->vista('empleados/editar',$datos);
        }
           }
           public function borrar($id){
            $empleado=$this->model->optenerId($id);
            $area=$this->model->listarArea();
            $tipo=$this->model->listarTipo();
            $datos=[
                'id_empleado'=>$empleado->id_empleado,
                'id'=>$empleado->id,
               'id_area'=>$empleado->id_area,
               'nombres'=>$empleado->nombres,
               'ap'=>$empleado->ap,
               'am'=>$empleado->am,
               'ci'=>$empleado->ci,
               'tel_fijo'=>$empleado->tel_fijo,
               'tel_cel' =>$empleado->tel_cel,
               'direccion'=>$empleado->direccion,
               'tipo'=>$tipo,
               'area'=>$area,
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id_empleado'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/empleados');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('empleados/borrar',$datos);                        
     
}}
?>