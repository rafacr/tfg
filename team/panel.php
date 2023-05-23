
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
        <div class="col-xl-3 col-md-6 mb-3">
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
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM jugador WHERE id_equipo=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado)
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Número de jugadores en la plataforma -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ojeadores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nº Ojeadores</div>
                        </div>
                        <div class="col-auto">
                            <?php
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM usuario WHERE id_equipo=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado)
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ojeadores en la plataforma -->
        <div class="col-xl-3 col-md-6 mb-3">
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
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM ficha WHERE id_equipo=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado)
                            ?>
                            <i class="text-info font-weight-bold display-4"><?php echo $mostrar['contador']?></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reseñas en la plataforma -->
        <div class="col-xl-3 col-md-6 mb-3">
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
                            $resultado=dameConsulta("SELECT COUNT(*) contador FROM resena WHERE id_equipo=".$_SESSION['id']);
                            $mostrar=mysqli_fetch_array($resultado)
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
                                            $resultado=dameConsulta("SELECT nombre,apellidos,categoria,posicion  FROM jugador WHERE id_equipo=".$_SESSION['id']." ORDER BY id DESC LIMIT 5");

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
                                    <h6 class="m-0 font-weight-bold text-center text-primary">Categorías de jugadores</h6>
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

        <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-center text-primary">Posiciones de jugadores</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChartPosiciones"></canvas>
                                        <?php
                                            $resultado=dameConsulta("SELECT posicion,COUNT(posicion) as contador FROM jugador WHERE id_equipo=".$_SESSION['id']." GROUP BY posicion ORDER BY posicion");

                                            if(mysqli_num_rows($resultado)!=0){//Si hay datos referentes a jugadores mostramos el gráfico
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $centrocampista=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $defensa=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $delantero=$mostrar['contador'];
                                              $mostrar=mysqli_fetch_array($resultado);
                                              $portero=$mostrar['contador'];
                                              $total=max($centrocampista,$defensa,$delantero,$portero);//recogemos el total y le damos 10 de margen para el límite del gráfico
                                          }else{
                                            echo '<div class="text-center"><a class="text-danger">Aún no existen datos referentes a jugadores para mostrar el gráfico.</a></div>';
                                          }
                                        ?>
                                    </div>
                                </div>
                            </div>

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
                                            $resultado=dameConsulta("SELECT fecha,evento  FROM resena WHERE id_equipo=".$_SESSION['id']." ORDER BY id DESC LIMIT 5");

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

                           
            </div>
        
    </div>
    

<!-- END Container-fluid-->
</div>


<?php require_once "vistaInferior.php"?>

<script src="../js/Chart.min.js"></script>

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChartCategorias");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Benjamin", "Alevín", "Infantil","Cadete","Juvenil","Profesional"],
    datasets: [{
      data: [<?php echo $benjamin;?>, <?php echo $alevin;?>, <?php echo $infantil;?>,<?php echo $cadete;?>,<?php echo $juvenil;?>,<?php echo $amateur;?>],
      backgroundColor: ['#D92712', '#49E80E', '#0E95D9','#F0ED25', '#2D9764', '#A3B9AE'],
      hoverBackgroundColor: ['#D92712', '#49E80E', '#0E95D9','#F0ED25', '#2D9764', '#A3B9AE'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "black",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 15,
    },
    legend: {
      display: true,
      position: 'bottom',
      labels:{
            fontColor: "black"
          }
    },
    cutoutPercentage: 80,
  },
});

</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChartPosiciones");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Portero", "Defensa", "Centrocampista", "Delantero"],
    datasets: [{
      label: "Total:",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [<?php echo $portero;?>, <?php echo $defensa;?>, <?php echo $centrocampista;?>,<?php echo $delantero;?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $total;?>,//el tope máximo de jugadores
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
</script>