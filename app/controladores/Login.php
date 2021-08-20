<?php
class Login extends Controlador
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
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [

                'nom_usuario' => trim($_POST['nom_usuario']),
                'clave' => trim($_POST['clave']),

            ];
            $data = $this->model->login($datos);

            if ($data >= 1) {

                $_SESSION["s_usuario"] = $data->nom_usuario;
                $_SESSION["s_id_usuario"] = $data->id_usuario;
                $_SESSION["s_id_rol"] = $data->id_rol;
                $_SESSION["s_rol"] = $data->rol;
                redireccionar('/menus');
            } else if ($data < 1) {
                $_SESSION["s_usuario"] = null;
                $_SESSION["error"] = 'algo esta mal';

                $this->vista('usuarios/login');
            }
        } else {
            $datos = [
                'nom_usuario' => '',
                'clave' => '',
            ];
            $this->vista('usuarios/login');
        }
    }
}