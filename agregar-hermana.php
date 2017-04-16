<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navhermanas.php';  ?>


<?php 

	// TRAER LISTA DE EPS
	$sqlEps = 'SELECT * FROM eps';
	$arrEps = array();



	$resEps = $conn->query($sqlEps);
	while ($row = mysqli_fetch_assoc($resEps)) {
	    
		$arrEps[$row['ideps']] = $row['nombre_eps'];

	}

	//echo var_dump($arrEps);


 ?>

<h5 class="center-align">AGREGAR</h5>

<!-- FORMULARIO DE INSERTAR HERMANA -->
<div class="container">
	<div class="row">
		<div class="card-panel">
			<form method="POST" action="controllers/addhermana.php">

				<div class="row">
					<div class="input-field col s6">
						<input name="name" id="last_name" type="text" class="validate" required>
						<label for="last_name">Nombres</label>
					</div>
					<div class="input-field col s6">
						<input name="apellido" id="last_name" type="text" class="validate" required>
						<label for="last_name">Apellidos</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input name="l_nacimiento" id="last_name" type="text" class="validate" required>
						<label for="password">Lugar de Nacimiento</label>
					</div>

					<div class="input-field col s6">
						<input name="fecha" laceholder="FECHA" type="date" class="datepicker required">
						<label for="dob"></label>
					</div>
				</div>


				<div class="row">

					<div class="input-field col s6">
						<input name="cedula" id="last_name" type="text" class="validate" required onkeypress="return event.charCode >= 47 && event.charCode <= 57">
						<label for="last_name">Cedula</label>
					</div>

					<div class="input-field col s6">
						<select name="ideps" required>
							<option value="" disabled selected>Seleccione EPS</option>
							<?php 

								foreach ($arrEps as $idEps => $nomEps) {
									echo '<option value='.$idEps.'>'.$nomEps.'</option>';
								}

							?>
							
						</select>
						<label>EPS</label>
					</div>

				</div>

				<div class="row">		

					<div class="col s10">
						
							<a class="waves-effect waves-light btn right">CANCELAR</a>
						
					</div>

					<div class="col s2">
						
							<button class="btn waves-effect waves-light" type="submit" name="action">
							AGREGAR             			
             				</button>
						
					</div>
				</div>

			</form>
		</div>
	</div>
</div>



<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
<script>
         $(document).ready(function () {
            $(".button-collapse").sideNav();
            $('select').material_select();
            $("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});           
           
        });
         $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 210, // Creates a dropdown of 15 years to control year
              yearRange: '1950:2013',
              format: 'yyyy-mm-dd' 
            });
</script>

 