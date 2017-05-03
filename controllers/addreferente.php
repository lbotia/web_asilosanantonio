<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {

	$ced = $_REQUEST['cedula'];
	$name = $_REQUEST['namereferente'];
	echo $ced;


	$sql = 'INSERT INTO referente_social (nombre_referente, anciano_cedula_anciano)VALUES("'.$name.'", "'.$ced.'")';
	
	if ($conn->query($sql)===TRUE) {
		header('Location: ../panel-ancianos.php');
	 			// ENVIAR A LA LISTA REFERENTE
	}else {

		echo "ERROR NO SE AGREGO";
	 				// ENVIAR A UNA PAGINA DE ERROR 
	}
	
}	
echo "<meta http-equiv='refresh' content='0;URL=../panel-ancianos.php' />";



?>
