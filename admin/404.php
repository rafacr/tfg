<?php
  session_start();
  include("../conexion.php");
?>

<?php
  // Crear conexión con la base de datos.
  $con = conectar();
   
  // Validar la conexión de base de datos.
  if ($con ->connect_error) {
    die("Connection failed: " . $con ->connect_error);
  }
   
  // Consulta para la base de datos.
  $idConsulta=$_SESSION['id'];
  $consulta="SELECT * from usuario where id='$idConsulta'";
  $resultado=mysqli_query($con,$consulta);
  $mostrar=mysqli_fetch_array($resultado);

 

?>

<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Página No Encontrada</p>
        <p class="text-gray-500 mb-0">Parece que se ha producido un error en la navegación......</p>
        <a href="panel.php">&larr; Volver al Panel Principal</a>
    </div>
					             
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>