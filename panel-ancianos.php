<?php 
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

// consulta datos anciano

$sql = 'select * from listar_ancianos';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch ='select * from listar_ancianos where nombres like "%'.$searchtext.'%" or cedula like "%'.$searchtext.'%"';
	echo $searchtext;
	$resSearch = $conn->query($sqlSearch);


}
?>


<div class="row">
	<div class="col l1 offset-l1">
		<blockquote>
			<p class="flow-text">Buscar</p>
		</blockquote>


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
									<th>Cedula</th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Fecha Nacimiento</th>
									<th>Genero</th>
									<th>Regimen</th>
									<th>Eps</th>
									<th>Fecha Ingeso</th>
								</tr>
								</thead>';


						$out .= '<tbody>';

						while($row = mysqli_fetch_array($resSearch)){
							$ced = $row['cedula'];											
							$noms = $row['nombres'];
							$apell = $row['apellidos'];
							$f_nac = $row['fecha_nacimiento'];
							$gen = $row['genero'];
											// $ced_ori = $row['cedula_original'];
											// $ced_orig = ($ced_ori == 1) ? 'Si' : 'No';
											// $sub = $row['subsidio'];
											// $subs = ($sub == 1) ? 'Si' : 'No';
							$reg = $row['regimen'];
							$eps = $row['eps'];
							$f_ing = $row['fecha_ingreso'];

							$out .= '
							<tr>
							<form method="POST" action="vermas_anciano.php">
							<td>'.$ced.'</td>
							<td>'.$noms.'</td>
							<td>'.$apell.'</td>
							<td>'.$f_nac.'</td>
							<td>'.$gen.'</td>
							<td>'.$reg.'</td>
							<td>'.$eps.'</td>
							<td>'.$f_ing.'</td>

							<td>
							
							<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Ver mas
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>

							</td>
							</form>
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
									<th>Cedula</th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Fecha Nacimiento</th>
									<th>Genero</th>
									<th>Regimen</th>
									<th>Eps</th>
									<th>Fecha Ingeso</th>
								</tr>
								</thead>';


						$out .= '<tbody>';

						while($row = mysqli_fetch_array($res)){
							$ced = $row['cedula'];											
							$noms = $row['nombres'];
							$apell = $row['apellidos'];
							$f_nac = $row['fecha_nacimiento'];
							$gen = $row['genero'];
											// $ced_ori = $row['cedula_original'];
											// $ced_orig = ($ced_ori == 1) ? 'Si' : 'No';
											// $sub = $row['subsidio'];
											// $subs = ($sub == 1) ? 'Si' : 'No';
							$reg = $row['regimen'];
							$eps = $row['eps'];
							$f_ing = $row['fecha_ingreso'];

							$out .= '
							<tr>
							<form method="POST" action="vermas_anciano.php">
							<td>'.$ced.'</td>
							<td>'.$noms.'</td>
							<td>'.$apell.'</td>
							<td>'.$f_nac.'</td>
							<td>'.$gen.'</td>
							<td>'.$reg.'</td>
							<td>'.$eps.'</td>
							<td>'.$f_ing.'</td>

							<td>
							
							<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Ver mas
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>

							</td>
							</form>
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




<?php 

include 'helpers/footer.php';

?>
<?php 	include 'helpers/scripts.php';  ?>


<?php



?>



ced