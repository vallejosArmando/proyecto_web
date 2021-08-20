<?php 

class Opciones extends Controlador{
private $model;
private $grupo;
private $men;    public function __construct()
  
    {
        $this->grupo=$this->modelo('Grupo');
        $this->men = $this->modelo('Men');

        $this->model=$this->modelo('Opcion');
        //echo 'pagina controlador cargada';
    }
    public function index(){
        $opciones=$this->model->listar();
        $grupos=$this->grupo->listar();

        $datos=[
            'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'opciones'=>$opciones,
            'grupos'=>$grupos,
        ];
        $this->vista('opciones/inicio',$datos);

    }
    public function insertar(){

     $this->vista('opciones/agregar');


    }
    public function agregar(){
 if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos=[
        'id_grupo'=>trim($_POST['id_grupo']),

'nombre'=>trim($_POST['nombre']),
'op_url'=>trim($_POST['op_url']),
'mostrar'=>trim($_POST['mostrar']),

'orden'=>trim($_POST['orden']),

    ];
if($this->model->insertar($datos)){

    redireccionar('/opciones');


}else{
    die('algo sali mal');
}

 }else{
     $grupo=$this->model->listarGrupo();
     $grupo=$this->grupo->listar();
     $datos=[
         'id_grupo'=>'',
         'nombre'=>'',
         'op_url'=>'',
         'mostrar'=>'',
         'orden'=>'',
         'grupos'=>$grupo
        
     ];
     $this->vista('opciones/agregar',$datos);
 }
    }
    public function editar($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){
       
           $datos=[
            'id'=>$id,

            'id_grupo'=>trim($_POST['id_grupo']),

            'nombre'=>trim($_POST['nombre']),
            'op_url'=>trim($_POST['op_url']),
            'mostrar'=>trim($_POST['mostrar']),
            
            'orden'=>trim($_POST['orden']),
            
       
           ];
       if($this->model->actualizar($datos)){
       
           redireccionar('/opciones');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $opcion=$this->model->optenerId($id);
            $grupo=$this->model->listarGrupo();


            $datos=[
                'id'=>$opcion->id,
                'id_grupo'=>$opcion->id_grupo,
                'nombre'=>$opcion->nombre,
                'op_url'=>$opcion->op_url,
                'mostrar'=>$opcion->mostrar,
                'orden'=>$opcion->orden,
                'grupo'=>$grupo,
            ];
            $this->vista('/opciones/editar',$datos);
        }
           }
           public function borrar($id){
            $opcion=$this->model->optenerId($id);
            $grupos=$this->grupo->listar();

            $datos=[
                'id'=>$opcion->id,
                'id_grupo'=>$opcion->id_grupo,
                'nombre'=>$opcion->nombre,
                'op_url'=>$opcion->op_url,
                'mostrar'=>$opcion->mostrar,
                'orden'=>$opcion->orden,
                'grupos'=>$grupos,

            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->model->eliminar($datos)){
            
                redireccionar('/opciones');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('opciones/borrar',$datos);                        
     
}}
?>