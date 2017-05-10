<?php

include_once 'config.php';

$ced = $_REQUEST['ced'];
$id_fam = $_REQUEST['id_fam'];

echo "cedula: " . $ced;
echo "<br>";
echo "familiar: " . $id_fam;

$sql = 'DELETE FROM anciano_tel_familiar_direccion
        WHERE id_fam = '.$id_fam.'
        AND cedula_anciano = "'.$ced.'";';

$sql .= 'DELETE FROM familiares 
         WHERE id_familiares = '.$id_fam.';';

if ($conn->multi_query($sql) === TRUE or die(mysql_error())) {
    echo "ELIMINADO";    
}else {
    echo "Error al elminar";
}
header("Refresh:0; url=../editar-familiar.php?cedula=" . $ced);

/*DELETE FROM anciano_tel_familiar_direccion
WHERE id_fam = 'idfam'
AND cedula_anciano = 'ced';

DELETE FROM familiares 
WHERE id_familiares = 'id fam';*/

?>