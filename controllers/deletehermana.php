<?php 
include_once "config.php";

$ced = $_REQUEST['ced'];

//BORRAR

$sqlDel = 'DELETE FROM hermana WHERE cedula_hermana = "'.$ced.'"';


if ($conn->query($sqlDel) === TRUE) {
	echo "ELIMINADO";
}else {
	echo "ERROR AL ELIMINAR";
 }

header("Refresh:0; url=../panel-hermanas.php");
 ?>
