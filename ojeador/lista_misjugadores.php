
<?php require_once "vistaSuperior.php"?>

<div class="container-fluid">
	
<div class="row">

        <div class="col">
        </div>
        <div class="col-md-auto">
        <a href="nuevo_jugador.php" class="btn btn-info shadow-sm"><i class=" text-white-50"></i> Nuevo Jugador</a>
        <a href="../funciones/plantilla_excel/exportar_misjugadores.php" class="btn btn-success shadow-sm"><i class=" text-white-50"></i> Exportar Excel</a>
        <br></br>
        </div>
</div>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="benjamin-tab" data-bs-toggle="tab" data-bs-target="#benjamin" type="button" role="tab" aria-controls="benjamin" aria-selected="true">Benjamin</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="alevin-tab" data-bs-toggle="tab" data-bs-target="#alevin" type="button" role="tab" aria-controls="alevin" aria-selected="false">Alevín</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="infantil-tab" data-bs-toggle="tab" data-bs-target="#infantil" type="button" role="tab" aria-controls="infantil" aria-selected="false">Infantil</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="cadete-tab" data-bs-toggle="tab" data-bs-target="#cadete" type="button" role="tab" aria-controls="cadete" aria-selected="false">Cadete</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="juvenil-tab" data-bs-toggle="tab" data-bs-target="#juvenil" type="button" role="tab" aria-controls="juvenil" aria-selected="false">Juvenil</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profesional-tab" data-bs-toggle="tab" data-bs-target="#profesional" type="button" role="tab" aria-controls="prefesional" aria-selected="false">Profesional</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="benjamin" role="tabpanel" aria-labelledby="benjamin-tab">
    
    <div class="card-body">
    <!-- Textbox para filtrar la tabla -->
    <div class="form-group row">
    <div class="input-group input-group-lg">
      <input type="text" class="form-control" id="busquedaBenjamin" oninput="filtrarTablaBenjamin()" placeholder="Realice aquí su búsqueda.....">
    </div>
    </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="tablaBenjamin" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='benjamin' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                                <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
                    <?php
                    }?>
                    <!-- Fin del Bucle -->
                    </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="tab-pane fade" id="alevin" role="tabpanel" aria-labelledby="alevin-tab">
        
        <div class="card-body">
        <!-- Textbox para filtrar la tabla -->
        <div class="form-group row">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" id="busquedaAlevin" oninput="filtrarTablaAlevin()" placeholder="Realice aquí su búsqueda.....">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="tablaAlevin" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='alevin' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                            <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
                    <?php
                    }?>
                    <!-- Fin del Bucle -->
                    </tbody>
            </table>
        </div>
    </div>
    
</div>

<div class="tab-pane fade" id="infantil" role="tabpanel" aria-labelledby="infantil-tab"> 
  <div class="card-body">
        <!-- Textbox para filtrar la tabla -->
        <div class="form-group row">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" id="busquedaInfantil" oninput="filtrarTablaInfantil()" placeholder="Realice aquí su búsqueda.....">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="tablaInfantil" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='infantil' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                            <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
                    <?php
                    }?>
                    <!-- Fin del Bucle -->
                    </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="tab-pane fade" id="cadete" role="tabpanel" aria-labelledby="cadete-tab"> 
  <div class="card-body">
        <!-- Textbox para filtrar la tabla -->
        <div class="form-group row">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" id="busquedaCadete" oninput="filtrarTablaCadete()" placeholder="Realice aquí su búsqueda.....">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="tablaCadete" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='cadete' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                                <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
                    <?php
                    }?>
                    <!-- Fin del Bucle -->
                    </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="tab-pane fade" id="juvenil" role="tabpanel" aria-labelledby="juvenil-tab">
  <div class="card-body">
        <!-- Textbox para filtrar la tabla -->
        <div class="form-group row">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" id="busquedaJuvenil" oninput="filtrarTablaJuvenil()" placeholder="Realice aquí su búsqueda.....">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="tablaJuvenil" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='juvenil' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                                <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
                    <?php
                    }?>
                    <!-- Fin del Bucle -->
                    </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="tab-pane fade" id="profesional" role="tabpanel" aria-labelledby="profesional-tab">
  <div class="card-body">
        <!-- Textbox para filtrar la tabla -->
        <div class="form-group row">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" id="busquedaProfesional" oninput="filtrarTablaProfesional()" placeholder="Realice aquí su búsqueda.....">
        </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="tablaProfesional" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Posicion</th>
                        <th>Residencia</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <!-- Bucle con la consulta para mostrar en la tabla -->
                    <?php 
                        $resultado=dameConsulta("SELECT * from jugador where id_equipo='".$_SESSION['id_equipo']."' AND categoria='amateur' AND equipo='mi equipo'");

                        while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <tr>
                            <td id="nombre"><?php  echo $mostrar['nombre']?></td>
                            <td id="apellidos"><?php  echo $mostrar['apellidos']?></td>
                            <td id="posicion"><?php  echo $mostrar['posicion']?></td>
                            <td id="residencia"><?php  echo $mostrar['residencia']?></td>
                            <th>
                              <a href="jugador_ver.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Ver</a>
                              <a href="jugador_editar.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-warning">Editar</a>
                              <button type="button" id="btnElim" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModalJug<?php echo $mostrar['id']; ?>">
                                  Eliminar
                              </button>
                            </th>
                        </tr>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('../funciones/forms/modalEliminarJugador.php'); ?>
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