<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="front ie gt-ie8 fluid top-full sticky-top"> <![endif]-->
<!--[if !IE]><!-->
<html class="fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"><!-- <![endif]-->
<html class="front fluid top-full sticky-top">
<head>
	<title>
		@section('title')
			San Judas Tadeo
			@show
	</title>
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<script src="{{{ asset('assets/components/myscript/myscript.js') }}}"></script>
	<link rel="stylesheet/less" href="{{{ asset('assets/less/pages/module.admin.page.form_elements.less') }}}" />
 	<script src="{{{ asset('assets/components/core/lib/jquery/jquery.min.js') }}}"></script>
 	<script src="{{{ asset('assets/components/core/lib/plugins/less-js/less.min.js') }}}"></script>
 	<link type="stylesheet/less" href="styles.less" />
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/notifications/gritter/assets/lib/css/jquery.gritter.css">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/responsive/assets/lib/css/footable.core.min.css">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/responsive/assets/custom/less/tables-responsive.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/classic/assets/less/tables.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/tabs/assets/tabs.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/gallery/carousels/assets/less/carousels.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/charts/flot/assets/custom/less/flotcharts.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/core/custom/less/labels.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/ui/tooltips/assets/tooltips.less">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/common/ui/buttons/assets/buttons.less">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/forms/elements/colorpicker-farbtastic/assets/css/farbtastic.css">
 	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/datatables/assets/lib/extras/TableTools/media/css/TableTools.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/datatables/assets/lib/extras/ColVis/media/css/ColVis.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/datatables/assets/custom/css/DT_bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/classic/assets/less/tables.less">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/tables/datatables/assets/custom/less/datatables.less">
	<link rel="stylesheet" type="text/css" href="../../../assets/components/ui/pagination/pagination-bootstrap/assets/pagination.less">
	<script src="{{{ asset('assets/jquery-1.9.0.js') }}}"></script>
	<script src="{{{ asset('assets/jquery-migrate-1.2.1.js') }}}"></script>
 	<script src="{{{ asset('assets/components/core/lib/jquery/jquery-migrate.min.js') }}}"></script>
	<script src="{{{ asset('assets/components/core/lib/plugins/less-js/less.min.js') }}}"></script>
	<script src="{{{ asset('assets/components/myscript/myscript.js') }}}"></script>
	<script src="{{{ asset('assets/components/notifications/notyfy/assets/lib/js/jquery.notyfy.js') }}}"></script>
	<script src="{{{ asset('assets/components/notifications/notyfy/assets/custom/js/notyfy.init.js') }}}"></script>
	<script src="{{{ asset('assets/components/notifications/gritter/assets/lib/js/jquery.gritter.min.js') }}}"></script>
	<script src="{{{ asset('assets/components/notifications/gritter/assets/custom/js/gritter.init.js') }}}"></script>
	<script src="{{{ asset('assets/components/demo/assets/js/demo.choose.js') }}}"></script>
	<script src="{{{ asset('assets/components/core/custom/js/core.init.js') }}}"></script>

	<link rel="stylesheet" type="text/css" href="../../../assets/components/notifications/gritter/assets/lib/css/jquery.gritter.css">

</head>

<body class="">
	  <?php
          if(isset($_GET['msg']) || isset($_GET['titulo']))
          { if (isset($_GET['cl'])) {
          	$cl = $_GET['cl'];
          }else{
          	$cl = 'gritter-primary';
          }
      ?>

              <script type="text/javascript">
                  $.gritters(<?php echo "'".utf8_decode($_GET['msg'])."'"; ?> , <?php echo "'".utf8_decode($_GET['titulo'])."'"; ?> , <?php echo "'".$cl."'";?>);  
              </script>
      <?php
           
          }
          ?>
			<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">
		
				<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">
		
		<!-- Sidebar Menu -->
		<div id="menu" class="hidden-phone hidden-print">
		
			<!-- Brand -->
			<b class="appbrand">San Judas Tadeo</b>
			<h3 class="center"><img src="../../../logo.jpg" height="125px" width="90px" /></h3>
			
			<center class="center"style="color: #F1F8E0">RIF J-30275984-4</center>
			<hr class="separator invisible">
		
			<!-- Scrollable menu wrapper with Maximum height -->
			<div class="slim-scroll" style="color: #086A87" data-scroll-height="800px">
			
			<!-- Sidebar Profile -->
			<!--<span class="profile center">
				<a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-flat&amp;sidebar-sticky=true&amp;top_style=full&amp;sidebar_style=full"><img data-src="holder.js/36x36/white" alt="Avatar" /></a>
			</span>-->
			<!-- // Sidebar Profile END -->
			
			<!-- Regular Size Menu -->
			<ul>
			
			<?php if (Auth::check()) { ?>				
								<!-- Blank page template menu example -->
				<!-- Menu Regular Item (add class active to LI for an active menu item) -->
				
				<?php if (Auth::user()->user_level == 3) { ?>
 				<li class="dropdown dd-2">
  				<a href="/reports/schedulesreportselect" class="glyphicons clock"><i></i>Horarios<span class="fa fa-chevron-right"></span></a>
 				</li>
 				<li class="dropdown dd-2">
  				<a href="/reports/evaluationreportselect" class="glyphicons notes"><i></i>Plan de evaluaci&oacute;n<span class="fa fa-chevron-right"></span></a>
 				</li>
 				<li class="dropdown dd-2">
  				<a href="/reports/listreportselect" class="glyphicons cart_in"><i></i>Lista de &Uacute;tiles<span class="fa fa-chevron-right"></span></a>
 				</li>
				<?php }?>

				<?php if (Auth::user()->user_level == 1) { ?>
				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons pencil"><i></i>Estudiantes<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
					<li><a href="/createstudent" class="glyphicons user_add"><i></i> Registrar</a></li>
  					<li><a href="/grades/index" class="glyphicons eye_open"><i></i> Ver</a></li>
  				</ul>
 				</li>
 				<?php }?>
 				<?php if (Auth::user()->user_level == 1) { ?>
 				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons parents"><i></i>Representantes<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
					<li><a href="/createparent" class="glyphicons user_add"><i></i>Registrar</a></li>
					<li><a href="/notifications/documents" class="glyphicons folder_new"><i></i> Adjuntar Documento</a></li>
					<li><a href="/emails/createtopic" class="glyphicons message_out"><i></i> Enviar Notificaci&oacute;n</a></li>
  					<li><a href="/parent/index" class="glyphicons eye_open"><i></i>Ver</a></li>
  				</ul>
 				</li>
				<?php }?>
 					<?php if (Auth::user()->user_level == 1 || Auth::user()->user_level == 2) { ?>
 				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons book_open"><i></i>Docentes<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
  				<?php if (Auth::user()->user_level == 1) { ?>
					<li><a href="/createteacher" class="glyphicons user_add"><i></i>Registrar</a></li>
					<li><a href="/teacher/index" class="glyphicons eye_open"><i></i>Ver</a></li>
					<li><a href="/assigments/index" class="glyphicons notes"><i></i> Plan de evaluaci&oacute;n</a></li>
					<li><a href="/emails/createtopic" class="glyphicons message_out"><i></i> Enviar Notificaci&oacute;n</a></li>
					<li><a href="/notifications/documents" class="glyphicons folder_new"><i></i> Adjuntar Documento</a></li>
				<?php } ?>
				<?php if (Auth::user()->user_level == 2) { ?>
					<li><a href="/assigments/classevaluation" class="glyphicons podium"><i></i>Plan de Evaluaci&oacute;n</a></li>
				<?php }?> 		
					 					
  				</ul>
				<?php } ?>

				<?php if (Auth::user()->user_level == 1 || Auth::user()->user_level == 2) { ?>
  				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons font"><i></i>Calificaciones<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
  					<?php if (Auth::user()->user_level == 1) { ?>
					<li><a href="/calificationsadmin/index" class="glyphicons log_book"><i></i>Registrar</a></li>
						<li><a href="/califications/index" class="glyphicons eye_open"><i></i>Ver</a></li>
					<?php }?>
  				<?php if (Auth::user()->user_level == 2) { ?>
					<li><a href="/califications/classcalification" class="glyphicons log_book"><i></i>Registrar</a></li>
				<?php }?>
 
  				</ul>
 				</li>
				<?php }?>

				<?php if (Auth::user()->user_level == 1) { ?>
 				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons list"><i></i>Lista de &Uacute;tiles<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
  					<li><a href="/createlist" class="glyphicons cart_in"><i></i>Registrar</a></li>
  				</ul>
 				</li>
				<?php }?>

 				<?php if (Auth::user()->user_level == 1) { ?>
				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons coins"><i></i>Pagos<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
					<li><a href="/payments/createpayment" class="glyphicons money"><i></i>Registrar</a></li>
  					<li><a href="/payments/index" class="glyphicons eye_open"><i></i>Ver</a></li>
  				</ul>
 				</li>
				<?php }?>

				<?php if (Auth::user()->user_level == 1) { ?>
				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons book"><i></i>Acad&eacute;mico<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
  					<li><a href="/createyear" class="glyphicons edit"><i></i> Registrar Año Escolar</a></li>
  					<li><a href="/periods/index" class="glyphicons eye_open"><i></i> Ver</a></li>
  				</ul>
 				</li>
				<?php }?>
 				
				<?php if (Auth::user()->user_level == 1) { ?>
 				<li class="dropdown dd-2">
  				<a href="/schedules/sortbygrade" class="glyphicons clock"><i></i>Horarios<span class="fa fa-chevron-right"></span></a>
 				</li>
 				<?php }?>
 				
 				
 				<?php if (Auth::user()->user_level == 1) { ?>
 				<li class="dropdown dd-2">
  				<a href="../index.html?lang=en" data-toggle="dropdown" class="glyphicons ok_2"><i></i>Asistencias<span class="fa fa-chevron-right"></span></a>
  				<ul class="dropdown-menu pull-left">
  					<li><a href="/attendances/index" class="glyphicons check"><i></i>Registrar</a></li>
  				</ul>
 				</li>
				<?php }?>
			
				<!-- // Blank page template menu example END -->
				<?php } ?>
				<!-- Not blank page -->
								<!-- // Not blank page END -->
				
			</ul>
			<div class="clearfix"></div>
			<!-- // Regular Size Menu END -->
			
						<div class="alert alert-primary">
				<!-- <a class="close" data-dismiss="alert">&times;</a>
				<p>Seccion de comentarios debajo de la barra de herramientas lateral izquierda</p> -->
			</div>
						
			</div>
			<!-- // Scrollable Menu wrapper with Maximum Height END -->
			
		</div>
		<!-- // Sidebar Menu END -->
				
		<!-- Content -->
		<div id="content">
		
				<!-- Top navbar -->
		<div class="navbar main">
			
			<!-- Menu Toggle Button -->
			<button type="button" class="btn btn-navbar pull-left">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<!-- // Menu Toggle Button END -->
			
						
			<ul class="topnav pull-left">
				<!-- //<li><a href="{{{ URL::to('') }}}" class="glyphicons dashboard"><i></i> Dashboard</a></li>-->
			</ul>
						
						<!-- Top Menu Right -->
			<ul class="topnav pull-right hidden-phone hidden-tablet hidden-desktop-1">
			
			
				<!-- Profile / Logout menu -->
				<?php if (Auth::check()) {?>
				<li>
					<a class="glyphicons copyright_mark" href="/about"><span class="hidden-tablet hidden-phone hidden-desktop-1">Acerca de</span><i></i></a>
				</li>
				<?php if (Auth::user()->user_level == 1) { ?>
				<li class="account dropdown dd-1">
					<a data-toggle="dropdown" class="glyphicons circle_question_mark">Ayuda<span class="hidden-tablet hidden-phone hidden-desktop-1"></span><i></i></a>
					<ul class="dropdown-menu pull-right">	
						<li>
							<span>
								<a href="/../../../manual.pdf" class="glyphicons file"><i></i>Manual de Usuario</a>
							</span>
						</li>
					</ul>
				</li>
				<li class="account dropdown dd-1">
					<a data-toggle="dropdown" class="glyphicons shield">Seguridad<span class="hidden-tablet hidden-phone hidden-desktop-1"></span><i></i></a>
					<ul class="dropdown-menu pull-right">	
						<li>
							<span>
								<a href="/backup" class="glyphicons cloud-upload"><i></i>Respaldo</a>
								<a href="/restore" class="glyphicons cloud-download"><i></i>Restauraci&oacute;n</a>
							</span>
						</li>
					</ul>
				</li>
				<?php }?>

				<?php if (Auth::user()->user_level == 2) { ?>
					<li class="account dropdown dd-1">
					<a data-toggle="dropdown" class="glyphicons circle_question_mark">Ayuda<span class="hidden-tablet hidden-phone hidden-desktop-1"></span><i></i></a>
					<ul class="dropdown-menu pull-right">	
						<li>
							<span>
								<a href="/../../../manualdocente.pdf" class="glyphicons file"><i></i>Manual de Usuario</a>
							</span>
						</li>
					</ul>
				</li>
				<?php } ?>

				<?php if (Auth::user()->user_level == 3) { ?>
					<li class="account dropdown dd-1">
					<a data-toggle="dropdown" class="glyphicons circle_question_mark">Ayuda<span class="hidden-tablet hidden-phone hidden-desktop-1"></span><i></i></a>
					<ul class="dropdown-menu pull-right">	
						<li>
							<span>
								<a href="/../../../manualrepresen.pdf" class="glyphicons file"><i></i>Manual de Usuario</a>
							</span>
						</li>
					</ul>
				</li>
				<?php } ?>

				<?php if (Auth::user()->user_level == 1 || Auth::user()->user_level == 2) { ?>
				<li>
					<a class="glyphicons print" href="/reports/index"><span class="hidden-tablet hidden-phone hidden-desktop-1">Reportes</span><i></i></a>
				</li>
				<?php }?>
				<li>
					<a class="glyphicons home" href="/"><span class="hidden-tablet hidden-phone hidden-desktop-1">Principal</span><i></i></a>
				</li>
				<?php }?>
				<li class="account dropdown dd-1">
					<a data-toggle="dropdown" class="glyphicons logout lock"><span class="hidden-tablet hidden-phone hidden-desktop-1"><?php if (Auth::check()) { echo Auth::user()->name;}else{ echo 'Iniciar Sesión';}?></span><i></i></a>
					<ul class="dropdown-menu pull-right">
						<form action="{{ action('TeacherController@login')}}" method="post">
							<?php if (!Auth::check()) {?>
							
						<li><table><tr><td>Usuario: </td><td><input class="form-control col-xs-2" name="username" type="text" /></td></tr></table></li>
							
						<li><table><tr><td>Contrase&ntilde;a: </td><td><input class="form-control" name="password" type="password" /></td></tr></table></li>
						<li class="profile">
						</li>
						<li>
							<span>
								<hr class="separator invisible">
								<button type="submit" class="btn btn-default btn-mini center">Iniciar Sesi&oacute;n</button>
								<hr class="separator invisible">
								<a href="/emails/password" font-size=1>Olvid&eacute; mi contraseña</a>
							</span>
						</li>
					</ul>
				</li>
					<?php }else{ ?>
						<li class="profile">
						
							<span>
								<span class="heading">{{Auth::user()->name}} {{Auth::user()->lastname}}</span>
								<span class="clearfix"></span>
							</span>
						</li>
						<li>
							<span>
								<a href="/logout" class="btn btn-default btn-mini pull-left">Cerrar Sesi&oacute;n</a>								
							</span>
						</li>
					</ul>
									</li>
					<?php }?>
								</form>
				<!-- // Profile / Logout menu END -->
				<li>&nbsp;</li>
			</ul>
			<!-- // Top Menu Right END -->
						<div class="clearfix"></div><div class="clearfix"></div><div class="clearfix"></div>
			
		</div>
		<!-- Top navbar END -->
<!--<ul class="breadcrumb">
	- <li>You are here</li>
	<li class="divider"></li> 
</ul>-->

<!-- Container -->
		
		<div class="container" align="center">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->


		</div>
		<!-- // Content END -->
		
				</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
				
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->

			<div class="copy">&copy; Sistema Automatizado Elaborado por Br. Susana Lares, como requisito parcial para optar por el T&iacute;tulo de Ingeniero de Sistemas UNIMAR <img src="../../../logo_unimar.png" height="25px" width="25px" /></div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	

<!-- Themer --><!-- // Themer END -->


	<!-- Global -->
<script>
	var basePath = '',
		commonPath = '../assets/',
		componentsPath = '../assets/components/';
	
	var primaryColor = '#4a8bc2',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;
</script>

<script src="{{{ asset('assets/components/core/lib/bootstrap/js/bootstrap.min.js') }}}"></script>
<script src="{{{ asset('assets/components/core/lib/modernizr/modernizr.js') }}}"></script>
<script src="{{{ asset('assets/components/core/lib/plugins/holder/holder.js') }}}"></script>
<script src="{{{ asset('assets/components/core/lib/plugins/slimscroll/jquery.slimscroll.js') }}}"></script>
<script src="{{{ asset('assets/components/modals/assets/js/bootbox.min.js') }}}"></script>
<script src="{{{ asset('assets/components/core/lib/plugins/prettyprint/assets/js/prettify.js') }}}"></script>
<script src="{{{ asset('assets/components/themer/assets/plugins/cookie/jquery.cookie.js') }}}"></script>
<script src="{{{ asset('assets/components/themer/assets/plugins/minicolors/jquery.miniColors.js') }}}"></script>
<script src="{{{ asset('assets/components/themer/assets/js/themer.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-switch/assets/lib/js/bootstrap-switch.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-switch/assets/custom/js/bootstrap-switch.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/uniform/assets/lib/js/jquery.uniform.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/uniform/assets/custom/js/uniform.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/jasny-fileupload/assets/js/bootstrap-fileupload.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/lib/js/wysihtml5-0.3.0_rc2.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/lib/js/bootstrap-wysihtml5-0.0.2.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/custom/wysihtml5.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/button-states/button-loading/assets/js/button-loading.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/select2/assets/lib/js/select2.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/select2/assets/custom/js/select2.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/multiselect/assets/lib/js/jquery.multi-select.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/multiselect/assets/custom/js/multiselect.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/inputmask/assets/lib/jquery.inputmask.bundle.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/inputmask/assets/custom/inputmask.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-timepicker/assets/lib/js/bootstrap-timepicker.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/bootstrap-timepicker/assets/custom/js/bootstrap-timepicker.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/colorpicker-farbtastic/assets/js/farbtastic.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/colorpicker-farbtastic/assets/js/colorpicker-farbtastic.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/validator/assets/lib/jquery-validation/dist/jquery.validate.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/validator/assets/custom/form-validator.init.js') }}}"></script>
<script src="{{{ asset('assets/components/core/custom/js/core.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/inputmask/assets/lib/jquery.inputmask.bundle.min.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/inputmask/assets/custom/inputmask.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/wizards/assets/custom/js/form-wizards.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/wizards/assets/lib/jquery.bootstrap.wizard.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/lib/js/wysihtml5-0.3.0_rc2.min.js?v=v2.1.0&sv=v0.0.1.1') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/lib/js/bootstrap-wysihtml5-0.0.2.js?v=v2.1.0&sv=v0.0.1.1') }}}"></script>
<script src="{{{ asset('assets/components/forms/editors/wysihtml5/assets/custom/wysihtml5.init.js?v=v2.1.0&sv=v0.0.1.1') }}}"></script>
<script src="{{{ asset('assets/components/tables/responsive/assets/lib/js/footable.min.js') }}}"></script>
<script src="{{{ asset('assets/components/tables/responsive/assets/custom/js/tables-responsive-footable.init.js') }}}"></script>
<script src="{{{ asset('assets/components/forms/elements/button-states/button-loading/assets/js/button-loading.init.js') }}}"></script>
<script src="{{{ asset('assets/components/notifications/gritter/assets/lib/js/jquery.gritter.min.js') }}}"></script>
<script src="{{{ asset('assets/components/notifications/gritter/assets/custom/js/gritter.init.js') }}}"></script>
<script src="{{{ asset('assets/components/tables/datatables/assets/lib/js/jquery.dataTables.min.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/tables/datatables/assets/lib/extras/ColVis/media/js/ColVis.min.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/tables/datatables/assets/custom/js/DT_bootstrap.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/tables/datatables/assets/custom/js/datatables.init.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/notifications/gritter/assets/lib/js/jquery.gritter.min.js') }}}"></script>
<script src="{{{ asset('assets/components/notifications/gritter/assets/custom/js/gritter.init.js') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/lib/jquery.flot.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/lib/jquery.flot.resize.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/custom/js/flotcharts.common.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/lib/jquery.flot.pie.js?v=v2.1.0') }}}"></script>
<script src="{{{ asset('assets/components/charts/flot/assets/custom/js/flotchart-donut.init.js?v=v2.1.0') }}}"></script>

</body>
</html>