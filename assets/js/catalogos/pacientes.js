$("#titleModule").html('PACIENTES');
var formulario=frm.setId("frmPaciente"),
opc=0,
pasiente={
	init:function(){
		
		
		formulario.fillCdm('cmdEdo','Sin registros',BASEURL+'index.php/catalogos/consultorios_controller/getEdos','');
		$("#cmdEdo").change(function(){
			formulario.fillCdm('cmdMunicipio','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+$(this).val(),'');
		});
	},
	agregar:function(){
		$("#loader").css({'display':'flex'});
		formulario=frm.setId("frmPaciente");
		  	if(formulario.validateFrm(["txtFechaNacimiento","cmdEdoCivil","txtEdad","txtTel","txtOcupacion","txtDireccion","txtCp"])==true){
				formulario.send(BASEURL+"index.php/catalogos/pacientes/save","post",function(response){
					$("#loader").hide();
					var status=$.parseJSON(response);
					/*if(opc=1){
						formulario.clearFrm();
					}*/
					if(status==1){
						opc=0;
					}
					notify(status.title,status.message,status.type);
				})
			}else{
				$("#loader").hide();
				notify("PACIENTES: ","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
			}
	}
};

tblPacientes =$("#tblPacientes").DataTable({
			"pageLength" : 10,
	    	"processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url":BASEURL+"index.php/catalogos/pacientes/getData",
	            "type": "POST"
	        },
	        "columns": [
	        	{"data":"paciente"},
	        	{"data":"sexoo"},
	        	{"data":"celular"},
	        	{
				    "data": "id",
				    "render": function ( data, type, row ) {
				        return '<label class="custom-toggle"><input type="checkbox" data-id="'+data+'" class="delete" ><span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span></label>'
				    }
				}

	        ]
	    });
pasiente.init();
$("#openModal").click(function(){
	opc=1;
	formulario=frm.setId("frmPaciente")
	formulario.clearFrm();
	$(this).hide();
	$("#tblContainer,#btnVerHisotrial").hide();
	$("#frmPaciente").show();

});
$("#btnRegresar").click(function(){
	$("#openModal").show();
	$("#tblContainer").show();
	$("#frmPaciente").hide();

});
$("#btnAgregar").click(function(){
	pasiente.agregar();
});

$("#btnVerHisotrial").click(function(){
	 window.location.href=BASEURL+"index.php/catalogos/pacientes/consultarHistorial/"+$("#txtIdPaciente").val();
});

/*elimnar*/
$("#btnConfirmAccion").click(function(){
	$("#loader").css({'display':'flex'});
  	eleiminar()
});
$("#btnCancelConfirm").click(function(){
  	$("#tblPacientes tbody input[type='checkbox']").prop("checked",false);
});
$("#tblPacientes tbody").on("change",'input[type="checkbox"]', function (e) {
	var data = tblPacientes.row( $(this).parent().parent().parent() ).data();
	$("#messageConfirm").html("¿ DESEA ELIMNAR EL ELEMENTO <b>"+ data.nombre +"</b> ?")
	if($(this).prop("checked")){
		$("#txtDeleteElement").val($(this).data("id"));
		$("#dlgNotificacion").modal("show");
	}
} );
function eleiminar(){
  	formulario=frm.setId("frmPaciente");
	formulario.sendData(BASEURL+"index.php/catalogos/pacientes/delete","post",{id:$("#txtDeleteElement").val()},function(response){
		$("#loader").hide();
		var status=$.parseJSON(response);
		if(status.status==1){
			$("#tblPacientes").DataTable().ajax.reload();
			$("#dlgNotificacion").modal("hide");
		}	
		notify(status.title,status.message,status.type);
	});
}
/*elimnar*/
$("#tblPacientes tbody").on("dblclick", "tr", function (e){

	opc=2;
    var data = tblPacientes.row( this ).data();
    getPaciente(data.id)
});
function getPaciente(id){
	$.ajax({
		type:'post',
		url:BASEURL+"index.php/catalogos/pacientes/getPaciente",
		data:'idPaciente='+id,
		success:function(response){
			var paciente=$.parseJSON(response);
			if(!isEmptyJSON(paciente)){
				form=frm.setId("frmPaciente");
    			form.fillFrm(paciente[0]);
    			$("#txtEdad").val(paciente[0].edad);
    			$("#tblContainer").hide();
				$("#frmPaciente,#btnVerHisotrial").show();
				$("#openModal").hide();
			}else
				notify("PACIENTES: ","FAVOR DE SELECCIONAR A UN PACIENTE","warning");
		}
	})
}



	
	