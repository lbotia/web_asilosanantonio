<?php 
include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {
	$ced = $_POST['ced'];
	$name = $_POST['name'];
	$l_nacimiento = $_POST['l_nacimiento'];
	$fecha = $_POST['fecha'];
	$cedula_nueva = $_POST['cedula'];
	$ideps = $_POST['ideps'];

	//$nombres = $name.' '.$apellido;

	echo $fecha.'<br>';
	echo $ideps.'<br>';


	$sql = 'UPDATE hermana 
			SET 
			cedula_hermana="'.$cedula_nueva.'",
			nombres="'.$name.'",
			fecha_nacimiento="'.$fecha.'",
			lugar_nacimiento="'.$l_nacimiento.'",
			eps_ideps="'.$ideps.'"
			where cedula_hermana = "'.$ced.'"';

	
	if ($conn->query($sql) === TRUE or die(mysql_error())) {

		header("Refresh:0; url=../panel-hermanas.php");
		// ENVIAR A LA LISTA DE HERMANAS
		}else {

			echo "ERROR NO SE AGREGO";
			// ENVIAR A UNA PAGINA DE ERROR 
		}
	

}

 ?>

