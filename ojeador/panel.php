<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
-->
</div>

  <!-- Content Row para datos generales -->
    <div class="row">

        <!-- Equipos registrados en la plataforma -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jugadores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">NºJugadores</div>
                        </div>
                        <div class="col-auto">
                            <?php
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM jugador WHERE id_equipo=".$_SESSION['id_equipo']);
                            $mostrar=mysqli_fetch_array($resultado);
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Ojeadores en la plataforma -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Fichas de futbolistas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nº Fichas</div>
                        </div>
                        <div class="col-auto">
                            <?php
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM ficha WHERE id_ojeador=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado);
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reseñas en la plataforma -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Reseñas de partidos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nº Reseñas</div>
                        </div>
                        <div class="col-auto">
                            <?php
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM resena WHERE id_ojeador=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado);
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Fichas con datos -->
   <div class="row">

        <div class="col-lg-6">

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                <h5 class="card-header h5 mb-0 font-weight-bold text-gray-800">Jugadores recientes</h5>
                <a href="lista_jugadores.php" style="text-align: center; display: inline-block;">Ver más</a>
                
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Posición</th>
                                            <th>Categoría</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $resultado=dameConsulta("SELECT nombre,apellidos,categoria,posicion  FROM jugador WHERE id_equipo=".$_SESSION['id_equipo']." ORDER BY id DESC LIMIT 5");

                                            while($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td id="nombre"><?php  echo $mostrar['nombre']." ".$mostrar['apellidos']?></td>
                                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                                            <td id="categoria"><?php  echo $mostrar['categoria']?></td>
                                        </tr>
                                        <?php
                                         }?>
                                        
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>

            <div class="card mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="h5 mb-0 font-weight-bold text-gray-800">Categorías de Jugadores</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body mb-5">
                                    <div class="chart-pie pt-1">
                                        <canvas id="myPieChartCategorias"></canvas>
                                        <?php
                                           $resultado=dameConsulta("SELECT categoria, COUNT(categoria) as contador FROM jugador WHERE id_equipo=".$_SESSION['id']." GROUP BY categoria ORDER BY categoria");
                                            
                                            if(mysqli_num_rows($resultado)!=0){//Si hay datos referentes a jugadores mostramos el gráfico
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $alevin=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $amateur=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $benjamin=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $cadete=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $infantil=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $juvenil=$mostrar['contador'];
                                            }else{
                                              echo '<div class="text-center"><a class="text-danger">Aún no existen datos referentes a jugadores para mostrar el gráfico.</a></div>';
                                            }
                                        ?>
                                    </div>
                                    
                                    
                                </div>
                            </div>
        
        </div>

        <div class="col-lg-6">

        <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                <h5 class="card-header h5 mb-0 font-weight-bold text-gray-800">Reseñas recientes</h5>
                <a href="lista_resena.php" style="text-align: center; display: inline-block;">Ver más</a>
                
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Evento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $resultado=dameConsulta("SELECT fecha,evento  FROM resena WHERE id_ojeador=".$_SESSION['id']." ORDER BY id DESC LIMIT 5");

                                            while($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td id="fecha"><?php  echo $mostrar['fecha']?></td>
                                            <td id="evento"><?php  echo $mostrar['evento']?></td>
                                        </tr>
                                        <?php
                                         }?>
                                        
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                <h5 class="card-header h5 mb-0 font-weight-bold text-gray-800">Fichas recientes</h5>
                </div>
                <div class="card-body">
                    
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Evento</th>
                                            <th>Posición Jugador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $resultado=dameConsulta("SELECT fecha,partido,posicion  FROM ficha WHERE id_ojeador=".$_SESSION['id']." ORDER BY id DESC LIMIT 5");

                                            while($mostrar=mysqli_fetch_array($resultado)){
                                        ?>
                                        <tr>
                                            <td id="fecha"><?php  echo $mostrar['fecha']?></td>
                                            <td id="partido"><?php  echo $mostrar['partido']?></td>
                                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                                        </tr>
                                        <?php
                                         }?>
                                        
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>
        
        </div>
    </div>
    

<!-- END Container-fluid-->
</div>


<?php require_once "vistaInferior.php"?>


<script src="../js/Chart.min.js"></script>
<script src="../js/chart-pie-demo.js"></script>