<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
					
					<div class="container-xl px-4 mt-4">
                        <!-- Account page navigation-->
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-danger "><b>Información de registro</b></div>
                                    <div class="card-body">
                                        <!-- Profile picture image-->
                                        <p class="mb-4 text-gray-800 text-justify">Recuerda que una vez registres a tu nuevo ojeador se le enviará un email de confirmación y deberás facilitarle su contraseña.</p>	
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header"><b>Datos de la cuenta</b></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputFirstName">Email</label>
                                                    <input class="form-control" id="email" type="email" name="email" placeholder="Introduce el email" value="" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800">Contraseña</label>
                                                    <input class="form-control" id="password" type="password" name="password" placeholder="***********" value="" required>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" >Nombre</label>
                                                    <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Introduce el nombre" value="" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" >Apellidos</label>
                                                    <input class="form-control" id="apellidos" type="text" name="apellidos" placeholder="Introduce los apellidos" value="" required>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800">Teléfono</label>
                                                    <input class="form-control" id="telefono" type="number" name="telefono" placeholder="666666666" value="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" >Ciudad</label>
                                                    <input class="form-control" id="ciudad" type="text" name="ciudad" placeholder="Ciudad" value="">
                                                </div>
                                            </div>
                                            <?php
                                                //en el caso de un equipo pasamos su id, en el caso de un ojeador pasamos el id del equipo
                                                registrar_ojeador($_SESSION['id']);
                                            ?>
                                            <input name="btnAddOjeador" type="submit" class="btn btn-primary btn-user btn-block" value="Registar ojeador">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                 
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>