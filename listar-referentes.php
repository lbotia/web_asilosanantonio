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

              <input type="hidden" name="cedula" id="cedula" value="'.$ced.'">
              <input type="hidden" name="nameref" id="nameref" value="'.$nom.'">
              <input type="hidden" name="idref" id="idref" value="'.$idref.'">
                <button class="btn theme-color right" type="submit" name="action">
                  Editar
                  <i class="material-icons right">mode_edit</i>
                </button>
              </form>
            </td>
            <td>
                <button class="btn theme-color right" onclick="myFunction(this.value,'.$idref.')" type="submit" name="delete" value="'.$ced.'" >
                  <input type="hidden" name="idref" id="idref" value="'.$idref.'">
                  <i class="material-icons">delete</i>
                </button>
            </td>
            ';
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
    

      <form id="form_add" method="POST" action="controllers/addreferentesocial.php">

          <div class="row">
            <input type="hidden" name="ced" value="<?php echo $ced; ?>">

            <div class="input-field col s12">
              <input name="name_referente" id="last_name" type="text" required>
              <label for="last_name">Nombres</label>
            </div>
          </div>

        <div class="input-field col s12">
          <input type="hidden" name="cedula" id="cedula" value="<?php echo $ced ?>">

          <button class="btn theme-color right" type="submit" name="action">
            Aplicar cambios
            <i class="material-icons right">done</i>
          </button>
        </div>
      </form>


      <!-- FIN FORMULARIO -->
    </div>
    <div class="card-action">
      <div class="row">
        <div class="col s3 offset-s9">
          <a class="activator theme-color btn">Agregar Nuevo<i class="material-icons right">add</i></a>
        </div>
      </div>
    </div>
  </div>

</div>           





<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>

<script type="text/javascript">

        // EDIT STATION CONFIRMATION 
        var swalFunction = function (form){
          swal({
            title: 'Estas Seguro?',
            //text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!'
          }).then(function () {
            swal(
              'Agregado!',
              'Datos Confirmados.',
              'success'
              )
            setTimeout(function(){
                  //do what you need here
                  form.submit();
                }, 1500);
            
          })
        };
        document.querySelector('#form_add').addEventListener('submit', function(e) {
          var form = this;
          e.preventDefault();
          swalFunction(form);

          
        });

        
      </script>


<script>
  function myFunction(value,value2) {
    //alert(value2);

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
                    window.location.href = "controllers/deletereferentesocial.php?ced=" + value + "&idref=" + value2; 
                }, 1500);
            
          })
      }
  </script>