<?php

include("conexion.php");

    $con=conectar();
    $id=$_GET["id"];
    $email=$_GET["email"];
     
    // Consulta para la base de datos.
    $consulta="UPDATE usuario SET email='$email' where id='$id'";
    $resultado=mysqli_query($con,$consulta);
    
    mysqli_close($con);
    echo "<script>location.href='http://localhost:81/tfg/index.php';</script>";  
    

?>