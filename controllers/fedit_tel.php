<?php 
include_once '../helpers/session.php';
include_once 'config.php';
 
$ced = $_POST['ced'];
$id_tel = $_POST['id_tel'];
$num_tel = $_POST['num_tel'];

/*echo $ced;
echo "<br>";
echo $id_tel;
echo "<br>";
echo $num_tel;*/


$sql = 'UPDATE telefono
        SET telefono = "'.$num_tel.'"
        WHERE id_telefono = '.$id_tel.';';

if ($conn->query($sql) === TRUE or die(mysql_error())) {
        echo "PROCESADO";
        header("Refresh:0; url=../editar-familiar.php?cedula=" . $ced);
}else {
        echo "ERROR!";
}


?>