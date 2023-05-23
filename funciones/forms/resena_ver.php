<div class="container-fluid">
<?php
    
    $idConsulta=$_GET['id'];
    $resultado=dameConsulta("SELECT * from resena where id='$idConsulta'");
    $mostrar=mysqli_fetch_array($resultado);    
?>

<div class="container-xl px-4 mt-4">

<div class="row mx-auto">
        <div class="col">
        </div>
        <div class="col-md-auto">
        <a href="resena_editar.php?id=<?php echo $_GET['id'] ?>" class="btn btn-warning shadow-sm"><i class=" text-white-50"></i> Editar Reseña</a>
        </div>
        <div class="col-md-auto">
        <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $mostrar['id']; ?>">
            Eliminar Reseña
        </button>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <?php include('../funciones/forms/modalEliminarResena.php'); ?>
        <br></br>
        </div>
    </div>

<div class="row">
                            <div class="col-xl">
                                <!-- Profile picture card-->
                                <div class="card">
                                <div class="card-header text-gray-800 text-center"><b>Reseña del Ojeador <?php echo $mostrar['id_ojeador']?> </b></div>
                                    <div class="card-body">
                                            <!-- Form Group (email address)-->
                                            <div class="row mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label  text-gray-800" for="inputFecha">Fecha</label>
                                                        <p class="card-text"><?php echo $mostrar['fecha']?></p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label  text-gray-800" for="inputPartido">Partido</label>
                                                        <p class="card-text"><?php echo $mostrar['evento']?></p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label class="form-label  text-gray-800" for="inputDescripcion">Texto de la reseña</label>
                                                        <p class="card-text"><?php echo $mostrar['descripcion']?></p>
                                                        </div>
                                                    </div>        
                                            </div>
                                    </div>    
                                </div>
                            </div>
                            </div>
                        </div>
</div>