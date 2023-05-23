<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
<div class="container-xl px-4 mt-4">	
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-center text-primary">Listado de ojeadores</h6>
                            
                            
    
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <!-- Textbox para filtrar la tabla -->
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" id="busqueda" oninput="filtrarTabla()" placeholder="Realice aquí su búsqueda.....">
                            </div>
                        </div>
                        <div class="table-responsive">
            <table class="table table-bordered" id="tablaOjeador" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from usuario  where tipo='ojeador' AND id_equipo='".$_SESSION['id']."'");
                        
                        while($mostrar=mysqli_fetch_array($resultado)){
                            $activado=$mostrar['activo'];
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="email"><?php  echo $mostrar['email']?></td>
                            <td id="telefono"><?php  echo $mostrar['telefono']?></td>
                            <td id="ciudad"><?php  echo $mostrar['ciudad']?></td>
                            <th>
                              <a href="perfil_ojeador.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                            <!--  <a href="actualizar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>-->
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
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>