<?php 
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else{
	echo "Esta pagina es solo para usuarios registrados.<br>";
   	echo "<br><a href='helpers/login.php'>Login</a>";
    echo "<br><br><a href='index.php'>Registrarme</a>";


   exit;
}

$now = time();

if($now > $_SESSION['expire']){
	session_destroy();

	echo "Su sesion a terminado,
	<a href='../index.php'> Necesita Hacer Login </a>";

	exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Panel de Control</title>
</head>

<body>
<h1>Panel de Contol</h1>
<p>aqui hirian los enlaces que le permitiran al usuario editar su perfil o cualquier otra cosa que desses</p>

<ul>
	<li>Editar Perfil</li>
	<li>Editar Preferencias</li>
	<li>Editar Configuracion</li>
	<li>Etc</li>
</ul>

<br><br>
<a href="controllers/logout.php">Cerrar Sesion </a>

</body>
</html>