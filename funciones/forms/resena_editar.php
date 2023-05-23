<div class="container-fluid">
<?php    
    $idConsulta=$_GET['id'];
    $resultado=dameConsulta("SELECT * from resena where id='$idConsulta'");
    $mostrar=mysqli_fetch_array($resultado);    
?>

<div class="container-xl px-4 mt-4">
<div class="row">
                            <div class="col-xl">
                                <!-- Profile picture card-->
                                <div class="card">
                                <div class="card-header text-gray-800 text-center">Edición de Reseña</div>
                                    <div class="card-body">
                                        <form class="user" action="" method="post">
                                            <!-- Form Group (email address)-->
                                            <div class="row mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label text-gray-800" for="inputFecha">Fecha</label>
                                                        <input class="form-control" id="inputFecha" name="inputFecha" type="date"  placeholder="DD-MM-YYYY" value="<?php echo $mostrar['fecha']?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-gray-800" for="inputPartido">Partido</label>
                                                        <input class="form-control" id="inputPartido" name="inputPartido" type="text"  placeholder="Equipo alevín" value="<?php echo $mostrar['evento']?>" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label class="form-label text-gray-800" for="inputDescripcion">Descripción de la reseña</label>
                                                        <textarea class="form-control" id="inputDescripcion" name="inputDescripcion" type="textarea" rows="5"  placeholder="" required><?php echo $mostrar['descripcion']?></textarea>
                                                    </div>
                                                    <?php
                                                        actualizar_resena($idConsulta);
                                                    ?>
                                                <!-- Save changes button-->
                                                <input name="btnActualizarResena" type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar Reseña">
                                                </div>        
                                            </div>
                                        </form>
                                    </div>    
                                </div>
                            </div>
                            </div>
                            </div>
</div>