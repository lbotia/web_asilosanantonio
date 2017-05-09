<?php 
include_once '../helpers/session.php';
include_once 'config.php';

if (isset($_POST)) {


$f_ingreso = $_POST['fecha_ingreso'];
$f_nacimiento = $_POST['fecha_nacimiento'];
$nom_an = $_POST['name_anciano'];
$ape_an = $_POST['apellido_anciano'];
$ced = $_POST['cedula'];
$ced_ori = $_POST['group_cedula'];
$gen = $_POST['genero'];
$sub = $_POST['group_sub'];
$idregi = $_POST['idregimen'];
$ideps = $_POST['ideps'];
$iddep = $_POST['iddep'];
$dis = $_POST['discapacidad'];
$obs = $_POST['observaciones'];


// $name_fam = $_POST['name_familiar'];
// $dire =$_POST['direccion'];
// $tel = $_POST['telefono'];
// $name_ref = $_POST['name_referente'];

$sql = 
'INSERT INTO anciano
 (cedula_anciano, nombres, apellidos, fecha_nacimiento, genero, cedula_original, subsidio_colombia_mayor, regimen_idregimen, eps_ideps, dependencia_iddependencia)
 VALUES
 ("'.$ced.'", "'.$nom_an.'", "'.$ape_an.'", 
 "'.$f_nacimiento.'", "'.$gen.'", "'.$ced_ori.'",
  "'.$sub.'", "'.$idregi.'", "'.$ideps.'", 
  "'.$iddep.'");';



$sql .= 'INSERT INTO ingreso (fecha_ingreso, anciano_cedula_anciano)
			VALUES("'.$f_ingreso.'", "'.$ced.'");';

// agregar discapacidades
foreach ($dis as $value) {
	$sql .= 'INSERT INTO anciano_has_discapacidad
			(anciano_cedula_anciano, discapacidad_iddiscapacidad)
			VALUES("'.$ced.'", '.$value.');';
}

$sql .= ' INSERT INTO observaciones
(observaciones, anciano_cedula_anciano)
VALUES("'.$obs.'", "'.$ced.'")';


if ($conn->multi_query($sql) === TRUE) {
	echo "AGREADO CORRECTAMENTE";
}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// 'INSERT INTO anciano
// (cedula_anciano, nombres, apellidos, fecha_nacimiento, genero, cedula_original, subsidio_colombia_mayor, regimen_idregimen, eps_ideps, dependencia_iddependencia)
// VALUES("'.$ced.'", "'.$nom_an.'", "'.$ape_an.'", "'.$f_nacimieno.'", "'.$gen.'", "'.$ced_ori.'", "'.$sub.'", "'.$regi.'", "'.$eps.'", "'.$dep.'")';






// echo $f_ingreso;
// echo "<br>";
// echo $f_nacimiento;
// echo "<br>";
// echo $nom_an;
// echo "<br>";
// echo $ape_an;
// echo "<br>";
// echo $ced;
// echo "<br>";
// echo $ced_ori;
// echo "<br>";
// echo $regi;
// echo "<br>";
// echo $gen;
// echo "<br>";
 echo $sub;
// echo "<br>";
// echo $eps;
// echo "<br>";
// echo $dep;
// echo "<br>";
// echo $obs;
// echo "<br>";
// echo $name_fam;
// echo "<br>";
// echo $dire;
// echo "<br>";
// echo $tel;
// echo "<br>";
// echo $name_ref;
// echo "<br>";
// echo $dis;

// echo var_dump($dis);
// echo "<BR>";
// echo sizeof($dis);
header("Refresh:0; url=../panel-ancianos.php");

}

?>


