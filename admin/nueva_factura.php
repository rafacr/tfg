<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
						
					<div class="container-xl px-4 mt-4">
                        <div class="row justify-content-center">
                            
                            <div class="col-8 ">
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>Nueva Factura</b></div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <label class="text-danger">Debe rellenar el formulario y adjuntar la factura en formato PDF</label>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                
                                                    <div class="col-md-6">
                                                        <label class="form-label text-gray-800" for="inputEmailAddress">Selecciona equipo</label>
                                                        <select class="form-control" id="selectEquipo" name="selectEquipo" required>
                                                        <?php 
                                                            $resultado=dameConsulta("SELECT id,nombre from usuario where tipo='team'");
                                                            while($mostrar=mysqli_fetch_array($resultado)){
                                                        ?>
                                                            <option value="<?php  echo $mostrar['id']?>"><?php  echo $mostrar['nombre']?></option>
                                                        <?php
                                                        }?>   
                                                        </select>
                                                    </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label text-gray-800" for="inputCategoria">Mes de facturación</label>
                                                    <select class="form-control" id="selectMes" name="selectMes" required>
                                                        <option value="Enero"selected>Enero</option>
                                                        <option value="Febrero" >Febrero</option>
                                                        <option value="Marzo">Marzo</option>
                                                        <option value="Abril">Abril</option>
                                                        <option value="Mayo">Mayo</option>
                                                        <option value="Junio">Junio</option>
                                                        <option value="Julio">Julio</option>
                                                        <option value="Agosto">Agosto</option>
                                                        <option value="Septiembre">Septiembre</option>
                                                        <option value="Octubre">Octubre</option>
                                                        <option value="Noviembre">Noviembre</option>
                                                        <option value="Diciembre">Diciembre</option>
                                                    </select>
                                                </div>

                                                <input type="file" class="btn" name="pdfFactura" accept="application/pdf" required />
                                            </div>
                                            <?php
                                                //en el caso de un equipo pasamos su id, en el caso de un ojeador pasamos el id del equipo
                                                registrar_factura();
                                            ?>
                                            <input name="btnAddFactura" type="submit" class="btn btn-primary btn-user btn-block" value="Registar Factura">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                 
                    </div>               
</div>
<!-- /.container-fluid -->


<?php require_once "vistaInferior.php"?>