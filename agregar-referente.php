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
	
	$sql = 'select concat(nombres," ",apellidos) as nombres from listar_ancianos where cedula = "'.$ced.'"';

	$result = $conn->query($sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$nombres = $row['nombres'];
		}
	}
}
?>

<div class="container">

	<div class="row">
		<div class="card-panel">
		<form action="controllers/addreferente.php" method="POST">
			<h5>Nuevo Referente social a <?php echo $nombres; ?></h5>
			<div class="row">

				<div class="input-field col s12">
					<input name="namereferente" value='' id="last_name" type="text" class="validate" required>
					<label for="last_name">Nombres</label>
				</div>

			</div>

			<div class="col s12">

					<input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">
				<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
					agregar
					<i class="material-icons right">add</i>
				</button>
			</div>
		</form>

		</div>

	</div>


</div>



<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>