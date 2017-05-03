<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navancianos.php';  ?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['cedula'];
	//echo $ced;

}

?>
<?php  
$sqldata = 'select nombre_referente from listar_referentes where cedula = "'.$ced.'"';

$resdata = $conn->query($sqldata);
$nom_referen = array();
if ($resdata->num_rows > 0 ) {
	while ($r = $resdata->fetch_assoc()) {
		$nom_referen[] = $r['nombre_referente'];
	}
}

?>
<div class="container">

	<div class="row">
		<div class="card-panel">					
					<table class="striped">
					
					  <thead>
					    <tr>
					        <th>Nombre del Referente Social</th>
					    </tr>
					  </thead>

					  <tbody>
					  <?php 
					  	$out = '';
					  	foreach ($nom_referen as $nom) {
					  		$out .= '<tr>';
					  		$out .= '<td>'.$nom.'</td>';
					  		$out .= '<td>
							<form  action="editar-referente-social.php" method="POST">
					  		<div class="input-field col s12">
										<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
											Editar
											<i class="material-icons right">mode_edit</i>
										</button>
							</form>
									</div></td>';
					  		$out .= '</tr>';
					  		//echo $nom;
					  	}
					  	echo $out;
					   ?>			     

					  </tbody>
					</table>

						<br>
						<div class="col s12">
						<form  action="agregar-referente-social.php" method="POST">
						<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">
							<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
								Agregar Nuevo
								<i class="material-icons right">add</i>
							</button>
						</div>
						</form>
	
			</div>
		</div>
	</div>
	<?php 	include 'helpers/footer.php';  ?>
	<?php 	include 'helpers/scripts.php';  ?>