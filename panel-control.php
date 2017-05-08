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

<div class="valign-wrapper" style="width:100%;height:60%;position: absolute;">
    <div class="valign" style="width:100%;">
        <div class="container">
           <div class="row">
        	<!-- CARD 1 -->
              <div class="col s6">

              	<div class="card hoverable">
              		<div class="card-image waves-effect waves-block waves-light">
              			<a href="lalal.php"><img class="responsive-img" src="img/aguelitopro.png" alt="office" href="hola.php"></a>
              		</div>
              		<div class="card-content">
              			<span class="card-title activator grey-text text-darken-4">Ancianos
              		</div>
              	</div>


              </div>
              <!-- CARD 2 -->

              <div class="col s6">
                 <div class="card">
                    <div class="card-content">
                       <span class="card-title black-text">Sign In</span>
                       <form>
                          <div class="row">
                             <div class="input-field col s12">
                                <input placeholder="Placeholder" id="firstname" type="text" class="validate">
                                <label for="firstname" class="active">First Name</label>
                             </div>
                          </div>
                          <div class="row">
                             <div class="input-field col s12">
                                <input placeholder="Placeholder" id="lastname" type="text" class="validate">
                                <label for="lastname" class="active">Last Name</label>
                             </div>
                          </div>
                       </form>
                    </div>
                    <div class="card-action">
                       <input type="submit" class="btn" value="Sign In">
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>


<?php include 'helpers/scripts.php'; ?>