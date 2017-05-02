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

	if ($resDisc->num_rows > 0 ) {
		while ($r = $resDisc->fetch_assoc()) {
			$discapacidades[] = $r['discapacidad'];
		}
	}

	//echo var_dump($discapacidades);

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
			$cedula = $r['cedula'];
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
 <div class="container">

 	<div class="card-panel">

 		<div class="col l12">
 			<blockquote>
      <p class="flow-text"><?php echo $names.' '.$apellidos; ?>  </p>
    </blockquote>
 		</div>
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
 						foreach ($discapacidades as $disc) {
 							echo $disc. ', ';
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
 	</div>
 </div>
