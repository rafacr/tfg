<?php require_once "vistaSuperior.php"?>
<?php
  
  // Consulta para la base de datos.
  $idConsulta=$_SESSION['id'];
  $resultado=$resultado=dameConsulta("SELECT * from usuario where id='$idConsulta'");
  $mostrar=mysqli_fetch_array($resultado);

?>
<div class="container-fluid">
							
					<div class="container-xl px-4 mt-4">
                        <!-- Account page navigation-->
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-gray-800">Foto de Perfil</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                      
                                        <img class="img-account-profile rounded-circle width="150" height="150"" src="<?php echo "../img/".$_SESSION['img']?>" alt="">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">Formato JPG menor de 3 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form action="../funciones/funcion_subirImagenPerfil.php" enctype="multipart/form-data" method="post">
                                            <input type="file" name="imagen">
                                            <input type="submit" value="Subir">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800">Detalles de la cuenta</div>
                                    <div class="card-body">
                                    <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="form-label text-gray-800" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" readonly=»readonly» value="<?php echo $mostrar['email']?>"required>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small text-gray-800" for="inputFirstName">Nombre</label>
                                                    <input class="form-control" id="nombre" type="text" name="nombre" value="<?php echo $mostrar['nombre']?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small text-gray-800" for="inputCif">CIF</label>
                                                    <input class="form-control" id="cif" type="text" name="cif" value="<?php echo $mostrar['cif']?>"required>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small text-gray-800" for="inputTelefono">Teléfono</label>
                                                    <input class="form-control" id="telefono" type="number" name="telefono" value="<?php echo $mostrar['telefono']?>" required>
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small text-gray-800" for="inputCiudadLocation">Ciudad</label>
                                                    <input class="form-control" id="ciudad" type="text" name="ciudad" value="<?php echo $mostrar['ciudad']?>"required>
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small text-gray-800" for="inputDireccion">Dirección</label>
                                                    <input class="form-control" id="direccion" type="text" name="direccion" value="<?php echo $mostrar['direccion']?>" required>
                                                </div>
                                            </div>
                                            <?php
                                                actualizar_datos($_SESSION['tipoUsuario']);
                                            ?>
                                            <input name="btnActualizarDatos" class="btn btn-primary" type="submit" value="Actualizar Datos">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800">Modificar contraseña</div>
                                    <div class="card-body">
                                    <form action="" class="user" method="post">
                                            <!-- Form Group (nueva contraseña)-->
                                            <div class="mb-3">
                                                <label class="small text-gray-800" for="inputPassword">Contraseña nueva</label>
                                                <input class="form-control" id="inputPassword" type="password" name="passActual" placeholder="" value="" required>
                                            </div>
                                            <!-- Form Group (nueva contraseña repetida)-->
                                            <div class="mb-3">
                                                <label class="small text-gray-800" for="inputPassword">Repita la nueva contraseña</label>
                                                <input class="form-control" id="inputPasswordRep" type="password" name="passActualRep" placeholder="" value="" required>
                                            </div>
                                            <?php
                                                actualizar_password();
                                            ?>
                                            <input name="btnActualizarPass" class="btn btn-primary" type="submit" value="Actualizar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800">Modificar email de la cuenta</div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="small text-gray-800" for="inputEmailAddress">Email actual</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" readonly=»readonly» name="emailActual" placeholder="" value="<?php echo $mostrar['email']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="small text-gray-800" for="inputEmailAddress">Nuevo Email</label>
                                                <input class="form-control" id="emailNuevo" type="email" name="emailNuevo" placeholder="usuario@ejemplo.com" value="" required>
                                            </div>
                                            <?php
                                                actualizar_email();
                                            ?>
                                            <input name="btnActualizarEmail" class="btn btn-primary" type="submit" value="Actualizar email">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>