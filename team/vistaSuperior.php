<?php
session_start();
if (empty($_SESSION)){ header("location: ../index.php");
} elseif (!empty($_SESSION)){//Si la sesión no está vacía quiere decir que tenenmos un usuario logueado
    if ($_SESSION['tipoUsuario']=="ojeador"){ header("location: ../ojeador/panel.php"); 
    }elseif($_SESSION['tipoUsuario']=="admin") header("location: ../admin/panel.php");
}
  
  include ("../funciones/funciones_usuario.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tu Scouting PRO </title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/estilo_tfg.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="panel.php">
                <img class="imagen" width="80" heigth="80" src="../img/logo.png">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="panel.php">
                <img class="iconoSidebar" src="../css/icons/dashboard.png"> <span>Dashboard Equipo</span></a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                <span style="color:black"> Ojeadores</span>
            </div>

            
            <!-- Nav Item - Listado de ojeadores -->
            <li class="nav-item">
                <a class="nav-link" href="lista_ojeadores.php">
                <img class="iconoSidebar" src="../css/icons/listado.png"><span>Listado</span></a>
            </li>
			
			<!-- Nav Item - Añadir Ojeador -->
            <li class="nav-item">
                <a class="nav-link" href="nuevo_ojeador.php">
                <img class="iconoSidebar" src="../css/icons/addUser.png"><span>Añadir Nuevo</span></a>
            </li>
			
			<!-- Nav Item - Notificar partido -->
            <li class="nav-item">
                <a class="nav-link" href="notificar_seguimiento.php">
                <img class="iconoSidebar" src="../css/icons/notificacion.png"><span>Notificar Partido</span></a>
            </li>
			
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            <span style="color:black">Jugadores</span>
            </div>

            <!-- Nav Item - Lista de jugadores -->
            <li class="nav-item">
                <a class="nav-link" href="lista_misjugadores.php">
                <img class="iconoSidebar" src="../css/icons/listado.png"><span>Mi Equipo</span></a>
            </li>
            <!-- Nav Item - Lista de jugadores -->
            <li class="nav-item">
                <a class="nav-link" href="lista_jugadores.php">
                <img class="iconoSidebar" src="../css/icons/listado.png"><span>Lista Scouting</span></a>
            </li>
			
			<!-- Nav Item - Añadir jugador -->
            <li class="nav-item">
                <a class="nav-link" href="nuevo_jugador.php">
                <img class="iconoSidebar" src="../css/icons/player.png"> <span>Añadir Nuevo</span></a>
            </li>

            <!-- Nav Item - comparar jugadores -->
            <li class="nav-item">
                <a class="nav-link" href="comparador_jugadores.php">
                <img class="iconoSidebar" src="../css/icons/comparaPlayer.png"><span>Comparar Jugadores</span></a>
            </li>
            
           <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            <span style="color:black"> Reseñas de partidos</span>
            </div>
            
            <!-- Nav Item - Reseñas -->
            <li class="nav-item">
                <a class="nav-link" href="lista_resena.php">
                <img class="iconoSidebar" src="../css/icons/listado.png"><span>Listado</span></a>
            </li>
			
		   <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<h3 class="text-gray-800"><b><?php echo $_SESSION['nombre']?></b></h3>
					
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - Usuario -->
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownUser1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800 small"><?php echo $_SESSION['nombre']?></span>
								<img class="img-profile rounded-circle width="45" height="45" src="<?php echo "../img/".$_SESSION['img']?>">
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="perfil.php">
                                    <img class="iconoSidebar" src="../css/icons/ajustes.png"><span>Configuración</span></a>
                                </a>
                                <a class="dropdown-item" href="lista_facturas.php">
                                    <img class="iconoSidebar" src="../css/icons/factura.png"><span>Facturación</span></a>
                                </a>
                                                               
                                <div class="dropdown-divider"></div>
                                <a  class="dropdown-item"  href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <img class="iconoSidebar" src="../css/icons/salir.png"><span>Cerrar Sesión</span></a>
                                </a>
                            </ul>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                