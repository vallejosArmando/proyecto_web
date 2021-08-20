<?php

class Menus extends Controlador
{
  private $model;
  public function __construct()
  {
    $this->model = $this->modelo('Menu');
  }
  public function index()
  {
    $dato = $this->model->grupo();
    $id_grupo = ['id_grupo' => $dato,];
    foreach ($id_grupo['id_grupo'] as $d) {

      echo "<ul>";
      # code...

      echo "<li>"; echo $d->grupo ; 
      echo "<ul>";
      $id_grupo = $d->id;
      $da = $this->model->opcion($id_grupo);

      $datos = [
        'grupo' => $da,
      ];
      foreach ($datos['grupo'] as $data) {
        echo "<li>" ;
        echo $data->nombre ;   
        echo" </li>";
      }
        echo " </ul>";
        echo"</li>";
        echo "</ul>";
      
    }
  }
};
-----------------

$dato = $this->model->grupo();
$id_grupo = ['id_grupo' => $dato,];
foreach ($id_grupo['id_grupo'] as $d) {

  echo '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
  # code...

  echo '<li class=" nav-item">';
  echo'<a  href="#"  class="nav-link" >';
  echo'<span> <i class=""></i></span>';
   echo '<p> '.$d->grupo. ' </p>'; 
   echo '</a>';
  echo '<ul class="nav nav-treeview">';
  $id_grupo = $d->id;
  $da = $this->model->opcion($id_grupo);

  $datos = [
    'grupo' => $da,
  ];
  foreach ($datos['grupo'] as $data) {
    echo '<li class="nav-item" name="id" >' ;
    echo '<a  href=" '.$data->op_url.'" class="nav-link" > ';
    echo '<i class="far fa-circle nav-icon"></i>';
    echo '<p>' .$data->nombre.'<p>' ;   
    echo '</a>';
    echo" </li>";
  }
    echo " </ul>";
    echo"</li>";
    echo "</ul>";
  
}