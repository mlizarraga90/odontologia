$("#titleModule").html('PACIENTES');

var tblPacientes =$("#tblPaci").DataTable({
	"processing": true,
	"serverSide": true,
	"ajax": {
		"url":BASEURL+"index.php/catalogos/pacientes/getData",
	    "type": "POST"
	},
	"columns": [
	    {"data":"nombre"},
	    {"data":"sexoo"},
	    {"data":"celular"}

	]
});
$("#tblPaci tbody").on("dblclick", "tr", function (e){
    var data = tblPacientes.row( this ).data();
    alert();
    window.location.href=BASEURL+"index.php/catalogos/pacientes/consultarHistorial/"+data.id;
});