<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro TU SCOUTING</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/estilo_tfg.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bienvenido Equipo ¡Esto es solo el comienzo!</h1>
                            </div>
                            <form action="" class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombreEquipo" name="nombreEquipo"
                                            placeholder="Nombre del equipo" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="cifEquipo" name="cifEquipo"
                                            placeholder="CIF" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="email" name="email"
                                         placeholder="Email" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <?php
                                    include "funciones/funciones_usuario.php";
                                    registrar_usuario();
                                ?>
                                <input name="btnRegistrar" class="btn btn-primary btn-user btn-block" type="submit" value="Registrarse">
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="olvido-password.php">¿Olvidaste la contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya tienes cuenta? ¡Pues accede!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>