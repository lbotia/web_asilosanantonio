<?php 
session_start();
?>


<?php 

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "base_de_datos_asilo_san_antonio";
$tbl_name = "user";


$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

if ($conexion->connect_error) {
	die("l conexión falló: " . $conexion>connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
//echo $username.'<BR>';
//echo $password;
$sql = "SELECT * FROM $tbl_name WHERE nameuser = '$username'";

$result = $conexion->query($sql);


if($result->num_rows > 0){
}
$row = $result->fetch_array(MYSQLI_ASSOC);

if (password_verify($password, $row['passwordhash'])){

	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (5*60);


	//echo "bienvenido! ". $_SESSION['username'];
	//echo "<br><br><a href=../panel-control.php>Panel de Control</a>"; 
	header('Location: ../panel-control.php');
	 } else { 
	   echo "Username o Password estan incorrectos.";
	 
	   echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
	 }
	 mysqli_close($conexion);
?>



