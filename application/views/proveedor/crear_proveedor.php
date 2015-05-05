
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Proveedores</title>
        <!--Llamado al estilo de boostrap para el Login-->
  		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/vendor/bootstrap.min.css">
  		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/flat-ui.min.css">
    </head>
    <body>          
   <div class="row">
        <div class="col-md-4">
          <h4>Proveedores</h4>
			<form class="form-horizontal" role="form" action="<?=base_url()?>proveedor/operacion_proveedor/" method="post">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Proveedor:</label>
              <div class="col-lg-10">                
                 <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="<?=$nombre_proveedor?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword1" class="col-lg-2 control-label">Dirección:</label>
              <div class="col-lg-10">
               <input type="text" class="form-control" id="direccion" name="direccion" value="<?=$direccion?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword1" class="col-lg-2 control-label">Teléfono:</label>
              <div class="col-lg-10">
               <input type="text" class="form-control" id="telefono" name="telefono" value="<?=$telefono?>" /> 
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword1" class="col-lg-2 control-label">Correo:</label>
              <div class="col-lg-10">
               <input type="text" class="form-control" id="correo" name="correo" value="<?=$correo?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <input type="submit" name="guardar" value="Guardar" class="btn btn-primary"/>
              </div>
            </div>
          </form>
</div>
</div>
    </body>
</html>
