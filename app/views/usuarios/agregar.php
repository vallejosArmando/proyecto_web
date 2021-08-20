
        <?php require RUTA_APP .'/views/include/header.php'; ?><?php require RUTA_APP . '/views/include/menu.php'; ?>


<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar<small>AgregarTipo Empelados</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="<?php echo RUTA_URL ?>/usuarios/agregar" id="formulario_sistema" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                <div class="form-group">
                <label>Areas</label></label>
                <select class="form-control select2" name="id_persona" id="id_persona" style="width: 100%;"  value="<?php echo $datos['id_persona']?>">
                  <option selected="selected" >Tipo empleado</option>
                  <?php foreach ($datos['persona'] as $data):?> 

<option value="<?php echo $data->id ?>" ><?php echo $data->nombres?></option>
<?php endforeach; ?>
                </select>
              </div>
                  <div class="form-group">
                    <label for="nom_usuario">Nombre</label>
                    <input type="text" name="nom_usuario" class="form-control" id="nom_usuario" placeholder="Ingrese nom_usuario ">
                  </div>
                  <div class="form-group">
                    <label for="clave">Clave</label>
                    <input type="password" name="clave" class="form-control" id="clave" placeholder="clave">
                  </div>
               
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo RUTA_URL?>/usuarios/inicio" class="btn btn-dark ">Cancelar</a> 

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