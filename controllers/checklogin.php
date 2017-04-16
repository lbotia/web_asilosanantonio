<?php 
session_start();
include_once "config.php";
?>


<?php 

$tbl_name = "user";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE nameuser = '$username'";

$result = $conn->query($sql);


if($result->num_rows > 0){
}
$row = $result->fetch_array(MYSQLI_ASSOC);

if (password_verify($password, $row['passwordhash'])){

	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (60*60);


	//echo "bienvenido! ". $_SESSION['username'];
	//echo "<br><br><a href=../panel-control.php>Panel de Control</a>"; 
	header('Location: ../panel-control.php');
	 } else { 
	   echo "Username o Password estan incorrectos.";
	 
	   echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
	 }
	 mysqli_close($conexion);
?>



