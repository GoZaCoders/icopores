<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title>Login</title>

	<!--Llamado al estilo de boostrap para el Login-->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/flat-ui.min.css">
	
	

</head>
<body>


<div class="container" style="width: 970px">


<header>
	<div class="login" style="width: 940px">
        <div class="login-screen">
          <div class="login-icon">
            <img src="<?=base_url()?>assets/dist/img/login/candado.png" alt="Welcome to Mail App">
            <h4>Acceso de <small>Usuarios</small></h4>
          </div>

          <div class="login-form">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Nombre de Usuario" id="login-name">
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Contraseña" id="login-pass">
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <a class="btn btn-primary btn-lg btn-block" href="#">Ingresar</a>
            <a class="login-link" href="#">Recordar Contraseña?</a>
          </div>
        </div>
      </div>

</body>

</div>
</header>

</html>

