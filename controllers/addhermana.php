<?php 
include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {

	$name = $_POST['name'];
	$apellido =$_POST['apellido'];
	$l_nacimiento = $_POST['l_nacimiento'];
	$fecha = $_POST['fecha'];
	$cedula = $_POST['cedula'];
	$ideps = $_POST['ideps'];

	$nombres = $name.' '.$apellido;

	$sql = 'INSERT INTO hermana
			(cedula_hermana, nombres, fecha_nacimiento, lugar_nacimiento, eps_ideps)
			VALUES("'.$cedula.'", "'.$nombres.'", "'.$fecha.'", "'.$l_nacimiento.'", '.$ideps.')';

	if ($conn->query($sql) === TRUE) {

		header('Location: ../panel-hermanas.php');
		// ENVIAR A LA LISTA DE HERMANAS
		}else {

			echo "ERROR NO SE AGREGO";
			// ENVIAR A UNA PAGINA DE ERROR 
		}
	

}

 ?>

