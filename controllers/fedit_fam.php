<?php

include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {
    $ced = $_POST['ced'];
    $id_f = $_POST['id_f'];
    $name_f = $_POST['name_f'];

    echo $ced;
    echo "<br>";
    echo $id_f;
    echo "<br>";
    echo $name_f;

    $sql = 'UPDATE familiares 
            SET nombres_familiares = "'.$name_f.'"
            WHERE id_familiares = '.$id_f.'';

    if ($conn->query($sql) === TRUE or die(mysql_error())) {
        echo "PROCESADO";
        header("Refresh:0; url=../ver_mas_ancianos.php?cedula=" . $ced);
    }else {
        echo "ERROR!";
    }



}


?>