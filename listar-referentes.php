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
	$ced = $_REQUEST['cedula'];



}

// $var_value = $_COOKIE['varname'];



?>


<?php  
$sqldata = 'select idreferente,nombre_referente from listar_referentes where cedula = "'.$ced.'"';
$resdata = $conn->query($sqldata);
$nom_referen = array();
if ($resdata->num_rows > 0 ) {
  while ($r = $resdata->fetch_assoc()) {
    $nom_referen[$r['idreferente']] = $r['nombre_referente'];

  }

  //echo var_dump($nom_referen);
}
?>

<div class="container">

  <div class="card">

    <div class="card-content">
      <table class="striped">

        <thead>
          <tr>
            <th>Nombre del Referente Social</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $out = '';
          foreach ($nom_referen as $idref => $nom) {
            $out .= '<tr>';
            $out .= '<td>'.$nom.'</td>';
            $out .= '<td>
            <form  action="editar-referente-social.php" method="POST">
              <div class="input-field col s12">
              <input type="hidden" name="cedula" id="cedula" value="'.$ced.'">
              <input type="hidden" name="nameref" id="nameref" value="'.$nom.'">
              <input type="hidden" name="idref" id="idref" value="'.$idref.'">
                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                  Editar
                  <i class="material-icons right">mode_edit</i>
                </button>
              </form>
            </div></td>';
            $out .= '</tr>';
                    //echo $nom;
          }
          echo $out;
          ?>          

        </tbody>
      </table>
    </div>
    <div class="card-reveal">
    <!-- FORMULARIO DE AGREGAR REFERENTE -->
      <span class="card-title grey-text text-darken-4">Agregar nuevo referente social<i class="material-icons right">close</i></span>
    

      <form method="POST" action="controllers/addreferentesocial.php">

          <div class="row">
            <input type="hidden" name="ced" value="<?php echo $ced; ?>">

            <div class="input-field col s12">
              <input name="name_referente" id="last_name" type="text" required>
              <label for="last_name">Nombres</label>
            </div>
          </div>

        <div class="input-field col s12">
          <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">

          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
            Agregar Nuevo
            <i class="material-icons right">add</i>
          </button>
        </div>
      </form>


      <!-- FIN FORMULARIO -->
    </div>
    <div class="card-action">
      <div class="row">
        <div class="col s12 offset-s10">
          <a class="activator cyan waves-effect waves-light btn">Agregar<i class="material-icons right">add</i></a>
        </div>
      </div>
    </div>
  </div>

</div>           





<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>