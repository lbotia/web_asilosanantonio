<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {


	 $ced = $_REQUEST['ced'];
		echo $ced;
	 $name_fam = $_POST['name_familiar'];
	 $dire =$_POST['direccion'];
	 $tel = $_POST['telefonos'];
	 // echo $name_fam.'<br>';
	 // echo $dire.'<br>';
	 // echo $tel.'<br>';

	 $sqlValidate = 'select * from familia where anciano_cedula_anciano = "'.$ced.'"';

	 $resV = $conn->query($sqlValidate);

	 if (mysqli_num_rows($resV) > 0) {
	 		//	echo "tiene familia";
	 	$sql = 'update familia set nombres="'.$name_fam.'" ,direccion = "'.$dire.'" , telefonos = "'.$tel.'" where anciano_cedula_anciano = "'.$ced.'"';

	 	if ($conn->query($sql)===TRUE) {
	 		echo "Se modifico correctamente";
	 	}else{
	 		echo "error al modificar:".$conn->error;
	 	}




	 	}else {
	 		$sql = 'INSERT INTO familia
	 		(nombres, direccion, telefonos, anciano_cedula_anciano)
	 		VALUES("'.$name_fam.'", "'.$dire.'", "'.$tel.'", "'.$ced.'")';


	 		if ($conn->query($sql) === TRUE) {

	 			header('Location: ../panel-ancianos.php');
	 			// ENVIAR A LA LISTA FAMILIAR
	 			}else {

	 				echo "ERROR NO SE AGREGO";
	 				// ENVIAR A UNA PAGINA DE ERROR 
	 			}
	 			
	 	}	

	 	header('Location: ../ver_mas_ancianos.php?cedula='.$ced.'');


	
	

}

 ?>