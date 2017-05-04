<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['ced'];
	echo $ced;
	 $name_ref = $_POST['name_referente'];
	 echo $name_ref;



	 $sql = 'INSERT INTO referente_social(nombre_referente, anciano_cedula_anciano)	VALUES("'.$name_ref.'", "'.$ced.'")';


	 if ($conn->query($sql) === TRUE) {
	 	echo "registrado correctamente";
	 }else {
	 	echo "Error al registrar";
	 }

	 $conn->close();

	 header('Location: ../listar-referentes.php?cedula='.$ced.'');

	  
	 // echo "<meta http-equiv='refresh' content='0;URL=../listar-referentes.php' />";
	 

	}

	?>