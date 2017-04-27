<?php 
include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {


$f_registro = $_POST['f_registro'];
$f_nacimiento = $_POST['f_nacimiento'];
$name = $_POST['name'];
$apell = $_POST['apellidos'];
$ced = $_POST['cedula'];
$cedori = $_POST ['cedula_original'];
$genero = $_POST['genero'];
$sub = $_POST['subsidio_colombia_mayor'];
$reg = $_POST['regimen'];
$eps = $_POST['eps'];
$depe = $_POST['dependencia'];
$dis = $_POST['discapacidad'];


$sql =' INSERT INTO base_de_datos_asilo_san_antonio.anciano
(cedula_anciano, nombres, apellidos, fecha_nacimiento, genero, cedula_original, subsidio_colombia_mayor, regimen_idregimen, eps_ideps, dependencia_iddependencia)
VALUES('', '', '', '', '', 0, 0, 0, 0, 0);

INSERT INTO base_de_datos_asilo_san_antonio.observaciones
(idobservaciones, observaciones, anciano_cedula_anciano)
VALUES(0, '', '');'