<?php 
class Controlador{
//Cargar el model
    public function modelo($modelo){
      //carga
      require_once '../app/models/'. $modelo .'.php';
      //Instanciamos el modelo
      return new $modelo();
         
    }
    //carga de la vista
    public function vista($vista,$datos=[]){
      //revisar si el archivo vista existe
      if(file_exists('../app/views/'. $vista .'.php')){
          require_once '../app/views/'. $vista .'.php';
      }else {
          //si el archivo no existe en la vista;
          die('La vista no existe;');
      }

         
    }
}

?>