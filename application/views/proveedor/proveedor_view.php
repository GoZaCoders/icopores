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
       
        <!--<?php
        //Si existen las sesiones flasdata que se muestren
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');             
            if($this->session->flashdata('incorrecto'))
                echo $this->session->flashdata('incorrecto');
        ?>-->
    <div class="container" id="tabla_proveedor">
     <h2>Proveedores</h2>
    <div class="row" >
    <div class="col-lg-12">
        <div class="panel panel-default">  
         <div class="panel-heading">
                <a href="<?php echo base_url() . $this->router->fetch_class() ?>/crear/" class="btn btn-default"> Crear Proveedor</a>

            </div>         
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <!-- Table heading -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Proveedor</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- // Table heading END -->

                        <!-- Table body -->
                        <tbody>
                       
                            <?php if ($listado): ?>
                                <?php foreach ($listado as $data): ?>
                                    <tr>
                                        <td><?= $data->idproveedor ?></td>
                                        <td><?= $data->nombre_proveedor ?></td>
                                        <td><?= $data->direccion ?></td>
                                        <td><?= $data->telefono ?></td>
                                        <td><?= $data->correo ?></td>
                                        <td>
                                            <a href="<?=base_url()?>proveedor/cargar_proveedor/<?php echo $data->idproveedor ?>" class="btn btn-primary"> Editar</a>
                                            <a href="<?=base_url()?>proveedor/eliminar_proveedor/<?php echo $data->idproveedor ?>" class="btn btn-danger">Eliminar</a>                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                           
                        </tbody>    
                        <!-- // Table body END -->
                    </table>
                    <!-- // Table END -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
?>
</table>
    </body>
</html>