<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navancianos.php';  ?>





<div class="container">

	<div class="row">
		<div class="card-panel">
					<div class="row">

					<div class="input-field col s12">
						<input name="name_familiar" value='' id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>
					</div>

					<div class="row">

					<div class="input-field col s12">
						<input name="direccion" value='' id="last_name" type="text" class="validate" >
						<label for="last_name">Direccion</label>
					</div>

					<div class="input-field col s12">
						<input name="telefonos" value='' id="last_name" type="text" class="validate" >
						<label for="last_name">Telefonos</label>
					</div>
				</div>
				</div>
				</div>
</div>


<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
