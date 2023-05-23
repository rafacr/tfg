<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
<div class="container-xl px-4 mt-4">		
					<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-center text-primary"><b>Listado de facturas</b></h6>
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
                                            <th>Equipo</th>
                                            <th>Emisión</th>
                                            <th>Mes</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Equipo</th>
                                            <th>Emisión</th>
                                            <th>Mes</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT factura.id, factura.mes,factura.fecha_emision, factura.enlace, usuario.nombre FROM factura JOIN usuario ON factura.id_equipo = usuario.id");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="fecha"><?php  echo $mostrar['fecha_emision']?></td>
                            <td id="mes"><?php  echo $mostrar['mes']?></td>
                            <th>
                                <a href="../funciones/facturacion/<?php echo $mostrar['enlace'] ?>" target="_blank" class="btn btn-info">Ver</a>
                                <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                         <?php include('../funciones/forms/modalEliminarFactura.php'); ?>
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


