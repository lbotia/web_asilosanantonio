<?php 
include_once 'helpers/session.php';

?>

<?php 
	// incluir cabeceras ->  este header trae los css y js de materialize 
	include 'helpers/header.php';
 ?>
 <?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 

	include 'helpers/navancianos.php';  


?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['cedula'];
	//echo $ced;

}

?>

<?php 
	// discapacidades 

	$sqlDis = 'select discapacidad from listar_discapacidades where cedula = "'.$ced.'"';
	$resDisc = $conn->query($sqlDis);
	$discapacidades = array();
	if ($resDisc->num_rows > 0 ) {
		while ($r = $resDisc->fetch_assoc()) {
			$discapacidades[] = $r['discapacidad'];
		}
	}

	//echo var_dump($discapacidades);

 ?>
 <?php  

 	$sqlref = 'select nombre_referente from listar_referentes where cedula = "'.$ced.'"';
 	$resref = $conn->query($sqlref);
 	$nom_referen = array();
 	if ($resref->num_rows > 0 ) {
		while ($r = $resref->fetch_assoc()) {
			$nom_referen[] = $r['nombre_referente'];
		}
	}

?>

<?php 

$sqldata = 'SELECT * FROM listar_ancianos WHERE cedula = "'.$ced.'"';
$resdata = $conn->query($sqldata);


	if ($resdata->num_rows > 0) {
		while ($r = $resdata->fetch_assoc()) {
			$f_ingre = $r['fecha_ingreso'];
			$f_nac = $r ['fecha_nacimiento'];
			$names = $r['nombres'];
			$apellidos = $r['apellidos'];
			$ced = $r['cedula'];
			$ced_ori = $r['cedula_original'];
			$ced_original = ($ced_ori == 1) ? 'Si' : 'No';
			$gen = $r['genero'];
			$sub = $r['subsidio'];
			$subs = ($sub == 1) ? 'Si' : 'No';
			$reg = $r['regimen'];
			$eps = $r['eps'];
			$dep = $r['dependencia'];
			$obs =$r['observacion'];
			$edad = $r['edad'];






		}	
	}else
	{
		echo "NO HAY DATOS";
	}

?>
<?php  

$sqlfam = 'SELECT * FROM familia WHERE anciano_cedula_anciano = "'.$ced.'"';
$resfam = $conn->query($sqlfam);
$nom_familiar = array();
$direc = array();
$tel = array();


	if ($resfam->num_rows > 0) {
		while ($r = $resfam->fetch_assoc()) {
//FAMILIARES
			$nom_familiar = $r['nombres'];
			$direc = $r['direccion'];
			$tel = $r['telefonos'];

		}	
	}else
	{
		//echo "NO HAY DATOS";
	}
?>




 <div class="container">

 	<div class="card-panel">

 		<div class="col l12">
 			<blockquote>
      			<p class="flow-text"><?php echo $names.' '.$apellidos; ?>  </p>
    		</blockquote>
 		</div>
 			<form method="POST" action="editar_anciano.php">
 		<table class="striped">
 			

 			<tbody>
 				
 				<tr>
 					<td>Cedula:</td>
 					<td><?php echo $ced; ?></td>

 				</tr>
 				<tr>
 					<td>Fecha De Ingreso:</td>
 					<td><?php echo $f_ingre; ?></td>

 				</tr>
 				<tr>
 					<td>Fecha De Nacimiento:</td>
 					<td><?php echo $f_nac; ?></td>

 				</tr>
 				<tr>
 					<td>Edad:</td>
 					<td><?php echo $edad.' Años'; ?></td>

 				</tr>
 				<tr>
 					<td>Genero:</td>
 					<td><?php echo $gen; ?></td>

 				</tr>
 				<tr>
 					<td>Regimen:</td>
 					<td><?php echo $reg; ?></td>

 				</tr>
 				<tr>
 					<td>Eps:</td>
 					<td><?php echo $eps; ?></td>

 				</tr>
 				<tr>
 					<td>Dependencia:</td>
 					<td><?php echo $dep; ?></td>

 				</tr>
 				<tr>
 					<td>Discapacidades:</td>
 					<td><?php 

 						if ($discapacidades == NULL) {
 							echo "sin discapacidad";
 						}else {
 						foreach ($discapacidades as $disc) {
 							echo $disc. ', ';
 						}
 					}

 					 ?></td>

 				</tr>
 				<tr>
 					<td>Observaciones:</td>
 					<td><?php echo $obs; ?></td>

 				</tr>
 				<tr>
 					<td>Susidio Colombia Mayor:</td>
 					<td><?php echo $subs; ?></td>

 				</tr>
 				<tr>
 					<td>Cedula Original:</td>
 					<td><?php echo $ced_original; ?></td>

 				</tr>

 			</tbody>

 		</table>
 			<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Editar
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>
							</form>

 	</div>


 	<div class="card-panel">
 		<table class="striped">

 		<form method="POST" action="editar-familiar.php">


 			<tbody>
 				
 				<tr>
 					<td>Nombres:</td>
 					<td>
	 					<?php 					
	 						if ($nom_familiar == NULL) {
	 							echo "";
	 						}else { 					
	 							echo $nom_familiar;
	 						}
	 					?>
 					</td>
 				</tr>

 				<tr>
 					<td>Direccion:</td>
 					<td>
 						<?php 
							if ($direc == NULL) {
					 			echo "";
					 		}else {
					 					
					 			echo $direc;
					 		}					
						?>
 					</td>
 				</tr>

 				<tr>
 					<td>Telefonos:</td>
 					<td>
 						<?php 
		 					if ($tel == NULL) {
					 			echo "";
					 			}else {
					 					
					 			echo $tel;
					 		}
						?>
						</td>
 				</tr>

 				</tbody>
 				</table>
 				<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Editar
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>

				</form>
 	</div>

 	<div class="card-panel">
 		<table class="striped">

 		<form method="POST" action="editar-referente.php">
 			<tbody>
 			<tr>
 				<td>Nombres:</td>
 				<td>
 				<?php
 					if ($nom_referen == NULL) {
 							echo "";
 						}else {
 						foreach ($nom_referen as $nom_refe) {
 							echo $nom_refe. ', ';
 						}

 					}
						?>
 				</td>

 			</tr>

 			</tbody>
 			</table>
 				<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Editar
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>

</form>




 </div>
