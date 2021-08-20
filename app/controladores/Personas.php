<?php 

class Personas extends Controlador{
private $model;
private $grupo;
private $opcion;
private $men;
    public function __construct()
  
    {
        $this->model=$this->modelo('Persona');
        $this->men = $this->modelo('Men');

        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $persona=$this->model->listar();
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $dato=$this->men->listar();

        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'persona'=>$persona,
        
            'datos'=>$dato,
        ];
        $this->vista('personas/inicio',$datos);

    }
  
    public function agregar(){
       
 if($_SERVER['REQUEST_METHOD']=='POST'){
$datos=[
'ci'=>trim($_POST['ci']),
'nombres'=>trim($_POST['nombres']),
'ap'=>trim($_POST['ap']),
'am'=>trim($_POST['am']),
'telefono'=>trim($_POST['telefono']),
'direccion' =>trim( $_POST['direccion']),
'genero'=>trim($_POST['genero']),

];
if($this->model->insertar($datos)){

    redireccionar('/personas');


}else{
    die('Algo salio mal');
}

 }else{
    $grupo=$this->grupo->listar();
    $opcion=$this->opcion->listar();
     $datos=[
  
        'ci'=>'',
        'nombres'=>'',
        'ap'=>'',
        'am'=>'',
        'telefono'=>'',
        'direccion'=>'',
        'genero'=>'',
        'grupos'=>$grupo,
        'opciones'=>$opcion
        
     ];
     $this->vista('personas/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
               'id'=>$id,
               'ci'=>trim($_POST['ci']),
               'nombres'=>trim($_POST['nombres']),
               'ap'=>trim($_POST['ap']),
               'am'=>trim($_POST['am']),
               'telefono'=>trim($_POST['telefono']),
               'direccion' =>trim( $_POST['direccion']),
               'genero'=>trim($_POST['genero']),
            
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/personas');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{


            
            $persona=$this->model->optenerId($id);
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$persona->id,
                'ci'=>$persona->ci,
                'nombres'=>$persona->nombres,
                'ap'=>$persona->ap,
                'am'=>$persona->am,
                'telefono'=>$persona->telefono,
                'direccion' =>$persona->direccion,
                'genero'=>$persona->genero,
                'grupos'=>$grupo,
                'opciones'=>$opcion
            ];
            $this->vista('personas/editar',$datos);
        }
           }
           public function borrar($id){
            $persona=$this->model->optenerId($id);
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos=[
                'id'=>$persona->id,
                'ci'=>$persona->ci,
                'nombres'=>$persona->nombres,
                'ap'=>$persona->ap,
                'am'=>$persona->am,
                'telefono'=>$persona->telefono,
                'direccion' =>$persona->direccion,
                'genero'=>$persona->genero,
                'grupos'=>$grupo,
                'opciones'=>$opcion
              
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/personas');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('personas/borrar',$datos);                        
     
}}
?>