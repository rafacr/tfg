<?php
    
    $idConsulta=$_GET['id'];
    $resultado=dameConsulta("SELECT * from jugador where id='$idConsulta'");
    $mostrar=mysqli_fetch_array($resultado);    
?>

<div class="container-fluid">


<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col">
        <h1 class="h3 mb-3 text-gray-800 "><b><?php echo $mostrar["nombre"]." ".$mostrar["apellidos"]?></b></h1>
        </div>
        <div class="col-md-auto">
        <a href="../funciones/plantilla_pdf/imprimir_jugador.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-primary shadow-sm" ><i class=" text-white-50"></i> Generar Informe</a>
        </div>
        <div class="col-md-auto">
        <a href="jugador_editar.php?id=<?php echo $_GET['id'] ?>" class="btn btn-warning shadow-sm"><i class=" text-white-50"></i> Editar Jugador</a>
        </div>
        <div class="col-md-auto">
        
            <button type="button" id="btnElimJug" class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                Eliminar Jugador
            </button>
            <!--Ventana Modal para la Alerta de Eliminar--->
            <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
        </div>
    </div>
    
    
    <div class="row mt-3">
                       
                            <div class="col-xl-4">
                                
                                
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-gray-800"><b>FOTO DE PERFIL</b></div>
                                    <div class="card-body text-center">
                                        <!-- Imagen del jugador-->
                                        <img class="img-account-profile width="200" height="200"" src="<?php echo "../img/".$mostrar['img_perfil']?>" alt="">
                                    </div>
                                    <div class="card-header text-gray-800"><b>DATOS</b></div>
                                    <div class="card-body">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Peso (KG)</b></label>
                                                <p class="card-text"><?php echo $mostrar['peso']?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Altura (CM)</b></label>
                                                <p class="card-text"><?php echo $mostrar['altura']?></p>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Posición</b></label>
                                                <p class="card-text"><?php echo $mostrar['posicion']?></p> 
                                            </div>
                                               
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Categoría</b></label>
                                                <p class="card-text"><?php echo $mostrar['categoria']?></p> 
                                                </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Pierna</b></label>
                                                <p class="card-text"><?php echo $mostrar['pierna']?></p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-gray-800"><b>INFORMACIÓN DEL JUGADOR</b></div>
                                    <div class="card-body">                                            
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Nombre</b></label>
                                                    <p class="card-text"><?php echo $mostrar['nombre']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Apellidos</b></label>
                                                    <p class="card-text"><?php echo $mostrar['apellidos']?></p>
                                                </div>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Año de nacimiento</b></label>
                                                    <p class="card-text"><?php echo $mostrar['yearNacimiento']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Equipo</b></label>
                                                    <p class="card-text"><?php echo $mostrar['equipo']?></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Salario</b></label>
                                                    <p class="card-text"><?php echo $mostrar['salario']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Fin de contrato</b></label>
                                                    <p class="card-text"><?php echo $mostrar['fin_contrato']?></p>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Debut</b></label>
                                                    <p class="card-text"><?php echo $mostrar['debut']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Residencia</b></label>
                                                    <p class="card-text"><?php echo $mostrar['residencia']?></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Idiomas</b></label>
                                                    <p class="card-text"><?php echo $mostrar['idiomas']?></p>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="col">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>HISTORIAL DEL JUGADOR</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Equipos</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_equipos']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Lesiones</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_lesiones']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Sanciones</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_sanciones']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Palmarés</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_palmares']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>  
            
            <div class="row mt-3">
                <div class="col">
                                <!-- DAFO card-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>DAFO DEL JUGADOR</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-warning text-white">Debilidades</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_debilidades']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-danger text-white">Amenazas</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_amenazas']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-primary text-white">Fortalezas</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_fortalezas']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-success text-white">Oportunidades</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_oportunidades']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                </div> 

                <div class="row">

                        <div class="col-xl">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Evolución del jugador</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        
                                        <?php

                                        if($mostrar['posicion']=="portero"){?>
                                            <canvas id="areaChartPorteroFichas"></canvas>
                                            <?php
                                            
                                            //datos portero
                                            $resultado2=dameConsulta("SELECT ficha.id, (datos_portero.blocaje +datos_portero.despeje +datos_portero.desvio+datos_portero.rechace+ datos_portero.prolongacion+datos_portero.reflejos+datos_portero.pase_izquierdo+datos_portero.pase_derecho)/8 as media FROM ficha JOIN datos_portero ON ficha.id = datos_portero.id_ficha WHERE ficha.id_jugador=".$idConsulta." ORDER BY id ASC LIMIT 10");
                                            $mediaPortero=[];
                                            while($mostrar2=mysqli_fetch_array($resultado2)){
                                                $mediaPortero[]=$mostrar2['media'];
                                            }
                                            //datos psicologicos
                                            $resultado2=dameConsulta("SELECT ficha.id, (datos_psicologicos.personalidad +datos_psicologicos.actitud +datos_psicologicos.liderazgo+ datos_psicologicos.concentracion)/4 as media FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$idConsulta." ORDER BY id ASC LIMIT 10");
                                            $mediaPsicologicos=[];
                                            while($mostrar2=mysqli_fetch_array($resultado2)){
                                                $mediaPsicologicos[]=$mostrar2['media'];
                                            }
                                        }else{?>
                                            <canvas id="areaChartOtroFichas"></canvas>
                                            <?php
                                        //datos psicologicos
                                            $resultado2=dameConsulta("SELECT ficha.id, (datos_psicologicos.personalidad +datos_psicologicos.actitud +datos_psicologicos.liderazgo+ datos_psicologicos.concentracion)/4 as media FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$idConsulta." ORDER BY id ASC LIMIT 10");
                                            $mediaPsicologicos=[];
                                            while($mostrar2=mysqli_fetch_array($resultado2)){
                                                $mediaPsicologicos[]=$mostrar2['media'];
                                            }
                                        //datos defensivos
                                        $resultado2=dameConsulta("SELECT ficha.id, (datos_defensivos.entrada +datos_defensivos.trackle +datos_defensivos.intercepcion+ datos_defensivos.marcaje+datos_defensivos.carga +datos_defensivos.despeje_pie +datos_defensivos.despeje_cabeza+ datos_defensivos.pase_izquierdo+datos_defensivos.pase_derecho +datos_defensivos.cobertura)/10 as media FROM ficha JOIN datos_defensivos ON ficha.id = datos_defensivos.id_ficha WHERE ficha.id_jugador=".$idConsulta." ORDER BY id ASC LIMIT 10");
                                            $mediaDefensivos=[];
                                            while($mostrar2=mysqli_fetch_array($resultado2)){
                                                $mediaDefensivos[]=$mostrar2['media'];
                                            }
                                        //datos ofensivos
                                        $resultado2=dameConsulta("SELECT ficha.id, (datos_ofensivos.conduccion_libre +datos_ofensivos.conduccion_linea +datos_ofensivos.control+ datos_ofensivos.control_orientado+datos_ofensivos.regate +datos_ofensivos.tiro_parado +datos_ofensivos.tiro_movimiento+ datos_ofensivos.finalizacion+datos_ofensivos.pase_cabeza +datos_ofensivos.remate_cabeza+datos_ofensivos.pase_izquierdo+datos_ofensivos.pase_derecho+datos_ofensivos.penalties+datos_ofensivos.corners+datos_ofensivos.tiro_libre)/15 as media FROM ficha JOIN datos_ofensivos ON ficha.id = datos_ofensivos.id_ficha WHERE ficha.id_jugador=".$idConsulta." ORDER BY id ASC LIMIT 10");
                                            $mediaOfensivos=[];
                                            while($mostrar2=mysqli_fetch_array($resultado2)){
                                                $mediaOfensivos[]=$mostrar2['media'];
                                            }
                                        }
                                            
                                        ?>
                                    </div>
                                    <hr>
                                    Evolución del jugador en sus últimas 10 fichas (datos psicológicos,defensivos y ofensivos)
                                    
                                </div>
                            </div>

                            </div>
                           
                            
        </div>
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                <h1 class="h3 mb-3 text-gray-800 ">Listado de fichas de <?php echo $mostrar['nombre']?> <?php echo $mostrar['apellidos']?></h1>
                                </div>
                                <div class="col-md-auto">
                                <a href="../funciones/plantilla_excel/exportar_listafichas.php?id_jug=<?php echo $idConsulta?>&pos=<?php echo $mostrar['posicion'] ?>&nom=<?php echo $mostrar['nombre'].$mostrar['apellidos'] ?>" class="btn btn-success shadow-sm"><i class=" text-white-50"></i> Exportar Excel</a>
                                <?php if($_SESSION['tipoUsuario']=='ojeador'): ?>
                                <a href="nueva_ficha.php?id=<?php echo $mostrar['id'] ?>&id_eq=<?php echo $mostrar['id_equipo'] ?>&nombre=<?php echo $mostrar['nombre'].' '.$mostrar['apellidos'] ?>&pos=<?php echo $mostrar['posicion'] ?>" class="btn btn-primary shadow-sm"><i class=" text-white-50"></i> Nueva Ficha</a>
                                <?php endif; ?>
                                </div>
                            </div>
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
                                            <th>Fecha</th>
                                            <th>Evento</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Evento</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php       
                        $resultado2=dameConsulta("SELECT * from ficha  where id_jugador='".$mostrar['id']."'");
                
                        while($mostrar2=mysqli_fetch_array($resultado2)){
                    ?>
                        <tr>
                            <td id="fecha"><?php  echo $mostrar2['fecha']?></td>
                            <td id="partido"><?php  echo $mostrar2['partido']?></td>
                            <th>
                                <a href="ficha_ver.php?id=<?php echo $mostrar2['id'] ?>" class="btn btn-success">Ver</a>
                                <a href="ficha_editar.php?id=<?php echo $mostrar2['id'] ?>" class="btn btn-warning">Editar</a>
                                <button type="button" id="btnElimFicha" class="btn btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#eliminarModalFicha<?php echo $mostrar['id']; ?>">
                                    Eliminar
                                 </button>
                                <!--Ventana Modal para la Alerta de Eliminar--->
                                <?php include('../funciones/forms/modalEliminarFicha.php'); ?>
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

<?php require_once "vistaInferior.php"?>

<script src="../js/Chart.min.js"></script>

<!-- Script gráfico area para otros jugadores -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var ctx = document.getElementById("areaChartOtroFichas").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:["Ficha 10","Ficha 9","Ficha 8","Ficha 7","Ficha 6","Ficha 5","Ficha 4","Ficha 3","Ficha 2","Ficha 1"],
        datasets: [{
            label: 'Datos Ofensivos', // Name the series
            data: [<?php foreach ($mediaPsicologicos as $valor)
            echo $valor."," ?>], // Specify the data values array
            fill: false,
            borderColor: '#E52F19', // Add custom color border (Line)
            backgroundColor: '#E52F19', // Add custom color background (Points and Fill)
            borderWidth: 3 // Specify bar border width
        },
                  {
            label: 'Datos Defensivos', // Name the series
            data: [<?php foreach ($mediaDefensivos as $valor)
            echo $valor."," ?>], // Specify the data values array
            fill: false,
            borderColor: '#41E00F', // Add custom color border (Line)
            backgroundColor: '#41E00F', // Add custom color background (Points and Fill)
            borderWidth: 3 // Specify bar border width
        },
        {
            label: 'Datos Psicológicos', // Name the series
            data: [<?php foreach ($mediaOfensivos as $valor)
            echo $valor."," ?>], // Specify the data values array
            fill: false,
            borderColor: '#6F0FC3', // Add custom color border (Line)
            backgroundColor: '#6F0FC3', // Add custom color background (Points and Fill)
            borderWidth: 3 // Specify bar border width
        }]
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    },
    scales: {
      x: {
        min: 1,
        max: 10,
      }
    },
});
</script>

<!-- Script gráfico area para portero -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var ctx = document.getElementById("areaChartPorteroFichas").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:["Ficha 10","Ficha 9","Ficha 8","Ficha 7","Ficha 6","Ficha 5","Ficha 4","Ficha 3","Ficha 2","Ficha 1"],
        datasets: [{
            label: 'Datos Técnicos', // Name the series
            data: [<?php foreach ($mediaPsicologicos as $valor)
            echo $valor."," ?>], // Specify the data values array
            fill: false,
            borderColor: '#E52F19', // Add custom color border (Line)
            backgroundColor: '#E52F19', // Add custom color background (Points and Fill)
            borderWidth: 3 // Specify bar border width
        },
        {
            label: 'Datos Psicológicos', // Name the series
            data: [<?php foreach ($mediaPortero as $valor)
            echo $valor."," ?>], // Specify the data values array
            fill: false,
            borderColor: '#6F0FC3', // Add custom color border (Line)
            backgroundColor: '#6F0FC3', // Add custom color background (Points and Fill)
            borderWidth: 3 // Specify bar border width
        }]
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    },
    
});
</script>
