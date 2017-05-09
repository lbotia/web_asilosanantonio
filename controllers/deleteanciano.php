<?php 
include_once "config.php";

$ced = $_REQUEST['ced'];

echo $ced;

//BORRAR

$sql  = 'DELETE FROM familia WHERE anciano_cedula_anciano = "'.$ced.'";';
$sql .= 'DELETE FROM ingreso WHERE anciano_cedula_anciano = "'.$ced.'";';
$sql .= 'DELETE FROM observaciones WHERE anciano_cedula_anciano = "'.$ced.'";';
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
