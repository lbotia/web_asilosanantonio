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

$sql = 'select a.cedula_anciano as cedula, concat(a.nombres,' ',a.apellidos) as nombres, a.fecha_nacimiento, a.genero, a.cedula_original,a.subsidio_colombia_mayor,r.tipo_regimen,e.nombre_eps, d.tipo_de_dependencia
from anciano a, regimen r , eps e , dependencia d 
where r.idregimen = a.regimen_idregimen or e.ideps= a.eps_ideps or d.iddependencia=a.dependencia_iddependencia';

$res = $conn->query($sql);

// consulta busqueda

$searchtext;
if (isset($_REQUEST['search_text'])) {
	$searchtext = $_REQUEST['search_text'] ; 

	$sqlSearch =' select a.cedula_anciano as cedula, concat(a.nombres,' ',a.apellidos) as nombres, a.fecha_nacimiento, a.genero, a.cedula_original,a.subsidio_colombia_mayor,r.tipo_regimen,e.nombre_eps, d.tipo_de_dependencia
	from anciano a
	inner join eps e on e.ideps = a.eps_ideps
	inner join regimen r on r.idregimen = a.regimen_idregimen
	inner join dependencia d on d.iddependencia = a.dependencia_iddependencia
	where a.cedula_anciano like "%'.$searchtext.'%" or a.nombres like "%'.$searchtext.'%"';
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