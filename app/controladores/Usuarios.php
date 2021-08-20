<?php

class Usuarios extends Controlador
{
    private $model;
    private $grupo;
    private $opcion;
    public function __construct()
    {
        
        $this->model = $this->modelo('Usuario');
        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
          

    
    }
    
    public function index()
    {        $acceso=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $usuario = $this->model->listar();
        $datos = [
            'titulo' => 'Tabla Usuario',
            'datos' => $usuario,
            'grupos'=>$acceso,
            'opciones'=>$opcion
        ];

        $this->vista('usuarios/inicio', $datos);
    }
    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [

                'id_persona' => trim($_POST['id_persona']),
                'nom_usuario' => trim($_POST['nom_usuario']),
                'clave' => trim(md5($_POST['clave'])),
            ];
            if ($this->model->insertar($datos)) {
                redireccionar('/usuarios');
            } else {
                die('algo sali mal');
            }
        } else {
            $persona = $this->model->listarPersona();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos = [
                'id_persona' => '',
                'nom_usuario' => '',
                'clave' => '',
                'persona' => $persona,
                'grupos'=>$grupo,
                'opciones'=>$opcion
            ];
            $this->vista('usuarios/agregar', $datos);
        }
    }
    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,
                'id_persona' => trim($_POST['id_persona']),
                'nom_usuario' => trim($_POST['nom_usuario']),
                'clave' => trim(md5($_POST['clave'])),
            ];

            if ($this->model->actualizar($datos)) {
                redireccionar('/usuarios');
            } else {
                die("Error");
            }
        } else {
            $usuario = $this->model->optenerId($id);
            $persona = $this->model->listarPersona();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos = [
                'id' => $usuario->id,
                'id_persona' => $usuario->id_persona,
                'nom_usuario' => $usuario->nom_usuario,
                'clave' => $usuario->clave,
                'persona' => $persona,
                'grupos'=>$grupo,
                'opciones'=>$opcion

            ];
            $this->vista('usuarios/editar', $datos);
        }
    }
    public function borrar($id)
    {
        $tipo = $this->model->optenerId($id);
        $persona = $this->model->listarPersona();
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $datos = [
            'id' => $tipo->id,
            'id_persona' => $tipo->id_persona,
            'nom_usuario' => $tipo->nom_usuario,
            'clave' => $tipo->clave,
            'persona' => $persona,
            'grupos'=>$grupo,
            'opciones'=>$opcion
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,

            ];
            if ($this->model->eliminar($datos)) {

                redireccionar('/usuarios');
            } else {
                die('algo sali mal');
            }
        }
        $this->vista('usuarios/borrar', $datos);
    }
}
