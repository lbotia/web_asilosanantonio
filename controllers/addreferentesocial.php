<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['ced'];
		//echo $ced;
	 $name_ref = $_POST['name_referente'];

	 $sqlValidate = 'select * from referente_social where anciano_cedula_anciano = "'.$ced.'"';

	  $resV = $conn->query($sqlValidate);

	  if (mysqli_num_rows($resV) > 0) {
	 		//	echo "tiene familia";
	 	$sql = 'update referente_social set nombre_referente="'.$name_ref.'"  where anciano_cedula_anciano = "'.$ced.'"';

	 	if ($conn->query($sql)===TRUE) {
	 		echo "Se modifico correctamente";
	 	}else{
	 		echo "error al modificar:".$conn->error;
	 	}
	 }
	 echo "<meta http-equiv='refresh' content='0;URL=../panel-ancianos.php' />";
	 

	}

	?>