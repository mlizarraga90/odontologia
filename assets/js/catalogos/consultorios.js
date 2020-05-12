$("#titleModule").html('CONSULTORIOS');
	var formulario=frm.setId("frmConsultorio"),
	    table =$("#tblGrupos").DataTable({
	    	"processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url":BASEURL+"index.php/catalogos/consultorios_controller/getData",
	            "type": "POST"
	        },
	        "columns": [
	        	{"data":"consultorio"},
	        	{"data":"municipio"},
	        	{"data":"encargado"},
	        	{
				    "data": "id",
				    "render": function ( data, type, row ) {
				        return '<label class="custom-toggle"><input type="checkbox" data-id="'+data+'" class="delete" ><span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span></label>'
				    }
				}

	        ]
	    });
	    formulario.fillCdm('cmdEncargado','Sin registros',BASEURL+'index.php/catalogos/consultorios_controller/getEncargados/','');
	    formulario.fillCdm('cmdEdo','Sin registros',BASEURL+'index.php/catalogos/consultorios_controller/getEdos','');
	    $("#cmdEdo").change(function(){
	    	formulario.fillCdm('cmdMunicipio','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+$(this).val(),'');
	    });
	    $("#openModal").click(function(){
	    	formulario.clearFrm();
	    	$("#dlgCrud").modal("show");
	    });
	    $("#btnAgregar").click(function(){
	    	$("#loader").css({'display':'flex'});
	    	formulario=frm.setId("frmConsultorio");
	    	if(formulario.validateFrm([""])==true){
				formulario.send(BASEURL+"index.php/catalogos/consultorios_controller/save","post",function(response){
					$("#loader").hide();
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
				$("#loader").hide();
				notify("","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
			}
	    });
	    $("#tblGrupos tbody").on("change",'input[type="checkbox"]', function (e) {
	    	var data = table.row( $(this).parent().parent().parent() ).data();
	    	$("#messageConfirm").html("¿ DESEA ELIMNAR EL ELEMENTO <b>"+ data.consultorio +"</b> ?")
	    	if($(this).prop("checked")){
	    		$("#txtDeleteElement").val($(this).data("id"));
	    		$("#dlgNotificacion").modal("show");
	    	}
	    } );

	    $("#btnConfirmAccion").click(function(){
	    	eleiminar()
	    });
	    $("#btnCancelConfirm").click(function(){
	    	$("#tblGrupos tbody input[type='checkbox']").prop("checked",false);
	    });
	    function eleiminar(){
	    	formulario=frm.setId("frmConsultorio");
			formulario.sendData(BASEURL+"index.php/catalogos/consultorios_controller/delete","post",{id:$("#txtDeleteElement").val()},function(response){
				var status=$.parseJSON(response);
				if(status.status==1){
					$("#tblGrupos").DataTable().ajax.reload();
				}
				$("#dlgNotificacion").modal("hide");
					
				notify(status.title,status.message,status.type);
			})
	    }
	    $("#tblGrupos tbody").on("dblclick", "tr", function (e){
	        var data = table.row( this ).data();
	        form=frm.setId("frmConsultorio");
	        form.fillFrm(data);
	        
	        
	        form.fillCdm('cmdMunicipio','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+data.idEstado,data.idMunicipio);
	        //form.fillCdm('cmdEncargado','Sin registros',BASEURL+'index.php/catalogos/consultorios_controller/getEncargados/',data.idEncargado);
	        $("#dlgCrud").modal("show");
	         
	        
	    });
	    
	    	

