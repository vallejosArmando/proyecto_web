<?php 

class Menus extends Controlador{
    public $opcion;
    public $grupo;
    public $menu;
    public function __construct(){
        $this->grupo = $this->modelo('Grupo');
        $this->menu = $this->modelo('Menu');

        $this->opcion = $this->modelo('Opcion');
    }
    public function index(){
    $this->vista('menus/inicio');
}
}
?>