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

$sqldata = 'SELECT * FROM listar_ancianos WHERE cedula = "'.$ced.'"';
$resdata = $conn->query($sqldata);

$names = '';
$apellidos = '';
$cedula = '';
$ced_ori = '';
$f_ingre = '';
$f_nac = '';
$gen = '';
$sub = '';
$idreg ='';
$id_eps = '';
$id_dep = '';
$obs = '';
$edad = '';


	if ($resdata->num_rows > 0) {
		while ($r = $resdata->fetch_assoc()) {
			$f_ingre = $r['fecha_ingreso'];
			$f_nac = $r ['fecha_nacimiento'];
			$names = $r['nombres'];
			$apellidos = $r['apellidos'];
			$cedula = $r['cedula'];
			$ced_ori = $r['cedula_original'];
			$gen = $r['genero'];
			$sub = $r['subsidio'];
			$idreg = $r['idregimen'];
			$id_eps = $r['id_eps'];
			$id_dep = $r['iddependencia'];
			$obs =$r['observacion'];
			$edad =$r['edad'];

		}	
	}else
	{
		echo "NO HAY DATOS";
	}

 ?>
<div class="container">

	<div class="row">
		<div class="card-panel">
			<h5><?php echo $names; echo ' '.$apellidos  ?>, edad <?php echo $edad; ?> años </h5>
			<form method="POST" action="controllers/addanciano.php">

				<div class="row">

					<div class="input-field col s6" center>
						<input name="fecha_ingreso" value='<?php echo $f_ingre; ?>' type="date" class="datepicker ">
						<label for="dob">Fecha de Ingreso</label>
					</div>

					<div class="input-field col s6">
						<input name="fecha_nacimiento" value='<?php echo $f_nac; ?>' type="date" class="datepicker ">
						<label for="dob">Fecha de Nacimiento</label>
					</div>

				</div>

				<div class="row">

					<div class="input-field col s6">
						<input name="name_anciano" value='<?php echo $names; ?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Nombres</label>
					</div>

					<div class="input-field col s6">
						<input name="apellido_anciano" value='<?php echo $apellidos; ?>' id="last_name" type="text" class="validate" >
						<label for="last_name">Apellidos</label>
					</div>

				</div>

				<div class="row">

					<div class="input-field col s6">
						<input name="cedula" value='<?php echo $cedula; ?>' id="last_name" type="text" class="validate"  onkeypress="return event.charCode >= 47 && event.charCode <= 57">
						<label for="last_name">Cedula</label>
					</div>

					<div class="input-field  col s6">
						<div  class="input-field inline col s6">
							<label>Cedula Original: </label>
						</div>
						<div class="input-field inline col s4">
						<?php 

						$ced1 = ($ced_ori == 1) ? 'checked' : ''; 
						$ced0 = ($ced_ori == 0) ? 'checked' : ''; 
						 ?>
							<input name="group_cedula"  type="radio" id="test1" value="1" <?php echo $ced1; ?> />
							<label for="test1">Si</label>
							<input name="group_cedula" type="radio" id="test2" value="0" right <?php echo $ced0; ?> />
							<label for="test2">No</label>						
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="input-field col s6">
					<?php 

						$gen_M = ($gen == 'MASCULINO') ? 'selected': '';
						$gen_F = ($gen == 'FEMENINO') ? 'selected': '';

					 ?>
						<select name="genero">
							<option value="" disabled selected>Seleccione Genero</option>
							<option value="FEMENINO" <?php echo $gen_F; ?>>FEMENINO</option>
							<option value="MASCULINO" <?php echo $gen_M; ?>>MASCULINO</option>
						</select>
						<label for="last_name">Genero</label>
					</div>	

					<div class="input-field col s6">

					<?php 

						$sub1 = ($sub == 1) ? 'checked' : ''; 
						$sub0 = ($sub == 0) ? 'checked' : ''; 
					 ?>						
						<div class="input-field  col s6">
							<label>Subsidio Colombia Mayor: </label>
						</div>
						<div class="input-field  col s4">
							<input name="group_sub" type="radio" id="test3" value="1" <?php echo $sub1; ?>/>
							<label for="test3">Si</label>
							<input name="group_sub" type="radio" id="test4" value="0" right <?php echo $sub0; ?> />
							<label for="test4">No</label>
						</div>

						
					</div>



				</div>

				<div class="row">

					<div class="input-field col s6">
						<select name="idregimen" >
							<option value="" disabled selected>Seleccione Regimen</option>

							<?php 

							foreach ($arrReg as $keyReg => $nomReg) {

								$regSel = ($idreg == $keyReg) ?  'selected' : '';
								echo '<option value='.$keyReg.' '.$regSel.'>'.$nomReg.'</option>';
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
								$epsSel = ($idEps == $id_eps) ? 'selected' : '';
								echo '<option value='.$idEps.' '.$epsSel.'>'.$nomEps.'</option>';
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
								$depSel = ($idDep == $id_dep) ? 'selected' : '';
								echo '<option value='.$idDep.' '.$depSel.'>'.$nomDep.'</option>';
							}
							?>
							
						</select>
						<label>DEPENDENCIA</label>

					</div>



				</div>
				<div class="row">

					<div class="input-field col s12">
						<textarea name="observaciones"  id="textarea1" class="materialize-textarea"><?php echo $obs; ?></textarea>
						<label for="textarea1">Observacion</label>
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