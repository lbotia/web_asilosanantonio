<?php

include_once 'config.php';

$ced = $_REQUEST['ced'];
$id_tel = $_REQUEST['id_tel'];

echo "cedula: " . $ced;
echo "<br>";
echo "id_tel: " . $id_tel;



$sql = 'DELETE FROM anciano_tel_familiar_direccion
        WHERE id_tel = '.$id_tel.'
        AND cedula_anciano = "'.$ced.'";';

$sql .= 'DELETE FROM telefono 
         WHERE id_telefono = '.$id_tel.';';

if ($conn->multi_query($sql) === TRUE or die(mysql_error())) {
    echo "ELIMINADO";    
}else {
    echo "Error al elminar";
}
header("Refresh:0; url=../editar-familiar.php?cedula=" . $ced);


?>