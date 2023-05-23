<?php 
 session_start();
 include("conexion.php");

?>

<?php

 $con=conectar();


$path = "../img/". basename($_FILES['imagen']['name']); 
$nombre=basename($_FILES['imagen']['name']);
$idTemp=$_SESSION['id'];
$tipo=basename($_FILES['imagen']['type']);
$nombTemp="profile_".$idTemp.".".$tipo;
$pathTem="../img/".$nombTemp;

if(move_uploaded_file($_FILES['imagen']['tmp_name'], $pathTem)) { 
    $sql="UPDATE usuario SET  img_perfil='$nombTemp' WHERE id='$idTemp'";
    $query=mysqli_query($con,$sql);
	
	if($_SESSION['tipoUsuario']=='admin'){
		echo "<script>location.href='../admin/perfil.php';</script>";
		$_SESSION['img'] = $nombTemp;
	}else{
		if($_SESSION['tipoUsuario']=='team'){
			echo "<script>location.href='../team/perfil.php';</script>";
			$_SESSION['img'] = $nombTemp;
		}else{
			if($_SESSION['tipoUsuario']=='ojeador'){
				echo "<script>location.href='../ojeador/perfil.php';</script>";
				$_SESSION['img'] = $nombTemp;
			}
		}
    }
} else{
    echo "El archivo no se ha subido correctamente";
}
mysqli_close($con);
?>