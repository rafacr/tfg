<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
						
					<div class="container-xl px-4 mt-4">
                        <div class="row justify-content-center">
                            
                            <div class="col-8 ">
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>Nueva Ficha</b></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <label class=" text-gray-800">Introduce los datos básicos de la ficha para acceder al contenido completo</label>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col">

                                                    <label class="small mb-1 text-gray-800" for="inputNombre">Jugador</label>
                                                    <input class="form-control" id="num" type="number" readonly=»readonly» name="num" placeholder="<?php echo $_GET['nombre']?>" value="<?php echo $_GET['nombre']?>" >
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="input">Evento</label>
                                                    <input class="form-control" id="evento" name="evento" type="text" placeholder="Partido/Entrenamiento"  value="">
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="input">Fecha</label>
                                                    <input class="form-control" id="fecha" name="fecha" type="date" placeholder=""  value="">
                                                </div>
                                                
                                            </div>
                                            <?php
                                                //en el caso de un equipo pasamos su id, en el caso de un ojeador pasamos el id del equipo
                                                registrar_ficha($_GET['id'],$_GET['id_eq'],$_SESSION['id'],$_GET['pos']);
                                            ?>
                                            <input name="btnAddFicha" type="submit" class="btn btn-primary btn-user btn-block" value="Registar Ficha">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                 
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>