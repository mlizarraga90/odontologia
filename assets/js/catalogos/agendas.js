var statusCita=-1;
function convertFchaToTime(fecha){
	var date=new Date(fecha);
	return ((date.getHours()<10)?'0'+date.getHours():date.getHours())+':'+((date.getMinutes()<10)?'0'+date.getMinutes():date.getMinutes());
}
function isEmptyJSON(obj){
	for(var i in obj) { return false; }
		return true;
}
function convertToHumanFormat(fecha){
	var date=new Date(fecha);
	return ((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+date.getMonth():date.getMonth())+'-'+date.getFullYear();
}
function warningMessage(message){
	Swal.fire({
	  type: 'error',
	  title: 'Oops...',
	  text: message,
	  footer: ''
	})
}
function openModal(fechaa){
	var date;
	fecha=fechaa;
	if(fecha!=""){
		date=new Date(fecha.start);
		date=((date.getDate()<10)?'0'+date.getDate():date.getDate())+'-'+((date.getMonth()<10)?'0'+(parseInt(date.getMonth())+1 ):parseInt(date.getMonth())+1)+'-'+date.getFullYear();
	}
	title=(fecha!="")?'Fecha cita: <b>'+date+'<b>':'ACTUALIZAR DATOS';
	$("#exampleModalLabel").html(title);
	$("#dlgCita").modal('show');
	$("#txtNombre").focus();
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
function Agenda(settings){
	var titulo=settings.title || "",
	idContainerCalendar=document.getElementById(settings.idContainer),
	diasInhabiles=[],
	horarioDias=[],//horario en el que esta abierto
	horaMin="",
	horaMax="",
	calendar;


	function init(){
		$("#titleModule").html(titulo);
	}
	function setDiasInhabiles(diasCerrados){
		var vueltas=diasCerrados.length;
		if(vueltas>0){
			for(var i=0;i<vueltas;i++)
				diasInhabiles[i]=parseInt(diasCerrados[i].dia);
		}
	}
	function setHorario(horario){
		var vueltas=horario.length;
		if(vueltas>0){
			for(var i=0;i<vueltas;i++)
				horarioDias.push({daysOfWeek:[parseInt(horario[i].dia)],startTime:horario[i].horaInicia,endTime:horario[i].horaTermina})
		}
		createCalendar();
	}
	function validateActualDate(dateEvent){
		var fechaEvento=new Date(dateEvent),
		fechaActual=new Date(),
		exito=0;
		
		if(parseInt(fechaEvento.getFullYear())>parseInt(fechaActual.getFullYear())){
			exito=1
		}else{
			if(parseInt(fechaEvento.getMonth()) > parseInt(fechaActual.getMonth())){
				exito=2;
			}else if(parseInt(fechaActual.getMonth())==parseInt(fechaEvento.getMonth())){
				if(parseInt(fechaEvento.getDate())>parseInt(fechaActual.getDate()))
					exito=3;
				else if(parseInt(fechaEvento.getDate())==parseInt(fechaActual.getDate()))
					exito=1
			}	
		}
		
		return exito;
	}
	function valedateActualHour(horaInicio,horaFin){

	}
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
	}
	function createCalendar(){
		
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
		calendar = new FullCalendar.Calendar(idContainerCalendar, {
        	plugins:[ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        	allDaySlot: false,
        	events: BASEURL+'index.php/catalogos/agendaAdmin/getCitas/'+$("#cmdConsul").val()+'/'+$("#cmdStauts").val(),
        	slotDuration:'00:30:00',
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
        	defaultView: defaultView,
	      	defaultDate: getCurrentDate(),
	      	hiddenDays: diasInhabiles,
	      	minTime:horaMin,//vERIFICAR PARA OBTENER EL TIEMPO MINIMO QUE SE MOSTRARA EN BASE AL HORARIO QUE S EAGREGO
	      	maxTime:horaMax,//
	      	businessHours:horarioDias,
	      	eventLongPressDelay:20,//movildevices
	      	selectLongPressDelay:20,//movildevices
	      	navLinks: true, // can click day/week names to navigate views
	      	selectable: true,
	      	selectMirror: false,
	      	eventResize: function(info) {
		      info.revert();		    
		  	},
		  	eventClick: function(event, element) {
		  		
		  		if(validateActualDate(event.event.start)==1){
		  			$("#btnConcultar,.bg-success").show();

		  		}else{
		  			$("#btnConcultar,.bg-success").hide();
		  		}
		  		if(event.event.id>0 && (event.event.extendedProps.status!=2 && event.event.extendedProps.status!=0)){
		  			$("input[name='event-tag']").prop('checked',false);
					$(".btn-group label").removeClass('active');
					$("#txtRazon").val('');
					$(".groupContainer").show();
					 getStattusInputCita();
					$("#idCita").val(event.event.id);
					$("#txtNombre").val(event.event.title.replace('Subsecuente',''));
					$("#txtCelular").val(event.event.extendedProps.celular);
					$("#btnConcultar").attr('data-paciente',event.event.extendedProps.idPaciente);
					$("#btnConcultar").attr('data-consultorio',event.event.extendedProps.idConsultorio);
					$("#btnConcultar").attr('data-idCita',event.event.extendedProps.id);
					openModal("");
		  		}
		  	},
		  	select: function(arg) {
		  		$("input[name='event-tag']").prop('checked',false)
				$("#dicCancelacion").hide();
				$("#idCita").val('');
		  		var startDate = new Date(arg.startStr);
				// Do your operations
				var endDate   = new Date(arg.endStr);
				var minutos = ((endDate.getTime() - startDate.getTime()) / 1000) /60;
				if(minutos>30){
		      		calendar.unselect();
		      	}else{
		      		if(validateActualDate(arg.start)>0){
			  			/*falta validar si la hora esta dentro del rengo de la apertura del dia seleccionado*/
			  			$("#txtCelular,#txtRazon,#txtNombre").val('');
			  			$("#btnGuardar").html('AGENDAR');
			  			$("#btnConcultar,.groupContainer").hide();
			  			openModal(arg);
			  			$("#txtNombre").focus();
			  			//valedateActualHour(arg.startStr,arg.endStr);
			  		}else{
			  			warningMessage("No puedes agendar citas en fechas pasadas");
			  		}
		      	}
		  	}
        });
		calendar.destroy();
		$("#"+settings.idContainer).empty();
        calendar.render();
	}
	init();
	return {
		getHorarios:function(){
			getHorarios();
		},
		addEvent:function(info){
			calendar.addEvent(info);
		}
	}
}
var Agen=new Agenda({
	title:'AGENDA',
	idContainer:'calendar'
});
$("#cmdConsul,#cmdStauts").change(function(){
	Agen.getHorarios();	
});
$("#btnActulizarAgenda").click(function(){
	Agen.getHorarios();	
});
$("#btnGuardar").click(function(){
	$("#loader").css({'display':'flex'});
	if($("input[name='event-tag']:checked").length>0){
		if(parseInt($("input[name='event-tag']:checked").data('status'))==0 && $("#txtRazon").val()==""){
			warningMessage("Favor de indicar el motivo de la cancelación")
			$("#loader").hide();
		}else{
			
			setDate($("#txtNombre").val(),$("#txtApellidos").val(),$("#txtCelular").val(),$("#txtRazon").val());
		}
	}else{
		if(parseInt($("#cmdConsul").val()==0)){
			warningMessage("Favor de seleccionar un consultorio")
			$("#loader").hide();
		}else if($("#txtNombre").val()!="" && $("#txtCelular").val()!=""){
			setDate($("#txtNombre").val(),$("#txtApellidos").val(),$("#txtCelular").val(),$("#txtRazon").val());
		}else{
			warningMessage("Favor de verificar el celular y/o nombre");
			$("#loader").hide();
		}
	}
});
$("body").on('click','#btnConcultar',function(){
	window.location.href=BASEURL+"index.php/catalogos/consultarEmpleado/consultar/"+$(this).data('paciente')+'/'+$(this).data('consultorio')+'/'+$("#idCita").val();
			
});
function setDate(nombre,apellidos,celular,motivo){
	$.ajax({
		type:'post',
		url:BASEURL+'index.php/catalogos/agendaAdmin/setDate',
		data:'idCita='+$("#idCita").val()+'&apellidos='+apellidos+'&nombre='+nombre+"&celular="+celular+"&fechaCita="+convertToHumanFormat(fecha.start)+'&idConsultorio='+$("#cmdConsul").val()+'&horaInicio='+ convertFchaToTime(fecha.start)+'&horaFin='+ convertFchaToTime(fecha.end)+'&status='+statusCita+'&motivo='+motivo,
		success:function(response){
			$("#loader").hide();
			$("#dlgCita").modal('hide');
			$("input[name='event-tag']").prop('checked',false)
			$("#dicCancelacion").hide();
			$("#idCita").val('');
			var data=$.parseJSON(response),
			type="success";
			if(data.status==-1){
				type="error"
			}else if(data.status==-2){
				type="error"
			}else{				
				Agen.addEvent({
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

			Agen.getHorarios();
			Swal.fire({
				position: 'top-end',
				type: data.type,
				title: data.message,
				showConfirmButton: false,
				timer: 2500
			});
			if(data.status==-2)//La fecha de la cita no esta disponible
				Agen.getHorarios();
		}
	});
}

