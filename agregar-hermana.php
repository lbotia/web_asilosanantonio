<?php 
include_once 'helpers/session.php';
?>


<?php 	include 'helpers/header.php';?>
<?php 	include 'helpers/navhermanas.php';  ?>

<h5 class="center-align">AGREGAR</h5>


 <div class="row">
    <form class="col s12"><div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Numero de Cedula</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Nombres</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Lugar de Nacimiento</label>
        </div>
      </div>

         <div class="input-field col s12">
              <input placeholder="FECHA" type="date" class="datepicker">
              <label for="dob"></label>
            </div>
    
      
    </form>
  </div>
        
  




<?php 	include 'helpers/footer.php';  ?>
<?php 	include 'helpers/scripts.php';  ?>
 <script>
         
         $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 70, // Creates a dropdown of 15 years to control year
              format: 'dd-mm-yyyy' 
            });
      </script>