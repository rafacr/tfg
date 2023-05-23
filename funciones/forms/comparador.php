<?php  
$idJug1=1;
$idJug2=1;
    //consulta a la tabla de fichas
    $resultado1=dameConsulta("SELECT * from jugador where id_equipo=".$_SESSION['id_equipo']."");
    $resultado2=dameConsulta("SELECT * from jugador where id_equipo=".$_SESSION['id_equipo']."");
    
      
?>
  <style>
    section { margin-bottom: 40px; }
    section:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }

    #intro .zelect {
      display: inline-block;
      background-color: white;
      min-width: 300px;
      width:98%;
      cursor: pointer;
      line-height: 36px;
      border: 1px solid #dbdece;
      border-radius: 6px;
      position: relative;
    }
    #intro .zelected {
      font-weight: bold;
      padding-left: 10px;
    }
    #intro .zelected.placeholder {
      color: #082CE1;
    }
    #intro .zelected:hover {
      border-color: #c0c4ab;
      box-shadow: inset 0px 5px 8px -6px #dbdece;
    }
    #intro .zelect.open {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    #intro .dropdown {
      background-color: white;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
      border: 1px solid #dbdece;
      border-top: none;
      position: absolute;
      left:-1px;
      right:-1px;
      top: 36px;
      z-index: 2;
      padding: 3px 5px 3px 3px;
    }
    #intro .dropdown input {
      font-family: sans-serif;
      outline: none;
      font-size: 14px;
      border-radius: 4px;
      border: 1px solid #dbdece;
      box-sizing: border-box;
      width: 100%;
      padding: 7px 0 7px 10px;
    }
    #intro .dropdown ol {
      padding: 0;
      margin: 3px 0 0 0;
      list-style-type: none;
      max-height: 150px;
      overflow-y: scroll;
    }
    #intro .dropdown li {
      padding-left: 10px;
    }
    #intro .dropdown li.current {
      background-color: #e9ebe1;
    }
    #intro .dropdown .no-results {
      margin-left: 10px;
    }
  </style>
  


<div class="container-fluid">


<div class="card mb-4 mb-xl-0">
    <div class="h4 card-header text-center text-gray-800 "><b>Comparador de jugadores</b></div>
        <div class="card-body">
            <p class="text-gray-800 text-center">Seleccione dos jugadores para mostrar sus datos y poder realizar una comparativa de sus estadisticas</p>	
        </div>
</div>
<br></br>

<div class="row">
    <div class="col-6 ">
    
        <section id="intro" align="center">
            <label class="text-gray-800">Haga click en el buscador para seleccionar el primer jugador</label>
            <form class="user" action="" method="post">
            <select class="zelect" name="jugador1" id="jugador1" onchange="seleccionarSelect(this);">
                <?php	
                
                $valores1 = mysqli_fetch_array($resultado1);
                echo '<option value="'.$valores1['id'].'" selected>'.$valores1['nombre'].' '.$valores1['apellidos'].' - '.$valores1['equipo'].' - '.$valores1['categoria'].' </option>';
                while ($valores1 = mysqli_fetch_array($resultado1)) {
                                        
                echo '<option value="'.$valores1['id'].'">'.$valores1['nombre'].' '.$valores1['apellidos'].' - '.$valores1['equipo'].' - '.$valores1['categoria'].' </option>';
                }

                ?>
            </select>
        </section>

    </div>

    <div class="col-6">

        <section id="intro" align="center">
            <label class="text-gray-800">Haga click en el buscador para seleccionar el segundo jugador</label>
            <select class="zelect" name="jugador2" id="jugador2">
                <?php	
                $valores2 = mysqli_fetch_array($resultado2);
                echo '<option value="'.$valores2['id'].'" selected>'.$valores2['nombre'].' '.$valores2['apellidos'].' - '.$valores2['equipo'].' - '.$valores2['categoria'].' </option>';

                while ($valores2 = mysqli_fetch_array($resultado2)) {
                                        
                echo '<option value="'.$valores2['id'].'">'.$valores2['nombre'].' '.$valores2['apellidos'].' - '.$valores2['equipo'].' - '.$valores2['categoria'].' </option>';
                }

                ?>
            </select>
        </section>
    </div>
    <?php
                 $idJugadores=prueba_select();
        ?>
    <input name="btnPrueba" type="submit" class="btn btn-info btn-lg btn-block" value="Cargar Jugadores">
            </form>
  </div>
<br></br>

<?php
$idJug1=$idJugadores[0];
$idJug2=$idJugadores[1];
$resultadoJug1=dameConsulta("SELECT * from jugador where id=".$idJug1."");
$resultadoJug2=dameConsulta("SELECT * from jugador where id=".$idJug2."");

$mostrarDatos1=mysqli_fetch_array($resultadoJug1);
$mostrarDatos2=mysqli_fetch_array($resultadoJug2);

?>
  <div class="row">
    <!--Jugador de la columna izquierda -->
    <div class="col-6 border-right border-secondary">
      <div class="text-center">
        <img class="img-account-profile width="200" height="200"" src="<?php echo "../img/".$mostrarDatos1['img_perfil']?>" alt=""><br></br>
      </div>
      <p class="h5 text-danger text-center"><b>Información</b></p>
      <p class="text-gray-800 text-center"><b>Nombre:</b> <?php echo $mostrarDatos1['nombre']." ".$mostrarDatos1['apellidos'] ?></p>
      <p class="text-gray-800 text-center"><b>Equipo: </b> <?php echo $mostrarDatos1['equipo']?></p>
      <p class="text-gray-800 text-center"><b>Categoría: </b> <?php echo $mostrarDatos1['categoria']?></p>
      <p class="text-gray-800 text-center"><b>Posición: </b> <?php echo $mostrarDatos1['posicion']?></p>
      <p class="text-gray-800 text-center"><b>Nacimiento: </b> <?php echo $mostrarDatos1['yearNacimiento']?></p>
      <p class="text-gray-800 text-center"><b>Peso: </b> <?php echo $mostrarDatos1['peso']?>(kg)</p>
      <p class="text-gray-800 text-center"><b>Altura: </b> <?php echo $mostrarDatos1['altura']?>(cm)</p>
      <p class="text-gray-800 text-center"><b>Pierna: </b> <?php echo $mostrarDatos1['pierna']?></p>
      <p class="text-gray-800 text-center"><b>Lesiones: </b> <?php echo $mostrarDatos1['historial_lesiones']?></p>
      <p class="text-gray-800 text-center"><b>Debilidades: </b> <?php echo $mostrarDatos1['dafo_debilidades']?></p>
      <p class="text-gray-800 text-center"><b>Amenazas: </b> <?php echo $mostrarDatos1['dafo_amenazas']?></p>
      <p class="text-gray-800 text-center"><b>Fortalezas: </b> <?php echo $mostrarDatos1['dafo_fortalezas']?></p>
      <p class="text-gray-800 text-center"><b>Oportunidades: </b> <?php echo $mostrarDatos1['dafo_oportunidades']?></p>

      <?php
        if($mostrarDatos1['posicion']=="portero"){
          $resultadoPortero=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_portero.blocaje),1) as media_blocaje, ROUND(AVG(datos_portero.despeje),1) as media_despeje, ROUND(AVG(datos_portero.desvio),1) as media_desvio, ROUND(AVG(datos_portero.rechace),1) as media_rechace, ROUND(AVG(datos_portero.prolongacion),1) as media_prolongacion, ROUND(AVG(datos_portero.reflejos),1) as media_reflejos, ROUND(AVG(datos_portero.pase_izquierdo),1) as media_pase_izquierdo, ROUND(AVG(datos_portero.pase_derecho),1) as media_pase_derecho FROM ficha JOIN datos_portero ON ficha.id = datos_portero.id_ficha WHERE ficha.id_jugador=".$mostrarDatos1['id']."");
          $mostrarDatosPortero=mysqli_fetch_array($resultadoPortero);

          $resultadoPsico=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_psicologicos.personalidad),1) as media_personalidad, ROUND(AVG(datos_psicologicos.actitud),1) as media_actitud, ROUND(AVG(datos_psicologicos.liderazgo),1) as media_liderazgo, ROUND(AVG(datos_psicologicos.concentracion),1) as media_concentracion FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos1['id']."");
          $mostrarDatosPsico=mysqli_fetch_array($resultadoPsico);
      ?>
        <p class="h5 text-danger text-center"><b>Datos técnicos</b></p>
        <span class="text-gray-800"><b>Blocaje: </b> <?php echo $mostrarDatosPortero['media_blocaje']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_blocaje']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_blocaje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Despeje: </b> <?php echo $mostrarDatosPortero['media_despeje']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_despeje']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_despeje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Desvío: </b> <?php echo $mostrarDatosPortero['media_desvio']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_desvio']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_desvio']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Rechace: </b> <?php echo $mostrarDatosPortero['media_rechace']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_rechace']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_rechace']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Prolongación: </b> <?php echo $mostrarDatosPortero['media_prolongacion']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_prolongacion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_prolongacion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Reflejos: </b> <?php echo $mostrarDatosPortero['media_reflejos']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_reflejos']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_reflejos']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Pase izquierdo: </b> <?php echo $mostrarDatosPortero['media_pase_izquierdo']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_pase_izquierdo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_pase_izquierdo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Pase derecho: </b> <?php echo $mostrarDatosPortero['media_pase_derecho']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_pase_derecho']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_pase_derecho']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        
        <p class="h5 text-danger text-center"><br><b>Datos Psicológicos</b></p>
        <span class="text-gray-800"><b>Personalidad: </b> <?php echo $mostrarDatosPsico['media_personalidad']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_personalidad']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_personalidad']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Actitud: </b> <?php echo $mostrarDatosPsico['media_actitud']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_actitud']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_actitud']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Liderazgo: </b> <?php echo $mostrarDatosPsico['media_liderazgo']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_liderazgo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_liderazgo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Concentración: </b> <?php echo $mostrarDatosPsico['media_concentracion']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_concentracion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_concentracion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>


        <?php
        }else{
          $resultadoDefensivos=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_defensivos.entrada),1) as media_entrada, ROUND(AVG(datos_defensivos.trackle),1) as media_trackle, ROUND(AVG(datos_defensivos.intercepcion),1) as media_intercepcion, ROUND(AVG(datos_defensivos.marcaje),1) as media_marcaje, ROUND(AVG(datos_defensivos.carga),1) as media_carga, ROUND(AVG(datos_defensivos.despeje_pie),1) as media_despeje_pie, ROUND(AVG(datos_defensivos.despeje_cabeza),1) as media_despeje_cabeza, ROUND(AVG(datos_defensivos.pase_izquierdo),1) as media_pase_izquierdo, ROUND(AVG(datos_defensivos.pase_derecho),1) as media_pase_derecho, ROUND(AVG(datos_defensivos.cobertura),1) as media_cobertura FROM ficha JOIN datos_defensivos ON ficha.id = datos_defensivos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos1['id']."");
          $mostrarDatosDefensivos=mysqli_fetch_array($resultadoDefensivos);

          $resultadoOfensivos=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_ofensivos.conduccion_linea),1) as media_conduccion_linea, ROUND(AVG(datos_ofensivos.control),1) as media_control, ROUND(AVG(datos_ofensivos.control_orientado),1) as media_control_orientado, ROUND(AVG(datos_ofensivos.regate),1) as media_regate, ROUND(AVG(datos_ofensivos.tiro_movimiento),1) as media_tiro_movimiento, ROUND(AVG(datos_ofensivos.finalizacion),1) as media_finalizacion, ROUND(AVG(datos_ofensivos.remate_cabeza),1) as media_remate_cabeza, ROUND(AVG(datos_ofensivos.penalties),1) as media_penalties, ROUND(AVG(datos_ofensivos.corners),1) as media_corners, ROUND(AVG(datos_ofensivos.tiro_libre),1) as media_tiro_libre FROM ficha JOIN datos_ofensivos ON ficha.id = datos_ofensivos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos1['id']."");
          $mostrarDatosOfensivos=mysqli_fetch_array($resultadoOfensivos);

          $resultadoPsico=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_psicologicos.personalidad),1) as media_personalidad, ROUND(AVG(datos_psicologicos.actitud),1) as media_actitud, ROUND(AVG(datos_psicologicos.liderazgo),1) as media_liderazgo, ROUND(AVG(datos_psicologicos.concentracion),1) as media_concentracion FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos1['id']."");
          $mostrarDatosPsico=mysqli_fetch_array($resultadoPsico);

         ?>
          <p class="h5 text-danger text-center"><b>Datos Defensivos</b></p>
          <span class="text-gray-800"><b>Entrada: </b> <?php echo $mostrarDatosDefensivos['media_entrada']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_entrada']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_entrada']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Trackle: </b> <?php echo $mostrarDatosDefensivos['media_trackle']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_trackle']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_trackle']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Intercepción: </b> <?php echo $mostrarDatosDefensivos['media_intercepcion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_intercepcion']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_intercepcion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Marcaje: </b> <?php echo $mostrarDatosDefensivos['media_marcaje']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_marcaje']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_marcaje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Carga: </b> <?php echo $mostrarDatosDefensivos['media_carga']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_carga']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_carga']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Despeje pie: </b> <?php echo $mostrarDatosDefensivos['media_despeje_pie']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_despeje_pie']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_despeje_pie']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Despeje cabeza: </b> <?php echo $mostrarDatosDefensivos['media_despeje_cabeza']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_despeje_cabeza']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_despeje_cabeza']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Pase izquierdo: </b> <?php echo $mostrarDatosDefensivos['media_pase_izquierdo']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_pase_izquierdo']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_pase_izquierdo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Pase derecho: </b> <?php echo $mostrarDatosDefensivos['media_pase_derecho']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_pase_derecho']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_pase_derecho']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Cobertura: </b> <?php echo $mostrarDatosDefensivos['media_cobertura']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_cobertura']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_cobertura']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

          <p class="h5 text-danger text-center"><br><b>Datos Ofensivos</b></p>
          <span class="text-gray-800"><b>Conducción: </b> <?php echo $mostrarDatosOfensivos['media_conduccion_linea']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_conduccion_linea']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_conduccion_linea']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Control: </b> <?php echo $mostrarDatosOfensivos['media_control']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_control']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_control']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Control orientado: </b> <?php echo $mostrarDatosOfensivos['media_control_orientado']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_control_orientado']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_control_orientado']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Regate: </b> <?php echo $mostrarDatosOfensivos['media_regate']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_regate']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_regate']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Tiro en movimiento: </b> <?php echo $mostrarDatosOfensivos['media_tiro_movimiento']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_tiro_movimiento']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_tiro_movimiento']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Finalización: </b> <?php echo $mostrarDatosOfensivos['media_finalizacion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_finalizacion']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_finalizacion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Remate de cabeza: </b> <?php echo $mostrarDatosOfensivos['media_remate_cabeza']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_remate_cabeza']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_remate_cabeza']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Penalties: </b> <?php echo $mostrarDatosOfensivos['media_penalties']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_penalties']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_penalties']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Corners: </b> <?php echo $mostrarDatosOfensivos['media_corners']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_corners']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_corners']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Tiro libre: </b> <?php echo $mostrarDatosOfensivos['media_tiro_libre']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_tiro_libre']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_tiro_libre']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

          <p class="h5 text-danger text-center"><br><b>Datos Psicológicos</b></p>
          <span class="text-gray-800"><b>Personalidad: </b> <?php echo $mostrarDatosPsico['media_personalidad']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_personalidad']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_personalidad']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Actitud: </b> <?php echo $mostrarDatosPsico['media_actitud']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_actitud']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_actitud']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Liderazgo: </b> <?php echo $mostrarDatosPsico['media_liderazgo']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_liderazgo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_liderazgo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Concentración: </b> <?php echo $mostrarDatosPsico['media_concentracion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_concentracion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_concentracion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

         <?php

        };
        ?>
    </div>
        <!--Jugador de la columna derecha -->
    <div class="col-6">
      <div class="text-center">
        <img class="img-account-profile width="200" height="200"" src="<?php echo "../img/".$mostrarDatos2['img_perfil']?>" alt=""><br></br>
      </div>
      <p class="h5 text-danger text-center"><b>Información</b></p>
      <p class="text-gray-800 text-center"><b>Nombre:</b> <?php echo $mostrarDatos2['nombre']." ".$mostrarDatos2['apellidos'] ?></p>
      <p class="text-gray-800 text-center"><b>Equipo: </b> <?php echo $mostrarDatos2['equipo']?></p>
      <p class="text-gray-800 text-center"><b>Categoría: </b> <?php echo $mostrarDatos2['categoria']?></p>
      <p class="text-gray-800 text-center"><b>Posición: </b> <?php echo $mostrarDatos2['posicion']?></p>
      <p class="text-gray-800 text-center"><b>Nacimiento: </b> <?php echo $mostrarDatos2['yearNacimiento']?></p>
      <p class="text-gray-800 text-center"><b>Peso: </b> <?php echo $mostrarDatos2['peso']?>(kg)</p>
      <p class="text-gray-800 text-center"><b>Altura: </b> <?php echo $mostrarDatos2['altura']?>(cm)</p>
      <p class="text-gray-800 text-center"><b>Pierna: </b> <?php echo $mostrarDatos2['pierna']?></p>
      <p class="text-gray-800 text-center"><b>Lesiones: </b> <?php echo $mostrarDatos2['historial_lesiones']?></p>
      <p class="text-gray-800 text-center"><b>Debilidades: </b> <?php echo $mostrarDatos2['dafo_debilidades']?></p>
      <p class="text-gray-800 text-center"><b>Amenazas: </b> <?php echo $mostrarDatos2['dafo_amenazas']?></p>
      <p class="text-gray-800 text-center"><b>Fortalezas: </b> <?php echo $mostrarDatos2['dafo_fortalezas']?></p>
      <p class="text-gray-800 text-center"><b>Oportunidades: </b> <?php echo $mostrarDatos2['dafo_oportunidades']?></p>

      <?php
        if($mostrarDatos2['posicion']=="portero"){
          $resultadoPortero=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_portero.blocaje),1) as media_blocaje, ROUND(AVG(datos_portero.despeje),1) as media_despeje, ROUND(AVG(datos_portero.desvio),1) as media_desvio, ROUND(AVG(datos_portero.rechace),1) as media_rechace, ROUND(AVG(datos_portero.prolongacion),1) as media_prolongacion, ROUND(AVG(datos_portero.reflejos),1) as media_reflejos, ROUND(AVG(datos_portero.pase_izquierdo),1) as media_pase_izquierdo, ROUND(AVG(datos_portero.pase_derecho),1) as media_pase_derecho FROM ficha JOIN datos_portero ON ficha.id = datos_portero.id_ficha WHERE ficha.id_jugador=".$mostrarDatos2['id']."");
          $mostrarDatosPortero=mysqli_fetch_array($resultadoPortero);

          $resultadoPsico=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_psicologicos.personalidad),1) as media_personalidad, ROUND(AVG(datos_psicologicos.actitud),1) as media_actitud, ROUND(AVG(datos_psicologicos.liderazgo),1) as media_liderazgo, ROUND(AVG(datos_psicologicos.concentracion),1) as media_concentracion FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos2['id']."");
          $mostrarDatosPsico=mysqli_fetch_array($resultadoPsico);
      ?>
        <p class="h5 text-danger text-center"><b>Datos técnicos</b></p>
        <span class="text-gray-800"><b>Blocaje: </b> <?php echo $mostrarDatosPortero['media_blocaje']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_blocaje']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_blocaje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Despeje: </b> <?php echo $mostrarDatosPortero['media_despeje']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_despeje']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_despeje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Desvío: </b> <?php echo $mostrarDatosPortero['media_desvio']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_desvio']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_desvio']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Rechace: </b> <?php echo $mostrarDatosPortero['media_rechace']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_rechace']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_rechace']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Prolongación: </b> <?php echo $mostrarDatosPortero['media_prolongacion']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_prolongacion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_prolongacion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Reflejos: </b> <?php echo $mostrarDatosPortero['media_reflejos']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_reflejos']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_reflejos']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Pase izquierdo: </b> <?php echo $mostrarDatosPortero['media_pase_izquierdo']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_pase_izquierdo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_pase_izquierdo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Pase derecho: </b> <?php echo $mostrarDatosPortero['media_pase_derecho']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPortero['media_pase_derecho']*10?>%" aria-valuenow="<?php echo $mostrarDatosPortero['media_pase_derecho']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        
        <p class="h5 text-danger text-center"><br><b>Datos Psicológicos</b></p>
        <span class="text-gray-800"><b>Personalidad: </b> <?php echo $mostrarDatosPsico['media_personalidad']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_personalidad']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_personalidad']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Actitud: </b> <?php echo $mostrarDatosPsico['media_actitud']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_actitud']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_actitud']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Liderazgo: </b> <?php echo $mostrarDatosPsico['media_liderazgo']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_liderazgo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_liderazgo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
        <span class="text-gray-800"><b>Concentración: </b> <?php echo $mostrarDatosPsico['media_concentracion']?></span>
        <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_concentracion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_concentracion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

        <?php
        }else{
          $resultadoDefensivos=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_defensivos.entrada),1) as media_entrada, ROUND(AVG(datos_defensivos.trackle),1) as media_trackle, ROUND(AVG(datos_defensivos.intercepcion),1) as media_intercepcion, ROUND(AVG(datos_defensivos.marcaje),1) as media_marcaje, ROUND(AVG(datos_defensivos.carga),1) as media_carga, ROUND(AVG(datos_defensivos.despeje_pie),1) as media_despeje_pie, ROUND(AVG(datos_defensivos.despeje_cabeza),1) as media_despeje_cabeza, ROUND(AVG(datos_defensivos.pase_izquierdo),1) as media_pase_izquierdo, ROUND(AVG(datos_defensivos.pase_derecho),1) as media_pase_derecho, ROUND(AVG(datos_defensivos.cobertura),1) as media_cobertura FROM ficha JOIN datos_defensivos ON ficha.id = datos_defensivos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos2['id']."");
          $mostrarDatosDefensivos=mysqli_fetch_array($resultadoDefensivos);

          $resultadoOfensivos=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_ofensivos.conduccion_linea),1) as media_conduccion_linea, ROUND(AVG(datos_ofensivos.control),1) as media_control, ROUND(AVG(datos_ofensivos.control_orientado),1) as media_control_orientado, ROUND(AVG(datos_ofensivos.regate),1) as media_regate, ROUND(AVG(datos_ofensivos.tiro_movimiento),1) as media_tiro_movimiento, ROUND(AVG(datos_ofensivos.finalizacion),1) as media_finalizacion, ROUND(AVG(datos_ofensivos.remate_cabeza),1) as media_remate_cabeza, ROUND(AVG(datos_ofensivos.penalties),1) as media_penalties, ROUND(AVG(datos_ofensivos.corners),1) as media_corners, ROUND(AVG(datos_ofensivos.tiro_libre),1) as media_tiro_libre FROM ficha JOIN datos_ofensivos ON ficha.id = datos_ofensivos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos2['id']."");
          $mostrarDatosOfensivos=mysqli_fetch_array($resultadoOfensivos);

          $resultadoPsico=dameConsulta("SELECT ficha.id, ROUND(AVG(datos_psicologicos.personalidad),1) as media_personalidad, ROUND(AVG(datos_psicologicos.actitud),1) as media_actitud, ROUND(AVG(datos_psicologicos.liderazgo),1) as media_liderazgo, ROUND(AVG(datos_psicologicos.concentracion),1) as media_concentracion FROM ficha JOIN datos_psicologicos ON ficha.id = datos_psicologicos.id_ficha WHERE ficha.id_jugador=".$mostrarDatos2['id']."");
          $mostrarDatosPsico=mysqli_fetch_array($resultadoPsico);

         ?>
          <p class="h5 text-danger text-center"><b>Datos Defensivos</b></p>
          <span class="text-gray-800"><b>Entrada: </b> <?php echo $mostrarDatosDefensivos['media_entrada']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_entrada']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_entrada']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Trackle: </b> <?php echo $mostrarDatosDefensivos['media_trackle']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_trackle']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_trackle']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Intercepción: </b> <?php echo $mostrarDatosDefensivos['media_intercepcion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_intercepcion']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_intercepcion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Marcaje: </b> <?php echo $mostrarDatosDefensivos['media_marcaje']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_marcaje']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_marcaje']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Carga: </b> <?php echo $mostrarDatosDefensivos['media_carga']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_carga']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_carga']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Despeje pie: </b> <?php echo $mostrarDatosDefensivos['media_despeje_pie']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_despeje_pie']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_despeje_pie']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Despeje cabeza: </b> <?php echo $mostrarDatosDefensivos['media_despeje_cabeza']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_despeje_cabeza']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_despeje_cabeza']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Pase izquierdo: </b> <?php echo $mostrarDatosDefensivos['media_pase_izquierdo']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_pase_izquierdo']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_pase_izquierdo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Pase derecho: </b> <?php echo $mostrarDatosDefensivos['media_pase_derecho']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_pase_derecho']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_pase_derecho']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Cobertura: </b> <?php echo $mostrarDatosDefensivos['media_cobertura']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosDefensivos['media_cobertura']*10?>%" aria-valuenow="<?php echo $mostrarDatosDefensivos['media_cobertura']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

          <p class="h5 text-danger text-center"><br><b>Datos Ofensivos</b></p>
          <span class="text-gray-800"><b>Conducción: </b> <?php echo $mostrarDatosOfensivos['media_conduccion_linea']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_conduccion_linea']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_conduccion_linea']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Control: </b> <?php echo $mostrarDatosOfensivos['media_control']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_control']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_control']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Control orientado: </b> <?php echo $mostrarDatosOfensivos['media_control_orientado']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_control_orientado']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_control_orientado']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Regate: </b> <?php echo $mostrarDatosOfensivos['media_regate']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_regate']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_regate']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Tiro en movimiento: </b> <?php echo $mostrarDatosOfensivos['media_tiro_movimiento']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_tiro_movimiento']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_tiro_movimiento']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Finalización: </b> <?php echo $mostrarDatosOfensivos['media_finalizacion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_finalizacion']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_finalizacion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Remate de cabeza: </b> <?php echo $mostrarDatosOfensivos['media_remate_cabeza']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_remate_cabeza']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_remate_cabeza']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Penalties: </b> <?php echo $mostrarDatosOfensivos['media_penalties']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_penalties']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_penalties']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Corners: </b> <?php echo $mostrarDatosOfensivos['media_corners']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_corners']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_corners']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Tiro libre: </b> <?php echo $mostrarDatosOfensivos['media_tiro_libre']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosOfensivos['media_tiro_libre']*10?>%" aria-valuenow="<?php echo $mostrarDatosOfensivos['media_tiro_libre']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

          <p class="h5 text-danger text-center"><br><b>Datos Psicológicos</b></p>
          <span class="text-gray-800"><b>Personalidad: </b> <?php echo $mostrarDatosPsico['media_personalidad']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_personalidad']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_personalidad']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Actitud: </b> <?php echo $mostrarDatosPsico['media_actitud']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_actitud']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_actitud']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Liderazgo: </b> <?php echo $mostrarDatosPsico['media_liderazgo']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_liderazgo']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_liderazgo']?>" aria-valuemin="0" aria-valuemax="10"></div></div>
          <span class="text-gray-800"><b>Concentración: </b> <?php echo $mostrarDatosPsico['media_concentracion']?></span>
          <div class="progress"><div class="progress-bar" role="progressbar" style="width:<?php echo $mostrarDatosPsico['media_concentracion']*10?>%" aria-valuenow="<?php echo $mostrarDatosPsico['media_concentracion']?>" aria-valuemin="0" aria-valuemax="10"></div></div>

         <?php

        };
        ?>
    </div>

    </div>


  
</div>
<br></br>

<script src="../js/jquery.min.js"></script>
<script>
    $(setup)

    function setup() {
      $('#jugador1').zelect({ placeholder:'Nombre del jugador 1' })
    }
  </script>

<script>
    $(setup)

    function setup() {
      $('#jugador2').zelect({ placeholder:'Nombre del jugador 2' })
    }
</script>

