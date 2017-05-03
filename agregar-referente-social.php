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

<div class="container">

	<div class="row">
		<div class="card-panel">
			<form method="POST" action="controllers/addreferentesocial.php">
				<table class="striped">
					<div class="row">
						<input type="hidden" name="ced" value="<?php echo $ced; ?>">

						<div class="input-field col s12">
							<input name="name_referente" id="last_name" type="text" required>
							<label for="last_name">Nombres</label>
						</div>


					</div>
				</table>
				<div class="input-field col s12">
					<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">

					<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
						Agregar Nuevo
						<i class="material-icons right">add</i>
					</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>