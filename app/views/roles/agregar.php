
        <?php require RUTA_APP .'/views/include/header.php'; ?>
        <?php require RUTA_APP . '/views/include/menu.php'; ?>

<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Argregar<small>Areagar roles</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="<?php echo RUTA_URL ?>/roles/agregar" id="formulario_roles" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="rol">Nombre</label>
                    <input type="text" name="rol" class="form-control" id="rol" placeholder="Ingrese rol ">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo RUTA_URL?>/roles" class="btn btn-dark ">Cancelar</a> 

                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <?php require RUTA_APP .'/views/include/footer.php'; ?>