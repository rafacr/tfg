<?php require_once "vistaSuperior.php"?>
<?php
  $resultado=dameConsulta("SELECT * from usuario where id_equipo='".$_SESSION['id']."'");
?>



<div class="container-fluid">
							
					<div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                <div class="card-header text-gray-800"><b>Email de notificación</b></div>
                                    <div class="card-body">
                                        <form class="user" action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label text-gray-800" for="inputEmailAddress">Selecciona ojeador</label>
                                                        <select class="form-control" id="selectOjeador" name="selectOjeador">
                                                        <?php 
                                                            while($mostrar=mysqli_fetch_array($resultado)){
                                                        ?>
                                                            <option value="<?php  echo $mostrar['email']?>"><?php  echo $mostrar['nombre']?> <?php  echo $mostrar['apellidos']?></option>
                                                        <?php
                                                        }?>   
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-gray-800" for="inputFecha">Fecha</label>
                                                        <input class="form-control" id="inputFecha" type="date" name="inputFecha"  placeholder="DD-MM-YYYY" value=""required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-gray-800" for="inputEvento">Evento</label>
                                                        <input class="form-control" id="inputEvento" type="text" name="inputEvento" placeholder="Entrenamiento/Partido" value=""required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-4">
                                                        <label class="form-label text-gray-800" for="inputNotificacion">Texto de referencia</label>
                                                        <textarea class="form-control" id="inputNotificacion" type="textarea" name="inputNotificacion" rows="9"  placeholder="Escribe el email que recibirá el ojeador 1 indicandole el jugador que hay que seguir en el partido........." value="" required></textarea>
                                                    </div>
                                                    <?php
                                                        enviar_email_ojeador();
                                                    ?>  
                                                    <input name="btnEnviarNotificacionOjeador" type="submit" class="btn btn-success shadow-sm" value="Enviar Notificación">
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