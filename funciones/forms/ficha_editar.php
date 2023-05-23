<div class="container-fluid">
<?php    
    $id_ficha=$_GET['id'];
    //consulta a la tabla de fichas
    $resultadoFicha=dameConsulta("SELECT * from ficha where id='$id_ficha'");
    $mostrarFicha=mysqli_fetch_array($resultadoFicha);
    
    
?>

<div class="container-xl px-4 mt-4">
<div class="row">

        <div class="col">
        <h1 class="h3 mb-3 text-gray-800 ">Ficha de <b><?php echo $mostrarFicha["partido"]?></b> el dia <b><?php echo $mostrarFicha["fecha"]?></b></h1>
        </div>
        <div class="col-md-auto">
        <a href="ficha_ver.php?id=<?php echo $id_ficha ?>" class="btn btn-danger shadow-sm"><i class=" text-white-50"></i> Cancelar</a>
        <br></br>
        </div>
    </div>
    
                 
    
                    <?php if ( $mostrarFicha['posicion'] == 'portero' ): ?><!-- Si la ficha es para un portero mostramos este formulario-->
                        
                        <div class="row">
                       
                            <div class="col">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>DATOS DE PORTERO</b></div>
                                    <div class="card-body"> 
                                    <form class="user" action="" method="post">
                                            <?php
                                                $resultadoDatos=dameConsulta("SELECT * FROM `datos_portero` WHERE id_ficha='$id_ficha'");
                                                $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                                $idPort=$mostrarDatos["id"];
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_datos_portero($idPort,$id_ficha);
                                            ?>                              
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">                                                
                                                    <label class=" mb-1 text-gray-800" >Blocaje</label>
                                                    <input class="form-control" id="numBlocaje" type="number" name="numBlocaje" placeholder="<?php echo $mostrarDatos['blocaje']?>" value="<?php echo $mostrarDatos['blocaje']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotBlocaje" type="text" name="anotBlocaje" placeholder="<?php echo $mostrarDatos['comentario_blocaje']?>" value="<?php echo $mostrarDatos['comentario_blocaje']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje</label>
                                                    <input class="form-control" id="numDespeje" type="number" name="numDespeje" placeholder="<?php echo $mostrarDatos['despeje']?>" value="<?php echo $mostrarDatos['despeje']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotDespeje" type="text" name="anotDespeje" placeholder="<?php echo $mostrarDatos['comentario_despeje']?>" value="<?php echo $mostrarDatos['comentario_despeje']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Desvío</label>
                                                    <input class="form-control" id="numDesvio" type="number" name="numDesvio" placeholder="<?php echo $mostrarDatos['desvio']?>" value="<?php echo $mostrarDatos['desvio']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotDesvio" type="text" name="anotDesvio" placeholder="<?php echo $mostrarDatos['comentario_desvio']?>" value="<?php echo $mostrarDatos['comentario_desvio']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Rechace</label>
                                                    <input class="form-control" id="numRechace" type="number" name="numRechace" placeholder="<?php echo $mostrarDatos['rechace']?>" value="<?php echo $mostrarDatos['rechace']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotRechace" type="text" name="anotRechace" placeholder="<?php echo $mostrarDatos['comentario_rechace']?>" value="<?php echo $mostrarDatos['comentario_rechace']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Prolongación</label>
                                                    <input class="form-control" id="numProlongacion" type="number" name="numProlongacion" placeholder="<?php echo $mostrarDatos['prolongacion']?>" value="<?php echo $mostrarDatos['prolongacion']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotProlongacion" type="text" name="anotProlongacion" placeholder="<?php echo $mostrarDatos['comentario_prolongacion']?>" value="<?php echo $mostrarDatos['comentario_prolongacion']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Reflejos</label>
                                                    <input class="form-control" id="numReflejos" type="number" name="numReflejos" placeholder="<?php echo $mostrarDatos['reflejos']?>" value="<?php echo $mostrarDatos['reflejos']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotReflejos" type="text" name="anotReflejos" placeholder="<?php echo $mostrarDatos['comentario_reflejos']?>" value="<?php echo $mostrarDatos['comentario_reflejos']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <input class="form-control" id="num_pase_izquierdo" type="number" name="num_pase_izquierdo" placeholder="<?php echo $mostrarDatos['pase_izquierdo']?>" value="<?php echo $mostrarDatos['pase_izquierdo']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anot_pase_izquierdo" type="text" name="anot_pase_izquierdo" placeholder="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>" value="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <input class="form-control" id="num_pase_derecho" type="number" name="num_pase_derecho" placeholder="<?php echo $mostrarDatos['pase_derecho']?>" value="<?php echo $mostrarDatos['pase_derecho']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anot_pase_derecho" type="text" name="anot_pase_derecho" placeholder="<?php echo $mostrarDatos['comentario_pase_derecho']?>" value="<?php echo $mostrarDatos['comentario_pase_derecho']?>">
                                                </div>
                                            </div>
                                            <input name="btnActualizarDatosPortero" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                           <!-- Card de información del jugador-->
                           <div class="card mb-4">
                               <div class="card-header text-gray-800"><b>DATOS PSICOLÓGICOS</b></div>
                               <div class="card-body"> 
                                    <form class="user" action="" method="post">
                                        <?php
                                            $resultadoDatos=dameConsulta("SELECT * FROM `datos_psicologicos` WHERE id_ficha='$id_ficha'");
                                            $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                            $idPSic=$mostrarDatos["id"];
                                            //include "funciones/funciones_usuario.php";
                                            actualizar_datos_psicologicos($idPSic,$id_ficha);
                                        ?>                                      
                                            <!-- Form Row-->
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Personalidad</label>
                                               <input class="form-control" id="numPersonalidad" type="number" name="numPersonalidad" placeholder="<?php echo $mostrarDatos['personalidad']?>" value="<?php echo $mostrarDatos['personalidad']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotPersonalidad" type="text" name="anotPersonalidad" placeholder="<?php echo $mostrarDatos['comentario_personalidad']?>" value="<?php echo $mostrarDatos['comentario_personalidad']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Actitud</label>
                                               <input class="form-control" id="numActitud" type="number" name="numActitud" placeholder="<?php echo $mostrarDatos['actitud']?>" value="<?php echo $mostrarDatos['actitud']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotActitud" type="text" name="anotActitud" placeholder="<?php echo $mostrarDatos['comentario_actitud']?>" value="<?php echo $mostrarDatos['comentario_actitud']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Liderazgo</label>
                                               <input class="form-control" id="numLiderazgo" type="number" name="numLiderazgo" placeholder="<?php echo $mostrarDatos['liderazgo']?>" value="<?php echo $mostrarDatos['liderazgo']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotLiderazgo" type="text" name="anotLiderazgo" placeholder="<?php echo $mostrarDatos['comentario_liderazgo']?>" value="<?php echo $mostrarDatos['comentario_liderazgo']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Concentración</label>
                                               <input class="form-control" id="numConcentracion" type="number" name="numConcentracion" placeholder="<?php echo $mostrarDatos['concentracion']?>" value="<?php echo $mostrarDatos['concentracion']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotConcentracion" type="text" name="anotConcentracion" placeholder="<?php echo $mostrarDatos['comentario_concentracion']?>" value="<?php echo $mostrarDatos['comentario_concentracion']?>">
                                           </div>
                                       </div>
                                       <input name="btnActualizarDatosPsicologicos" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                   </form>                                    
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
                                    <div class="card-header text-gray-800"><b>DATOS DEFENSIVOS</b></div>
                                    <div class="card-body"> 
                                        <form class="user" action="" method="post">
                                            <?php
                                                $resultadoDatos=dameConsulta("SELECT * FROM `datos_defensivos` WHERE id_ficha='$id_ficha'");
                                                $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                                $idDef=$mostrarDatos["id"];
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_datos_defensivos($idDef,$id_ficha);
                                            ?>                                     
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Entrada</label>
                                                    <input class="form-control" id="numEntrada" type="number" name="numEntrada" placeholder="<?php echo $mostrarDatos['entrada']?>" value="<?php echo $mostrarDatos['entrada']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Comentario</label>
                                                    <input class="form-control" id="anotEntrada" type="text" name="anotEntrada" placeholder="<?php echo $mostrarDatos['comentario_entrada']?>" value="<?php echo $mostrarDatos['comentario_entrada']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Trackle</label>
                                                    <input class="form-control" id="numTrackle" type="number" name="numTrackle" placeholder="<?php echo $mostrarDatos['trackle']?>" value="<?php echo $mostrarDatos['trackle']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotTrackle" type="text" name="anotTrackle" placeholder="<?php echo $mostrarDatos['comentario_trackle']?>" value="<?php echo $mostrarDatos['comentario_trackle']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class="mb-1 text-gray-800" >Intercepción</label>
                                                    <input class="form-control" id="numIntercepcion" type="number" name="numIntercepcion" placeholder="<?php echo $mostrarDatos['intercepcion']?>" value="<?php echo $mostrarDatos['intercepcion']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class="mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotIntercepcion" type="text" name="anotIntercepcion" placeholder="<?php echo $mostrarDatos['comentario_intercepcion']?>" value="<?php echo $mostrarDatos['comentario_intercepcion']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Marcaje</label>
                                                    <input class="form-control" id="numMarcaje" type="number" name="numMarcaje" placeholder="<?php echo $mostrarDatos['marcaje']?>" value="<?php echo $mostrarDatos['marcaje']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotMarcaje" type="text" name="anotMarcaje" placeholder="<?php echo $mostrarDatos['comentario_marcaje']?>" value="<?php echo $mostrarDatos['comentario_marcaje']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Carga</label>
                                                    <input class="form-control" id="numCarga" type="number" name="numCarga" placeholder="<?php echo $mostrarDatos['carga']?>" value="<?php echo $mostrarDatos['carga']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotCarga" type="text" name="anotCarga" placeholder="<?php echo $mostrarDatos['comentario_carga']?>" value="<?php echo $mostrarDatos['comentario_carga']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje de pie</label>
                                                    <input class="form-control" id="numDespejePie" type="number" name="numDespejePie" placeholder="<?php echo $mostrarDatos['despeje_pie']?>" value="<?php echo $mostrarDatos['despeje_pie']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotDespejePie" type="text" name="anotDespejePie" placeholder="<?php echo $mostrarDatos['comentario_despeje_pie']?>" value="<?php echo $mostrarDatos['comentario_despeje_pie']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Despeje de cabeza</label>
                                                    <input class="form-control" id="numDespejeCabeza" type="number" name="numDespejeCabeza" placeholder="<?php echo $mostrarDatos['despeje_cabeza']?>" value="<?php echo $mostrarDatos['despeje_cabeza']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotDespejeCabeza" type="text" name="anotDespejeCabeza" placeholder="<?php echo $mostrarDatos['comentario_despeje_cabeza']?>" value="<?php echo $mostrarDatos['comentario_despeje_cabeza']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <input class="form-control" id="numPaseIzquierdo" type="number" name="numPaseIzquierdo" placeholder="<?php echo $mostrarDatos['pase_izquierdo']?>" value="<?php echo $mostrarDatos['pase_izquierdo']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPaseIzquierdo" type="text" name="anotPaseIzquierdo" placeholder="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>" value="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <input class="form-control" id="numPaseDerecho" type="number" name="numPaseDerecho" placeholder="<?php echo $mostrarDatos['pase_derecho']?>" value="<?php echo $mostrarDatos['pase_derecho']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPaseDerecho" type="text" name="anotPaseDerecho" placeholder="<?php echo $mostrarDatos['comentario_pase_derecho']?>" value="<?php echo $mostrarDatos['comentario_pase_derecho']?>">
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Cobertura</label>
                                                    <input class="form-control" id="numCobertura" type="number" name="numCobertura" placeholder="<?php echo $mostrarDatos['cobertura']?>" value="<?php echo $mostrarDatos['cobertura']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotCobertura" type="text" name="anotCobertura" placeholder="<?php echo $mostrarDatos['comentario_cobertura']?>" value="<?php echo $mostrarDatos['comentario_cobertura']?>">
                                                </div>
                                            </div>
                                            <input name="btnActualizarDatosDefensivos" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form>                                     
                                    </div>
                                </div>

                                <div class="card mb-4">
                               <div class="card-header text-gray-800"><b>DATOS PSICOLÓGICOS</b></div>
                               <div class="card-body"> 
                               <form class="user" action="" method="post">
                                        <?php
                                            $resultadoDatos=dameConsulta("SELECT * FROM `datos_psicologicos` WHERE id_ficha='$id_ficha'");
                                            $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                            $idPSic=$mostrarDatos["id"];
                                            //include "funciones/funciones_usuario.php";
                                            actualizar_datos_psicologicos($idPSic,$id_ficha);
                                        ?>                                      
                                            <!-- Form Row-->
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Personalidad</label>
                                               <input class="form-control" id="numPersonalidad" type="number" name="numPersonalidad" placeholder="<?php echo $mostrarDatos['personalidad']?>" value="<?php echo $mostrarDatos['personalidad']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotPersonalidad" type="text" name="anotPersonalidad" placeholder="<?php echo $mostrarDatos['comentario_personalidad']?>" value="<?php echo $mostrarDatos['comentario_personalidad']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Actitud</label>
                                               <input class="form-control" id="numActitud" type="number" name="numActitud" placeholder="<?php echo $mostrarDatos['actitud']?>" value="<?php echo $mostrarDatos['actitud']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotActitud" type="text" name="anotActitud" placeholder="<?php echo $mostrarDatos['comentario_actitud']?>" value="<?php echo $mostrarDatos['comentario_actitud']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Liderazgo</label>
                                               <input class="form-control" id="numLiderazgo" type="number" name="numLiderazgo" placeholder="<?php echo $mostrarDatos['liderazgo']?>" value="<?php echo $mostrarDatos['liderazgo']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotLiderazgo" type="text" name="anotLiderazgo" placeholder="<?php echo $mostrarDatos['comentario_liderazgo']?>" value="<?php echo $mostrarDatos['comentario_liderazgo']?>">
                                           </div>
                                       </div>
                                       <div class="row gx-3 mb-3">
                                           <div class="col-md-3">
                                               <label class=" mb-1 text-gray-800" >Concentración</label>
                                               <input class="form-control" id="numConcentracion" type="number" name="numConcentracion" placeholder="<?php echo $mostrarDatos['concentracion']?>" value="<?php echo $mostrarDatos['concentracion']?>">
                                           </div>
                                           
                                           <div class="col-md-9">
                                               <label class=" mb-1 text-gray-800">Anotación</label>
                                               <input class="form-control" id="anotConcentracion" type="text" name="anotConcentracion" placeholder="<?php echo $mostrarDatos['comentario_concentracion']?>" value="<?php echo $mostrarDatos['comentario_concentracion']?>">
                                           </div>
                                       </div>
                                       <input name="btnActualizarDatosPsicologicos" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                   </form>                                    
                               </div>
                           </div>

                            </div>
                            <!-- Columna derecha-->
                            <div class="col">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>DATOS OFENSIVOS</b></div>
                                    <div class="card-body"> 
                                        <form class="user" action="" method="post">
                                            <?php
                                                $resultadoDatos=dameConsulta("SELECT * FROM `datos_ofensivos` WHERE id_ficha='$id_ficha'");
                                                $mostrarDatos=mysqli_fetch_array($resultadoDatos);
                                                $idOfen=$mostrarDatos["id"];
                                                //include "funciones/funciones_usuario.php";
                                                actualizar_datos_ofensivos($idOfen,$id_ficha);
                                            ?>                                    
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Conducción libre</label>
                                                    <input class="form-control" id="numConduccionLibre" type="number" name="numConduccionLibre" placeholder="<?php echo $mostrarDatos['conduccion_libre']?>" value="<?php echo $mostrarDatos['conduccion_libre']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Comentario</label>
                                                    <input class="form-control" id="anotConduccionLibre" type="text" name="anotConduccionLibre" placeholder="<?php echo $mostrarDatos['comentario_conduccion_libre']?>" value="<?php echo $mostrarDatos['comentario_conduccion_libre']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Conducción en línea</label>
                                                    <input class="form-control" id="numConduccionLinea" type="number" name="numConduccionLinea" placeholder="<?php echo $mostrarDatos['conduccion_linea']?>" value="<?php echo $mostrarDatos['conduccion_linea']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotConduccionLinea" type="text" name="anotConduccionLinea" placeholder="<?php echo $mostrarDatos['comentario_conduccion_linea']?>" value="<?php echo $mostrarDatos['comentario_conduccion_linea']?>">
                                                    
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Control</label>
                                                    <input class="form-control" id="numControl" type="number" name="numControl" placeholder="<?php echo $mostrarDatos['control']?>" value="<?php echo $mostrarDatos['control']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotControl" type="text" name="anotControl" placeholder="<?php echo $mostrarDatos['comentario_control']?>" value="<?php echo $mostrarDatos['comentario_control']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Control orientado</label>
                                                    <input class="form-control" id="numControlOrientado" type="number" name="numControlOrientado" placeholder="<?php echo $mostrarDatos['control_orientado']?>" value="<?php echo $mostrarDatos['control_orientado']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotControlOrientado" type="text" name="anotControlOrientado" placeholder="<?php echo $mostrarDatos['comentario_control_orientado']?>" value="<?php echo $mostrarDatos['comentario_control_orientado']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Regate</label>
                                                    <input class="form-control" id="numRegate" type="number" name="numRegate" placeholder="<?php echo $mostrarDatos['regate']?>" value="<?php echo $mostrarDatos['regate']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotRegate" type="text" name="anotRegate" placeholder="<?php echo $mostrarDatos['comentario_regate']?>" value="<?php echo $mostrarDatos['comentario_regate']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro en parado</label>
                                                    <input class="form-control" id="numTiroParado" type="number" name="numTiroParado" placeholder="<?php echo $mostrarDatos['tiro_parado']?>" value="<?php echo $mostrarDatos['tiro_parado']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotTiroParado" type="text" name="anotTiroParado" placeholder="<?php echo $mostrarDatos['comentario_tiro_parado']?>" value="<?php echo $mostrarDatos['comentario_tiro_parado']?>">
                                                    </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro en movimiento</label>
                                                    <input class="form-control" id="numTiroMovimiento" type="number" name="numTiroMovimiento" placeholder="<?php echo $mostrarDatos['tiro_movimiento']?>" value="<?php echo $mostrarDatos['tiro_movimiento']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotTiroMovimiento" type="text" name="anotTiroMovimiento" placeholder="<?php echo $mostrarDatos['comentario_tiro_movimiento']?>" value="<?php echo $mostrarDatos['comentario_tiro_movimiento']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Finalización</label>
                                                    <input class="form-control" id="numFinalizacion" type="number" name="numFinalizacion" placeholder="<?php echo $mostrarDatos['finalizacion']?>" value="<?php echo $mostrarDatos['finalizacion']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotFinalizacion" type="text" name="anotFinalizacion" placeholder="<?php echo $mostrarDatos['comentario_finalizacion']?>" value="<?php echo $mostrarDatos['comentario_finalizacion']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase de cabeza</label>
                                                    <input class="form-control" id="numPaseCabeza" type="number" name="numPaseCabeza" placeholder="<?php echo $mostrarDatos['pase_cabeza']?>" value="<?php echo $mostrarDatos['pase_cabeza']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPaseCabeza" type="text" name="anotPaseCabeza" placeholder="<?php echo $mostrarDatos['comentario_pase_cabeza']?>" value="<?php echo $mostrarDatos['comentario_pase_cabeza']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Remate de cabeza</label>
                                                    <input class="form-control" id="numRemateCabeza" type="number" name="numRemateCabeza" placeholder="<?php echo $mostrarDatos['remate_cabeza']?>" value="<?php echo $mostrarDatos['remate_cabeza']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotRemateCabeza" type="text" name="anotRemateCabeza" placeholder="<?php echo $mostrarDatos['comentario_remate_cabeza']?>" value="<?php echo $mostrarDatos['comentario_remate_cabeza']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase izquierdo</label>
                                                    <input class="form-control" id="numPaseIzquierdo" type="number" name="numPaseIzquierdo" placeholder="<?php echo $mostrarDatos['pase_izquierdo']?>" value="<?php echo $mostrarDatos['pase_izquierdo']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPaseIzquierdo" type="text" name="anotPaseIzquierdo" placeholder="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>" value="<?php echo $mostrarDatos['comentario_pase_izquierdo']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Pase derecho</label>
                                                    <input class="form-control" id="numPaseDerecho" type="number" name="numPaseDerecho" placeholder="<?php echo $mostrarDatos['pase_derecho']?>" value="<?php echo $mostrarDatos['pase_derecho']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPaseDerecho" type="text" name="anotPaseDerecho" placeholder="<?php echo $mostrarDatos['comentario_pase_derecho']?>" value="<?php echo $mostrarDatos['comentario_pase_derecho']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Penaltis</label>
                                                    <input class="form-control" id="numPenalties" type="number" name="numPenalties" placeholder="<?php echo $mostrarDatos['penalties']?>" value="<?php echo $mostrarDatos['penalties']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotPenalties" type="text" name="anotPenalties" placeholder="<?php echo $mostrarDatos['comentario_penalties']?>" value="<?php echo $mostrarDatos['comentario_penalties']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Corners</label>
                                                    <input class="form-control" id="numCorners" type="number" name="numCorners" placeholder="<?php echo $mostrarDatos['corners']?>" value="<?php echo $mostrarDatos['corners']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotCorners" type="text" name="anotCorners" placeholder="<?php echo $mostrarDatos['comentario_corners']?>" value="<?php echo $mostrarDatos['comentario_corners']?>">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-3">
                                                    <label class=" mb-1 text-gray-800" >Tiro de falta</label>
                                                    <input class="form-control" id="numTiroFalta" type="number" name="numTiroFalta" placeholder="<?php echo $mostrarDatos['tiro_libre']?>" value="<?php echo $mostrarDatos['tiro_libre']?>">
                                                </div>
                                                
                                                <div class="col-md-9">
                                                    <label class=" mb-1 text-gray-800">Anotación</label>
                                                    <input class="form-control" id="anotTiroFalta" type="text" name="anotTiroFalta" placeholder="<?php echo $mostrarDatos['comentario_tiro_libre']?>" value="<?php echo $mostrarDatos['comentario_tiro_libre']?>">
                                                </div>
                                            </div>
                                            <input name="btnActualizarDatosOfensivos" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" value="Actualizar Datos">
                                        </form> 
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        
                    <?php endif; ?><!--Fin del if con formulario NO portero-->

                        

</div>