<?php

class UsuarioRoles extends Controlador
{
    private $model;
private $rol;
private $grupo;
    private $opcion;
    public function __construct()

    {
        $this->model = $this->modelo('UsuarioRol');
        $this->modelUsuario = $this->modelo('Usuario');
        $this->rol = $this->modelo('Rol');
        $this->grupo=$this->modelo('Grupo');
        $this->opcion=$this->modelo('Opcion');
        //echo 'pagina controlador cargada';
    }
    public function index()
    {
        $usuario_rol = $this->model->listar();
        $usuario = $this->model->listarUsuario();
        $rol = $this->model->listarRol();
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $datos = [
            'titulo' => 'Bienvenidos a MVC ARMANDO SIIII.WEB ',
            'usuario_rol' => $usuario_rol,
            'rol' => $rol,
            'usurio' => $usuario,
            'grupos'=>$grupo,
            'opciones'=>$opcion,
            'roles'=>$rol
        ];
        $this->vista('usuarioRoles/inicio', $datos);
    }

    public function agregar()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id_usuario' => trim($_POST['id_usuario']),
                'id_rol' => trim($_POST['id_rol']),

            ];
            if ($this->model->insertar($datos)) {

                redireccionar('/usuarioroles');
            } else {
                die('Algo salio mal');
            }
        } else {
            $usuario = $this->model->listarUsuario();
            $rol = $this->model->listarRol();
             $roles= $this->rol->listar();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $datos = [

                'id_usuario' => '',
                'id_rol' => '',
                'rol' => $rol,
                'usuario' => $usuario,
                'grupos'=>$grupo,
                'opciones'=>$opcion,
                'roles'=>$roles,
            ];
            $this->vista('usuarioRoles/agregar', $datos);
        }
    }
    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,
                'id_usuario' => trim($_POST['id_usuario']),
                'id_rol' => trim($_POST['id_rol']),

            ];
            if ($this->model->actualizar($datos)) {

                redireccionar('/usuarioroles');
            } else {
                die('Algo salio mal');
            }
        } else {

            $usuario_rol = $this->model->optenerId($id);
            $usuario = $this->model->listarUsuario();
            $rol = $this->model->listarRol();
            $grupo=$this->grupo->listar();
            $opcion=$this->opcion->listar();
            $roles= $this->rol->listar();

            $datos = [
                'id' => $usuario_rol->id,
                'id_usuario' => $usuario_rol->id_usuario,
                'id_rol' => $usuario_rol->id_rol,
                'rol' => $rol,
                'usuario' => $usuario,
                'grupos'=>$grupo,
                'opciones'=>$opcion,
                'roles'=>$roles,
            ];
            $this->vista('usuarioRoles/editar', $datos);
        }
    }
    public function borrar($id)
    {
        $usuario = $this->model->optenerId($id);
        $grupo=$this->grupo->listar();
        $opcion=$this->opcion->listar();
        $datos = [
            'id' => $usuario->id,
            'id_usuario' => $usuario->id_usuario,
            'id_rol' => $usuario->id_rol,
            'grupos'=>$grupo,
            'opciones'=>$opcion
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,
            ];
            if ($this->model->eliminar($datos)) {

                redireccionar('/usuarioroles');
            } else {
                die('algo sali mal');
            }
        }
        $this->vista('usuarioRoles/borrar', $datos);
    }
}
