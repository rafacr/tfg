<?php
  session_start();
if(!empty($_SESSION)){//Si la sesión no está vacía quiere decir que tenenmos un usuario logueado
    if ($_SESSION['tipoUsuario']=="team"){ header("location: team/panel.php"); 
    }elseif ($_SESSION['tipoUsuario']=="ojeador"){ header("location: ojeador/panel.php"); 
    }elseif($_SESSION['tipoUsuario']=="admin") header("location: admin/panel.php");
}else{
    session_destroy();
}
  
  include ("funciones/funciones_usuario.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TU SCOUTING - Inicio</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/estilo_tfg.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido a Tu Scouting!</h1>
                                    </div>
                                    <form class="user" action="funciones/login.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="emailUser" name="emailUser" aria-describedby="emailHelp"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="passwordUser" name="passwordUser" placeholder="Contraseña" required>
                                        </div>
                                        
                                        <div class="text-center">
											<a class="small" id="textoError"></a>
										</div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
										<input name="btnLogin" type="submit" class="btn btn-primary btn-user btn-block" value="Acceder">
                                                                                
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="olvido-password.php">¿Olvidó su contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registro.php">¡Crear una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>