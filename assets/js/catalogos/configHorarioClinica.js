	$("#titleModule").html('HORARIO CONSULTORIOS');
	var formulario=frm.setId("frmHorario"),
	horario=[];
	formulario.fillCdm('cmdConsultorio','Sin registros',BASEURL+'index.php/catalogos/empleado/getConsultorios','');
	$("#frmHorario input[type='text']").val('');
	$("input[type='checkbox']").prop('checked',true);
	$("#cmdConsultorio").change(function(){
		getHorarioConfig();
	});
	
	$("#btnGuardar").click(function(){
		$("#loader").css({'display':'flex'});
		getHorario();
		if(horario.length>0){
			if($("#cmdConsultorio").val()>0)
				sendData();
			else{

				$("#loader").hide();
				notify("HORARIO: ","Favor de seleccionar un consultorio","warning");
			}
		}else{
			$("#loader").hide();
			notify("HORARIO: ","Favor de asignar un horario","warning");
			
		}
	});
	function getHorario(){
		horario.splice(0,horario.length);
		for(var i=1;i<8;i++){
			horario.push({
				dia:i,
				horaInicia:$("#txtHoraInicia_"+i).val(),
				horaTermina:$("#txtHoraTermina_"+i).val(),
				cerrado:($("#chkCerrado_"+i).prop('checked'))?1:0,
				idConsultorio:$("#cmdConsultorio").val()
			});
			horario.push({
				dia:i,
				horaInicia:$("#txtHoraInicia_"+i+"_"+i).val(),
				horaTermina:$("#txtHoraTermina_"+i+"_"+i).val(),
				cerrado:($("#chkCerrado_"+i).prop('checked'))?1:0,
				idConsultorio:$("#cmdConsultorio").val()
			});
		}
	}
	function sendData(){			
		$.ajax({
			type:'post',
			url:BASEURL+'index.php/catalogos/configuracion/saveHorario',
			data:'horario='+JSON.stringify(horario),
			success:function(response){
				$("#loader").hide();
				var status=$.parseJSON(response);	
				notify(status.title,status.message,status.type);
			}
		})
	}
	function getHorarioConfig(){
		$.ajax({
			type:'post',
			url:BASEURL+'index.php/catalogos/configuracion/getHorarioTrabajo',
			data:'idConsultorio='+$("#cmdConsultorio").val(),
			success:function(response){
				var data=$.parseJSON(response);
				$("input[type='checkbox']").prop('checked',true);
				if(!isEmptyJSON(data)){
					var vueltas=data.length;
					for(var i=0;i<vueltas;i++){
						console.table("#txtHoraInicia_"+data[i].dia);
						console.log("#txtHoraTermina_"+data[i].dia+"_"+data[i].dia);

						$("#txtHoraInicia_"+data[i].dia).val(data[i].horaInicia);
						$("#txtHoraTermina_"+data[i].dia).val(data[i].horaTermina);

						$("#txtHoraInicia_"+data[i].dia+"_"+data[i].dia).val(data[i+1].horaInicia);
						$("#txtHoraTermina_"+data[i].dia+"_"+data[i].dia).val(data[i+1].horaTermina);

						$("#chkCerrado_"+data[i].dia).prop('checked',false);
						i=i+1;
						console.log(i);
						
					}
				}else{
					notify("HORARIO: ","El consultorio seleccionado no tiene horario asignado","warning");
					$("#frmHorario input[type='text']").val('');
				}
				
			}
		})
	}
