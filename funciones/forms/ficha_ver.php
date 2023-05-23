<?php  
    $id_ficha=$_GET['id'];

    //consulta a la tabla de fichas
    $resultadoFicha=dameConsulta("SELECT * from ficha where id='$id_ficha'");
    $mostrarFicha=mysqli_fetch_array($resultadoFicha);
      
?>

<div class="container-fluid">


<div class="container-xl px-4 mt-4">
<div class="row">

        <div class="col">
            <h1 class="h3 mb-3 text-gray-800 ">Ficha de <b><?php echo $mostrarFicha["partido"]?></b> el dia <b><?php echo $mostrarFicha["fecha"]?></b></h1>
        </div>
        <div class="col-md-auto">
            <a href="../funciones/plantilla_pdf/imprimir_ficha.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-primary shadow-sm" ><i class=" text-white-50"></i> Generar Informe</a>
        </div>
        <div class="col-md-auto">
            <a href="ficha_editar.php?id=<?php echo $id_ficha ?>" class="btn btn-warning shadow-sm"><i class=" text-white-50"></i> Editar Ficha</a>
        </div>
        <div class="col-md-auto">        
            <button type="button" id="btnElim" class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#eliminarModalFicha<?php echo $id_ficha; ?>">
                Eliminar Ficha
            </button>
            <!--Ventana Modal para la Alerta de Eliminar--->
            <?php include('../funciones/forms/modalEliminarFicha.php'); ?>
        </div>
        
</div>
    
                 
    
                    <?php if ( $mostrarFicha['posicion'] == 'portero' ): ?><!-- Si la ficha es para un portero mostramos este formulario-->
                        
                        <div class="row">
                       
                            <div class="col">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>DATOS DE PORTERO</b></div>
                                    <div class="card-body"> 
                                    <?php
                                        $resultadoDatos=dameConsulta("SELECT * FROM `datos_portero` WHERE id_ficha='$id_ficha'");
                                        $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                    ?>                               
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">                                                
                                                    <label class=" mb-1 text-gray-800" >Blocaje</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['blocaje']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_blocaje']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['despeje']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_despeje']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Desvío</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['desvio']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_desvio']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Rechace</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['rechace']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_rechace']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Prolongación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['prolongacion']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_prolongacion']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Reflejos</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['reflejos']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_reflejos']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_izquierdo']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_izquierdo']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_derecho']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_derecho']?></p>
                                                </div>
                                            </div>
                                                                                 
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                           <!-- Card de información del jugador-->
                           <div class="card mb-4">
                               <div class="card-header text-center text-gray-800"><b>DATOS PSICOLÓGICOS</b></div>
                               <div class="card-body"> 
                                    <?php

                                    $resultadoDatos=dameConsulta("SELECT * FROM `datos_psicologicos` WHERE id_ficha='$id_ficha'");
                                    $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                    ?>                           
                                       <!-- Form Row-->
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Personalidad</label>
                                               <p class="card-text"><?php echo $mostrarDatos['personalidad']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_personalidad']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Actitud</label>
                                               <p class="card-text"><?php echo $mostrarDatos['actitud']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_actitud']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Liderazgo</label>
                                               <p class="card-text"><?php echo $mostrarDatos['liderazgo']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_liderazgo']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Concentración</label>
                                               <p class="card-text"><?php echo $mostrarDatos['concentracion']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_concentracion']?></p>
                                           </div>
                                       </div>
                                                                          
                               </div>
                           </div>
                       </div>
                        </div>
                    <?php endif; ?><!--Fin del if con formulario de portero-->

                    <?php if ( $mostrarFicha['posicion'] != 'portero' ): ?><!-- Si la ficha es para un portero mostramos este formulario-->
                       
                        <div class="row">
                       
                        <!-- Columna izquierda-->
                            <div class="col">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>DATOS DEFENSIVOS</b></div>
                                    <div class="card-body"> 
                                    <?php
                                        $resultadoDatos=dameConsulta("SELECT * FROM `datos_defensivos` WHERE id_ficha='$id_ficha'");
                                        $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                    ?>                                  
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Entrada</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['entrada']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Comentario</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_entrada']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Trackle</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['trackle']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_trackle']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Intercepción</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['intercepcion']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_intercepcion']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Marcaje</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['marcaje']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_marcaje']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Carga</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['carga']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_carga']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje de pie</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['despeje_pie']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_despeje_pie']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje de cabeza</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['despeje_cabeza']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_despeje_cabeza']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_izquierdo']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_izquierdo']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_derecho']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_derecho']?></p>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Cobertura</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['cobertura']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_cobertura']?></p>
                                                </div>
                                            </div>
                                                                                
                                    </div>
                                </div>

                                <div class="card mb-4">
                               <div class="card-header text-gray-800"><b>DATOS PSICOLÓGICOS</b></div>
                               <div class="card-body"> 
                               <?php
                                        $resultadoDatos=dameConsulta("SELECT * FROM `datos_psicologicos` WHERE id_ficha='$id_ficha'");
                                        $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                    ?>                                   
                                       <!-- Form Row-->
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Personalidad</label>
                                               <p class="card-text"><?php echo $mostrarDatos['personalidad']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_personalidad']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Actitud</label>
                                               <p class="card-text"><?php echo $mostrarDatos['actitud']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_actitud']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Liderazgo</label>
                                               <p class="card-text"><?php echo $mostrarDatos['liderazgo']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_liderazgo']?></p>
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Concentración</label>
                                               <p class="card-text"><?php echo $mostrarDatos['concentracion']?></p>
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <p class="card-text"><?php echo $mostrarDatos['comentario_concentracion']?></p>
                                           </div>
                                       </div>
                                                                          
                               </div>
                           </div>

                            </div>
                            <!-- Columna derecha-->
                            <div class="col">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>DATOS OFENSIVOS</b></div>
                                    <div class="card-body"> 
                                    <?php
                                        $resultadoDatos=dameConsulta("SELECT * FROM `datos_ofensivos` WHERE id_ficha='$id_ficha'");
                                        $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                    ?>                                    
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Conducción libre</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['conduccion_libre']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Comentario</label>
                                                   <p class="card-text"><?php echo $mostrarDatos['comentario_conduccion_libre']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Conducción en línea</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['conduccion_linea']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_conduccion_linea']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Control</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['control']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_control']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Control orientado</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['control_orientado']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_control_orientado']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Regate</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['regate']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_regate']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro en parado</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['tiro_parado']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_tiro_parado']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro en movimiento</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['tiro_movimiento']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_tiro_movimiento']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Finalización</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['finalizacion']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_finalizacion']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase de cabeza</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_cabeza']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_cabeza']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Remate de cabeza</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['remate_cabeza']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_remate_cabeza']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_izquierdo']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_izquierdo']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['pase_derecho']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_pase_derecho']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Penaltis</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['penalties']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_penalties']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Corners</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['corners']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_corners']?></p>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro de falta</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['tiro_libre']?></p>
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <p class="card-text"><?php echo $mostrarDatos['comentario_tiro_libre']?></p>
                                                </div>
                                            </div>
                                     
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        
                    <?php endif; ?><!--Fin del if con formulario NO portero-->

                        

</div>


<?php require_once "vistaInferior.php"?>
