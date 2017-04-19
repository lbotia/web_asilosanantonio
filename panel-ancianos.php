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

$sql = 'select a.cedula_anciano as cedula,a.nombres,a.apellidos, a.fecha_nacimiento, a.genero, a.cedula_original,a.subsidio_colombia_mayor as subsidio,r.tipo_regimen as regimen,e.nombre_eps as eps, d.tipo_de_dependencia as dependencia
from anciano a, regimen r , eps e , dependencia d 
where r.idregimen = a.regimen_idregimen or e.ideps= a.eps_ideps or d.iddependencia=a.dependencia_iddependencia';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch =' select a.cedula_anciano as cedula,a.nombres,a.apellidos, a.fecha_nacimiento, a.genero, a.cedula_original,a.subsidio_colombia_mayor as subsidio,r.tipo_regimen as regimen,e.nombre_eps as eps, d.tipo_de_dependencia as dependencia
	from anciano a
	inner join eps e on e.ideps = a.eps_ideps
	inner join regimen r on r.idregimen = a.regimen_idregimen
	inner join dependencia d on d.iddependencia = a.dependencia_iddependencia
	where a.cedula_anciano like "%'.$searchtext.'%" or a.nombres like "%'.$searchtext.'%"';

	$resSearch = $conn->query($sqlSearch);


}
?>


	<div class="row">
		<div class="col l4 offsert-l5">
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
									if (mysqli_num_rows($resSearch) > 0	) {
										
										$out = '';
										$out .= '<table class="highlight"><thead>
												<tr>
													<th>Cedula</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Fecha Nacimiento</th>
													<th>Genero</th>
													<th>Cedula Original</th>
													<th>Subsidio</th>
													<th>Regimen</th>
													<th>Eps</th>
													<th>Dependencia</th>
												</tr>



										</thead>';
										$out .= '<tbody>';

										while ($row = mysqli_fetch_array($resSearch)){

											$ced = $row['cedula'];											
											$noms = $row['nombres'];
											$apell = $row['apellidos'];
											$f_nac = $row['fecha_nacimiento'];
											$gen = $row['genero'];
											$ced_ori = $row['cedula_original'];
											$ced_orig = ($ced_ori == 1) ? 'Si' : 'No';
											$sub = $row['subsidio'];
											$subs = ($sub == 1) ? 'Si' : 'No';
											$reg = $row['regimen'];
											$eps = $row['eps'];
											$dep = $row['dependencia'];

											$out .= ' <tr>
														<th>'.$ced.'</th>
														<th>'.$noms.'</th>
														<th>'.$apell.'</th>
														<th>'.$f_nac.'</th>
														<th>'.$gen.'</th>
														<th>'.$ced_orig.'</th>
														<th>'.$subs.'</th>
														<th>'.$reg.'</th>
														<th>'.$eps.'</th>
														<th>'.$dep.'</th>
													<tr>';

										}

										$out .= '</tbody>';
										$out .= '</table>';

										echo $out;
									}
							}else {

								if (mysqli_num_rows($res) > 0 ) {
									
									$out ='';

									$out .='<table class="highlight"><thead>
												<tr>
													<th>Cedula</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Fecha Nacimiento</th>
													<th>Genero</th>
													<th>Cedula Original</th>
													<th>Subsidio</th>
													<th>Regimen</th>
													<th>Eps</th>
													<th>Dependencia</th>
												</tr>
											</thead>';


											$out .= '<tbody>';

											while($row = mysqli_fetch_array($res)){
												$ced = $row['cedula'];												
												$noms = $row['nombres'];
												$apell = $row['apellidos'];
												$f_nac = $row['fecha_nacimiento'];
												$gen = $row['genero'];
												$ced_ori = $row['cedula_original'];
												$ced_orig = ($ced_ori == 1) ? 'Si' : 'No';
												$sub = $row['subsidio'];
												$subs = ($sub == 1) ? 'Si' : 'No';
												$reg = $row['regimen'];
												$eps = $row['eps'];
												$dep = $row['dependencia'];

												$out .= '<tr>

															<th>'.$ced.'</th>
															<th>'.$noms.'</th>
															<th>'.$apell.'</th>
															<th>'.$f_nac.'</th>
															<th>'.$gen.'</th>
															<th>'.$ced_orig.'</th>
															<th>'.$subs.'</th>
															<th>'.$reg.'</th>
															<th>'.$eps.'</th>
															<th>'.$dep.'</th>


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
