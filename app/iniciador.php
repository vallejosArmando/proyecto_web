

<?php
require_once 'config/Configurar.php';
require_once 'helpers/url_helper.php';
//require_once 'helpers/session.php';

//cargamos las librerias
//require_once ('librerias/Base.php'); 
//require_once ('librerias/Controlador.//php');
//require_once ('librerias/Core.php');

//Autoload
spl_autoload_register(function($nombreClase){
    require_once 'librerias/'. $nombreClase . '.php';
});
?>