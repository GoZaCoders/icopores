<?php if (!$this->session->userdata('users')): redirect('login'); endif; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Icopores</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	
		<!-- Se aplica estilos bajo el framework Bootstrap version 3.3.2 -->
	    <link href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <!-- Apunta a carpeta font-awesome para fuentes es iconos  -->
	    <link href="<?=base_url()?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <!-- Apunta carpeta font-awesome para Iconos -->
	    <link href="<?=base_url()?>public/font-awesome/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- Plugins estilos para tablas Morris -->
	    <link href="<?=base_url()?>public/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
	    <!-- jvectormap -->
	    <link href="<?=base_url()?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
	    <!-- Daterange picker -->
	    <link href="<?=base_url()?>public/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	    <!-- Theme style -->
	    <link href="<?=base_url()?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <!-- AdminLTE Skins. Choose a skin from the css/skins 
	         folder instead of downloading all of them to reduce the load. -->
	    <link href="<?=base_url()?>public/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->

</head>

  <body class="skin-green">
    	<!-- Site wrapper -->
    	<div class="wrapper">
     	 <?php $this->load->view('template/header'); ?>
      
      
      	<!-- Right side column. Contains the navbar and content of the page -->
     	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Todos los formularios
            <small>Los hacemos acá</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Titulo</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Toda la magia la metemos acá



            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php $this->load->view('template/footer'); ?>


			<!-- jQuery 2.1.3 -->
	    <script src="<?=base_url()?>public/plugins/jQuery/jQuery-2.1.3.min.js"></script>
	    <!-- Bootstrap 3.3.2 JS -->
	    <script src="<?=base_url()?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <!-- FastClick -->
	    <script src="<?=base_url()?>public/plugins/fastclick/fastclick.min.js"></script>
	    <!-- AdminLTE App -->
	    <script src="<?=base_url()?>public/dist/js/app.min.js" type="text/javascript"></script>
	    <!-- Sparkline -->
	    <script src="<?=base_url()?>public/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
	    <!-- jvectormap -->
	    <script src="<?=base_url()?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
	    <script src="<?=base_url()?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
	    <!-- daterangepicker -->
	    <script src="<?=base_url()?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
	    <!-- datepicker -->
	    <script src="<?=base_url()?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	    <!-- iCheck -->
	    <script src="<?=base_url()?>public/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	    <!-- SlimScroll 1.3.0 -->
	    <script src="<?=base_url()?>public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	    <!-- ChartJS 1.0.1 -->
	    <script src="<?=base_url()?>public/plugins/chartjs/Chart.min.js" type="text/javascript"></script>

	    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	    <script src="<?=base_url()?>public/dist/js/pages/dashboard2.js" type="text/javascript"></script>

	    <!-- AdminLTE for demo purposes -->
	    <script src="<?=base_url()?>public/dist/js/demo.js" type="text/javascript"></script>
		
  </body>
</html>
