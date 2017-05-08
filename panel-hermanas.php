<?php 
header('Cache-Control: no cache');
include_once 'helpers/session.php';
include_once 'controllers/config.php';
?>


<?php 
include 'helpers/header.php';
?>


<?php 
include 'helpers/navhermanas.php';
?>

<?php 

// consulta datos hermanas

$sql = 'select * from listar_hermanas';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch ='select * from listar_hermanas where nombres like "%'.$searchtext.'%" or cedula like "%'.$searchtext.'%"';
	echo $searchtext;
	$resSearch = $conn->query($sqlSearch);


}

?>

<div class="container">

	<div class="row">
		<h4 class="center-align">BASE DE DATOS HERMANAS</h4>
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
						
						
						
						if (isset($searchtext)) {
						 	// LISTAR BUSQUEDA

							if (mysqli_num_rows($resSearch) > 0	) {


								$out = '';

								$out .= '<table class="highlight"><thead>
								<tr>
									<th>Nombres</th>
									<th>Cedula</th>
									<th>Edad</th>
									<th>Lugar de nacimiento</th>
									<th>Fecha de nacimiento</th>
									<th>Eps</th>

								</tr>




							</thead>';
							$out .= '<tbody>';

							while($row = mysqli_fetch_array($resSearch)){
								$noms = $row['nombres'];
								$ced = $row['cedula'];
								$edad = $row['edad'];
								$lnam = $row['lugar_nacimiento'];
								$fnac = $row['fecha_nacimiento'];  
								$eps = $row['nombre_eps'];

								$out .= '
								<tr>
								<form method="POST" action="editar-hermanas.php">
								<td>'.$noms.'</td>
								<td>'.$ced.'</td>
								<td>'.$edad.'</td>
								<td>'.$lnam.'</td>
								<td>'.$fnac.'</td>
								<td>'.$eps.'</td>

								<td>
							
							<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn theme-color right" type="submit" name="action">
									Editar
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>

							</td>
							</form>
						</tr>';


						}

						$out .= '</tbody>';
						$out .= '</table>';
								  			// imprimir tabla de datos
						echo $out;

					}




				}else {
						 	// LISTAR TODO

					if (mysqli_num_rows($res) > 0 ) {


						$out = '';

						$out .= '<table class="highlight"><thead>
						<tr>
							<th>Nombres</th>
							<th>Cedula</th>
							<th>Edad</th>
							<th>Lugar de nacimiento</th>
							<th>Fecha de nacimiento</th>
							<th>Eps</th>
						</tr>

						

					</thead>';



					$out .= '<tbody>';

					while($row = mysqli_fetch_array($res)){
						$noms = $row['nombres'];
						$ced = $row['cedula'];
						$edad = $row['edad'];
						$lnam = $row['lugar_nacimiento'];
						$fnac = $row['fecha_nacimiento'];
						$eps = $row['nombre_eps'];

						$out .= '<tr>

						<form method="POST" action="editar-hermanas.php">
						<td>'.$noms.'</td>
						<td>'.$ced.'</td>
						<td>'.$edad.'</td>
						<td>'.$lnam.'</td>
						<td>'.$fnac.'</td>
						<td>'.$eps.'</td>

						<td>
							
							<div class="input-field col s12">
							<input type="hidden" name="cedula" id="cedula" value="'.$row['cedula'].'">
								<button class="btn theme-color right" type="submit" name="action">
									Editar
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


</div>


<?php 

include 'helpers/footer.php';

?>






