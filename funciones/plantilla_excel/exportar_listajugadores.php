<?php
session_start();
include("../funciones_usuario.php");
require_once '../conexion.php';

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=lista_scouting_".date('Y:m:d').".xls");

?>
    <table border="1">
	    <thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Nacimiento</th>
                    <th>Altura</th>
					<th>Peso</th>
					<th>Idiomas</th>
					<th><?php echo utf8_decode("Posición"); ?></th>
                    <th><?php echo utf8_decode("Categoría"); ?></th>
					<th>Residencia</th>
					<th>Debut</th>
					<th>Salario</th>
					<th>Fin contrato</th>
					<th>Pierna</th>
					<th>Equipos</th>
					<th>Lesiones</th>
					<th>Sanciones</th>
					<th><?php echo utf8_decode("Palmarés"); ?></th>
					<th>Oportunidades</th>
					<th>Amenazas</th>
					<th>Debilidades</th>
					<th>Fortalezas</th>
				</tr>
				<tbody>
<?php
     $resultado=dameConsulta("SELECT * from jugador where id_equipo=".$_SESSION['id_equipo']." AND equipo!='mi equipo' ORDER BY categoria");
	 while($mostrar=mysqli_fetch_array($resultado)){
		
?>
    <tr>
			<td><?php echo utf8_decode($mostrar['id']); ?></td>
			<td><?php echo utf8_decode($mostrar['nombre']); ?></td>
			<td><?php echo utf8_decode($mostrar['apellidos']); ?></td>
			<td><?php echo utf8_decode($mostrar['yearNacimiento']); ?></td>
            <td><?php echo utf8_decode($mostrar['altura']); ?></td>
			<td><?php echo utf8_decode($mostrar['peso']); ?></td>
			<td><?php echo utf8_decode($mostrar['idiomas']); ?></td>
			<td><?php echo utf8_decode($mostrar['posicion']); ?></td>
			<td><?php echo utf8_decode($mostrar['categoria']); ?></td>
			<td><?php echo utf8_decode($mostrar['residencia']); ?></td>
			<td><?php echo utf8_decode($mostrar['debut']); ?></td>
			<td><?php echo utf8_decode($mostrar['salario']); ?></td>
			<td><?php echo utf8_decode($mostrar['fin_contrato']); ?></td>
			<td><?php echo utf8_decode($mostrar['pierna']); ?></td>
			<td><?php echo utf8_decode($mostrar['historial_equipos']); ?></td>
			<td><?php echo utf8_decode($mostrar['historial_lesiones']); ?></td>
			<td><?php echo utf8_decode($mostrar['historial_sanciones']); ?></td>
			<td><?php echo utf8_decode($mostrar['historial_palmares']); ?></td>
			<td><?php echo utf8_decode($mostrar['dafo_oportunidades']); ?></td>
			<td><?php echo utf8_decode($mostrar['dafo_amenazas']); ?></td>
			<td><?php echo utf8_decode($mostrar['dafo_debilidades']); ?></td>
			<td><?php echo utf8_decode($mostrar['dafo_fortalezas']); ?></td>
	</tr>
	

<?php
     }   
	 exit;                  
?>
                </tbody>
				
    </table>