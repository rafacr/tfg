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
                                                    <label class="form-label text-gray-800" for="inputApellidos">CIF</label>
                                                    <p class="card-text"><?php echo $mostrar['cif']?></p>
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
                            <div class="col-xl">
                            <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-center text-primary">Equipo de ojeadores</h6>
                                
                                
        
                            </div>
                            <div class="card-body">
                            
                            <div class="table-responsive">
                <table class="table table-bordered" id="tablaOjeador" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <!-- Bucle con la consulta para mostrar en la tabla -->
                        <?php 
                            $resultado=dameConsulta("SELECT * from usuario  where id_equipo=".$mostrar['id']."");

                            while($mostrar=mysqli_fetch_array($resultado)){
                                $activado=$mostrar['activo'];
                        ?>
                            <tr>
                                <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                                <td id="email"><?php  echo $mostrar['email']?></td>
                                <td id="telefono"><?php  echo $mostrar['telefono']?></td>
                                <th>
                                <a href="perfil_ojeador.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
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
                                </th>

                            </tr>
                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('../funciones/forms/modalBajaOjeador.php'); ?>
                            <?php include('../funciones/forms/modalActivarUsuario.php'); ?>
                        <?php
                        }?>
                        <!-- Fin del Bucle -->
                        </tbody>
                </table>
                                </div>

                                
                            </div>
                        </div> 
                        </div> 
                        </div> 
                        
                        <div class="row">
                            <div class="col-xl">
                            <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-center text-primary">Listado de facturas</h6>
                                
                                
        
                            </div>
                            <div class="card-body">
                            
                            <div class="table-responsive">
                <table class="table table-bordered" id="tablaOjeador" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mes</th>
                            <th>Fecha Emisión</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mes</th>
                            <th>Fecha Emisión</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <!-- Bucle con la consulta para mostrar en la tabla -->
                        <?php 
                            $resultado2=dameConsulta("SELECT * from factura  where id_equipo=".$idConsulta."");

                            while($mostrar2=mysqli_fetch_array($resultado2)){
                        ?>
                            <tr>
                                <td id="mes"><?php  echo $mostrar2['mes']?></td>
                                <td id="fecha"><?php  echo $mostrar2['fecha_emision']?></td>
                                <th>
                                <a href="../funciones/facturacion/<?php echo $mostrar2['enlace'] ?>" target="_blank" class="btn btn-info">Ver</a>
                                <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                         <?php include('../funciones/forms/modalEliminarFactura.php'); ?>
                        <?php
                        }?>
                        <!-- Fin del Bucle -->
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