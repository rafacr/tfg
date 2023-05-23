<?php
function conectar(){
    $nombreServidor = "localhost";
    $nombreUsuario = "root";
    $passwordBaseDeDatos = "root";
    $nombreBaseDeDatos = "tuscouting";
    
    $con=mysqli_connect($nombreServidor,$nombreUsuario,$passwordBaseDeDatos);

    mysqli_select_db($con,$nombreBaseDeDatos);

    return $con;
}
?>

