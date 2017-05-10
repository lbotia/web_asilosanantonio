<?php

include_once 'config.php';

$ced = $_REQUEST['ced'];
$id_dir = $_REQUEST['id_dir'];

echo "cedula: " . $ced;
echo "<br>";
echo "familiar: " . $id_dir;

$sql = 'DELETE FROM anciano_tel_familiar_direccion
        WHERE id_dir = '.$id_dir.'
        AND cedula_anciano = "'.$ced.'";';

$sql .= 'DELETE FROM direccion 
         WHERE id_direccion = '.$id_dir.';';

if ($conn->multi_query($sql) === TRUE or die(mysql_error())) {
    echo "ELIMINADO";    
}else {
    echo "Error al elminar";
}
header("Refresh:0; url=../editar-familiar.php?cedula=" . $ced);


?>