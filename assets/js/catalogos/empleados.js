$("#titleModule").html('EMPLEADOS');
	var formulario=frm.setId("frmEmpleado"),
	    table =$("#tblEmpleados").DataTable({
	    	"processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url":BASEURL+"index.php/catalogos/empleado/getData",
	            "type": "POST"
	        },
	        "columns": [
	        	{"data":"empleado"},
	        	{"data":"cargoMedico"},
	        	{"data":"consultorio"},
	        	{"data":"especialidad"},
	        	{
				    "data": "id",
				    "render": function ( data, type, row ) {
				        return '<label class="custom-toggle"><input type="checkbox" data-id="'+data+'" class="delete" ><span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span></label>'
				    }
				}

	        ]
	    });
	    formulario.fillCdm('cmdEspecialidad','Sin registros',BASEURL+'index.php/catalogos/empleado/getEspecialidad','');
	    formulario.fillCdm('cmdCargos','Sin registros',BASEURL+'index.php/catalogos/empleado/getCargos','');
	    formulario.fillCdm('cmdConcultorio','Sin registros',BASEURL+'index.php/catalogos/empleado/getConsultorios','');

	    $("#openModal").click(function(){
	    	formulario.clearFrm();
	    	$("#dlgEmpleados").modal("show");
	    });
	    $("#cmdCargos").change(function(){
	    	if(parseInt($(this).val())!=1 && parseInt($(this).val())-1){
	    		$('#cmdEspecialidad option[value="'+2+'"]').prop('selected',true)
	    		$('#cmdEspecialidad').prop('disabled', 'disabled');
	    	}
	    	else
	    		$('#cmdEspecialidad').prop('disabled', false);
	    });
	    
	    $("#btnGuardar").click(function(){
	    	$("#loader").css({'display':'flex'});
	    	formulario=frm.setId("frmEmpleado");

	    	if(formulario.validateFrm(["txtIdOrganizacion","txtId","cmdEspecialidad","txtTel","txtCelular","txtCedula"])==true){
				formulario.send(BASEURL+"index.php/catalogos/empleado/save","post",function(response){
					$("#loader").hide();
					var status=$.parseJSON(response);
					if(status.status==1){
						formulario.clearFrm();
						$("#dlgEmpleados").modal("hide");
					}
					$("#tblEmpleados").DataTable().ajax.reload();
					notify(status.title,status.message,status.type);
				})
			}else{
				$("#loader").hide();
				notify("","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
			}
	    });

	    /*ELIMINAR*/
	    $("#btnConfirmAccion").click(function(){
	    	eleiminar()
	    });
	    $("#btnCancelConfirm").click(function(){
	    	$("#tblEmpleados tbody input[type='checkbox']").prop("checked",false);
	    });
	    function eleiminar(){
	    	$("#loader").css({'display':'flex'});
	    	formulario=frm.setId("frmEmpleado");
			formulario.sendData(BASEURL+"index.php/catalogos/empleado/delete","post",{id:$("#txtDeleteElement").val()},function(response){
				$("#loader").hide();
				var status=$.parseJSON(response);
				if(status.status==1){
					$("#tblEmpleados").DataTable().ajax.reload();
				}
				$("#dlgNotificacion").modal("hide");
					
				notify(status.title,status.message,status.type);
			})
	    }

	    /*eventos tabla*/
	    $("#tblEmpleados tbody").on("change",'input[type="checkbox"]', function (e) {
	    	var data = table.row( $(this).parent().parent().parent() ).data();
	    	$("#messageConfirm").html("¿ DESEA ELIMNAR EL ELEMENTO <b>"+ data.consultorio +"</b> ?")
	    	if($(this).prop("checked")){
	    		$("#txtDeleteElement").val($(this).data("id"));
	    		$("#dlgNotificacion").modal("show");
	    	}
	    });
	    $("#tblEmpleados tbody").on("dblclick", "tr", function (e){
	        var data = table.row( this ).data();
	        form=frm.setId("frmEmpleado");
	        form.fillFrm(data);
	        $("#dlgEmpleados").modal("show");
	    });

	   
	    	

