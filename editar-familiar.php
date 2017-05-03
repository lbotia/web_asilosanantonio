<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navancianos.php';  ?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['cedula'];
	//echo $ced;

}

?>

<?php  
$sqldata = 'SELECT * FROM familia WHERE anciano_cedula_anciano = "'.$ced.'"';
$resdata = $conn->query($sqldata);


$name_fam ='';
$dire = '';
$tel ='';


	if ($resdata->num_rows >0) {
		while ($r = $resdata->fetch_assoc())
		{
			$name_fam = $r['nombres'];
			//echo var_dump($name_fam);
			$dire = $r['direccion'];
			//echo var_dump($dire);
			$tel =$r['telefonos'];
		}
	}



?>
<div class="container">

	<div class="row">
		<div class="card-panel">
		<form method="POST" action="controllers/addfamiliar.php">
					<div class="row">
					<input type="hidden" name="ced" value="<?php echo $ced; ?>">

					<div class="input-field col s12">
						<input name="name_familiar" value='<?php echo $name_fam; ?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>

					<div class="input-field col s12">
						<input name="direccion" value='<?php echo $dire; ?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Direccion</label>
					</div>

					<div class="input-field col s12">
						<input name="telefonos" value='<?php echo $tel; ?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Telefonos</label>
					</div>
				</div>
				<div class="row">		

					<div class="col s10">

						<a href="#" class="waves-effect waves-light btn right">CANCELAR</a>

					</div>

					<div class="col s2">

						<button class="btn waves-effect waves-light" type="submit" name="action">
							AGREGAR             			
						</button>

					</div>
				</div>
				</div>
				</div>
</div>


<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
