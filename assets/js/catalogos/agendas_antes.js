$("#titleModule").html('AGENDA');
var horarioConfigurado={
	horario:[],
	diasAbiertos:[],
	diasCerrados:[],
	minHour:'',
	maxHour:''
},
nombrePaciente="";
var formulario=frm.setId("frmAux");
//formulario.fillCdm('cmdConsul','Sin registros',BASEURL+'index.php/catalogos/empleado/getConsultorios',12);
var calendarEl = document.getElementById('calendar'),
statusCita=-1,
calendar;
var fecha="",
tipoSolicitud=0;
//if($("#cmdConsul").val()!="" && $("#cmdConsul").val()!=-1 && $("#cmdConsul").val()!=null)
	getHorarioConsultorio();
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
	    		url:BASEURL+'index.php/agenda/getHorario',
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
	        events: BASEURL+'index.php/catalogos/agendaAdmin/getCitas/'+$("#cmdConsul").val()+'/'+$("#cmdStauts").val(),
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
	      	defaultDate: getCurrentDate(),//"<?php echo date("Y-m-d")?>",
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
		  	statusCita=-1;
		  	$("#dicCancelacion").hide();
		  	tipoSolicitud=0;
		  	if(validarDiaActualEnAdelante(event.event.start)==1){

		    	if(validarHora(event.event.horaInicio,event.event.horaFin)==1){
		    		if(parseInt($("#cmdConsul").val())>0){
			  				$("#btnConcultar,.bg-success").show();
			  			}else{
			  				//warningMessage('Favor de seleccionar un consultorio');
			  				$("#btnConcultar,.bg-success").hide();
			  				
			  			}
			  		}	
		    }else{
		    	//warningMessage('El día y la hora de la cita ya pasó');
		    	$("#btnConcultar,.bg-success").hide();
		    }
		    if(event.event.id>0 && (event.event.extendedProps.status!=2 && event.event.extendedProps.status!=0)){
				//nombrePaciente=event.event.nombre;
				$("input[name='event-tag']").prop('checked',false);
				$(".btn-group label").removeClass('active');
				$("#txtRazon").val('');
				openModal("");
				$(".groupContainer").show();
				 getStattusInputCita();
				$("#idCita").val(event.event.id);
				$("#txtNombre").val(event.event.title);
				$("#txtCelular").val(event.event.extendedProps.celular);
				$("#btnConcultar").attr('data-paciente',event.event.extendedProps.idPaciente);
				$("#btnConcultar").attr('data-consultorio',event.event.extendedProps.idConsultorio);
				$("#btnConcultar").attr('data-idCita',event.event.extendedProps.id);
				
			}
		  	
		  },
	      select: function(arg) {
	      	tipoSolicitud=1;

	      	$("#txtNombre,#txtCelular,#idCita").val('');
	      	if($("#cmdConsul").val()!=-1){
	      		if(convertDayToNumber(arg.startStr)!=convertDayToNumber(arg.endStr)){//quitamos la selección de dias diferentes
		      		calendar.unselect()
		      	}else{
		      		
		      		if(validarDiaActualEnAdelante(arg.startStr)==1){
		      			if(validarHora(arg.startStr,arg.endStr)==1){
		      				if(parseInt($("#cmdConsul").val())>0){
			      				openModal(arg);
			      				$(".groupContainer,#btnConcultar,#dicCancelacion").hide();
			      			}else{
			      				warningMessage('Favor de seleccionar un consultorio');
			      			}
			      		}else{
			      			warningMessage('No puedes agendar citas en fechas pasadassds');
			      		}	
		      		}else if(validarDiaActualEnAdelante(arg.startStr)==2){
		      			if(parseInt($("#cmdConsul").val())>0){
			      				openModal(arg);
			      				$(".groupContainer,#btnConcultar,#dicCancelacion").hide();
			      			}else{
			      				warningMessage('Favor de seleccionar un consultorio');
			      				
			      			}
		      		}else{
		      			console.log(validarDiaActualEnAdelante(arg.startStr));
		      			warningMessage('No puedes agendar citas en fechas pasadas');
		      		}
		      		
		      	}	
	      	}else{
	      		warningMessage('Favor de seleccionar un consultorio');
	      	}
	      	
	     }

	    });
	    calendar.render();
	    	
	    }
	    function warningMessage(message){
	    	Swal.fire({
			  type: 'error',
			  title: 'Oops...',
			  text: message,
			  footer: ''
			})
	    }
	    $("#cmdConsul,#cmdStauts").change(function(){
	    	if($(this).val()!=-1){
	    			calendar.destroy();
	    		getHorarioConsultorio();
	    	}
	    });

	    /*Función que nos permite bloquear las recervaciones a fechas o días pasados, solo aprtir del día actual en adelante.*/
	    function validarDiaActualEnAdelante(fechaInicio){
	    	var fechaCita=new Date(fechaInicio),
	    	fechaActual=new Date();
	    	console.log(fechaActual.getMonth()+'=='+fechaCita.getMonth());
	    	if(fechaActual.getMonth()==fechaCita.getMonth()){
	    		if(fechaActual.getMonth()<=fechaCita.getMonth() && fechaActual.getDate()==fechaCita.getDate())
		    		return 1;
		    	else if(fechaActual.getMonth()<=fechaCita.getMonth() && fechaCita.getDate()>fechaActual.getDate())
		    		return 2;
		    	else
		    		return 0;
	    	}else if(fechaCita.getMonth()>fechaActual.getMonth()){
	    		return 2;
	    	}else
	    		return 0;
	    	
	    }
	    function convert24To12(hora){
	    	if($hora==13)
	    		return 1;
	    	else if($hora==14)
	    		return 1;
	    	else if($hora==15)
	    		return 1;
	    	else if($hora==16)
	    		return 1;
	    	else if($hora==17)
	    		return 1;
	    	else if($hora==18)
	    		return 1;
	    	else if($hora==19)
	    		return 1;
	    	else if($hora==20)
	    		return 1;
	    	else if($hora==21)
	    		return 1;
	    	else if($hora==22)
	    		return 1;
	    	else if($hora==22)
	    		return 1;
	    	else if($hora==22)
	    		return 1;
	    }
	    /*Validamos si la hora de la cita se encuntyra dentro del rango d ehorario del dia que agendo la cita*/
	    function validarHora(horaIniciaCita,horaFinCita){
	    	var horaDiaActual=getHorarioDiaSeleccionado(convertDayToNumber(horaIniciaCita)),
	      	horaInicioCita=new Date(horaIniciaCita),
	      	horaFinCita=new Date(horaFinCita),
	      	horaInicioDiaConf=new Date(horaInicioCita.getFullYear()+'-'+((horaInicioCita.getMonth()<10)?'0'+horaInicioCita.getMonth():horaInicioCita.getMonth())+'-'+((horaInicioCita.getDate()<10)?'0'+horaInicioCita.getDate():horaInicioCita.getDate())+'T'+horaDiaActual.open),
	      	horaFinCitaDiaConf=new Date(horaFinCita.getFullYear()+'-'+((horaFinCita.getMonth()<10)?'0'+horaFinCita.getMonth():horaFinCita.getMonth())+'-'+((horaFinCita.getDate()<10)?'0'+horaFinCita.getDate():horaFinCita.getDate())+'T'+horaDiaActual.close),
	      	enable=0;
	      
	      	if(parseInt(horaInicioCita.getHours())<=12){
	      		if(horaInicioCita.getHours()>=horaInicioDiaConf.getHours() && horaFinCitaDiaConf.getHours()<=horaInicioCita.getHours()){
		      		if(horaInicioDiaConf.getMinutes()>0){
		      			if(horaInicioCita.getMinutes()>=horaInicioDiaConf.getMinutes()){
		      				enable=1;	
		      			}else
		      				enable=0;
		      		}else{
		      			enable=1;	
		      		}
		      	}	
	      	}else{
	      		var horaActual = new Date();
				if(parseInt(horaActual.getHours())<=parseInt(horaInicioCita.getHours())){
					if(parseInt(horaInicioCita.getMinutes())>=parseInt(horaActual.getMinutes()))
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
	    function openModal(fechaa){
	    	var date;
	    	fecha=fechaa;
	    	if(fecha!=""){
	    		date=new Date(fecha.start);
	    		date=((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+(parseInt(date.getMonth())+1 ):parseInt(date.getMonth())+1)+'-'+date.getFullYear();
	    	}
	    	title=(fecha!="")?'Agendar cita para: <b>'+date+'<b>':'ACTUALIZAR DATOS';
	    	$("#exampleModalLabel").html(title);

	    	$("#dlgCita").modal('show');
	    	$("#txtNombre").focus();
	    }
	    function setDate(nombre,celular,motivo){
	    	$.ajax({
	    		type:'post',
	    		url:BASEURL+'index.php/catalogos/agendaAdmin/setDate',
	    		data:'idCita='+$("#idCita").val()+'&nombre='+nombre+"&celular="+celular+"&fechaCita="+convertToHumanFormat(fecha.start)+'&idConsultorio='+$("#cmdConsul").val()+'&horaInicio='+ convertFchaToTime(fecha.start)+'&horaFin='+ convertFchaToTime(fecha.end)+'&status='+statusCita+'&motivo='+motivo,
	    		success:function(response){
	    			$("#loader").hide();
	    			$("#dlgCita").modal('hide');
	    			var data=$.parseJSON(response),
	    			type="success";
	    			if(data.status==-1){
	    				type="error"
	    			}else if(data.status==-2){
	    				type="error"
	    			}else{
	    				
	    				calendar.addEvent({
				            title:' '+nombre,
				            start: fecha.start,
				            end: fecha.end,
				            color:'#11cdef',
				            textColor:'white',
				            status:1,
				            id:data.idCita,
				            celular:celular,
				            idConsultorio:$("#cmdConsul").val(),
				            idPaciente:data.idPaciente

				        });
	    			}
	    			//if(data.statusCita==0 ){
	    					calendar.destroy();
	    					getHorarioConsultorio();
	    			//	}

	    			Swal.fire({
						position: 'top-end',
						type: type,
						title: data.message,
						showConfirmButton: false,
						timer: 2500
					});
					if(data.status==-2)//La fecha de la cita no esta disponible
						getHorarioConsultorio();
					
	    			

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
		function getStattusInputCita(){
			$("input[name='event-tag']").on('change',function(){
				
				statusCita=$(this).data('status');

				if($(this).data('status')==0)
					$("#dicCancelacion").show();
				else
					$("#dicCancelacion").hide();
			});
		}
		$("body").on('click','#btnConcultar',function(){
			window.location.href=BASEURL+"index.php/catalogos/consultarEmpleado/consultar/"+$(this).data('paciente')+'/'+$(this).data('consultorio')+'/'+$("#idCita").val();
			
		});
		$("#btnGuardar").click(function(){
			$("#loader").css({'display':'flex'});
			if($("input[name='event-tag']:checked")){
				if(parseInt($("input[name='event-tag']:checked").data('status'))==0 && $("#txtRazon").val()==""){
					warningMessage("Favor de indicar el motivo de la cancelación")
				}else{
					setDate($("#txtNombre").val(),$("#txtCelular").val(),$("#txtRazon").val());
				}
			}else{
				if(parseInt($("#cmdConsul").val()==0)){
					warningMessage("Favor de seleccionar un consultorio")
				}else if($("#txtNombre").val()!="" && $("#txtCelular").val()!=""){
					setDate($("#txtNombre").val(),$("#txtCelular").val(),$("#txtRazon").val());
				}else
					warningMessage("Favor de verificar el celular y/o nombre");
			}

		});
		