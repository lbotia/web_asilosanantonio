<?php 
include_once "config.php";

	$sqlListDisc = 'SELECT * FROM discapacidad';
	$listDisc = array();

	$res_list_disc = $conn->query($sqlListDisc);
	while ($row = mysqli_fetch_assoc($res_list_disc)) {

		$listDisc[$row['iddiscapacidad']] = $row['nombre_discapacidad'];

	}


if (isset($_POST)){

	$f_ingreso = $_POST['fecha_ingreso'];
	$f_nacimiento = $_POST['fecha_nacimiento'];
	$nom_an = $_POST['name_anciano'];
	$ape_an = $_POST['apellido_anciano'];
	$ced = $_POST['ced'];
	$ced_ori = $_POST['group_cedula'];
	$gen = $_POST['genero'];
	$sub = $_POST['group_sub'];
	$idregi = $_POST['idregimen'];
	$ideps = $_POST['ideps'];
	$iddep = $_POST['iddep'];
	
	$obs = $_POST['observaciones'];

	// echo "FECHA INGRESO = ".$f_ingreso;
	// echo "<br>";
	// echo "FECHA NACIMIENTO = ".$f_nacimiento;
	// echo "<br>";
	// echo "NOMBRES".$nom_an;
	// echo "<br>";
	// echo "APELLIDOS".$ape_an;
	// echo "<br>";
	// echo "cedula".$ced;
	// echo "<br>";
	// echo "CED ORI : ". $ced_ori;
	// echo "<br>";
	// echo "ID REGIMEN = ".$idregi;
	// echo "<br>";
	// echo "GENERO: ".$gen;
	// echo "<br>";
	// echo "SUBSIDIO: ". $sub;
	// echo "<br>";
	// echo "IDEPS: ".$ideps;
	// echo "<br>";
	// echo "IDDEPENDENCIA: ".$iddep;
	// echo "<br>";
	// echo "OBSERVACION".$obs;
	// echo "<br>";


	$sql = 'UPDATE anciano SET
			nombres = "'.$nom_an.'",
			apellidos = "'.$ape_an.'",
			fecha_nacimiento = "'.$f_nacimiento.'",
			genero = "'.$gen.'",
			cedula_original = "'.$ced_ori.'",
			subsidio_colombia_mayor = "'.$sub.'",
			regimen_idregimen = "'.$idregi.'",
			eps_ideps="'.$ideps.'",
			dependencia_iddependencia= "'.$iddep.'",
			observacion = "'.$obs.'",
			fecha_ingreso = "'.$f_ingreso.'"
			WHERE cedula_anciano = "'.$ced.'";';
	


	// echo '<br><br>'.$sql.'<br><br>';
	// echo var_dump($listDisc);


	//lista ddiscapacidades. -> lisdisc
	//lista de discapacidades selecionadas -> $arrdis ->IDS

	//1) borrar todas las dis
	//2) agregar seleccionadas
	//3) si no selecciono ninguna solo borrar todo 


	$sql .= 'DELETE FROM anciano_has_discapacidad WHERE anciano_cedula_anciano = "'.$ced.'";';

	$arrdis = (isset($_POST['discapacidad'])) ? $_POST['discapacidad'] : NULL;
	

	//echo "<br><br>discapacidades: ";

	if ($arrdis != NULL) {

		foreach ($arrdis as $id_dis) {
		
			$sql .= 'INSERT INTO anciano_has_discapacidad VALUES ("'.$ced.'",'.$id_dis.');';

	}
		
	}else{

		echo "SIN DISCAPCIDADES";
	}

	
	function existe($iddis,$arrdis){

	}



	if ($conn->multi_query($sql) === TRUE) {
		echo "PROCESADO";
	}else {
		echo "Falló la multiconsulta: (" . $conn->errno . ") " . $conn->error;
	}


	header("Refresh:0; url=../editar_anciano.php?cedula=" .$ced);

}
 ?>
