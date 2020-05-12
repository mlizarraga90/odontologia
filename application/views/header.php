<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--ORRAR CACHE-->
    <meta http-equiv="Expires" content="0">
  	<meta http-equiv="Last-Modified" content="0">
  	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  	<meta http-equiv="Pragma" content="no-cache">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/nucleo.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

	
	<!--DATA TABLES-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<!--DATA TABLES-->

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">

	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">

	<!--ALERTAS-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetcalendar.css">
	<!--CALENDAR-->
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/core/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/list/main.css' rel='stylesheet' />
	<style>
		@media only screen and (max-width: 500px){
			.fc-header-toolbar{display: block!important;}
			.fc-toolbar h2 {
			    font-size: 1.25em!important;
			    margin: 0;
			}
			.fc-timeGridDay-button{width: 100%;}
		}

	</style>
	<script>
		
		var BASEURL="<?php echo base_url();?>";
		var fechaActual="<?php echo date("m/d/Y");?>";
	</script>
</head>
<body class="g-sidenav-hidden">
<div id="loader">
	<div class="body">
		<div class="loaderContainer">
			<img src="<?php echo base_url();?>assets/loader.gif">
		</div>
		<div class="loaderContainer">
			<h1 class="">CARGANDO....</h1>
		</div>	
	</div>
	
</div>
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scroll-wrapper scrollbar-inner">
			<div class="scrollbar-inner scroll-content scroll-scrollx_visible scroll-scrolly_visible">
				<div class="sidenav-header d-flex align-items-center">
			        <a class="navbar-brand" href="<?php echo base_url();?>index.php/catalogos/dashboard" style="padding:2px;">
			          <img src="<?php echo base_url();?>assets/images/logo.png" class="navbar-brand-img" alt="..." style="width:100%;height:80px;max-height:80px;">
			        </a>
			        <div class="ml-auto">
			          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
			            <div class="sidenav-toggler-inner">
			              <i class="sidenav-toggler-line"></i>
			              <i class="sidenav-toggler-line"></i>
			              <i class="sidenav-toggler-line"></i>
			            </div>
			          </div>
			        </div>
			    </div>
			</div>
			<div class="navbar-inner">
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<ul class="navbar-nav">
						<li class="nav-item">
			            	<a class="nav-link collapsed" href="#inicio" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-shop text-primary"></i>
			                	<span class="nav-link-text">INICIO</span>
			              	</a>
				            <div class="collapse" id="inicio" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a class="nav-link" href="<?php echo base_url();?>index.php/catalogos/dashboard">Dashboard</a>
				                  	</li>
				                </ul>
				            </div>
			            </li>
						<li class="nav-item">
			            	<a class="nav-link collapsed" href="#organizacion" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-building text-primary"></i>
			                	<span class="nav-link-text">ORGANIZACIÓN</span>
			              	</a>

				            <div class="collapse" id="organizacion" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="2" href="<?php echo base_url();?>index.php/catalogos/organizacion">Organización</a>
				                  	</li>
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="1" href="<?php echo base_url();?>index.php/catalogos/consultorios_controller">Consultorios</a>
				                  	</li>
				                </ul>
				            </div>
			            </li>
			            <li class="nav-item">
			            	<a class="nav-link collapsed" href="#empleados" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-badge text-primary"></i>
			                	<span class="nav-link-text">EMPLEADOS</span>
			              	</a>
				            <div class="collapse" id="empleados" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="3" href="<?php echo base_url();?>index.php/catalogos/empleado">Empleados</a>
				                  	</li>
				                </ul>
				            </div>
			            </li>
			            <li class="nav-item">
			            	<a class="nav-link collapsed" href="#agenda" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-calendar-grid-58 text-primary"></i>
			                	<span class="nav-link-text">AGENDA</span>
			              	</a>
				            <div class="collapse" id="agenda" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="6" href="<?php echo base_url();?>index.php/catalogos/agendaAdmin">Agenda</a>
				                  	</li>
				                </ul>
				            </div>
			            </li>
			            <li class="nav-item">
			            	<a class="nav-link collapsed" href="#pacientes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-single-02 text-primary"></i>
			                	<span class="nav-link-text">PACIENTES</span>
			              	</a>
				            <div class="collapse" id="pacientes" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="5" href="<?php echo base_url();?>index.php/catalogos/pacientes">Pacientes</a>
				                  	</li>
				                	<!--<li class="nav-item">
				                    	<a href="<?php echo base_url();?>index.php/catalogos/empleado" class="nav-link">Consultar</a>
				                  	</li>
				                  	<li class="nav-item">
				                    	<a href="<?php echo base_url();?>index.php/catalogos/pacientes/index2" class="nav-link">Historial clinico</a>
				                  	</li>-->
				                </ul>
				            </div>
			            </li>
			            <li class="nav-item">
			            	<a class="nav-link collapsed" href="#configuracion" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
			                	<i class="ni ni-settings-gear-65 text-primary"></i>
			                	<span class="nav-link-text">CONFIGURACIÓN</span>
			              	</a>
				            <div class="collapse" id="configuracion" style="">
				                <ul class="nav nav-sm flex-column">
				                	<li class="nav-item">
				                    	<a  class="nav-link" data-modulo="4" href="<?php echo base_url();?>index.php/catalogos/configuracion">Horario clinica</a>
				                  	</li>
				                	
				                </ul>
				            </div>
			            </li>
					</ul>	
					<ul class="navbar-nav mb-md-3">
			            <li class="nav-item">
			              <a class="nav-link" href="<?php echo base_url();?>index.php/login/logout" >
			                <i class="ni ni-user-run"></i>
			                <span class="nav-link-text">CERRAR SESIÓN</span>
			              </a>
			            </li>
			        </ul>

				</div>
			</div>
		</div>
	</nav>
<div class="main-content" id="panelAgenaAdmin">
	<!---->
	<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          	<div class="col-xl-12 col-lg-12"><h1 class="text-white text-uppercase" id="titleModule"></h1></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
	    <div class="col-xl-12 mb-12 mb-xl-12">
	   		<div class="card card-calendar">
				<div class="card-header">
				    <div class="card-body p-0">
				    	