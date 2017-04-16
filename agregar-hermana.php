<?php 
include_once 'helpers/session.php';
?>


<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navhermanas.php';  ?>

<h5 class="center-align">AGREGAR</h5>

<!-- FORMULARIO DE INSERTAR HERMANA -->
<div class="container">
	<div class="row">
		<div class="card-panel">
			<form>

				<div class="row">
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Nombres</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Apellidos</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="password" type="password" class="validate">
						<label for="password">Lugar de Nacimiento</label>
					</div>

					<div class="input-field col s6">
						<input placeholder="FECHA" type="date" class="datepicker">
						<label for="dob"></label>
					</div>
				</div>


				<div class="row">

					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Cedula</label>
					</div>

					<div class="input-field col s6">
						<select>
							<option value="" disabled selected>Seleccione EPS</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
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
              selectYears: 15, // Creates a dropdown of 15 years to control year
              format: 'dd-mm-yyyy' 
            });
</script>

 