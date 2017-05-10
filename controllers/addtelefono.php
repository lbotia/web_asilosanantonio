<?php 
include_once '../helpers/session.php';
include_once 'config.php';


if (isset($_POST)) {

	 $ced = $_REQUEST['ced'];
		echo $ced.'<br>';
	 $num_tel = $_POST['num_tel'];
		echo $num_tel.'<br>';

    $sqlTam = 'SELECT COUNT(*) AS total_tel FROM listar_telefonos WHERE cedula_anciano = "'.$ced.'"';
	$resTam = $conn->query($sqlTam);
	$tam_f = 0; 

    if ($resTam->num_rows > 0) {
		while ($r = $resTam->fetch_assoc()){
			$tam_f = $r['total_tel'];
		}
	}

    $tam_f = $tam_f + 1;
    $newid_tel = $ced . $tam_f;

    $sql = 'INSERT INTO telefono
            (id_telefono, telefono)
            VALUES('.$newid_tel.', "'.$num_tel.'");';

    $sql .= 'INSERT INTO anciano_tel_familiar_direccion
            (cedula_anciano, id_fam, id_tel, id_dir)
            VALUES("'.$ced.'", NULL, '.$newid_tel.', NULL);';

    if ($conn->multi_query($sql) === TRUE) {
		echo "PROCESADO";
	}else {
		echo "ERROR MULTIQUERY";
	}
	 
	header('Location: ../editar-familiar.php?cedula='.$ced.'');
    
}

?>