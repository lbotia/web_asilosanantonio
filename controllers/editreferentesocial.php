<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['cedula'];
	echo $ced;
	$name_ref = $_POST['name_referente'];
	echo $name_ref;
	$idref = $_POST['idref'];
	echo $idref;


	$sql = 'UPDATE referente_social SET nombre_referente="'.$name_ref.'" where idreferente_social = "'.$idref.'"';

	if ($conn->query($sql) === TRUE) {
		echo "EDITADO CORRECTAMENTE";
	}else {
		 echo "error en el update";
	} 



	//echo "<meta content='0;URL=../listar-referentes.php' />";
	header('Location: ../listar-referentes.php?cedula='.$ced.'');

}

?>