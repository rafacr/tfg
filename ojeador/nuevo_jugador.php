<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
						
					<div class="container-xl px-4 mt-4">
                        <div class="row justify-content-center">
                            
                            <div class="col-8 ">
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>Nuevo Jugador</b></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <label class=" text-gray-800">Introduce los datos básicos de un jugador para generar su perfil y acceder al perfil completo</label>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="inputNombre">Nombre</label>
                                                    <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Introduce el nombre" value="" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="inputApellidos">Apellidos</label>
                                                    <input class="form-control" id="apellidos" type="text" name="apellidos" placeholder="Introduce los apellidos" value=""required>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="inputEquipo">Equipo</label>
                                                    <input class="form-control" id="equipo" name="equipo" type="text" placeholder="Introduce el equipo"  value="">
                                                    <label class="text-danger"><input type="checkbox" id="cboxEquipo" name="cboxEquipo" value="mi equipo"> Selecciona la casilla si el jugador pertenecerá a tu equipo</label>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-800" for="inputCategoria">Categoría</label>
                                                    <select class="form-control" id="selectCategoria" name="selectCategoria">
                                                        <option value="benjamin">Pre/Benjamin</option>
                                                        <option value="alevin" selected>Alevín</option>
                                                        <option value="infantil">Infantil</option>
                                                        <option value="cadete">Cadete</option>
                                                        <option value="juvenil">Juvenil</option>
                                                        <option value="profesional">Profesional</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                                //en el caso de un equipo pasamos su id, en el caso de un ojeador pasamos el id del equipo
                                                registrar_jugador($_SESSION['id_equipo']);
                                            ?>
                                            <input name="btnAddJugador" type="submit" class="btn btn-primary btn-user btn-block" value="Registar jugador">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                 
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>