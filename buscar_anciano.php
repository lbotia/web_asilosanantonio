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

$sql = 'select a.cedula_anciano as cedula,a.nombres,a.apellidos, a.fecha_nacimiento, a.genero,r.tipo_regimen as regimen,e.nombre_eps as eps, i.fecha_ingreso
from anciano a, regimen r , eps e , ingreso i 
where r.idregimen = a.regimen_idregimen 
and  e.ideps= a.eps_ideps 
and i.anciano_cedula_anciano= a.cedula_anciano';

$res = $conn->query($sql);

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
						<input name="search_text" id="search_text" type="search" placeholder="cedula o nombre">
						<label class="label-icon" for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</form>
