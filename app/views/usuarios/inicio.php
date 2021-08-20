
<?php require RUTA_APP . '/views/include/header.php'; ?>
<?php require RUTA_APP . '/views/include/menu.php'; ?>

<!-- Info boxes -->
<div class="card">
  
      <div class="card-header">
        <h3 class="card-title">Tabla Usuariosdsd</h3>
      </div>
      <div class="card-header">

      <td> <a href="<?php echo RUTA_URL?>/usuarios/agregar" class="btn btn-primary">Agregar</a> </td>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>ID_Persona</th>
            <th>Nombre</th>
            <th>Clavec</th>
            <th>Editar</th>
            <th>Eliminar</th>

          </tr>
          </thead>
          <tbody>
<?php  foreach ($datos['datos'] as $data):?>


<tr>
<td><?php echo $data->id?></td>
<td><?php echo $data->id_persona?></td>

<td><?php echo $data->nom_usuario?></td>
<td><?php echo $data->clave?></td>
<td> <a href="<?php echo RUTA_URL; ?>/usuarios/editar/<?php echo $data->id;?>" class="btn btn-success "> <i class="nav-icon fas fa-edit"></i></a></td>
<td> <a href="<?php echo RUTA_URL; ?>/usuarios/borrar/<?php echo $data->id;?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
</tr>
<?php endforeach;?>
icon-cancel
</tbody>
          <tfoot>
          <tr>
          <th>ID</th>
          <th>ID_Persona</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <?php require RUTA_APP . '/views/include/footer.php'; ?>
