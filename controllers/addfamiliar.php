<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>

<?php 

if (isset($_POST)) {


	 $ced = $_REQUEST['ced'];
		echo $ced;
	 $name_fam = $_POST['name_f'];
		echo $name_fam.'<br>';
	
	$sqlTam = 'SELECT COUNT(*) as total_fam FROM listar_familiares WHERE cedula_anciano = "'.$ced.'"';
	$resTam = $conn->query($sqlTam);
	$tam_f = 0; 
	
	if ($resTam->num_rows > 0) {
		while ($r = $resTam->fetch_assoc()){
			$tam_f = $r['total_fam'];
		}
	}
	$tam_f = $tam_f + 1;
	$newid_fam = $ced.$tam_f;
	echo "NUEVO ID: " . $newid_fam;

	$sql = 'INSERT INTO familiares
			(id_familiares, nombres_familiares)
			VALUES
			('.$newid_fam.',"'.$name_fam.'");';
	echo $sql;

	$sql .= 'INSERT INTO anciano_tel_familiar_direccion
			(cedula_anciano, id_fam, id_tel, id_dir)
			VALUES("'.$ced.'",'.$newid_fam.', NULL, NULL);';
	
	if ($conn->multi_query($sql) === TRUE or die(mysql_error())) {
		echo "PROCESADO";
	}else {
		echo "ERROR MULTIQUERY";
	}
	 
	header('Location: ../ver_mas_ancianos.php?cedula='.$ced.'');


	
	

}

 ?>