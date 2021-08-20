

<?php require RUTA_APP . '/views/include/header.php'; ?>

<?php


class Menus extends Controlador
{
 
private $opcion;
private $grupo;
  public function __construct()
  {

    $this->opcion = $this->modelo('Opcion');
    $this->grupo = $this->modelo('Grupo');
 
  }
  public function index()
  {?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo RUTA_URL ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo RUTA_URL ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
  <!-- Sidebar Menu -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
      $dato = $this->grupo->listar();
      $id_grupo = ['id_grupo' => $dato,];
      foreach ($id_grupo['id_grupo'] as $d) {?>
  
        <li class=" nav-item">
  <a  href="#"  class="nav-link" >
   <i class="<?php echo $d->icono?>"></i>
         <p> <?php echo $d->grupo ?> 
         <i class="fas fa-angle-left right"></i>
  </p> 
         </a>
        <ul class="nav nav-treeview">
        <?php
         $id_grupo = $d->id;
        $da = $this->opcion->opcion($id_grupo);
  
        $datos = [
          'grupo' => $da,
        ];
        
        foreach ($datos['grupo'] as $data) {?>
          <li class="nav-item"> 
          <a  href=" <?php echo $data->op_url?>" class="nav-link" > 
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo $data->nombre ?></p>    
          </a>
          </li>
      <?php  } ?>
           </ul>
        </li>
      
        
        <?php }
      ?>
      </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v2</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <?php   
  }
}
?>
<?php require RUTA_APP . '/views/include/footer.php'; ?>
