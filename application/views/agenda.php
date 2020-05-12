<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>AGENDA</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/nucleo.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/escolar.css">
	<!--ALERTAS-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetcalendar.css">
	<!--CALENDAR-->
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/core/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/list/main.css' rel='stylesheet' />
	<!--<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/core/main.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>assets/css/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<style>
		.logo{position: relative;}
		.alert-warning{z-index: 20000!important;}
		.text-lg-right {text-align: right!important;}
		.fc th {font-size: .75rem;font-weight: 600;padding: .75rem 1rem;text-transform: uppercase;color: #8898aa;}
		.fc-month-view{padding:5px!important;}
		table{position:relative;width:100%!important;}

		/*agenda*/
		.fc-time-grid-event.fc-short .fc-content/*,.fc-time span */{color: white;}
		.fc-time-grid-event.fc-short .fc-time span {display: inline-block;}
		.fc-time-grid-event.fc-short .fc-time:before {content:'';}
		.fc-time-grid-event.fc-short .fc-title {margin-left: 4px;}

		#loader {position: absolute;width: 100%;background-color: #f5f5f59e;height: 100%;z-index: 30000;    display: flex;justify-content: center;align-items: center;display: none;}
		.loaderContainer{width: 100%;position: relative;}
		.loaderContainer h1{text-align: center;}
		@media only screen and (min-width: 300px) {
			.titlePage{padding-top:5px;text-align: center;}
			.logo{height:  85px;width: 185px;}
		}
		@media only screen and (min-width: 600px) {

			.logo{height:  105px;width: 200px;}
		}
		@media only screen and (min-width: 768px) {
			.titlePage{padding-top:20px;text-align: center;}
			.logo{height: 161px;width: 269px;}
		}
		.fc-event,.fc-slats table tbody tr td{text-align:justify;height:50px !important;}
		.fc-content{color:white!important;}
	</style>
</head>
<body>
<div id="loader">
	<div class="body">
		<div class="loaderContainer">
			<img src="<?php echo base_url();?>assets/loader.gif" >
		</div>
		<div class="loaderContainer">
			<h1 class="">CARGANDO....</h1>
		</div>	
	</div>
	
</div>
	<?php
	$opcCmd;
	if(isset($consultorios[0]->id)){
		$opcCmd='';
		foreach($consultorios as $row){
			$opcCmd.='<option value="'.$row->id.'">'.$row->consultorio.' - '.$row->municipio.','.$row->estado.'</option>';
		}
	}
?>
<div class="main-content">
	<div class="header ">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
          	<div class="col-xl-6 col-lg-6"><img src="<?php echo base_url();?>assets/images/logoT.png" class="logo"/><br></div>
          	<div class="col-xl-6 col-lg-6"><h1 class="text-black text-uppercase titlePage" >AGENDA TU CITA</h1></div>
          	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				    <label class="form-control-label" for="cmdConsul" style="color:black;">Consultorio</label>
				    <select class="form-control" id="cmdConsul" name="idConsultorio">
				    	<?php echo $opcCmd;?>
				    </select>
				</div>
			</div>
          	
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid ">
    	<div class="row">
    		<div class="col-xl-12 mb-12 mb-xl-12">
    			 <div class="card card-calendar">
				    <!-- Card header -->
				    <div class="card-header">

				        <div id='calendar'></div>
			    	</div>
				    <!-- Card body -->
				    <div class="card-body p-0">
				    	<div class="calendar" data-toggle="calendar" id="calendar"></div>
				    </div>
				</div>
    		</div>
    	</div>
    </div>
</div>
<div class="modal fade" id="dlgCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="frmCita">
					<input type="hidden" id="idCita"/>
		           	<div class="row">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtNombre">Nombre</label>
		                        <input class="form-control" name="nombre" type="text"  id="txtNombre" readonly="">
		                    </div>
		                </div>
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtCelular">Celular</label>
		                        <input class="form-control" name="celular" type="text"  id="txtCelular" readonly="">
		                    </div>
		                </div>
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtCelular">Codigo de seguridad</label>
		                        <input class="form-control" name="codigo" type="text"  id="txtCodigo" >
		                    </div>
		                </div>
						
						<div class=" col-lg-12   col-md-12  col-sm-12  col-xs-12" id="dicCancelacion">
			                <label class="form-control-label" for="exampleFormControlTextarea2">Motivo cancelación</label>
			                <textarea class="form-control"  rows="3" resize="none" id="txtRazon" name="motivo"></textarea>
			            </div>
		            </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
				<button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
			</div>
		</div>
	</div>
</div>
<!--<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/core/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/daygrid/main.js'></script>-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js" type="text/javascript" ></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/core/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/daygrid/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/timegrid/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/list/main.js'></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript" ></script>

	<!--<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/fullcalendar.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/main.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/jquery-scrollLock.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/jquery.scrollbar.min.js" type="text/javascript" ></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/demo.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url();?>assets/js/cookie.js" type="text/javascript" ></script>
	
	<script src="<?php echo base_url();?>assets/js/jquery.lavalamp.min.js" type="text/javascript" ></script>-->
	
</body>
</html>
<script>
	$(document).ready(function(){
		var horarioConfigurado={
			horario:[],
			diasAbiertos:[],
			diasCerrados:[],
			minHour:'',
			maxHour:''
		};
		var calendarEl = document.getElementById('calendar'),
		calendar;
	    getHorarioConsultorio();
	    /*
	    function getHorarios(){
			$.ajax({
		    		type:'post',
		    		url:BASEURL+'index.php/agenda/getHorario',
		    		data:'idConsultorio='+$("#cmdConsul").val(),
		    		success:function(response){
		    			response=$.parseJSON(response)
		    			horaMin=response.minHour.horaInicia;
		    			horaMax=response.maxHour.horaTermina;
		    			horarioDias=response.diasAbiertos;
		    			setDiasInhabiles(response.diasCerrados);
		    			setHorario(response.diasAbiertos);
		    		}
		    });
		}*/
	    /*OCULTAMOS DE LA AGENDA LOS DÍAS QUE ESTA CERRADO DE ACUERDO A LA CONFIGURACIÓN DEL HORARIO DE LA AGENDA CON EL USUARIO ADMIN*/
	    function getdiasCerrado(dias){
	    	var vueltas=dias.length;
	    	for(var i=0;i<vueltas;i++)
	    		horarioConfigurado.diasCerrados.push(parseInt(dias[i].dia));
	    	createAgenda();
	    }

	    /*oBTENEMOS EL HORARIO DEL CONSULTORIO INCLUYENDO DIAS CERRADOS*/
	    function getHorarioConsultorio(){
	    	var horarioAgenda=[],
	    	horaInicio,
	    	horaFin;
	    	$.ajax({
	    		type:'post',
	    		url:'<?php echo base_url();?>index.php/agenda/getHorario',
	    		data:'idConsultorio='+$("#cmdConsul").val(),
	    		success:function(response){
	    			var horario=$.parseJSON(response);
	    			if(isEmptyJSON(horario.diasAbiertos)==false){
	    				var vueltas=horario.diasAbiertos.length;
	    				for(var i=0;i<vueltas;i++){

		    				horaInicio=horario.diasAbiertos[i].horaInicia.split(':');
		    				horaInicio=horaInicio[0]+':'+horaInicio[1];

		    				horaFin=horario.diasAbiertos[i].horaTermina.split(':');
		    				horaFin=horaFin[0]+':'+horaFin[1];
	    				
	    					horarioConfigurado.horario.push({
	    						daysOfWeek:[parseInt(horario.diasAbiertos[i].dia)],
								startTime:horaInicio,
								endTime:horaFin
	    					});
	    				}
	    				horarioConfigurado.diasAbiertos=horario.diasAbiertos;
	    				horarioConfigurado.minHour=horario.minHour.horaInicia;
	    				horarioConfigurado.maxHour=horario.maxHour.horaTermina;
	    				getdiasCerrado(horario.diasCerrados);
	    				
	    			}else{
	    				notify("AGENDA: ","EL CONSULTORIO NO ESTA DISPONIBLE","warning");
	    			}
	    			
	    		}

	    	})
	    }
	    function createAgenda(horario){
	    	var header={},defaultView="";
	    	if($( window ).width()<=746){
	    		header= {
		        	left: 'prev,next today',
		        	center: 'title',
		       		right: 'timeGridDay'
		        
		      	};
		      	defaultView="timeGridDay";
	    	}else{
	    		header= {
		        	left: 'prev,next today',
		        	center: 'title',
		       		//right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
		        	right: 'timeGridWeek,timeGridDay'
		      	};
		      	defaultView="timeGridWeek";
	    	}

	    	calendar = new FullCalendar.Calendar(calendarEl, {
	      	plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
	        allDaySlot: false,
	        events: '<?php echo base_url();?>index.php/agenda/getCitas/'+$("#cmdConsul").val(),
	        eventConstraint: "businessHours",//evitar que se muevan o se extiendan donde esta bloqueado el calendario
	        header: header,
	      	columnHeaderHtml: function(date) {//PONEMOS LOS DÍAS DE LA SEMANA EN ESPAÑOL
			    if (date.getDay() === 0) 
			      return '<b>DOMINGO</b>';
			    else if (date.getDay() === 1)
			      return '<b>LUNES</b>';
			    else if (date.getDay() === 2)
			      return '<b>MARTES</b>';
			    else if (date.getDay() === 3)
			      return '<b>MIERCOLES</b>';
			  	else if (date.getDay() === 4)
			      return '<b>JUEVES</b>';
			  	else if (date.getDay() === 5)
			      return '<b>VIERNES</b>';
			  	else if (date.getDay() === 6)
			      return '<b>SABADO</b>';
			  },
	      	slotDuration: '00:15:00', //intervalo de minutos
	      	defaultView: defaultView,
	      	defaultDate: "<?php echo date("Y-m-d")?>",
	      	eventLongPressDelay:20,//movildevices
	      	selectLongPressDelay:20,//movildevices
	      	businessHours: true, // display business hours
	      	editable: false,//evita el movido de los aventos en el calendario
	      	droppable:false,
	      	minTime:horarioConfigurado.minHour,//vERIFICAR PARA OBTENER EL TIEMPO MINIMO QUE SE MOSTRARA EN BASE AL HORARIO QUE S EAGREGO
	      	maxTime:horarioConfigurado.maxHour,//
	      	hiddenDays:horarioConfigurado.diasCerrados,//sacar la consulta para ocultar ñlos dias inhabiles
	      	businessHours:horarioConfigurado.horario//para ver las horas disponibles en el calendario
		 ,
	      //locale:'es',
	      navLinks: true, // can click day/week names to navigate views
	      selectable: true,
	      selectMirror: false,
	      eventResize: function(info) {
		      info.revert();		    
		  },
		  eventClick: function(event, element) {
		  	if(validarDiaActualEnAdelante(event.event.start)==1){
		  		$("#btnConcultar,.bg-success").show();

		  	}else{
		  		$("#btnConcultar,.bg-success").hide();
		  	}
		    if(event.event.id>0 && (event.event.extendedProps.status==1)){
				//nombrePaciente=event.event.nombre;
				$("input[name='event-tag']").prop('checked',false);
				$(".btn-group label").removeClass('active');
				$("#txtRazon").val('');
				openModalCancel("");
				$(".groupContainer").show();
				 //getStattusInputCita();
				$("#idCita").val(event.event.id);
				$("#txtNombre").val(event.event.title);
				$("#txtCelular").val(event.event.extendedProps.celular);
				$("#btnConcultar").attr('data-paciente',event.event.extendedProps.idPaciente);
				$("#btnConcultar").attr('data-consultorio',event.event.extendedProps.idConsultorio);
				$("#btnConcultar").attr('data-idCita',event.event.extendedProps.id);
				
			}
		  },
	      select: function(arg) {

	      	var startDate = new Date(arg.startStr);
			// Do your operations
			var endDate   = new Date(arg.endStr);
			var minutos = ((endDate.getTime() - startDate.getTime()) / 1000) /60;
	      	if($("#cmdConsul").val()!=-1){
	      		if(convertDayToNumber(arg.startStr)!=convertDayToNumber(arg.endStr)){//quitamos la selección de dias diferentes
		      		calendar.unselect();
		      	}else{
		      		if(minutos>15){
		      			calendar.unselect();
		      		}else{
		      			if(validarDiaActualEnAdelante(arg.startStr)){
				      		openModal(arg);
			      		}else
			      			warningMessage('No puedes agendar citas en fechas pasadas');
		      		}
		      	}	
	      	}else{
	      		notify("AGENDA: ","Favor de seleccionar un consultorio","warning");
	      	}
	      	
	     }

	    });
	    calendar.render();
	    	
	    }
	     function openModalCancel(fechaa){
	    	var date;
	    	fecha=fechaa;
	    	if(fecha!=""){
	    		date=new Date(fecha.start);
	    		date=((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+(parseInt(date.getMonth())+1 ):parseInt(date.getMonth())+1)+'-'+date.getFullYear();
	    	}
	    	title="CANCELAR CITA";
	    	$("#exampleModalLabel").html(title);

	    	$("#dlgCita").modal('show');
	    	$("#txtNombre").focus();
	    }
	    $("#cmdConsul").change(function(){
	    	if($(this).val()!=-1){
	    		calendar.destroy();
	    		getHorarioConsultorio();
	    	}
	    });
	    /*Función que nos permite bloquear las recervaciones a fechas o días pasados, solo aprtir del día actual en adelante.*/
	    function validarDiaActualEnAdelante(dateEvent){
	    	var fechaEvento=new Date(dateEvent),
			fechaActual=new Date(),
			exito=0;
			if(parseInt(fechaActual.getMonth())>parseInt(fechaEvento.getMonth())){
				exito=2;
			}else if(parseInt(fechaActual.getMonth())==parseInt(fechaEvento.getMonth())){
				if(parseInt(fechaEvento.getDate())>parseInt(fechaActual.getDate()))
					exito=3;
				else if(parseInt(fechaEvento.getDate())==parseInt(fechaActual.getDate()))
					exito=1
			}
			return exito;
	    	
	    }
	    /*Validamos si la hora de la cita se encuntyra dentro del rango d ehorario del dia que agendo la cita*/
	    function validarHora(horaIniciaCita,horaFinCita){
	    	var horaDiaActual=getHorarioDiaSeleccionado(convertDayToNumber(horaIniciaCita)),
	      	horaInicioCita=new Date(horaIniciaCita),
	      	horaFinCita=new Date(horaFinCita),
	      	horaInicioDiaConf=new Date(horaInicioCita.getFullYear()+'-'+((horaInicioCita.getMonth()<10)?'0'+horaInicioCita.getMonth():horaInicioCita.getMonth())+'-'+((horaInicioCita.getDate()<10)?'0'+horaInicioCita.getDate():horaInicioCita.getDate())+'T'+horaDiaActual.open),
	      	horaFinCitaDiaConf=new Date(horaFinCita.getFullYear()+'-'+((horaFinCita.getMonth()<10)?'0'+horaFinCita.getMonth():horaFinCita.getMonth())+'-'+((horaFinCita.getDate()<10)?'0'+horaFinCita.getDate():horaFinCita.getDate())+'T'+horaDiaActual.close),
	      	enable=0;

	      	if(horaInicioCita.getHours()>=horaInicioDiaConf.getHours() && horaInicioCita.getHours()<=horaFinCitaDiaConf.getHours()){

	      		if(horaInicioDiaConf.getMinutes()>0){
	      			if(horaInicioCita.getMinutes()>=horaInicioDiaConf.getMinutes()){
	      				enable=1;	
	      			}else
	      				enable=0;
	      		}else{
	      			enable=1;	
	      		}
	      		
	      	}
	      	return enable;


	    }
	    function convertDayToNumber(fecha){
	    	var fecha = new Date(fecha); 
	    	return fecha.getDay();
	    }
	    function getHorarioDiaSeleccionado(dia){
	    	var rangoHora={
	    		open:'',
	    		close:''
	    	};
	    	var vueltas=horarioConfigurado.diasAbiertos.length;
	    	if(vueltas>0){

	    		for(var i=0;i<vueltas;i++){
	    			if(parseInt(horarioConfigurado.diasAbiertos[i].dia)==parseInt(dia)){
	    				rangoHora.open=horarioConfigurado.diasAbiertos[i].horaInicia;
	    				rangoHora.close=horarioConfigurado.diasAbiertos[i].horaTermina;
	    				break;
	    			}
	    		}
	    		
	    		return rangoHora;
	    	}
	    }
	    function openModal(fecha){
	    	
	    	var date=new Date(fecha.start);
	    	date=((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+ parseInt(date.getMonth()+1): parseInt(date.getMonth()+1))+'-'+date.getFullYear();
	    	
	    	swal({
				title: 'Agendar cita para: <b>'+date+'<b>',
				allowOutsideClick: false,
				showCancelButton: true,
				html:
				    '<input id="swal-input1" class="swal2-input" placeholder="Ingresa el nombre">' +
				    '<input id="swal-input2" class="swal2-input" placeholder="Ingresa el celular">'/*+
				    '<select id="swal-input3" class="swal2-input" ><?php echo $opcCmd;?></select>'*/,
				preConfirm: function () {
				    return new Promise(function (resolve) {
				      resolve([
				        $('#swal-input1').val(),
				        $('#swal-input2').val()//,
				       // $('#swal-input3').val()

				      ])

				    })
				},
				onOpen: function () {
				    $('#swal-input1').focus()
				}
			}).then(function (result) {
				
				if( result['value'][0] == '' )
				  	swal("Favor de ingresar tu nombre")
				
				if( result['value'][1] == '' )
				  	swal("Favor de ingresar tu celular")

				//if( result['value'][2] == '-1' )
				//  	swal("Seleccionar un consultorio")

				if( result['value'][0] != '' && result['value'][1] != ''  ){

			        setDate(result['value'][0],result['value'][1],fecha);
			        $("#loader").css({'display':'flex'});
				}
				
			}).catch(swal.noop)
	    }
	    function setDate(nombre,celular,fecha){
	    	$.ajax({
	    		type:'post',
	    		url:'<?php echo base_url();?>index.php/agenda/setDate',
	    		data:'nombre='+nombre+"&celular="+celular+"&fechaCita="+convertToHumanFormat(fecha.start)+'&idConsultorio='+$("#cmdConsul").val()+'&horaInicio='+ convertFchaToTime(fecha.start)+'&horaFin='+ convertFchaToTime(fecha.end),
	    		success:function(response){
	    			$("#loader").hide();

	    			var data=$.parseJSON(response),
	    			type="success";
	    			if(data.status>0){
	    				
	    				calendar.addEvent({
				            title:' '+nombre,
				            start: fecha.start,
				            end: fecha.end,
				            id:data.idCita
				        });
	    			}else{

	    				calendar.destroy();
	    				getHorarioConsultorio();
	    			}

	    			Swal.fire({
						position: 'top-end',
						type: data.type,
						title: data.message,
						showConfirmButton: false,
						timer: 2500
					});
	    			

	    		}
	    	});
	    }
	    function convertToHumanFormat(fecha){
	    	var date=new Date(fecha);
	    	return ((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+date.getMonth():date.getMonth())+'-'+date.getFullYear();

	    }
	    function convertFchaToTime(fecha){
	    	var date=new Date(fecha);
	    	return ((date.getHours()<10)?'0'+date.getHours():date.getHours())+':'+((date.getMinutes()<10)?'0'+date.getMinutes():date.getMinutes());
	    }
	    function isEmptyJSON(obj){
			for(var i in obj) { return false; }
			return true;
		}
		function notify(title,message,type){
		  $.notify({
		        title: title,
		        message: message
		      },{
		        type: type,
		        animate: {
		          enter: 'animated fadeInRight',
		          exit: 'animated fadeOutRight'
		        }
		      });
		}
		function warningMessage(message){
	    	Swal.fire({
			  type: 'error',
			  title: 'Oops...',
			  text: message,
			  footer: ''
			})
	    }
	    $("#btnGuardar").click(function(){
			$("#loader").css({'display':'flex'});
			if($("#txtCodigo").val()=="" || $("#txtRazon").val()==""){
				$("#loader").css({'display':'none'});
				notify("AGENDA: ","Favor de ingresar el código y/o motivo","warning");
	    	}else{
	    		$.ajax({
	    			type:'post',
	    			url:'<?php echo base_url();?>index.php/agenda/cancelarCita',
	    			data:$("#frmCita").serialize(),
	    			success:function(response){
	    				$("#loader").css({'display':'none'});
	    				var data=$.parseJSON(response);
	    				type="success";
		    			if(data.status==-1)
		    				type="error";
		    			if(data.status==1){
		    				$("#txtCodigo,#txtRazon").val('');
			    			$("#dlgCita").modal('hide');
			    			calendar.destroy();
		    				getHorarioConsultorio();	
		    			}
		    			Swal.fire({
							position: 'top-end',
							type: type,
							title: data.message,
							showConfirmButton: false,
							timer: 2500
						});
		    			
	    				

	    			}
	    		})
	    	}
			


		});
	});
</script>