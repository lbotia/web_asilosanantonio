<?php 
include_once 'config.php';

$ced = $_REQUEST['ced'];
$idref = $_REQUEST['idref'];

echo $ced.'<br>';
echo $idref.'<br>';

$sql = 'DELETE FROM referente_social WHERE idreferente_social = "'.$idref.'" AND anciano_cedula_anciano = "'.$ced.'"';


if ($conn->query($sql) === TRUE) {
	echo "ELIMINADO";
}else {
	echo "ERROR AL ELIMINAR";
 }

 header("Refresh:0; url=../listar-referentes.php?cedula=".$ced);

 ?>