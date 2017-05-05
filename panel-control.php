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

		  <div class="row">

          <div class="card  hoverable">
            <div class="card-image small">
              <img class="responsive-img" src="img/aguelitopro.png">
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>

      </div>
            
			
<!-- 			<div class="card hoverable">
				<div class="card-content">
					<span class="card-title center">HERMANAS DE LA CONGREGACIÓN DE LOS ANCIANOS DESAMPARADOS</span>
					<br>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	         		           
		      </div>
		      <div class="card-action center">
		      	<a href="panel-hermanas.php">CONSULTAR</a>

		      </div>
	  		</div> -->

	</div>
	<div class="col l6 m4">


<div class="row">

          <div class="card hoverable">
            <div class="card-image small">
              <img class="responsive-img"  src="img/monjita.png" style="width:30em; center center;">
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

		<!-- div class="card hoverable">
			<div class="card-content ">
				<span class="card-title center">ADULTO MAYOR</span>
				<br>
				<br>
				<br>
				<br>


		              <p>I am a very simple card. I am good at containing small bits of information.
		             I am convenient because I require little markup to use effectively.</p>
		         </div>
		         <div class="card-action  center">
		         	<a href="panel-ancianos.php">CONSULTAR</a>

		         </div>
		     </div> -->

		 </div>
		</div>

	</div>


	<?php include 'helpers/scripts.php'; ?>