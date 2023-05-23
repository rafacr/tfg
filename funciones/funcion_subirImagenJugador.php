<?php 
 session_start();
 include("conexion.php");

?>

<?php

 $con=conectar();


$path = "../img/". basename($_FILES['imagen']['name']); 
$nombre=basename($_FILES['imagen']['name']);
$idTemp=$_SESSION['id_player'];
$tipo=basename($_FILES['imagen']['type']);
$nombTemp="player_".$idTemp.".".$tipo;
$pathTem="../img/".$nombTemp;

if(move_uploaded_file($_FILES['imagen']['tmp_name'], $pathTem)) { 
    $sql="UPDATE jugador SET  img_perfil='$nombTemp' WHERE id='$idTemp'";
    $query=mysqli_query($con,$sql);

	if($_SESSION['tipoUsuario']=='admin'){
		echo "<script>location.href='../admin/jugador_editar.php?id=".$_SESSION['id_player']."';</script>";
	}else{
		if($_SESSION['tipoUsuario']=='team'){
			echo "<script>location.href='../team/jugador_editar.php?id=".$_SESSION['id_player']."';</script>";
		}else{
			if($_SESSION['tipoUsuario']=='ojeador'){
				echo "<script>location.href='../ojeador/jugador_editar.php?id=".$_SESSION['id_player']."';</script>";
			}
		}
    }
} else{
    echo "El archivo no se ha subido correctamente";
}
mysqli_close($con);
?>