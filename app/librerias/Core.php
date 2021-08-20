<?php 
/*Mapear la url ingresada en el navegador,
0.-Controlador
1.-metodo
2.-Parametro
Ejemplo: articulo/actualizar/4 
*/ 
class Core{
protected $controladorActual='login';
protected $metodoActual='index';
protected $parametros=[];


//constructor
public function __construct(){
//print_r($this->getUrl());
$url=$this->getUrl();
//buscamos en controladores si esxiste el controlador
if (file_exists('../app/controladores/'.ucwords($url[0]).'.php')){
    // siexiste se setea como controlador por defecto
    $this->controladorActual = ucwords($url[0]);

    //unsend indice
    unset($url[0]);

}
//requirir el controlador
require_once '../app/controladores/'.$this->controladorActual .'.php';
$this->controladorActual = new $this->controladorActual;

if(isset($url[1])){
    if(method_exists($this->controladorActual,$url[1])){
        $this->metodoActual=$url[1];
        unset($url[1]);

    }
}
$this->parametros = $url ? array_values($url) : []; 
call_user_func_array([$this->controladorActual,$this->metodoActual], $this->parametros
);

}
public function getUrl(){
    //echo $_GET['url'];
    if (isset($_GET['url'])) {

    $url=rtrim($_GET['url'],'/');
    $url=filter_var($url,FILTER_SANITIZE_URL);
    $url=explode('/',$url);
    return $url;


    }
}


}

?>