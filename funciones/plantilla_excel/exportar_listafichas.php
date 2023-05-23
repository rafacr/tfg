<?php
session_start();
include("../funciones_usuario.php");
require_once '../conexion.php';

$posicion=$_GET['pos'];

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=lista_fichas_".$_GET['nom']."_".date('Y:m:d').".xls");

?>
    <table border="1">
	    <thead>
			<?php
			if($posicion=='portero'){
			?>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Evento</th>
					<th>Blocaje</th>
                    <th><?php echo utf8_decode("Anotación Blocaje"); ?></th>
					<th>Despeje</th>
                    <th><?php echo utf8_decode("Anotación Despeje"); ?></th>
					<th><?php echo utf8_decode("Desvío"); ?></th>
                    <th><?php echo utf8_decode("Anotación Desvío"); ?></th>
					<th>Rechace</th>
                    <th><?php echo utf8_decode("Anotación Rechace"); ?></th>
					<th><?php echo utf8_decode("Prolongación"); ?></th>
                    <th><?php echo utf8_decode("Anotación Prolongación"); ?></th>
					<th>Reflejos</th>
                    <th><?php echo utf8_decode("Anotación Reflejos"); ?></th>
					<th>Pase izquierdo</th>
                    <th><?php echo utf8_decode("Anotación Pase izquierdo"); ?></th>
					<th>Pase derecho</th>
                    <th><?php echo utf8_decode("Anotación Pase derecho"); ?></th>
					<th>Personalidad</th>
                    <th><?php echo utf8_decode("Anotación Personalidad"); ?></th>
					<th>Actitud</th>
                    <th><?php echo utf8_decode("Anotación Actitud"); ?></th>
					<th>Liderazgo</th>
                    <th><?php echo utf8_decode("Anotación Liderazgo"); ?></th>
					<th><?php echo utf8_decode("Concentración"); ?></th>
                    <th><?php echo utf8_decode("Anotación Concentración"); ?></th>

				</tr>
				<tbody>
				<?php
					$resultado1=dameConsulta("SELECT * from ficha where id_jugador=".$_GET['id_jug']."");
					$mostrar1=mysqli_fetch_array($resultado1);
					if(mysqli_num_rows($resultado1)>0){
						$resultado2=dameConsulta("SELECT * from datos_portero where id_ficha=".$mostrar1['id']."");
						$mostrar2=mysqli_fetch_array($resultado2);
						$resultado3=dameConsulta("SELECT * from datos_psicologicos where id_ficha=".$mostrar1['id']."");
						$mostrar3=mysqli_fetch_array($resultado3);
						
						$i=0;
						$salir=false;

						while($salir==false){
							$i++;
				?>
    <tr>
			<td><?php echo utf8_decode($mostrar1['id']); ?></td>
			<td><?php echo utf8_decode($mostrar1['fecha']); ?></td>
			<td><?php echo utf8_decode($mostrar1['partido']); ?></td>
			<td><?php echo utf8_decode($mostrar2['blocaje']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_blocaje']); ?></td>
			<td><?php echo utf8_decode($mostrar2['despeje']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_despeje']); ?></td>
			<td><?php echo utf8_decode($mostrar2['desvio']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_desvio']); ?></td>
			<td><?php echo utf8_decode($mostrar2['rechace']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_rechace']); ?></td>
			<td><?php echo utf8_decode($mostrar2['prolongacion']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_prolongacion']); ?></td>
			<td><?php echo utf8_decode($mostrar2['reflejos']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_reflejos']); ?></td>
			<td><?php echo utf8_decode($mostrar2['pase_izquierdo']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_pase_izquierdo']); ?></td>
			<td><?php echo utf8_decode($mostrar2['pase_derecho']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_pase_derecho']); ?></td>
			<td><?php echo utf8_decode($mostrar3['personalidad']); ?></td>
            <td><?php echo utf8_decode($mostrar3['comentario_personalidad']); ?></td>
			<td><?php echo utf8_decode($mostrar3['actitud']); ?></td>
            <td><?php echo utf8_decode($mostrar3['comentario_actitud']); ?></td>
			<td><?php echo utf8_decode($mostrar3['liderazgo']); ?></td>
            <td><?php echo utf8_decode($mostrar3['comentario_liderazgo']); ?></td>
			<td><?php echo utf8_decode($mostrar3['concentracion']); ?></td>
            <td><?php echo utf8_decode($mostrar3['comentario_concentracion']); ?></td>
	</tr>

<?php
				if($i<mysqli_num_rows($resultado1)){
					$mostrar1=mysqli_fetch_array($resultado1);
					$resultado2=dameConsulta("SELECT * from datos_portero where id_ficha=".$mostrar1['id']."");
					$mostrar2=mysqli_fetch_array($resultado2);
					$resultado3=dameConsulta("SELECT * from datos_psicologicos where id_ficha=".$mostrar1['id']."");
					$mostrar3=mysqli_fetch_array($resultado3);
				}else {
					$salir=true;
				}
			}
			}
	}else{
?>
<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Evento</th>

					<th>Entrada</th>
                    <th><?php echo utf8_decode("Anotación Entrada"); ?></th>
					<th>Trackle</th>
                    <th><?php echo utf8_decode("Anotación Trackle"); ?></th>
					<th><?php echo utf8_decode("Intercepción"); ?></th>
                    <th><?php echo utf8_decode("Anotación Intercepción"); ?></th>
					<th>Marcaje</th>
                    <th><?php echo utf8_decode("Anotación Marcaje"); ?></th>
					<th>Carga</th>
                    <th><?php echo utf8_decode("Anotación Carga"); ?></th>
					<th>Despeje pie</th>
                    <th><?php echo utf8_decode("Anotación despeje pie"); ?></th>
					<th>Despeje cabeza</th>
                    <th><?php echo utf8_decode("Anotación despeje cabeza"); ?></th>
					<th>Pase izquierdo</th>
                    <th><?php echo utf8_decode("Anotación Pase izquierdo"); ?></th>
					<th>Pase derecho</th>
                    <th><?php echo utf8_decode("Anotación Pase derecho"); ?></th>
					<th>Cobertura</th>
                    <th><?php echo utf8_decode("Anotación Cobertura"); ?></th>
					<th><?php echo utf8_decode("Conducción libre"); ?></th>
                    <th><?php echo utf8_decode("Anotación Conducción libre"); ?></th>
					<th><?php echo utf8_decode("Conducción línea"); ?></th>
                    <th><?php echo utf8_decode("Anotación Conducción línea"); ?></th>
					<th>Control</th>
                    <th><?php echo utf8_decode("Anotación Control"); ?></th>
					<th>Control orientado</th>
                    <th><?php echo utf8_decode("Anotación Control orientado"); ?></th>
					<th>Regate</th>
                    <th><?php echo utf8_decode("Anotación Regate"); ?></th>
					<th>Tiro parado</th>
                    <th><?php echo utf8_decode("Anotación Tiro parado"); ?></th>
					<th>Tiro movimiento</th>
                    <th><?php echo utf8_decode("Anotación Tiro movimiento"); ?></th>
					<th><?php echo utf8_decode("Finalización"); ?></th>
                    <th><?php echo utf8_decode("Anotación Finalización"); ?></th>
					<th>Pase cabeza</th>
                    <th><?php echo utf8_decode("Anotación Pase cabeza"); ?></th>
					<th>Remate cabeza</th>
                    <th><?php echo utf8_decode("Anotación Remate cabeza"); ?></th>
					<th>Pase izquierdo</th>
                    <th><?php echo utf8_decode("Anotación Pase izquierdo"); ?></th>
					<th>Pase derecho</th>
                    <th><?php echo utf8_decode("Anotación Pase derecho"); ?></th>
					<th>Penaltis</th>
                    <th><?php echo utf8_decode("Anotación Penaltis"); ?></th>
					<th>Corners</th>
                    <th><?php echo utf8_decode("Anotación Corners"); ?></th>
					<th>Tiro libre</th>
                    <th><?php echo utf8_decode("Anotación Tiro libre"); ?></th>
					<th>Personalidad</th>
                    <th><?php echo utf8_decode("Anotación Personalidad"); ?></th>
					<th>Actitud</th>
                    <th><?php echo utf8_decode("Anotación Actitud"); ?></th>
					<th>Liderazgo</th>
                    <th><?php echo utf8_decode("Anotación Liderazgo"); ?></th>
					<th><?php echo utf8_decode("Concentración"); ?></th>
                    <th><?php echo utf8_decode("Anotación Concentración"); ?></th>
				</tr>
				<tbody>
				<?php
				//Aqui tenemos que consultar cada ficha y cada tabla de datos
					$resultado1=dameConsulta("SELECT * from ficha where id_jugador=".$_GET['id_jug']."");
					$mostrar1=mysqli_fetch_array($resultado1);
					if(mysqli_num_rows($resultado1)>0){
						$resultado2=dameConsulta("SELECT * from datos_defensivos where id_ficha=".$mostrar1['id']."");
						$mostrar2=mysqli_fetch_array($resultado2);
						$resultado3=dameConsulta("SELECT * from datos_ofensivos where id_ficha=".$mostrar1['id']."");
						$mostrar3=mysqli_fetch_array($resultado3);
						$resultado4=dameConsulta("SELECT * from datos_psicologicos where id_ficha=".$mostrar1['id']."");
						$mostrar4=mysqli_fetch_array($resultado4);
						$i=0;
						$salir=false;

						while($salir==false){
							$i++;
				?>
    <tr>
			<td><?php echo utf8_decode($mostrar1['id']); ?></td>
			<td><?php echo utf8_decode($mostrar1['fecha']); ?></td>
			<td><?php echo utf8_decode($mostrar1['partido']); ?></td>

			<td><?php echo utf8_decode($mostrar2['entrada']); ?></td>
            <td><?php echo utf8_decode($mostrar2['comentario_entrada']); ?></td>
			<td><?php echo utf8_decode($mostrar2['trackle']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_trackle']); ?></td>
			<td><?php echo utf8_decode($mostrar2['intercepcion']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_intercepcion']); ?></td>
			<td><?php echo utf8_decode($mostrar2['marcaje']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_marcaje']); ?></td>
			<td><?php echo utf8_decode($mostrar2['carga']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_carga']); ?></td>
			<td><?php echo utf8_decode($mostrar2['despeje_pie']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_despeje_pie']); ?></td>
			<td><?php echo utf8_decode($mostrar2['despeje_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_despeje_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar2['pase_izquierdo']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_pase_izquierdo']); ?></td>
			<td><?php echo utf8_decode($mostrar2['pase_derecho']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_pase_derecho']); ?></td>
			<td><?php echo utf8_decode($mostrar2['cobertura']); ?></td>
			<td><?php echo utf8_decode($mostrar2['comentario_cobertura']); ?></td>

			<td><?php echo utf8_decode($mostrar3['conduccion_libre']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_conduccion_libre']); ?></td>
			<td><?php echo utf8_decode($mostrar3['conduccion_linea']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_conduccion_linea']); ?></td>
			<td><?php echo utf8_decode($mostrar3['control']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_control']); ?></td>
			<td><?php echo utf8_decode($mostrar3['control_orientado']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_control_orientado']); ?></td>
			<td><?php echo utf8_decode($mostrar3['regate']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_regate']); ?></td>
			<td><?php echo utf8_decode($mostrar3['tiro_parado']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_tiro_parado']); ?></td>
			<td><?php echo utf8_decode($mostrar3['tiro_movimiento']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_tiro_movimiento']); ?></td>
			<td><?php echo utf8_decode($mostrar3['finalizacion']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_finalizacion']); ?></td>
			<td><?php echo utf8_decode($mostrar3['pase_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_pase_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar3['remate_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_remate_cabeza']); ?></td>
			<td><?php echo utf8_decode($mostrar3['pase_izquierdo']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_pase_izquierdo']); ?></td>
			<td><?php echo utf8_decode($mostrar3['pase_derecho']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_pase_derecho']); ?></td>
			<td><?php echo utf8_decode($mostrar3['penalties']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_penalties']); ?></td>
			<td><?php echo utf8_decode($mostrar3['corners']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_corners']); ?></td>
			<td><?php echo utf8_decode($mostrar3['tiro_libre']); ?></td>
			<td><?php echo utf8_decode($mostrar3['comentario_tiro_libre']); ?></td>

			<td><?php echo utf8_decode($mostrar4['personalidad']); ?></td>
            <td><?php echo utf8_decode($mostrar4['comentario_personalidad']); ?></td>
			<td><?php echo utf8_decode($mostrar4['actitud']); ?></td>
            <td><?php echo utf8_decode($mostrar4['comentario_actitud']); ?></td>
			<td><?php echo utf8_decode($mostrar4['liderazgo']); ?></td>
            <td><?php echo utf8_decode($mostrar4['comentario_liderazgo']); ?></td>
			<td><?php echo utf8_decode($mostrar4['concentracion']); ?></td>
            <td><?php echo utf8_decode($mostrar4['comentario_concentracion']); ?></td>
	</tr>


<?php
				if($i<mysqli_num_rows($resultado1)){
					$mostrar1=mysqli_fetch_array($resultado1);
					$resultado2=dameConsulta("SELECT * from datos_defensivos where id_ficha=".$mostrar1['id']."");
					$mostrar2=mysqli_fetch_array($resultado2);
					$resultado3=dameConsulta("SELECT * from datos_ofensivos where id_ficha=".$mostrar1['id']."");
					$mostrar3=mysqli_fetch_array($resultado3);
					$resultado4=dameConsulta("SELECT * from datos_psicologicos where id_ficha=".$mostrar1['id']."");
					$mostrar4=mysqli_fetch_array($resultado4);
				}else {
					$salir=true;
				}
			}
		}
    }   
	 exit;                  
?>
                </tbody>
				
    </table>