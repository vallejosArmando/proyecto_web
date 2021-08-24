<?php require RUTA_APP . '/views/include/header.php'; ?>
<?php require RUTA_APP . '/views/include/menu.php'; ?>

<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Argregar<small>Areagar Area</small></h3>
      </div>
     
      <form action="<?php echo RUTA_URL ?>/usuarioroles/agregar" id="formulario_usuario_rol" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">

            <div class="col-md-6">
           
              <div class="form-group">
                <label>Areas</label></label>
                <select class="form-control select2" name="id_usuario" id="id_usuario" style="width: 100%;" value="<?php echo $datos['id_usuario'] ?>">
                  <option selected="selected">Usuario</option>
                  <?php foreach ($datos['usuario'] as $data) : ?>

                    <option value="<?php echo $data->id ?>"><?php echo $data->nom_usuario ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
           
           
           
            </div>
            
            <div class="col-md-6">

           
              <div class="form-group">
                <label>Areas</label></label>
                <select class="form-control select2" name="id_rol" id="id_rol" style="width: 100%;">
                  <option selected="selected"value="<?php echo $datos['id_rol'] ?>">Rol</option>
                  <?php foreach ($datos['roles'] as $data) : ?>

                    <option value="<?php echo $data->id ?>"><?php echo $data->rol ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
           
           
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary" value="Agregar"> <a href="<?php echo RUTA_URL ?>/usuarioroles" class="btn btn-dark ">Cancelar</a>

        </div>
      </form>
    </div>
  </div>

  <div class="col-md-6">

  </div>
</div>
<?php require RUTA_APP . '/views/include/footer.php'; ?>