<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
<div class="container-xl px-4 mt-4">		
					<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-center text-primary"><b>Listado de reseñas de tu equipo</b></h6>
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <!-- Textbox para filtrar la tabla -->
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" id="busqueda" oninput="filtrarTabla()" placeholder="Realice aquí su búsqueda.....">
                            </div>
                        </div>
                            <div class="table-responsive">
                            <table class="table table-bordered" id="tablaDatos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Partido</th>
                                            <th>Fecha</th>
                                            <th>Ojeador</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Partido</th>
                                            <th>Fecha</th>
                                            <th>Ojeador</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT resena.id, resena.evento,resena.fecha, usuario.nombre FROM resena JOIN usuario ON resena.id_ojeador = usuario.id WHERE resena.id_equipo=".$_SESSION['id']);

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="evento"><?php  echo $mostrar['evento']?></td>
                            <td id="fecha"><?php  echo $mostrar['fecha']?></td>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <th>
                                <a href="resena_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="resena_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                         <?php include('../funciones/forms/modalEliminarResena.php'); ?>
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
<script src="../js/filtroTablas.js"></script>


