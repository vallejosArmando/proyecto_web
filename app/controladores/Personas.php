<?php 

class Personas extends Controlador{
private $persona;
private $grupo;
private $opcion;
    public function __construct()
  
    {
        $this->persona=$this->modelo('Persona');

        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        //echo 'pagina controlador cargada';
    }
    public function index(){


        $persona=$this->persona->listar();
        $opcion=$this->opcion->listar();


    $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
    $datos=[
        'persona'=>$persona,
        'opciones'=>$opcion,
        'grupos'=>$grupos
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
if($this->persona->insertar($datos)){

    redireccionar('/personas');


}else{
    die('Algo salio mal');
}

 }else{
    $grupos=$this->grupo->listar();
    $oo=['id_grupo'=>$grupos];
    foreach($oo['id_grupo'] as $op){
        $id_grupo=$op->id;
    }
    $opciones=$this->opcion->opcion($id_grupo);
     $datos=[
  
        'ci'=>'',
        'nombres'=>'',
        'ap'=>'',
        'am'=>'',
        'telefono'=>'',
        'direccion'=>'',
        'genero'=>'',
        'grupos'=>$grupos,
        'opciones'=>$opciones
        
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
       if($this->persona->actualizar($datos)){
       
           redireccionar('/personas');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{


            
            $persona=$this->persona->optenerId($id);
            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
            $datos=[
                'id'=>$persona->id,
                'ci'=>$persona->ci,
                'nombres'=>$persona->nombres,
                'ap'=>$persona->ap,
                'am'=>$persona->am,
                'telefono'=>$persona->telefono,
                'direccion' =>$persona->direccion,
                'genero'=>$persona->genero,
                'grupos'=>$grupos,
                'opciones'=>$opciones
            ];
            $this->vista('personas/editar',$datos);
        }
           }
           public function borrar($id){
            $persona=$this->persona->optenerId($id);
         
            $datos=[
                'id'=>$persona->id,
                'ci'=>$persona->ci,
                'nombres'=>$persona->nombres,
                'ap'=>$persona->ap,
                'am'=>$persona->am,
                'telefono'=>$persona->telefono,
                'direccion' =>$persona->direccion,
                'genero'=>$persona->genero,
            
              
            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->persona->eliminar($datos)){
            
                redireccionar('/personas');
            
            
            }else{
                die('algo sali mal');
            }
        }
        $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }

        $opciones=$this->opcion->opcion($id_grupo);
        $datos=[
            'id'=>$persona->id,
            'ci'=>$persona->ci,
            'nombres'=>$persona->nombres,
            'ap'=>$persona->ap,
            'am'=>$persona->am,
            'telefono'=>$persona->telefono,
            'direccion' =>$persona->direccion,
            'genero'=>$persona->genero,

             'grupos'=>$grupos,
            'opciones'=>$opciones,
        ];
         $this->vista('personas/borrar',$datos);                        
     
}}
?>