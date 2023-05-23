<?php
session_start();
include("conexion.php");
//include("conexion.php");

$con=conectar();
$id_reg=$_GET["id"];
$nombre_tabla=$_GET["tab"];

if($nombre_tabla=='resena'){
    // Consulta para eliminar un registro de resena.
    $consulta="DELETE FROM resena where id=".$id_reg."";
    mysqli_query($con,$consulta);
    mysqli_close($con);
    //redireccionamos a la página según el tipo de usuario
    if($_SESSION['tipoUsuario']=='admin'){ header('Location:../admin/panel.php');
    }elseif($_SESSION['tipoUsuario']=='team'){ header('Location:../team/panel.php');
    }elseif($_SESSION['tipoUsuario']=='ojeador') header('Location:../ojeador/panel.php');
}elseif($nombre_tabla=='jugador'){
    //Consulta para eliminar jugador y sus fichas
    $consulta="SELECT id FROM ficha where id_jugador=".$id_reg."";
    $resultado=mysqli_query($con,$consulta);

    while($mostrar=mysqli_fetch_array($resultado)){
        $consulta="DELETE FROM datos_portero where id_ficha=".$mostrar['id']."";
        mysqli_query($con,$consulta);
        $consulta="DELETE FROM datos_ofensivos where id_ficha=".$mostrar['id']."";
        mysqli_query($con,$consulta);
        $consulta="DELETE FROM datos_defensivos where id_ficha=".$mostrar['id']."";
        mysqli_query($con,$consulta);
        $consulta="DELETE FROM datos_psicologicos where id_ficha=".$mostrar['id']."";
        mysqli_query($con,$consulta);
        $consulta="DELETE FROM ficha where id=".$mostrar['id']."";
        mysqli_query($con,$consulta);
    }

    $consulta2="DELETE FROM jugador where id=".$id_reg."";
    mysqli_query($con,$consulta2);
    mysqli_close($con);
    //redireccionamos a la página según el tipo de usuario
    if($_SESSION['tipoUsuario']=='admin'){ header('Location:../admin/panel.php');
    }elseif($_SESSION['tipoUsuario']=='team'){ header('Location:../team/panel.php');
    }elseif($_SESSION['tipoUsuario']=='ojeador') header('Location:../ojeador/panel.php');
}elseif($nombre_tabla=='ficha'){
    //Consulta para eliminar solo una ficha. Eliminamos sus datos y luego la propia ficha
    $consulta="DELETE FROM datos_portero where id_ficha=".$id_reg."";
    mysqli_query($con,$consulta);
    $consulta="DELETE FROM datos_ofensivos where id_ficha=".$id_reg."";
    mysqli_query($con,$consulta);
    $consulta="DELETE FROM datos_defensivos where id_ficha=".$id_reg."";
    mysqli_query($con,$consulta);
    $consulta="DELETE FROM datos_psicologicos where id_ficha=".$id_reg."";
    mysqli_query($con,$consulta);
    $consulta="DELETE FROM ficha where id=".$id_reg."";
    mysqli_query($con,$consulta);
    mysqli_close($con);
    //redireccionamos a la página según el tipo de usuario
    if($_SESSION['tipoUsuario']=='admin'){ header('Location:../admin/panel.php');
    }elseif($_SESSION['tipoUsuario']=='team'){ header('Location:../team/panel.php');
    }elseif($_SESSION['tipoUsuario']=='ojeador') header('Location:../ojeador/panel.php');

}elseif($nombre_tabla=='usuario'){
    //Desactivamos el usuario
    $consulta="UPDATE usuario SET activo='no' where id=".$id_reg."";
    $resultado=mysqli_query($con,$consulta);
    mysqli_close($con);
    //redireccionamos a la página según el tipo de usuario
    if($_SESSION['tipoUsuario']=='admin'){ header('Location:../admin/panel.php');
    }elseif($_SESSION['tipoUsuario']=='team'){ header('Location:../team/panel.php');
    }elseif($_SESSION['tipoUsuario']=='ojeador') header('Location:../ojeador/panel.php');
}elseif($nombre_tabla=='factura'){//aquí solo entra el admin
    //Eliminamos la factura
    $consulta="SELECT enlace FROM factura where id=".$id_reg."";
    $resultado=mysqli_query($con,$consulta);
    $mostrar2=mysqli_fetch_array($resultado);
    $consulta2="DELETE FROM factura where id=".$id_reg."";
    $resultado2=mysqli_query($con,$consulta2);
    //despues de eliminar el registro eliminamos el archivo
    unlink("facturacion/".$mostrar2['enlace']."");
    mysqli_close($con);
    //redireccionamos a la página de admin
    header('Location:../admin/panel.php');
    
}



?>