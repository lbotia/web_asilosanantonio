<?php

include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {
    $ced = $_POST['ced'];
    $id_dir = $_POST['id_dir'];
	$nom_d = $_POST['nom_dir'];

/*    echo $ced;
    echo "<br>";
    echo $id_dir;
    echo "<br>";
    echo $nom_d;
    echo "<br>";*/


    $sql = 'UPDATE direccion
            SET direccion = "'.$nom_d.'"
            WHERE id_direccion = '.$id_dir.';';



    if ($conn->query($sql) === TRUE or die(mysql_error())) {
        echo "PROCESADO";
        header("Refresh:0; url=../editar-familiar.php?cedula=" . $ced);
    }else {
        echo "ERROR!";
    }



}


?>