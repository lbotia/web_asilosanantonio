<?php 
header('Cache-Control: no cache');
include_once 'helpers/session.php';
include_once 'controllers/config.php';
?>


<?php 
include 'helpers/header.php';
?>


<?php 
include 'helpers/navancianos.php';
?>

<?php 
$sqlCount = 'SELECT count(*) AS total FROM listar_ancianos';

$resCount = $conn->query($sqlCount);
$total = 0;
if ($resCount->num_rows > 0) {
	while ($r = $resCount->fetch_assoc()) {
		$total = $r['total'];
	}
}

// consulta datos anciano

$sql = 'SELECT * FROM listar_ancianos ORDER BY 3';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch ='SELECT * FROM listar_ancianos WHERE nombres LIKE "%'.$searchtext.'%" or cedula LIKE "%'.$searchtext.'%" ORDER BY 3';
	//echo $searchtext;
	$resSearch = $conn->query($sqlSearch);


}
?>

<div class="container">
<div class="row">
	<div class="row">
		<h4 class="center-align">BASE DE DATOS ADULTO MAYOR</h4>
		<h5 class="center-align">Total Ancianos: <?php echo $total;  ?></h5>
	</div>
</div>
	</div>


<div class="row">
	<div class="col l12">
		<div class="card-small">
			<form>
				<div class="input-field">
					<input name="search_text" id="search_text" type="search" placeholder="cedula o nombre">
					<label class="label-icon" for="search"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>				
			</form>

			<div class="row">
			
				<div class="col l12">


					<?php 
					if (isset($searchtext)){
								//listar busqueda
						if (mysqli_num_rows($resSearch) > 0) {
							$out ='';

							$out .='
							<table class="highlight">
								<thead>
								<tr>
									<th>Nombres</th>
									<th>Cedula</th>
									<th>Fecha Ingeso</th>
									<th>Fecha Nacimiento</th>
									<th>Edad</th>
									<th>Genero</th>
									<th>Regimen</th>
									<th>Eps</th>
									
								</tr>
								</thead>';


						$out .= '<tbody>';

						while($row = mysqli_fetch_array($resSearch)){
							$noms = $row['nombres'];
							$apell = $row['apellidos'];
							$ced = $row['cedula'];
							$f_ing = $row['fecha_ingreso'];											
							$f_nac = $row['fecha_nacimiento'];
							$edad = $row['edad'];
							$gen = $row['genero'];
							$reg = $row['regimen'];
							$eps = $row['eps'];

							$nombres = $noms.' '.$apell;
							

							$out .= '
							<tr>
							<form method="POST" action="ver_mas_ancianos.php">
							<td>'.$nombres.'</td>
							<td>'.$ced.'</td>
							<td>'.$f_ing.'</td>
							<td>'.$f_nac.'</td>
							<td>'.$edad.'</td>
							<td>'.$gen.'</td>
							<td>'.$reg.'</td>
							<td>'.$eps.'</td>
							

							<td>
							
							
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn theme-color right" type="submit" name="action">
									Ver mas
									<i class="material-icons right">mode_edit</i>
								</button>
							

							</td>
							</form>
							<td>
							<button class="btn theme-color right" onclick="myFunction(this.value)" type="submit" name="delete" value="'.$ced.'" >
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>';

					}

					$out .= '</tbody>';
					$out .= '</table>';
					echo $out;
						}
					}else {
						//listar sin buscar
						if (mysqli_num_rows($res) > 0 ) {

							$out ='';

							$out .='
							<table class="highlight">
								<thead>
								<tr>
									<th>Nombres</th>									
									<th>Cedula</th>
									<th>Fecha Ingeso</th>
									<th>Fecha Nacimiento</th>
									<th>Edad</th>
									<th>Genero</th>
									<th>Regimen</th>
									<th>Eps</th>
									
								</tr>
								</thead>';


						$out .= '<tbody>';

						while($row = mysqli_fetch_array($res)){
							$noms = $row['nombres'];
							$apell = $row['apellidos'];
							$ced = $row['cedula'];											
							$f_ing = $row['fecha_ingreso'];
							$f_nac = $row['fecha_nacimiento'];
							$edad = $row['edad'];
							$gen = $row['genero'];										
							$reg = $row['regimen'];
							$eps = $row['eps'];
							$nombres = $noms.' '.$apell;

							$out .= '
							<tr>
							<form method="POST" action="ver_mas_ancianos.php">
							<td>'.$nombres.'</td>							
							<td>'.$ced.'</td>
							<td>'.$f_ing.'</td>
							<td>'.$f_nac.'</td>
							<td>'.$edad.'</td>
							<td>'.$gen.'</td>
							<td>'.$reg.'</td>
							<td>'.$eps.'</td>
							

							<td>
							
							
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn theme-color right" type="submit" name="action">
									Ver mas
									<i class="material-icons right">mode_edit</i>
								</button>
							

							</td>
							</form>

							<td>
								<button class="btn theme-color right" onclick="myFunction(this.value)" type="submit" name="delete" value="'.$ced.'" >
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>';

					}

					$out .= '</tbody>';
					$out .= '</table>';
					echo $out;
				}
			}


			?>



		</div>

	</div>


</div>

</div>

</div>


<script>
	function myFunction(value) {

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
          		'Eliminado!',
          		'El dato a sido Elminado.',
          		'success'
          		)
          	setTimeout(function(){
                    //do what you need here
                    window.location.href = "controllers/deleteanciano.php?ced=" + value; 
                }, 1500);
          	
          })
      }
  </script>
<?php 

include 'helpers/footer.php';

?>
<?php 	include 'helpers/scripts.php';  ?>


<?php



?>


