<div class="valign-wrapper" style="width:100%;height:90%;position: absolute;">
  <div class="valign" style="width:100%;">
<div class="container">
  <div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card z-depth-4">
        <div class="card-content">
            <br>
            <br>
            <p align="center">
            <span class="card-title black-text" >Iniciar sesión</span>
            </p>
          <br>
          <form method="POST" action="controllers/checklogin.php">
             <div class="row">
                <div class="input-field col s12">
                    <input name="username" type="text" class="validate"><label for="text">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" type="password" class="validate">
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="card-action center">
                <input type="submit" class="btn btnblue theme-color" value="Entrar">
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>

<!-- <script type="text/javascript">
swal({
  title: 'Error!',
  text: 'Do you want to continue',
  type: 'error',
  confirmButtonText: 'Cool'
})

</script> -->