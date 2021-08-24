<?php 

class Menus extends Controlador{
    private $opcion;
    private $grupo;
    private $menu;
    public function __construct(){
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
}
?>