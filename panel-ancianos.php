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


