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

<div class="valign-wrapper" style="width:100%;height:65%;position: absolute;">
	<div class="valign" style="width:100%;">
		<div class="container">
			<div class="row">
				<!-- CARD 1 -->
				<div class="col s4 offset-s2">
					<a href="panel-ancianos.php">
						<div class="card hoverable">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="responsive-img" src="img/aguelitos3.png" alt="office" href="hola.php">
							</div>
							<div class="card-content">
								<span class="card-title grey-text text-darken-4">Adulto Mayor
							</div>
						</div>
					</a>
				</div>
					<!-- CARD 2 -->

					<div class="col s3  offset-s1">

					<a href="panel-hermanas.php">
						<div class="card hoverable">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="responsive-img" src="img/monjita3.png" alt="office" href="hola.php">
							</div>
							<div class="card-content">
								<span class="card-title grey-text text-darken-4">Hermanas
							</div>
						</div>
					</a>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'helpers/footer.php'; ?>
<?php include 'helpers/scripts.php'; ?>