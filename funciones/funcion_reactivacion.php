<?php
session_start();
include("conexion.php");

    $con=conectar();
    $id=$_GET["id"];
     
    // Consulta para la base de datos.
    $consulta="UPDATE usuario SET activo='si' where id='$id'";
    $resultado=mysqli_query($con,$consulta);
    
    mysqli_close($con);
    if($_SESSION['tipoUsuario']=='admin') echo "<script>location.href='../admin/panel.php';</script>";
    if($_SESSION['tipoUsuario']=='team') echo "<script>location.href='../team/panel.php';</script>";
    if($_SESSION['tipoUsuario']=='ojeador') echo "<script>location.href='../ojeador/panel.php';</script>";
    

?>