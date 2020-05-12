
$("#titleModule").html('ORGANIZACIÓN');
	var formulario=frm.setId("frmOrganizacion");
	
	getOrganizacion();
	$("#cmdEdo").change(function(){
		formulario.fillCdm('cmdMunicipio','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+$(this).val(),'');
	});
	    
	$("#btnAgregar").click(function(){
	  	formulario=frm.setId("frmConsultorio");
	  	if(formulario.validateFrm([""])==true){
			formulario.send(BASEURL+"index.php/catalogos/consultorios_controller/save","post",function(response){
				var status=$.parseJSON(response);
				if(status.status==1){
					formulario.clearFrm();
					$("#txtIdOrganizacion").val(0);
					$("#dlgCrud").modal("hide");
					$("#tblGrupos").DataTable().ajax.reload();
				}	
				notify(status.title,status.message,status.type);
			})
		}else{
			notify("","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
		}
	});
	$("#btnGuardar").click(function(){
		$("#loader").css({'display':'flex'});
		form=frm.setId("frmOrganizacion");
		if(form.validateFrm(["txtId"])==true){
			if(form.send(BASEURL+"index.php/catalogos/organizacion/save","post",function(data){
				$("#loader").hide();
				var status=$.parseJSON(data);
				notify(status.title,status.message,status.type);
			},function(){
				alert("Volver a intentar");
			}));
		}else{
			notify("ORGANIZACIÓN: ","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
		}
	});
	function getOrganizacion(){
		form=frm.setId("frmOrganizacion");
		$.ajax({
			type:'post',
			url:BASEURL+'index.php/catalogos/organizacion/getOrganizacion',
			success:function(response){
				var data=$.parseJSON(response);
				formulario.fillCdm('cmdEdo','Sin registros',BASEURL+'index.php/catalogos/consultorios_controller/getEdos',data[0].idEstado);
				formulario.fillCdm('cmdMunicipio','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+data[0].idEstado,data[0].idMunicipio);
				formulario.fillCdm('cmdTipoOrganizacion','Sin registros',BASEURL+'index.php/catalogos/organizacion/getTipoOrganizacion/',data[0].tipoOrganizacion);
				form.fillFrm(data[0]);
			}
		})
	}