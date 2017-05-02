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
					<div class="row">

					<div class="input-field col s12">
						<input name="name_familiar" value='<?php
 					if ($nom_referen == NULL) {
 							echo "";
 						}else {
 						foreach ($nom_referen as $nom_refe) {
 							echo $nom_refe. ', ';
 						}

 					}
						?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>
					</div>
					</div>
					</div>
					</div>
<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>