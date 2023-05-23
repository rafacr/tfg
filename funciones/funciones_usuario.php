<?php 
 //session_start();
 include("conexion.php");
 include("funciones_email.php");
 

function login(){

  $con=conectar();

 if(!empty($_POST['btnLogin'])){
        
			// Check connection
			if (!$con) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
      $email = $_POST['emailUser'];
      $password = $_POST['passwordUser'];//Passwordimage.png facilitada en el formulario
			
			$resultado = mysqli_query($con, "SELECT * from usuario where email='$email' AND activo='si'");
			$mostrar = mysqli_fetch_assoc($resultado);
			
      /* 1-Comprobamos que hay un registro por lo tanto existo un usuario con el email y esta activo
      2- Guardamos la contraseña hash y hacemos password_veify()
      3-Si es correcta la contraseña guardamos la sesion segun el tipo de usuario */
      if(mysqli_num_rows($resultado)!=0){
        // Variable $hash hold the password hash on database
        $hash = $mostrar['password'];
          if (password_verify($password,$hash)) {	
            session_start();
            if($mostrar['tipo']=='admin'){
                    // Guardo en la sesión el email del usuario.
                    $_SESSION['id'] = $mostrar['id'];
                    $_SESSION['nombre'] = $mostrar['nombre'];
                    $_SESSION['tipoUsuario'] = $mostrar['tipo'];
                    $_SESSION['img'] = $mostrar['img_perfil'];
                    header('Location:admin/panel.php');
                    //echo "<script>location.href='admin/panel.php';</script>"; 
                }elseif($mostrar['tipo']=='team'){
                        // Guardo en la sesión el email del usuario.
                        $_SESSION['id'] = $mostrar['id'];
                        $_SESSION['id_equipo'] = $mostrar['id'];
                        $_SESSION['nombre'] = $mostrar['nombre'];
                        $_SESSION['tipoUsuario'] = $mostrar['tipo'];
                        $_SESSION['img'] = $mostrar['img_perfil'];
                        header('Location:team/panel.php');
                        //echo "<script>location.href='team/panel.php';</script>"; 
                }elseif($mostrar['tipo']=='ojeador'){
                            // Guardo en la sesión el email del usuario.
                            $_SESSION['id'] = $mostrar['id'];
                            $_SESSION['id_equipo'] = $mostrar['id_equipo'];
                            $_SESSION['nombre'] = $mostrar['nombre'];
                            $_SESSION['tipoUsuario'] = $mostrar['tipo'];
                            $_SESSION['img'] = $mostrar['img_perfil'];

                            //Consulta del nombre del equipo para guardarlo y mostrarlo en la barra superior
                            $id_equ=$mostrar['id_equipo'];
                            $consultaNombre="SELECT nombre from usuario where id='$id_equ'";
                            $resultado2=mysqli_query($con,$consultaNombre);
                            $mostrarNombre=mysqli_fetch_array($resultado2);
                            $_SESSION['nombre_equipo'] = $mostrarNombre['nombre'];
                            header('Location:ojeador/panel.php');
                            //echo "<script>location.href='ojeador/panel.php';</script>";  
                }
                mysqli_close($con);
          
          } else {
            echo '<div class="text-center"><a class="text-danger">Contraseña incorrecto,vuelva a intenarlo.</a></div>';			
            mysqli_close($con);
          }	
        }else{
          echo '<div class="text-center"><a class="text-danger">El email no se encuentra registrado o no ha sido activado,vuelva a intenarlo.</a></div>';			
          mysqli_close($con);
        }
  }	
}

function registrar_usuario(){
    if(!empty($_POST['btnRegistrar'])){
        $nombre = $_POST['nombreEquipo'];
        $cif = $_POST['cifEquipo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passHash=password_hash($password, PASSWORD_DEFAULT);//Encriptamos la contraseña
        $imgDefecto="profile_defecto.jpg";
      
        $con=conectar();
         
        // Validar la conexión de base de datos.
        if ($con ->connect_error) {
          die("Connection failed: " . $con ->connect_error);
        }
         
        // Consulta para la base de datos.
        $consulta="INSERT INTO usuario (`email`, `password`,`activo`, `cif`, `nombre`, `apellidos`, `direccion`, `ciudad`, `telefono`, `tipo`, `id_equipo`, `img_perfil`) VALUES ('$email','$passHash','no','$cif','$nombre',null,null,null,null,'team',0,'$imgDefecto')";
        $resultado=mysqli_query($con,$consulta);
        $idAct=$con->insert_id;
        
        // Verificando si el usuario existe en la base de datos.
        if($resultado){
          enviarEmailActivacion($nombre,$email,$idAct);//llamamos a la función pasándole el email y el nombre
          header ('Location:registrofinalizado.html');
          mysqli_close($con);
        }else{
          echo '<div class="text-center" ><a class="text-danger" color="red">Ya existe un usuario registrado con este email.</a></div>';
        }
        mysqli_close($con);
      }

}

function recuperar_password(){

    if(!empty($_POST['btnRecuperar'])){
        $email = $_POST['email'];
        $con=conectar();
            
        // Consulta para la base de datos.
        $consulta="SELECT * from usuario where email='$email'";
        $resultado=mysqli_query($con,$consulta);
        
        
        // Verificando si el usuario existe en la base de datos.
        if(mysqli_num_rows($resultado)!=0){
          $mostrar=mysqli_fetch_array($resultado);
        
          //generamos una nueva password
          $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
          $passwordAleatoria=substr(str_shuffle($chars), 0, 10);

          //encriptamos la password para la base de datos
          $passHash=password_hash($passwordAleatoria, PASSWORD_DEFAULT);
          $consulta="UPDATE usuario SET password='$passHash' where id=".$mostrar['id']."";
          $resultado=mysqli_query($con,$consulta);

          $emailEnvio=$mostrar['email'];
          $nombreEnvio=$mostrar['nombre'];
          $passwordEnvio=$passwordAleatoria;//Al usuario le enseñamos la password sin encriptar
          
          
          enviarEmailRecuperacionPass($nombreEnvio,$emailEnvio,$passwordEnvio);
          echo '<div class="text-center"><a class="text-danger">Revise su correo electrónico para recuperar su contraseña</a></div>';
        }else{
          echo '<div class="text-center"><a class="text-danger">No existe ningún email registrado,asegúrese de haberlo escrito correctamente.</a></div>';
        }
        mysqli_close($con);
    }

}

function actualizar_password(){

    if(!empty($_POST['btnActualizarPass'])){
 
        $pass1 = $_POST['passActual'];
        $pass2 = $_POST['passActualRep'];
        $idAct= $_SESSION['id'];
        $con=conectar();
          
        if($pass1==$pass2){
          
          // Consulta para la base de datos.
          $passHash=password_hash($pass1, PASSWORD_DEFAULT);
          $consulta="UPDATE usuario SET password='$passHash' where id='$idAct'";
          $resultado=mysqli_query($con,$consulta);
          
          // Verificando que se haya actualizado el campo
          if($resultado){
            echo '<div class="text-center" ><a class="text-danger" color="red">La contraseña se ha cambiado correctamente.</a></div>';
          }
        }else{
          echo '<div class="text-center" ><a class="text-danger" color="red">La contraseña introducida debe ser la misma.</a></div>';
        }
        mysqli_close($con);
      }

}

function actualizar_datos($tipo){

    if(!empty($_POST['btnActualizarDatos'])){

        $con=conectar();
        $idAct= $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $telefono= $_POST['telefono'];
        $ciudad= $_POST['ciudad'];
        $direccion= $_POST['direccion'];
      
        //El dato diferente es que un equipo tiene cif y el ojeador/admin apellidos
        if($tipo=="team"){
          $cif=$_POST['cif'];
          $consulta="UPDATE usuario SET nombre='$nombre', cif='$cif', telefono='$telefono', ciudad='$ciudad', direccion='$direccion' where id='$idAct'";
        }elseif($tipo=="ojeador" || $tipo=="admin"){
          $apellidos = $_POST['apellidos'];
          $consulta="UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', ciudad='$ciudad', direccion='$direccion' where id='$idAct'";
        }
        // Consulta para la base de datos.
        
        $resultado=mysqli_query($con,$consulta);
        mysqli_close($con);
        echo "<script>location.href='perfil.php';</script>";
      
      
      }


}

function actualizar_email(){

    if(!empty($_POST['btnActualizarEmail'])){
 
        $email = $_POST['emailNuevo'];
        $idAct= $_SESSION['id'];
        
        $con=conectar();
        // Consulta para la base de datos.
        $consulta="SELECT * from usuario where email='$email'";
        $resultado=mysqli_query($con,$consulta);
        
        
        // Verificando si el usuario existe en la base de datos.
        if(mysqli_num_rows($resultado)!=0){
          echo "El email introducido ya se encuentra registrado en el sistema";
        }else{
          enviarEmailActualizacionEmail($_SESSION['nombre'],$email,$idAct);
        }
        
        mysqli_close($con);
      }
}

function dameConsulta($consulta){
  $con = conectar();
   
  // Validar la conexión de base de datos.
  if ($con ->connect_error) {
   die("Connection failed: " . $con ->connect_error);
  }
                       
  $resultado=mysqli_query($con,$consulta);
  mysqli_close($con);
  return $resultado;
}

function registrar_resena($id_oje,$id_eq){
  if(!empty($_POST['btnAddResena'])){

      $fecha = $_POST['inputFecha'];
      $partido = $_POST['inputPartido'];
      $descripcion = $_POST['inputDescripcion'];
    
      $con=conectar();
       
      // Validar la conexión de base de datos.
      if ($con ->connect_error) {
        die("Connection failed: " . $con ->connect_error);
      }
       
      // Consulta para la base de datos.
      $consulta="INSERT INTO resena (`evento`, `fecha`,`descripcion`, `id_equipo`, `id_ojeador`) VALUES ('$partido','$fecha','$descripcion','$id_eq','$id_oje')";
      $resultado=mysqli_query($con,$consulta);
      
      // Verificando si el usuario existe en la base de datos.
      if($resultado){
        echo '<div class="text-center" ><a class="text-danger" color="red">Reseña registrada correctamente.</a></div>';
        
      }else{
        echo '<div class="text-center" ><a class="text-danger" color="red">No se ha realizado el registro correctamente, por favor compruebe los datos.</a></div>';
      }
      mysqli_close($con);
    }

}

function editar_resena($id_res,$id_oje,$id_eq){
  if(!empty($_POST['btnAddResena'])){

      $fecha = $_POST['inputFecha'];
      $partido = $_POST['inputPartido'];
      $descripcion = $_POST['inputDescripcion'];
    
      $con=conectar();
       
      // Validar la conexión de base de datos.
      if ($con ->connect_error) {
        die("Connection failed: " . $con ->connect_error);
      }
       
      // Consulta para la base de datos.
      $consulta="UPDATE resena SET evento='$partido', fecha='$fecha', descripcion='$descripcion' where id='$id_res'";
      $resultado=mysqli_query($con,$consulta);
      
      // Verificando si el usuario existe en la base de datos.
      if($resultado){
        echo '<div class="text-center" ><a class="text-danger" color="red">Reseña actualizada correctamente.</a></div>';
        
      }else{
        echo '<div class="text-center" ><a class="text-danger" color="red">No se ha realizado la actualización correctamente, por favor compruebe los datos.</a></div>';
      }
      mysqli_close($con);
    }

}

function actualizar_datos_jugador($id){

  if(!empty($_POST['btnActualizarDatosJugador'])){

      $con=conectar();
      $idAct= $id;
      $peso= $_POST['peso'];
      $altura= $_POST['altura'];
      $pierna= $_POST['selectPierna'];
      $posicion=$_POST['selectPosicion'];
      $categoria= $_POST['selectCategoria'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE jugador SET altura='$altura',posicion='$posicion',peso='$peso',pierna='$pierna',categoria='$categoria' where id='$idAct'";
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='jugador_editar.php?id=".$idAct."';</script>";
    
    
    }


}

function actualizar_info_jugador($id){

  if(!empty($_POST['btnActualizarInfoJugador'])){

      $con=conectar();
      $idAct= $id;
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $year= $_POST['yearNacimiento'];
      $equipo= $_POST['equipo'];
      $finContrato= $_POST['fin_contrato'];
      $salario= $_POST['salario'];
      $debut= $_POST['debut'];
      $residencia= $_POST['residencia'];
      $idiomas= $_POST['idiomas'];
      
        
      // Consulta para la base de datos.
      $consulta="UPDATE jugador SET nombre='$nombre', apellidos='$apellidos', yearNacimiento='$year',
       idiomas='$idiomas', residencia='$residencia',debut='$debut',salario='$salario',equipo='$equipo',
       fin_contrato='$finContrato' where id='$idAct'";
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='jugador_editar.php?id=".$id."';</script>";
    
    
    }


}

function actualizar_historial_jugador($id){

  if(!empty($_POST['btnActualizarHistorialJugador'])){

      $con=conectar();
      $idAct= $id;
      $histEquipos= $_POST['historialEquipos'];
      $histLesiones= $_POST['historialLesiones'];
      $histSanciones= $_POST['historialSanciones'];
      $histPalmares= $_POST['historialPalmares'];
      
        
      // Consulta para la base de datos.
      $consulta="UPDATE jugador SET historial_equipos='$histEquipos',historial_lesiones='$histLesiones',
      historial_sanciones='$histSanciones',historial_palmares='$histPalmares' where id='$idAct'";
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='jugador_editar.php?id=".$id."';</script>";
    
    
    }


}

function actualizar_dafo_jugador($id){

  if(!empty($_POST['btnActualizarDafoJugador'])){

      $con=conectar();
      $idAct= $id;
      $debilidades= $_POST['d_debilidades'];
      $amenazas= $_POST['d_amenazas'];
      $oportunidades= $_POST['d_oportunidades'];
      $fortalezas= $_POST['d_fortalezas'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE jugador SET dafo_oportunidades='$oportunidades',dafo_debilidades='$debilidades',
       dafo_amenazas='$amenazas',dafo_fortalezas='$fortalezas' where id='$idAct'";
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='jugador_editar.php?id=".$id."';</script>";
    
    
    }


}

function registrar_jugador($id_eq){
  if(!empty($_POST['btnAddJugador'])){

      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $categoria = $_POST['selectCategoria'];
      $imgDefecto="profile_defecto.jpg";

      if(isset($_POST['cboxEquipo'])){
        $equipo=$_POST['cboxEquipo'];
      }else{
        $equipo=$_POST['equipo'];
      }
    
      $con=conectar();
       
      // Validar la conexión de base de datos.
      if ($con ->connect_error) {
        die("Connection failed: " . $con ->connect_error);
      }
       
      // Consulta para la base de datos.
      $consulta="INSERT INTO jugador (`nombre`, `apellidos`,`equipo`,`categoria`, `id_equipo`,`img_perfil`) VALUES ('$nombre','$apellidos','$equipo','$categoria','$id_eq','$imgDefecto')";
      $resultado=mysqli_query($con,$consulta);
      
      $idJug=$con->insert_id;
      
      // Verificando si el usuario existe en la base de datos.
      if($resultado){
        mysqli_close($con);
        echo "<script>location.href='jugador_editar.php?id=".$idJug."';</script>"; 
      }else{
        mysqli_close($con);
       echo '<div class="text-center" ><a class="text-danger" color="red">No se ha realizado el registro correctamente, por favor compruebe los datos.</a></div>';
      }
      
    }

}

function registrar_ojeador($id_eq){
  if(!empty($_POST['btnAddOjeador'])){

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];//Recibimos la contraseña del formulario
    $passHash=password_hash($password, PASSWORD_DEFAULT);//Encriptamos la contraseña
    $imgDefecto="profile_defecto.jpg";
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
  
    $con=conectar();
     
    // Validar la conexión de base de datos.
    if ($con ->connect_error) {
      die("Connection failed: " . $con ->connect_error);
    }
     
    // Consulta para la base de datos.
    $consulta="INSERT INTO usuario (`email`, `password`,`cif`,`activo`, `nombre`, `apellidos`, `direccion`, `ciudad`, `telefono`, `tipo`, `id_equipo`, `img_perfil`) VALUES ('$email','$passHash',null,'no','$nombre','$apellidos',null,'$ciudad',$telefono,'ojeador',$id_eq,'$imgDefecto')";

    $resultado=mysqli_query($con,$consulta);
    $idAct=$con->insert_id;
    
    // Verificando si el usuario existe en la base de datos.
    if($resultado){
      enviarEmailActivacion($nombre,$email,$idAct);//llamamos a la función pasándole el email y el nombre
      
    }else{
      echo '<div class="text-center" ><a class="text-danger" color="red">Ya existe un usuario registrado con este email.</a></div>';
    }
    mysqli_close($con);
  }

}

function registrar_ficha($id_jug,$id_eq,$id_oje,$pos){
  if(!empty($_POST['btnAddFicha'])){

    $evento = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $posicion=$pos;
  
    $con=conectar();
     
    // Validar la conexión de base de datos.
    if ($con ->connect_error) {
      die("Connection failed: " . $con ->connect_error);
    }
     
    // Consulta para la base de datos.
    $consulta="INSERT INTO ficha (`id_jugador`, `fecha`,`partido`,`id_equipo`, `id_ojeador`,`posicion`) VALUES
     ('$id_jug','$fecha','$evento','$id_eq','$id_oje','$pos')";
    $resultado=mysqli_query($con,$consulta);
    $id_ficha=$con->insert_id;

    if($posicion=='portero'){
      $consulta1="INSERT INTO datos_portero (`blocaje`, `comentario_blocaje`,`despeje`,`comentario_despeje`,`desvio`,
      `comentario_desvio`, `rechace`,`comentario_rechace`,`prolongacion`,`comentario_prolongacion`,`reflejos`,
      `comentario_reflejos`, `pase_izquierdo`,`comentario_pase_izquierdo`,`pase_derecho`, `comentario_pase_derecho`,
      `id_ficha`) VALUES
      (null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',$id_ficha)";
      
      mysqli_query($con,$consulta1);

      $consulta2="INSERT INTO datos_psicologicos (`personalidad`, `comentario_personalidad`,`actitud`,`comentario_actitud`,
      `liderazgo`,`comentario_liderazgo`, `concentracion`,`comentario_concentracion`,`id_ficha`) VALUES
      (null,'-',null,'-',null,'-',null,'-',$id_ficha)";
      
      mysqli_query($con,$consulta2);

    }else{ 
      $consulta1="INSERT INTO datos_defensivos (`entrada`, `comentario_entrada`,`trackle`,`comentario_trackle`,
      `intercepcion`,`comentario_intercepcion`,`marcaje`,`comentario_marcaje`,`carga`, `comentario_carga`,
      `despeje_pie`,`comentario_despeje_pie`,`despeje_cabeza`,`comentario_despeje_cabeza`,`pase_izquierdo`,
      `comentario_pase_izquierdo`,`pase_derecho`, `comentario_pase_derecho`,`cobertura`,`comentario_cobertura`,
      `id_ficha`) VALUES
      (null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',$id_ficha)";
      mysqli_query($con,$consulta1);

      $consulta2="INSERT INTO datos_ofensivos (`conduccion_libre`,`comentario_conduccion_libre`,`conduccion_linea`,
      `comentario_conduccion_linea`,`control`,`comentario_control`,`control_orientado`,`comentario_control_orientado`,
      `regate`,`comentario_regate`,`tiro_parado`,`comentario_tiro_parado`,`tiro_movimiento`,`comentario_tiro_movimiento`,
      `finalizacion`,`comentario_finalizacion`,`pase_cabeza`,`comentario_pase_cabeza`,`remate_cabeza`,`comentario_remate_cabeza`,
      `pase_izquierdo`,`comentario_pase_izquierdo`,`pase_derecho`,`comentario_pase_derecho`,`penalties`, `comentario_penalties`,
      `corners`,`comentario_corners`,`tiro_libre`,`comentario_tiro_libre`,`id_ficha`) VALUES
      (null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',null,'-',$id_ficha)";
      mysqli_query($con,$consulta2);

      $consulta3="INSERT INTO datos_psicologicos (`personalidad`, `comentario_personalidad`,`actitud`,`comentario_actitud`,
      `liderazgo`,`comentario_liderazgo`, `concentracion`,`comentario_concentracion`,`id_ficha`) VALUES
      (null,'-',null,'-',null,'-',null,'-',$id_ficha)";
      mysqli_query($con,$consulta3);

    }

  
    echo "<script>location.href='ficha_editar.php?id=".$id_ficha."&id_jug=".$id_jug."';</script>";
    mysqli_close($con);
  }

}

function actualizar_resena($id){

  if(!empty($_POST['btnActualizarResena'])){

      $con=conectar();
      $idAct= $id;
      $fech= $_POST['inputFecha'];
      $part= $_POST['inputPartido'];
      $desc= $_POST['inputDescripcion'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE resena SET fecha='$fech', evento='$part', descripcion='$desc' where id='$idAct'";
      
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='resena_ver.php?id=".$idAct."';</script>";
    
    
    }


}

function actualizar_datos_portero($id,$idfich){

  if(!empty($_POST['btnActualizarDatosPortero'])){

      $con=conectar();
      $idAct= $id;
      $nBloc= $_POST['numBlocaje'];
      $cBloc= $_POST['anotBlocaje'];
      $nDesp= $_POST['numDespeje'];
      $cDesp= $_POST['anotDespeje'];
      $nDesv= $_POST['numDesvio'];
      $cDesv= $_POST['anotDesvio'];
      $nRech= $_POST['numRechace'];
      $cRech= $_POST['anotRechace'];
      $nProl= $_POST['numProlongacion'];
      $cProl= $_POST['anotProlongacion'];
      $nRefl= $_POST['numReflejos'];
      $cRefl= $_POST['anotReflejos'];
      $nPasIz= $_POST['num_pase_izquierdo'];
      $cPasIz= $_POST['anot_pase_izquierdo'];
      $nPasDer= $_POST['num_pase_derecho'];
      $cPasDer= $_POST['anot_pase_derecho'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE datos_portero SET `blocaje`=".$nBloc.",`comentario_blocaje`='".$cBloc."',
      `despeje`=".$nDesp.",`comentario_despeje`='".$cDesp."',`desvio`=".$nDesv.",`comentario_desvio`='".$cDesv."',
      `rechace`=".$nRech.",`comentario_rechace`='".$cRech."',`prolongacion`=".$nProl.",`comentario_prolongacion`='".$cProl."',
      `reflejos`=".$nRefl.",`comentario_reflejos`='".$cRefl."',`pase_izquierdo`=".$nPasIz.",`comentario_pase_izquierdo`='".$cPasIz."',
      `pase_derecho`=".$nPasDer.",`comentario_pase_derecho`='".$cPasDer."' WHERE id=".$idAct."";
      
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='ficha_editar.php?id=".$idfich."';</script>";
    
    
    }


}

function actualizar_datos_psicologicos($id,$idfich){

  if(!empty($_POST['btnActualizarDatosPsicologicos'])){

      $con=conectar();
      $idAct= $id;
      $nPers= $_POST['numPersonalidad'];
      $cPers= $_POST['anotPersonalidad'];
      $nAct= $_POST['numActitud'];
      $cAct= $_POST['anotActitud'];
      $nLid= $_POST['numLiderazgo'];
      $cLid= $_POST['anotLiderazgo'];
      $nConc= $_POST['numConcentracion'];
      $cConc= $_POST['anotConcentracion'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE datos_psicologicos SET `personalidad`=".$nPers.",`comentario_personalidad`='".$cPers."',
      `actitud`=".$nAct.",`comentario_actitud`='".$cAct."',`liderazgo`=".$nLid.",`comentario_liderazgo`='".$cLid."',
      `concentracion`=".$nConc.",`comentario_concentracion`='".$cConc."' WHERE id=".$idAct."";
      
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='ficha_editar.php?id=".$idfich."';</script>";
    
    
    }


}

function actualizar_datos_defensivos($id,$idfich){

  if(!empty($_POST['btnActualizarDatosDefensivos'])){

      $con=conectar();
      $idAct= $id;
      $nEnt= $_POST['numEntrada'];
      $cEnt= $_POST['anotEntrada'];
      $nTrac= $_POST['numTrackle'];
      $cTrac= $_POST['anotTrackle'];
      $nInter= $_POST['numIntercepcion'];
      $cInter= $_POST['anotIntercepcion'];
      $nMarc= $_POST['numMarcaje'];
      $cMarc= $_POST['anotMarcaje'];
      $nCarg= $_POST['numCarga'];
      $cCarg= $_POST['anotCarga'];
      $nDesPie= $_POST['numDespejePie'];
      $cDesPie= $_POST['anotDespejePie'];
      $nDesCab= $_POST['numDespejeCabeza'];
      $cDesCab= $_POST['anotDespejeCabeza'];
      $nPasIzq= $_POST['numPaseIzquierdo'];
      $cPasIzq= $_POST['anotPaseIzquierdo'];
      $nPasDer= $_POST['numPaseDerecho'];
      $cPasDer= $_POST['anotPaseDerecho'];
      $nCob= $_POST['numCobertura'];
      $cCob= $_POST['anotCobertura'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE datos_defensivos SET `entrada`=".$nEnt.",`comentario_entrada`='".$cEnt."',
      `trackle`=".$nTrac.",`comentario_trackle`='".$cTrac."',`intercepcion`=".$nInter.",`comentario_intercepcion`='".$cInter."',
      `marcaje`=".$nMarc.",`comentario_marcaje`='".$cMarc."',`carga`=".$nCarg.",`comentario_carga`='".$cCarg."',
      `despeje_pie`=".$nDesPie.",`comentario_despeje_pie`='".$cDesPie."',`despeje_cabeza`=".$nDesCab.",
      `comentario_despeje_cabeza`='".$cDesCab."',`pase_izquierdo`=".$nPasIzq.",`comentario_pase_izquierdo`='".$cPasIzq."',
      `pase_derecho`=".$nPasDer.",`comentario_pase_derecho`='".$cPasDer."',`cobertura`=".$nCob.",
      `comentario_cobertura`='".$cCob."' WHERE id=".$idAct."";
      
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='ficha_editar.php?id=".$idfich."';</script>";
    
    
    }


}

function actualizar_datos_ofensivos($id,$idfich){

  if(!empty($_POST['btnActualizarDatosOfensivos'])){

      $con=conectar();
      $idAct= $id;
      $nCondLib= $_POST['numConduccionLibre'];
      $cCondLib= $_POST['anotConduccionLibre'];
      $nCondLin= $_POST['numConduccionLinea'];
      $cCondLin= $_POST['anotConduccionLinea'];
      $nCont= $_POST['numControl'];
      $cCont= $_POST['anotControl'];
      $nConOr= $_POST['numControlOrientado'];
      $cConOr= $_POST['anotControlOrientado'];
      $nReg= $_POST['numRegate'];
      $cReg= $_POST['anotRegate'];
      $nTirPara= $_POST['numTiroParado'];
      $cTirPara= $_POST['anotTiroParado'];
      $nTirMov= $_POST['numTiroMovimiento'];
      $cTirMov= $_POST['anotTiroMovimiento'];
      $nFin= $_POST['numFinalizacion'];
      $cFin= $_POST['anotFinalizacion'];
      $nPasCab= $_POST['numPaseCabeza'];
      $cPasCab= $_POST['anotPaseCabeza'];
      $nRemCab= $_POST['numRemateCabeza'];
      $cRemCab= $_POST['anotRemateCabeza'];
      $nPasIzq= $_POST['numPaseIzquierdo'];
      $cPasIzq= $_POST['anotPaseIzquierdo'];
      $nPasDer= $_POST['numPaseDerecho'];
      $cPasDer= $_POST['anotPaseDerecho'];
      $nPen= $_POST['numPenalties'];
      $cPen= $_POST['anotPenalties'];
      $nCorn= $_POST['numCorners'];
      $cCorn= $_POST['anotCorners'];
      $nTirFal= $_POST['numTiroFalta'];
      $cTirFal= $_POST['anotTiroFalta'];
        
      // Consulta para la base de datos.
      $consulta="UPDATE datos_ofensivos SET `conduccion_libre`=".$nCondLib.",`comentario_conduccion_libre`='".$nCondLib."',
      `conduccion_linea`=".$nCondLin.",`comentario_conduccion_linea`='".$cCondLin."',`control`=".$nCont.",`comentario_control`='".$cCont."',
      `control_orientado`=".$nConOr.",`comentario_control_orientado`='".$cConOr."',`regate`=".$nReg.",
      `comentario_regate`='".$cReg."',`tiro_parado`=".$nTirPara.",`comentario_tiro_parado`='".$cTirPara."',
      `tiro_movimiento`=".$nTirMov.",`comentario_tiro_movimiento`='".$cTirMov."',`finalizacion`=".$nFin.",
      `comentario_finalizacion`='".$cFin."',`pase_cabeza`=".$nPasCab.",`comentario_pase_cabeza`='".$cPasCab."',
      `remate_cabeza`=".$nRemCab.",`comentario_remate_cabeza`='".$cRemCab."',`pase_izquierdo`=".$nPasIzq.",
      `comentario_pase_izquierdo`='".$cPasIzq."',`pase_derecho`=".$nPasDer.",`comentario_pase_derecho`='".$cPasDer."',
      `penalties`=".$nPen.",`comentario_penalties`='".$cPen."',`corners`=".$nCorn.",`comentario_corners`='".$cCorn."',
      `tiro_libre`=".$nTirFal.",`comentario_tiro_libre`='".$cTirFal."' WHERE id=".$idAct."";
      
      $resultado=mysqli_query($con,$consulta);
      mysqli_close($con);
      echo "<script>location.href='ficha_editar.php?id=".$idfich."';</script>";
    
    
    }


}

function enviar_email_ojeador(){
  if(!empty($_POST['btnEnviarNotificacionOjeador'])){

    $email=$_POST['selectOjeador'];
    $evento=$_POST['inputEvento'];
    $fecha=$_POST['inputFecha'];
    $textoMensaje=$_POST['inputNotificacion'];

    enviarEmailNotificacionOjeador($email,$evento,$fecha,$textoMensaje);
  }

}

function registrar_factura(){
  if(!empty($_POST['btnAddFactura'])){

      $mes = $_POST['selectMes'];
      $idEq = $_POST['selectEquipo'];
      $dia = date('Y-m-d');
      $con=conectar();
      $nombreArchivo="";
      // Validar la conexión de base de datos.
      if ($con ->connect_error) {
        die("Connection failed: " . $con ->connect_error);
      }

      if($_FILES["pdfFactura"]){
        $nombreOriginal=basename($_FILES["pdfFactura"]["name"]);
        $nombreArchivo="Factura_".$idEq."_".$mes."_".date('Y').".pdf";
        $ruta="../funciones/facturacion/".$nombreArchivo;

        if($_FILES["pdfFactura"]["type"]=='application/pdf'){
        $subirArchivo=move_uploaded_file($_FILES["pdfFactura"]["tmp_name"],$ruta);

        //if($subirArchivo){
          // Consulta para la base de datos.
          $consulta="INSERT INTO factura (`mes`, `fecha_emision`,`enlace`,`id_equipo`) VALUES ('$mes','$dia','$nombreArchivo','$idEq')";
          $resultado=mysqli_query($con,$consulta);
          echo "Se ha añadido la factura correctamente";
        }else{
          echo "Se ha producido un error, vuelva a intentarlo";
        }
      }
       
      
      //header('Location:../admin/lista_facturas.php');
      
    }

}

function prueba_select(){
  if(!empty($_POST['btnPrueba'])){

    $valores=array($_POST['jugador1'],$_POST['jugador2']);
    return $valores; 
  }else{
    $valores=array(1,1);
    return $valores; 
  }
}
?>