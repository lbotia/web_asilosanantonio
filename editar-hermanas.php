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

	if (isset($_POST['delete'])) {
		echo var_dump($_POST['delete']);

		//BORRAR

		$sqlDel = 'DELETE FROM hermana WHERE cedula_hermana = "'.$ced.'"';

		if ($conn->query($sqlDel) === TRUE) {
			echo "ELIMINADO";
		}else {
			echo "ERROR AL ELIMINAR";
		}

		header("Refresh:0; url=panel-hermanas.php");



	}

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
			<form id="form1" method="POST" action="controllers/edithermana.php">

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
						<input placeholder="Fecha nacimiento" placeholder="Fecha de Nacimiento" name="fecha" value='<?php echo $f_nac; ?>' type="date" class="datepicker ">
						<!-- <label for="dob">Fecha de Nacimiento</label> -->
					</div>
				</div>


				<div class="row">

					<div class="input-field col s6">
						<input name="cedula" value='<?php echo $ced; ?>'  id="last_name" type="text" class="validate" disabled onkeypress="return event.charCode >= 47 && event.charCode <= 57 || || event.charCode <= 8">
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

				<input type="hidden" name="ced" value="<?php echo $ced; ?>">

				<div class="row">		

					<div class="col s10">
						
							<a href="panel-hermanas.php" class="theme-color btn right">CANCELAR</a>
						
					</div>

					<div class="col s2">
						
							<button class="btn theme-color" type="submit" name="action">
							APLICAR            			
             				</button>
						
					</div>
				</div>

			</form>
		</div>
	</div>
</div>



<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
<script type="text/javascript">

        // EDIT STATION CONFIRMATION 
        var swalFunction = function (form){

            swal({
              title: 'Estas Seguro?',
              //text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Confirmar Cambios!'
            }).then(function () {
                swal(
                      'Editado!',
                      'El dato a sido editado.',
                      'success'
                    )
                setTimeout(function(){
                    //do what you need here
                    form.submit();
                }, 1500);
              
            })
        };
        document.querySelector('#form1').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        swalFunction(form);

        
        });




        
    </script>
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