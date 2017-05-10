<?php 
include_once '../helpers/session.php';
include_once 'config.php';
?>


<?php

if (isset($_POST)) {

	 $ced = $_REQUEST['ced'];
		echo $ced;
	 $name_dir = $_POST['name_d'];
		echo $name_dir.'<br>';
    $sqlTam = 'SELECT COUNT(*) AS total_dir FROM listar_direcciones WHERE cedula_anciano = "'.$ced.'"';
	$resTam = $conn->query($sqlTam);
	$tam_f = 0; 

    if ($resTam->num_rows > 0) {
		while ($r = $resTam->fetch_assoc()){
			$tam_f = $r['total_dir'];
		}
	}

    $tam_f = $tam_f + 1;
    $newid_dir = $ced . $tam_f;

    $sql = 'INSERT INTO direccion
            (id_direccion, direccion)
            VALUES('.$newid_dir.', "'.$name_dir.'");';

    $sql .= 'INSERT INTO anciano_tel_familiar_direccion
        (cedula_anciano, id_fam, id_tel, id_dir)
        VALUES("'.$ced.'",NULL, NULL, '.$newid_dir.');';


	if ($conn->multi_query($sql) === TRUE or die(mysql_error())) {
		echo "PROCESADO";
	}else {
		echo "ERROR MULTIQUERY";
	}
	 
	header('Location: ../editar-familiar.php?cedula='.$ced.'');
}

?>