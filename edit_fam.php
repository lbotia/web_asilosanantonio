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
    $ced = $_POST['ced'];
    $id_f = $_POST['id_f'];
	$nom_f = $_POST['nom_f'];


}
?>

	<div class="container">

		<div class="row">
			<div class="card-panel">
				<form id="form" method="POST" action="controllers/fedit_fam.php">
				<?php echo '<input type="hidden" name="ced" id="ced" value="'.$ced.'">';
						echo '<input type="hidden" name="id_f" id="id_f" value="'.$id_f.'">'; 
						?>
					<table class="striped">
						<div class="row">

							<div class="input-field col s12">
								<input name="name_f" value="<?php echo $nom_f; ?>" id="last_name" type="text" class="validate" >
								<label for="last_name">Nombres</label>
							</div>


						</div>
					</table>
					<div class="input-field col s12">

						

						<button class="btn theme-color right" type="submit" name="action">
							Editar
							<i class="material-icons right">mode_edit</i>
						</button>
					</div>
				</form>
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
              confirmButtonText: 'Confirmar Cambios!'
            }).then(function () {
                swal(
                      'Editado!',
                      'El dato a sido editado.',
                      'success'
                    )
                setTimeout(function(){
                    //do what you need here
                    form.submit();
                }, 1500);
              
            })
        };
        document.querySelector('#form').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        swalFunction(form);

        
        });

        
    </script>