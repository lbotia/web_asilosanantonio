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
	echo $ced;

}

?>

<?php

$nom_familiar = array();
$direc = array();
$tel = array();
//FAMILIARES
$sqlfam = 'SELECT * FROM listar_datos_familiares WHERE cedula_anciano = "'.$ced.'"';
$resfam = $conn->query($sqlfam);

if ($resfam->num_rows > 0) {
	while ($r = $resfam->fetch_assoc()) {
		if($r['nombres_familiares'] != NULL){
			$nom_familiar[$r['id_fam']] = $r['nombres_familiares'];
		}if ($r['direccion'] != NULL) {
			$direc[$r['id_dir']] = $r['direccion'];
		}if ($r['telefono'] != NULL) {
			$tel[$r['id_tel']] = $r['telefono'] ;
		}
	}	
}else
{
		//echo "NO HAY DATOS";
}


echo var_dump($direc);
echo "<br>";

echo var_dump($tel);
echo "<br>";

 ?>

<!--FAMILIARES-->
<div class="container">

  <div class="card">

    <div class="card-content">
      <table class="striped">

        <thead>
          <tr>
            <th>FAMILIARES</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $out = '';
          foreach ($nom_familiar as $id_f => $nom_f) {
            $out .= '<tr>';
            $out .= '<td>'.$nom_f.'</td>';
            $out .= '<td>
            <form action="edit_fam.php" method="POST">

              <input type="hidden" name="ced" id="ced" value="'.$ced.'">
              <input type="hidden" name="id_f" id="id_f" value="'.$id_f.'">
			  <input type="hidden" name="nom_f" id="nom_f" value="'.$nom_f.'">
                <button class="btn theme-color right" type="submit" name="action">
                  Editar
                  <i class="material-icons right">mode_edit</i>
                </button>
              </form>
            </td>
            <td>
                <button class="btn theme-color" onclick="deleteFam(this.value,'.$ced.')" type="submit" name="delete" value="'.$id_f.'" >
                  <input type="hidden" name="nom_f" id="nom_f" value="'.$nom_f.'">
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
    <!-- FORMULARIO DE AGREGAR FAMILIAR-->
      <span class="card-title grey-text text-darken-4">Agregar nuevo Familiar<i class="material-icons right">close</i></span>
    

      <form id="form_add" method="POST" action="controllers/addfamiliar.php">

          <div class="row">
            <input type="hidden" name="ced" value="<?php echo $ced; ?>">

            <div class="input-field col s12">
              <input name="name_f" id="name_f" type="text" required>
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

<!--FIN FAMILIARES-->

<!-- TELEFONOS -->
<!-- TELEFONOS -->


<!--SCRIPTS-->
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
  function deleteFam(id_fam,ced) {
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
                    window.location.href = "controllers/deleteFamiliar.php?ced=" + ced + "&id_fam=" + id_fam; 
                }, 1500);
            
          })
      }
  </script>

<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
