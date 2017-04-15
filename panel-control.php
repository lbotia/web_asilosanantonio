<?php 
include_once 'helpers/session.php';

?>

<?php 
	// incluir cabeceras ->  este header trae los css y js de materialize 
	include 'helpers/header.php';



 ?>

<?php 

	include 'helpers/nav.php';  


?>

<div class="container">

	<div class="row">
		<div class="col l6">
			
		          <div class="card teal lighten-1 hoverable">
		            <div class="card-content white-text">
		              <span class="card-title center">HERMANAS</span>
		              <br>
		              <p>I am a very simple card. I am good at containing small bits of information.
		              I am convenient because I require little markup to use effectively.</p>
		            </div>
		            <div class="card-action center">
		              <a href="panel-hermanas.php">CONSULTAR</a>

		            </div>
		          </div>

		</div>
		<div class="col l6">
			
		          <div class="card teal lighten-1 hoverable">
		            <div class="card-content white-text">
		              <span class="card-title center">ANCIANOS</span>
		              <br>
		              <p>I am a very simple card. I am good at containing small bits of information.
		              I am convenient because I require little markup to use effectively.</p>
		            </div>
		            <div class="card-action  center">
		              <a href="panel-ancianos.php">CONSULTAR</a>
		            
		            </div>
		          </div>

		</div>
	</div>

</div>


<?php include 'helpers/scripts.php'; ?>