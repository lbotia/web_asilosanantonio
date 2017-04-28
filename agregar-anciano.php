<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navancianos.php';  ?>


<?php 



	// TRAER LISTA DE GENERO
$sqlReg = 'SELECT * FROM regimen';
$arrReg = array();



$resReg = $conn->query($sqlReg);
while ($row = mysqli_fetch_assoc($resReg)) {

	$arrReg[$row['idregimen']] = $row['tipo_regimen'];

}

	//echo var_dump($arrEps);

?>

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

<?php 

	// TRAER LISTA DE DEPENDENCIA
$sqlDep = 'SELECT * FROM dependencia';
$arrDep = array();



$resDep = $conn->query($sqlDep);
while ($row = mysqli_fetch_assoc($resDep)) {

	$arrDep[$row['iddependencia']] = $row['tipo_de_dependencia'];

}

	//echo var_dump($arrEps);


?>
<?php 

	// TRAER LISTA DE DISCAPACIDAD
$sqlDis = 'SELECT * FROM discapacidad';
$arrDis = array();



$resDis = $conn->query($sqlDis);
while ($row = mysqli_fetch_assoc($resDis)) {

	$arrDis[$row['iddiscapacidad']] = $row['nombre_discapacidad'];

}

	//echo var_dump($arrEps);


?>






<!-- //FORMULARIO DE INSERTAR ANCIANO -->



<div class="container">

	<div class="row">
		<div class="card-panel">
			<h5>Datos Personales</h5>
			<form method="POST" action="controllers/addanciano.php">

				<div class="row">

					<div class="input-field col s6" center>
						<input name="fecha_ingreso" laceholder="FECHA" type="date" class="datepicker ">
						<label for="dob">Fecha de Ingreso</label>
					</div>

					<div class="input-field col s6">
						<input name="fecha_nacimiento" laceholder="FECHA" type="date" class="datepicker ">
						<label for="dob">Fecha de Nacimiento</label>
					</div>

				</div>

				<div class="row">

					<div class="input-field col s6">
						<input name="name_anciano" id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>

					<div class="input-field col s6">
						<input name="apellido_anciano" id="last_name" type="text" class="validate" >
						<label for="last_name">Apellidos</label>
					</div>

				</div>

				<div class="row">

					<div class="input-field col s6">
						<input name="cedula" id="last_name" type="text" class="validate"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
						<label for="last_name">Cedula</label>
					</div>

					
					<div class="input-field  col s6">
						<div  class="input-field inline col s6">
							<label>Cedula Original: </label>
						</div>
						<div class="input-field inline col s4">
							<input name="group_cedula" type="radio" id="test1" value="1" />
							<label for="test1">Si</label>
							<input name="group_cedula" type="radio" id="test2" value="0" right/>
							<label for="test2">No</label>						
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="input-field col s6">
						<select name="genero">
							<option value="" disabled selected>Seleccione Genero</option>
							<option value="FEMENINO">FEMENINO</option>
							<option value="MASCULINO">MASCULINO</option>
						</select>
						<label for="last_name">Genero</label>
					</div>	

					<div class="input-field col s6">						
						<div class="input-field  col s6">
							<label>Subsidio Colombia Mayor: </label>
						</div>
						<div class="input-field  col s4">
							<input name="group_sub" type="radio" id="test3" value="1" />
							<label for="test3">Si</label>
							<input name="group_sub" type="radio" id="test4" value="0" right/>
							<label for="test4">No</label>
						</div>

						
					</div>



				</div>

				<div class="row">
					<div class="input-field col s6">
						<select name="idregimen" >
							<option value="" disabled selected>Seleccione Regimen</option>

							<?php 

							foreach ($arrReg as $idReg => $nomReg) {
								echo '<option value='.$idReg.'>'.$nomReg.'</option>';
							}
							?>
							
						</select>
						<label>Regimen</label>
					</div>

					<div class="input-field col s6">
						<select name="ideps" >
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

					<div class="input-field col s6">

						<select name="iddep" >
							<option value="" disabled selected>Seleccione Dependencia</option>
							
							<?php 
							foreach ($arrDep as $idDep => $nomDep) {
								echo '<option value='.$idDep.'>'.$nomDep.'</option>';
							}
							?>
							
						</select>
						<label>DEPENDENCIA</label>

					</div>

					<div class="input-field col s6">
						<select name="discapacidad[]" multiple>
							<option value="" disabled selected>Seleccione Discapacidad</option>
							
							<?php 
							foreach ($arrDis as $idDis => $nomDis) {
								echo '<option value='.$idDis.'>'.$nomDis.'</option>';
							}
							?>

						</select>
						<label>Discapacidad</label>
					</div>

				</div>
				<div class="row">

					<div class="input-field col s12">
						<textarea name="observaciones" id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1">Observaciones</label>
					</div>
				</div>




				<!-- DATOS FAMILIARES -->

		<!-- 		<h5>Datos Familiares</h5>
				<div class="row">

					<div class="input-field col s12">
						<input name="name_familiar" id="last_name" type="text" class="validate" >
						<label for="last_name">Familiares</label>
					</div>
				
				</div>

				<div class="row">


					<div class="input-field col s12">
						<input name="direccion" id="last_name" type="text" class="validate" >
						<label for="last_name">Direccion</label>
					</div>
				
					
				</div>


				<div class="row">
					
					<div class="input-field col s12">
						<input name="telefono" id="last_name" type="text" class="validate" onkeypress="return event.charCode >= 47 && event.charCode <= 57">
						<label for="last_name">Telefonos</label>
					</div>

				

				</div>






				

				<h5>Referente Social</h5>
				<div class="row">

					<div class="input-field col s12">
						<input name="name_referente" id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>
					
				</div>
				<div class="row">

				
					
				</div> -->

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



