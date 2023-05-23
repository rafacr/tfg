<div class="container-fluid">
<?php
    
    $idConsulta=$_GET['id'];
    $_SESSION['id_player']=$_GET['id'];
    $resultado=dameConsulta("SELECT * from jugador where id='$idConsulta'");
    $mostrar=mysqli_fetch_array($resultado);
?>

<div class="container-xl px-4 mt-4">
<div class="row">

        <div class="col">
        <h1 class="h3 mb-3 text-gray-800 "><b><?php echo $mostrar["nombre"]." ".$mostrar["apellidos"]?></b></h1>
        </div>
        
        <div class="col-md-auto">
        <a href="lista_jugadores.php" class="btn  btn-danger shadow-sm"><i class=" text-white-50"></i> Cancelar</a>
        </div>
    </div>
    
                 
    
                        <div class="row">
                       
                            <div class="col-xl-4">
                                
                                
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-gray-800"><b>FOTO DE PERFIL</b></div>
                                    <div class="card-body text-center">
                                        <!-- Imagen del jugador-->
                                        <img class="img-account-profile width="200" height="200"" src="<?php echo "../img/".$mostrar['img_perfil']?>" alt="">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">Formato JPG menor de 3 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form action="../funciones/funcion_subirImagenJugador.php" enctype="multipart/form-data" method="post">
                                            <input type="file" name="imagen">
                                            <input type="submit" value="Subir">
                                        </form>
                                    </div>
                                    <div class="card-header text-gray-800"><b>DATOS</b></div>
                                    <div class="card-body">
                                    <form class="user" action="" method="post">
                                            <?php
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_datos_jugador($mostrar["id"]);
                                            ?>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPeso">Peso (KG)</label>
                                                <input class="form-control" id="peso" type="number" name="peso" value="<?php echo $mostrar['peso']?>" >
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputAlturaPeso">Altura (CM)</label>
                                                <input class="form-control" id="altura" type="number" name="altura" value="<?php echo $mostrar['altura']?>" >
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPosicion">Posición</label>
                                                        <?php 
                                                            if($mostrar['posicion']=="portero"){
                                                                echo "<input class='form-control' id='posicion' type='text' readonly=»readonly» name='posicion' value='portero' >";
                                                            }else{
                                                                echo"<select class='form-control' name='selectPosicion'>";
                                                                echo "<option value='".$mostrar['posicion']."'selected>".$mostrar['posicion']."</option>";
                                                                echo "<option value='defena central'>Defensa central</option>";
                                                                echo "<option value='defena lateral'>Defensa lateral</option>";
                                                                echo "<option value='centrocampista defensivo'>Centrocampista defensivo</option>";
                                                                echo "<option value='centrocampista'>Centrocampista</option>";
                                                                echo "<option value='extremo'>Extremo</option>";
                                                                echo "<option value='mediapunta'>Mediapunta</option>";
                                                                echo "<option value='delantero'>Delantero</option>";
                                                            }

                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputCategoria">Categoría</label>
                                                            <select class='form-control' name='selectCategoria'>";
                                                                <option value="<?php echo $mostrar['categoria']?>"selected><?php echo $mostrar['categoria']?></option>
                                                                <option value="benjamin">Benjamin</option>
                                                                <option value="alevin">Alevín</option>
                                                                <option value="infantil">Infantil</option>
                                                                <option value="cadete">Cadete</option>
                                                                <option value="juvenil">Juvenil</option>
                                                                <option value="profesional">Profesional</option>
                                                                </select>
                                                    </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPierna">Pierna</label>
                                                    <select class="form-control" name="selectPierna">
                                                        
                                                        <?php 
                                                            if($mostrar['pierna']=="zurdo"){
                                                                echo "<option value='zurdo' selected>Zurdo</option>";
                                                                echo "<option value='diestro'>Diestro</option>";
                                                            }else{
                                                                echo "<option value='diestro'selected>Diestro</option>";
                                                                echo "<option value='zurdo'>Zurdo</option>";
                                                            }

                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                </div>
                                        </div>
                                        <input name="btnActualizarDatosJugador" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>INFORMACIÓN DEL JUGADOR</b></div>
                                    <div class="card-body"> 
                                    <form class="user" action="" method="post">
                                            <?php
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_info_jugador($mostrar["id"]);
                                            ?>                                           
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">Nombre</label>
                                                    <input class="form-control" id="nombre" type="text" name="nombre" value="<?php echo $mostrar['nombre']?>">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Apellidos</label>
                                                    <input class="form-control" id="apellidos" type="text" name="apellidos" value="<?php echo $mostrar['apellidos']?>">
                                                </div>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputYear">Año de nacimiento</label>
                                                    <input class="form-control" id="yearNacimiento" type="number" name="yearNacimiento" value="<?php echo $mostrar['yearNacimiento']?>" >
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEquipo">Equipo</label>
                                                    <input class="form-control" id="equipo" type="text" name="equipo" value="<?php echo $mostrar['equipo']?>">
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputSalario">Salario</label>
                                                    <input class="form-control" id="salario" type="number" name="salario" value="<?php echo $mostrar['salario']?>">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputContrato">Fin de contrato</label>
                                                    <input class="form-control" id="fin_contrato" type="number" name="fin_contrato" value="<?php echo $mostrar['fin_contrato']?>">
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputDebut">Debut</label>
                                                    <input class="form-control" id="debut" type="number" name="debut" value="<?php echo $mostrar['debut']?>">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputResidencia">Residencia</label>
                                                    <input class="form-control" id="residencia" type="text" name="residencia" value="<?php echo $mostrar['residencia']?>">
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputIdiomas">Idiomas</label>
                                                    <input class="form-control" id="idiomas" type="text" name="idiomas" value="<?php echo $mostrar['idiomas']?>">
                                                </div>
                                                
                                            </div>
                                            <input name="btnActualizarInfoJugador" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form>                                     
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>DAFO DEL JUGADOR</b></div>
                                        <div class="card-body">
                                        <form class="user" action="" method="post">
                                            <?php
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_dafo_jugador($mostrar["id"]);
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-warning text-white">Debilidades</h5>
                                                            <textarea class="form-control" rows="3" id="d_debilidades" type="text" name="d_debilidades" value="" ><?php echo $mostrar['dafo_debilidades']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-danger text-white">Amenazas</h5>
                                                            <textarea class="form-control" rows="3" id="d_amenazas" type="text" name="d_amenazas" value="" ><?php echo $mostrar['dafo_amenazas']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-primary text-white">Fortalezas</h5>
                                                            <textarea class="form-control" rows="3" id="d_fortalezas" type="text" name="d_fortalezas" value="" ><?php echo $mostrar['dafo_fortalezas']?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-success text-white">Oportunidades</h5>
                                                            <textarea class="form-control" rows="3" id="d_oportunidades" type="text" name="d_oportunidades" value="" ><?php echo $mostrar['dafo_oportunidades']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="btnActualizarDafoJugador" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form>
                                        </div>
                                    </div>
                                </div>  
                            </div>   
                            
                            <div class="col">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>HISTORIAL DEL JUGADOR</b></div>
                                        <div class="card-body">
                                        <form class="user" action="" method="post">
                                            <?php
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_historial_jugador($mostrar["id"]);
                                            ?>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Equipos</h5>
                                                            <textarea class="form-control" rows="3" id="historialEquipos" type="text" name="historialEquipos" value="" ><?php echo $mostrar['historial_equipos']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Lesiones</h5>
                                                            <textarea class="form-control" rows="3" id="historialLesiones" type="text" name="historialLesiones" value="" ><?php echo $mostrar['historial_lesiones']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Sanciones</h5>
                                                            <textarea class="form-control" rows="3" id="historialSanciones" type="text" name="historialSanciones" value="" ><?php echo $mostrar['historial_sanciones']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Palmarés</h5>
                                                            <textarea class="form-control" rows="3" id="historialPalmares" type="text" name="historialPalmares" value="" ><?php echo $mostrar['historial_palmares']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="btnActualizarHistorialJugador" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form> 
                                        </div>
                                    </div>
                    </div>            
                        </div>
    </form>

</div>