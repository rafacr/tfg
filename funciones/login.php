<?php 
 //session_start();
 include("conexion.php");
 include("funciones_email.php");
 

function login(){

  $con=conectar();
        
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
  
  ?>