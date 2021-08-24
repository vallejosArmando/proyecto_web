<?php 

class Opciones extends Controlador{
private $opcion;
private $grupo;
private $menu;  
private $acceso; 
 public function __construct()
  
    {
        $this->grupo=$this->modelo('Grupo');
        $this->acceso=$this->modelo('Acceso');

        $this->opcion=$this->modelo('Opcion');
        $this->menu=$this->modelo('Menu');

        //echo 'pagina controlador cargada';
    }
    public function index(){
        $opcion=$this->opcion->listar();
        $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
       
                $datos=[
                    'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
                    'opciones'=>$opcion,
                    'grupos'=>$grupos,
                ];
                $this->vista('opciones/inicio',$datos);
            
        


    }
    public function insertar(){
        $opcion=$this->opcion->listar();

        $grupos=$this->grupo->listar();
        $oo=['id_grupo'=>$grupos];
        foreach($oo['id_grupo'] as $op){
            $id_grupo=$op->id;
        }
        $opciones=$this->opcion->opcion($id_grupo);
       
                $datos=[
                    'titulo'=>'Bienvenidos a MVC ARMANDO SIIII.WEB ',
                    'opciones'=>$opcion,
                    'grupos'=>$grupos,
                ];
                $this->vista('opciones/agregar',$datos);

     //$this->vista('opciones/agregar');


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
if($this->opcion->insertar($datos)){

    redireccionar('/opciones');


}else{
    die('algo sali mal');
}

 }else{
     $grupo=$this->opcion->listarGrupo();
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
       if($this->opcion->actualizar($datos)){
       
           redireccionar('/opciones');
       
       
       }else{
           die('Algo salio mal');
       }
       
        }else{
            $opcionn=$this->opcion->optenerId($id);
            $opcion=$this->opcion->listar();

            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
           
              

            $datos=[
                'id'=>$opcionn->id,
                'id_grupo'=>$opcionn->id_grupo,
                'nombre'=>$opcionn->nombre,
                'op_url'=>$opcionn->op_url,
                'mostrar'=>$opcionn->mostrar,
                'orden'=>$opcionn->orden,
                'opciones'=>$opcion,
                'grupos'=>$grupos,
            ];
            $this->vista('/opciones/editar',$datos);
        }
           }
           public function borrar($id){
            $opcionn=$this->opcion->optenerId($id);
            $opcion=$this->opcion->listar();

            $grupos=$this->grupo->listar();
            $oo=['id_grupo'=>$grupos];
            foreach($oo['id_grupo'] as $op){
                $id_grupo=$op->id;
            }
            $opciones=$this->opcion->opcion($id_grupo);
           

            $datos=[
                'id'=>$opcionn->id,
                'id_grupo'=>$opcionn->id_grupo,
                'nombre'=>$opcionn->nombre,
                'op_url'=>$opcionn->op_url,
                'mostrar'=>$opcionn->mostrar,
                'orden'=>$opcionn->orden,
                'grupos'=>$grupos,
                'opciones'=>$opcion,

            ];
            if($_SERVER['REQUEST_METHOD']=='POST'){
       
                $datos=[
                 'id'=>$id,
            
                ];
            if($this->opcion->eliminar($datos)){
            
                redireccionar('/opciones');
            
            
            }else{
                die('algo sali mal');
            }
        }
         $this->vista('opciones/borrar',$datos);                        
     
}}
?>