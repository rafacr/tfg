<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
	
<div class="container-xl px-4 mt-4">

					<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><b>Listado de facturas de tu equipo</b></h6>
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
                                            <th>Mes</th>
                                            <th>Fecha emisión</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mes</th>
                                            <th>Fecha emisión</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from factura where id_equipo='".$_SESSION['id']."'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="mes"><?php  echo $mostrar['mes']?></td>
                            <td id="fecha"><?php  echo $mostrar['fecha_emision']?></td>
                            <th>
                                <a href="../funciones/facturacion/<?php echo $mostrar['enlace'] ?>" target="_blank" class="btn btn-info">Ver Factura PDF</a>
                              
                            </th>
                        </tr>
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


