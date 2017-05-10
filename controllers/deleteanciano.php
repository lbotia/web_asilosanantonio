<?php 
include_once "config.php";

$ced = $_REQUEST['ced'];

echo $ced;

//BORRAR
$id_fams = array();
$id_dirs = array();
$id_tels = array();
//FAMILIARES
$sqlfam = 'SELECT * FROM listar_datos_familiares WHERE cedula_anciano = "'.$ced.'"';
$resfam = $conn->query($sqlfam);


if ($resfam->num_rows > 0) {
	while ($r = $resfam->fetch_assoc()) {
		if($r['id_fam'] != NULL){
			$id_fams[] = $r['id_fam'];
		}if ($r['id_dir'] != NULL) {
			$id_dirs[] = $r['id_dir'];
		}if ($r['id_tel'] != NULL) {
			$id_tels[] = $r['id_tel'] ;
		}
	}	
}

echo var_dump($id_dirs).'<BR>';
echo var_dump($id_fams).'<BR>';
echo var_dump($id_tels).'<BR><BR><BR><BR>';
$sql = '';
foreach ($id_dirs as $id_d) {
	$sql .= '	DELETE FROM anciano_tel_familiar_direccion
				WHERE cedula_anciano="'.$ced.'" AND id_dir='.$id_d.';';
	$sql .= 'DELETE FROM direccion WHERE id_direccion='.$id_d.';';
}
foreach ($id_fams as $id_f) {
	$sql .= '	DELETE FROM anciano_tel_familiar_direccion
				WHERE cedula_anciano="'.$ced.'" AND id_fam='.$id_f.';';
	$sql .= 'DELETE FROM familiares WHERE id_familiares='.$id_f.';';
}
foreach ($id_tels as $id_t) {
	$sql .= '	DELETE FROM anciano_tel_familiar_direccion
				WHERE cedula_anciano="'.$ced.'" AND id_tel='.$id_t.';';
	$sql .= 'DELETE FROM telefono WHERE id_telefono='.$id_t.';';
}

   $sql .= 'DELETE FROM referente_social WHERE anciano_cedula_anciano = "'.$ced.'";';
   $sql .= 'DELETE FROM anciano_has_discapacidad WHERE anciano_cedula_anciano = "'.$ced.'";';
   $sql .= 'DELETE FROM anciano WHERE cedula_anciano = "'.$ced.'"';


if ($conn->multi_query($sql) === TRUE) {
	echo "ELIMINADOS";
	header("Refresh:0; url=../panel-ancianos.php");
}else {
	echo "Falló la multiconsulta: (" . $conn->errno . ") " . $conn->error;
}







 ?>
