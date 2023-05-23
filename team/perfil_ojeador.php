<?php require_once "vistaSuperior.php"?>
<?php
 
  $idConsulta=$_GET['id'];
  $resultado=$resultado=dameConsulta("SELECT * from usuario where id='$idConsulta'");
  $mostrar=mysqli_fetch_array($resultado);
  $activado=$mostrar['activo'];
?>



<div class="container-fluid">
						
<div class="row mx-auto">
        <div class="col">
        <h1 class="h3 mb-3 text-gray-800 "><b><?php echo $mostrar["nombre"]." ".$mostrar["apellidos"]?></b></h1>
        
        </div>
        <div class="col-md-auto">
        </div>
        <div class="col-md-auto">
        <?php 
            if($activado=='si'){
                echo "
                    <button type='button' id='btnElim' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#eliminarModal".$mostrar['id']."'>
                       Dar de Baja
                    </button>";
            }else{
                echo " <button type='button' id='btnElim' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#activarModal".$mostrar['id']."'>
                    Dar de Alta
                </button>";
            }
            ?>
            <!--Ventana Modal para la Alerta de Eliminar--->
            <?php include('../funciones/forms/modalBajaOjeador.php'); ?>
            <?php include('../funciones/forms/modalActivarUsuario.php'); ?>
        <br></br>
        </div>
    </div>
					<div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-gray-800"><b>Foto de Perfil</b></div>
                                    <div class="card-body text-center">
                                        <img class="img-account-profile rounded-circle width="150" height="150"" src="<?php echo "../img/".$_SESSION['img']?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                <div class="card-header text-gray-800"><b>Detalles de la cuenta</b></div>
                                    <div class="card-body">
                                            
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputEmail">Email</label>
                                                    <p class="card-text"><?php echo $mostrar['email']?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputNombre">Nombre</label>
                                                    <p class="card-text"><?php echo $mostrar['nombre']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputApellidos">Apellidos</label>
                                                    <p class="card-text"><?php echo $mostrar['apellidos']?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputTelefono">Teléfono</label>
                                                    <p class="card-text"><?php echo $mostrar['telefono']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputCiudad">Ciudad</label>
                                                    <p class="card-text"><?php echo $mostrar['ciudad']?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputDireccion">Dirección</label>
                                                    <p class="card-text"><?php echo $mostrar['direccion']?></p>
                                                </div>
                                            </div>
                                            

                                            
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

        <div class="col-lg-6">

        <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                <h5 class="card-header h5 mb-0 font-weight-bold text-gray-800">Fichas recientes</h5>
                <a href="lista_jugadores.php" style="text-align: center; display: inline-block;">Ver más</a>
                
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Posición</th>
                                            <th>Evento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $resultado=dameConsulta("SELECT fecha,partido,posicion FROM ficha WHERE id_ojeador=".$idConsulta." ORDER BY id DESC LIMIT 5");

                                            while($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td id="fecha"><?php  echo $mostrar['fecha']?></td>
                                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                                            <td id="partido"><?php  echo $mostrar['partido']?></td>
                                        </tr>
                                        <?php
                                         }?>
                                        
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>
        
        </div>

        <div class="col-lg-6">

        <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                <h5 class="card-header h5 mb-0 font-weight-bold text-gray-800">Reseñas recientes</h5>
                <a href="lista_resena.php" style="text-align: center; display: inline-block;">Ver más</a>
                
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Evento</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $resultado=dameConsulta("SELECT evento, fecha FROM resena WHERE id_ojeador=".$idConsulta." ORDER BY id DESC LIMIT 5");

                                            while($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td id="evento"><?php  echo $mostrar['evento']?></td>
                                            <td id="fecha"><?php  echo $mostrar['fecha']?></td>
                                        </tr>
                                        <?php
                                         }?>
                                        
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>
        
        </div>
        
    </div>
                        
                         
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>