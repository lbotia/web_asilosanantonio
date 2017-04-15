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
                    <input name="username" type="text" class="validate">
                    <label for="text">User</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="card-action center">
                <input type="submit" class="btn" value="Entrar">
            </div>
          </form>
        </div>
      </div>
    </div>