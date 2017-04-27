<?php 
include_once 'helpers/session.php';

?>

<?php 
// <!-- CONEXION BD -> $conn  -->
include_once 'controllers/config.php'; ?>

<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navancianos.php';  ?>


<?php 

if (isset($_POST)) {
	echo "prueba";
	echo $_REQUEST['cedula'];
}

$sql = 'select a.cedula_anciano as cedula,a.nombres,a.apellidos, a.fecha_nacimiento, a.genero,r.tipo_regimen as regimen,e.nombre_eps as eps, i.fecha_ingreso, o.observaciones as ob
from anciano a, regimen r , eps e , ingreso i, observaciones o 
where r.idregimen = a.regimen_idregimen 
and  e.ideps= a.eps_ideps 
and i.anciano_cedula_anciano= a.cedula_anciano
and i.anciano_cedula_anciano= a.cedula_anciano
and o.anciano_cedula_anciano= a.cedula_anciano
and a.cedula_anciano = ""
';

$sql = $conn->query($sql);

?>

<div class="container">

<table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Item Name</th>
             
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
        
          </tr>
         
        
        </tbody>
      </table>

      </div>

