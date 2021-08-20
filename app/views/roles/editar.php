
        <?php require RUTA_APP .'/views/include/header.php'; ?><?php require RUTA_APP . '/views/include/menu.php'; ?>

<div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar<small>Editar Sitema</small></h3>
              </div>
          
              <form  action="<?php echo RUTA_URL ?>/roles/editar/<?php echo $datos['id'];?>" id="formulario_roles" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="rol">Nombre</label>
                    <input type="text" name="rol" class="form-control" id="rol" value="<?php echo $datos['rol'];?>" placeholder="Ingrese rol ">
                  </div> 
                </div>
                <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="editar">
                <a href="<?php echo RUTA_URL?>/roles" class="btn btn-dark ">Cancelar</a> 
                </div>
              </form>
              
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
        <?php require RUTA_APP .'/views/include/footer.php'; ?>