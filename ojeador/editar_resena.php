<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
							
					<div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                <div class="card-header text-gray-800 text-center">Nueva Reseña</div>
                                    <div class="card-body">
                                        <form class="user" action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="inputFecha">Fecha</label>
                                                        <input class="form-control" id="inputFecha" name="inputFecha" type="date"  placeholder="DD-MM-YYYY" value=""required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="inputPartido">Partido</label>
                                                        <input class="form-control" id="inputPartido" name="inputPartido" type="text"  placeholder="Equipo alevín" value=""required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="inputDescripcion">Texto de la reseña</label>
                                                        <textarea class="form-control" id="inputDescripcion" name="inputDescripcion" type="textarea" rows="5"  placeholder="Escribe el algo destacable que hayas visto en un partido y que sea valorable para tu responsable de equipo" value="" required></textarea>
                                                    </div>
                                                    <?php
                                                        
                                                        editar_resena($_GET['id'],$_SESSION['id'],$_SESSION['id_equipo']);
                                                    ?>
                                                <input name="btnAddResena" type="submit" class="btn btn-primary btn-user btn-block" value="Guardar Reseña">
                                                </div>        
                                            </div>
                                        </form>
                                    </div>    
                                </div>
                            </div>
                        </div>

                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>