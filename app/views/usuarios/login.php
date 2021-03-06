

<!doctype html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login con  PHP - Bootstrap 4</title>
    
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" <?php echo RUTA_URL?>/inicioLog/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href=" <?php echo RUTA_URL?>/inicioLog/estilos.css">
    
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/inicioLog/plugins/sweet_alert2/sweetalert2.min.css">
</head>
<body>

  
    <div id="login">
        <h3 class="text-center text-white display-4">Login con PHP</h3>
        <div class="container">                        
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12  bg-light text-dark">
                        <form id="formLogin" class="form" action="" method="post">
                            <h3 class="text-center text-dark">Iniciar Sesión</h3>
                            <div class="form-group">
                                <label for="nom_usuario" class="text-dark">Usuario</label><br>
                                <input type="text" name="nom_usuario" id="nom_usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="clave" class="text-dark">Password</label><br>
                                <input type="password" name="clave" id="clave" class="form-control">
                            </div>
                            <div class="form-group text-center">                                
                                <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Conectar">
                            </div>                            
           
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo RUTA_URL?>/inicioLog/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo RUTA_URL?>/inicioLog/popper/popper.min.js"></script>
    <script src="<?php echo RUTA_URL?>/inicioLog/bootstrap/js/bootstrap.min.js"></script>
        
    <script src="<?php echo RUTA_URL?>/inicioLog/plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo RUTA_URL?>/js/main.js"></script>
    <?php if (isset($_SESSION['error'])) : ?>
    <script>
        mostrarAlerta('error' , 'Oops...' , 'Parece que hubo un error en el registro vuelve a intentarlo nuevamente')
    </script>
    <?php unset($_SESSION['error']);
endif ?>
  <?php if (isset($_SESSION['exito'])) : ?>
    <script>
        mostrarAlerta('success', 'Buen trabajo', 'La materia ha sido eliminada correctamente')
    </script>
    <?php unset($_SESSION['exito']);
endif ?>
</body>
</html>
