<!DOCTYPE html>
<html class="no-js" lang="en" > 

  <head>  	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

	<!--Carga Icono GoZa-->
    <link rel="shortcut icon" href="<?=base_url()?>static/img/favicon.png"> 
    
	<title>Acceso Usuarios</title>

    <!-- Aplica el CSS de Bootstrap 3.0 -->
    <link rel="stylesheet" href="<?=base_url()?>static/css/bootstrap.css">
    
    <!-- Llama estilos CSS -->
    <link rel="stylesheet" href="<?=base_url()?>static/css/demo.css">
    
    <!--Estilo personalizado para el formulario-->
    <link rel="stylesheet" id="fordemo" href="<?=base_url()?>static/css/login-theme-1.css">
    <link rel="stylesheet" href="<?=base_url()?>static/css/animate-custom.css">
    
    <!--Aún en busca de js para animacion OJOO-->
    <script src="js/custom.modernizr.js" type="text/javascript" ></script>

   	
  </head>
    <body class="fade-in">
    	
    	<!-- División para iniciar sesion -->
    	<div class="container" id="login-block">
    		<div class="row">
			    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			    	 
			       <div class="login-box clearfix animated flipInY">
			       		<div class="page-icon animated bounceInDown">
			       			<img  src="<?=base_url()?>static/img/user-icon.png" alt="Key icon" />
			       		</div>
			        	<div class="login-logo">
			        		<a href="#"><img src="<?=base_url()?>static/img/logo3.png" alt="Company Logo" /></a>
			        	</div> 
			        	<hr />
			        	<div class="login-form">
			        		<!--En caso de haber caja vacia muestra error-->
			        		<div class="alert alert-danger hide">
								  <button type="button" class="close" data-dismiss="alert"> &times;</button>
								  <h4>Error!</h4>
								   Your Error Message goes here
							</div> <!-- metodo get -->
			        		<form action="" method="POST"  >
						   		 <input type="text" id="users" name="users" placeholder="Nombre de Usuario" class="input-field" required/> 
						   		 <input type="password" id="password" name="password"  placeholder="Contraseña" class="input-field" required/> 
						   		 <button type="submit" id="btnlogin" class="btn btn-login">Ingresar</button> 
							</form>	
							<div class="login-links"> 
					            <a href="forgot-password.html">
					          	   Olvidó su contraseña?
					            </a>
					            <br />
					            <a href="sign-up.html">
					              No tienes una cuenta? <strong>Crear</strong>
					            </a>
							</div>      		
			        	</div> 			        	
			       </div>			        
			    </div>
			</div>
    	</div>

    	<script type="text/javascript" src="<?=base_url()?>static/js/jquery.min.js"></script>
	    <script type="text/javascript">
	    
	    	    $(document).ready(function(){
	    		$('#users').submit(function(){
	    		//e.preventDefault();

	    		var data = $(this).serializeArray();

	    		$.ajax({
	    			url: 'http://localhost/icopores/index.php/login/valida_login_ajax',
	    			type: 'POST',
	    			dataType: 'json',
	    			data: "users="+$('#users').val(),
	    		})
	    		.done(function(){
	    			console.log('success');
	    		})
	    		.fail(function(){
	    			console.log('error');
	    		})
	    		.always(function(){
	    			console.log('complete');
	    		});

	    	});

	    });
	    </script>

	    
      	<!--Termina login y empieza el footer-->
     	<footer class="container">
     		<p id="footer-text"><small>Developed by <a href="#">GoZa Coders.</a></small></p>
     	</footer>

        <script src="<?=base_url()?>static/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url()?>static/js/jquery.min.js"><\/script>')</script> 
        <script src="<?=base_url()?>static/js/bootstrap.min.js"></script> 
        <script src="<?=base_url()?>static/js/placeholder-shim.min.js"></script>        
    </body>
</html>
