<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navhermanas.php';  ?>

<?php 

if (isset($_POST)) {
	$ced = $_REQUEST['cedula'];
	//echo $ced;

}

?>
<?php 



$sqldata = 'SELECT * FROM listar_hermanas WHERE cedula = "'.$ced.'"';
$resdata = $conn->query($sqldata);

// $cedula = ''; -> este ya esta
$nombres = '';
$f_nac = '';
$l_nac = '';
$edad = '';
$id_eps = '';


if (mysqli_num_rows($resdata) > 0) {
    // output data of each row
    while($r = mysqli_fetch_assoc($resdata)) {
		$nombres = $r['nombres'];	
		$edad = $r['edad'];	
		$f_nac = $r['fecha_nacimiento'];	
		$l_nac = $r['lugar_nacimiento'];	
		$id_eps = $r['ideps'];	
    }
}else {
	echo "ERROR NO HAY RESULTADOS";
}

//echo $nombres;



	// TRAER LISTA DE EPS
$sqlEps = 'SELECT * FROM eps';
$arrEps = array();



$resEps = $conn->query($sqlEps);
while ($row = mysqli_fetch_assoc($resEps)) {

	$arrEps[$row['ideps']] = $row['nombre_eps'];

}

	//echo var_dump($arrEps);


?>


<h5 class="center-align"><?php echo $nombres; ?>, EDAD <?php echo $edad; ?></h5>

<div class="container">
	<div class="row">
		<div class="card-panel">
			<form method="POST" action="controllers/addhermana.php">

				<div class="row">
					<div class="input-field col s12">
						<input name="name" value='<?php echo $nombres; ?>'  id="last_name" type="text" class="validate" required>
						<label for="last_name">Nombres</label>
					</div>

				</div>

				<div class="row">
					<div class="input-field col s6">
						<input name="l_nacimiento" value='<?php echo $l_nac; ?>'  id="last_name" type="text" class="validate" required>
						<label for="password">Lugar de Nacimiento</label>
					</div>

					<div class="input-field col s6">
						<input name="fecha_nacimiento" value='<?php echo $f_nac; ?>' type="date" class="datepicker ">
						<label for="dob">Fecha de Nacimiento</label>
					</div>
				</div>


				<div class="row">

					<div class="input-field col s6">
						<input name="cedula" value='<?php echo $ced; ?>'  id="last_name" type="text" class="validate" required onkeypress="return event.charCode >= 47 && event.charCode <= 57">
						<label for="last_name">Cedula</label>
					</div>

					<div class="input-field col s6">
						<select name="ideps" required>
							<option value="" disabled selected>Seleccione EPS</option>
							<?php 

								foreach ($arrEps as $idEps => $nomEps) {
									$epsSel = ($idEps == $id_eps)  ? 'selected' : '';
									echo '<option value='.$idEps.' '.$epsSel.'>'.$nomEps.'</option>';
								}

							?>
							
						</select>
						<label>EPS</label>
					</div>

				</div>

				<div class="row">		

					<div class="col s10">
						
							<a href="panel-hermanas.php" class="waves-effect waves-light btn right">CANCELAR</a>
						
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



<?php 

?>