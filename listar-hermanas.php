<?php 
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

$sql = 'select h.cedula_hermana as cedula,h.nombres,h.lugar_nacimiento,h.fecha_nacimiento,e.nombre_eps
from hermana h, eps e
where e.ideps = h.eps_ideps';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch ='	select h.cedula_hermana as cedula,h.nombres,h.lugar_nacimiento,h.fecha_nacimiento,e.nombre_eps 
	from hermana h 
	inner join eps e on e.ideps = h.eps_ideps
	where h.cedula_hermana like "%'.$searchtext.'%"
	or h.nombres like "%'.$searchtext.'%"';
	$resSearch = $conn->query($sqlSearch);


}

?>

<div class="container">

	<div class="row">
		<div class="col l4 offset-l5">
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
						
						
						
						if (isset($searchtext)) {
						 	// LISTAR BUSQUEDA

							if (mysqli_num_rows($resSearch) > 0	) {


								$out = '';

								$out .= '<table class="highlight"><thead>
								<tr>
									<th>Cedula</th>
									<th>Nombres</th>
									<th>Lugar de nacimiento</th>
									<th>Fecha de nacimiento</th>
									<th>Eps</th>

								</tr>




							</thead>';
							$out .= '<tbody>';

							while($row = mysqli_fetch_array($resSearch)){
								$ced = $row['cedula'];
								$noms = $row['nombres'];
								$lnam = $row['lugar_nacimiento'];
								$fnac = $row['fecha_nacimiento'];  
								$eps = $row['nombre_eps'];

								$out .= '
								<tr>
									<form method="POST" action="editar-hermanas.php">
										<td>'.$ced.'</td>
										<td>'.$noms.'</td>
										<td>'.$lnam.'</td>
										<td>'.$fnac.'</td>
										<td>'.$eps.'</td>

										<td>

								<div class="input-field col s12">
								<input type="hidden">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Ver más
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>
							</form>
					</td>

								
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
							<th>Cedula</th>
							<th>Nombres</th>
							<th>Lugar de nacimiento</th>
							<th>Fecha de nacimiento</th>
							<th>Eps</th>
						</tr>

						

					</thead>';



					$out .= '<tbody>';

					while($row = mysqli_fetch_array($res)){
						$ced = $row['cedula'];
						$noms = $row['nombres'];
						$lnam = $row['lugar_nacimiento'];
						$fnac = $row['fecha_nacimiento'];
						$eps = $row['nombre_eps'];

						$out .= '
						<tr>
						<form method="POST action="editar-hermanas.php">
						<td>'.$ced.'</td>
						<td>'.$noms.'</td>
						<td>'.$lnam.'</td>
						<td>'.$fnac.'</td>
						<td>'.$eps.'</td>

						<td>
						<div class="row">
							<div class="input-field col s12">
								<button class="btn cyan waves-effect waves-light right" type="submit" name="action">
									Editar
									<i class="material-icons right">mode_edit</i>
								</button>
							</div>
						</div>
					</td>
					</form>
				</tr>


				'






				;
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






