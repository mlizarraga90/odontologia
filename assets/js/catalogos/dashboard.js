var chartGananciaPorConsultorio;
$("#loader").css({'display':'flex'});
$("#cmdConsul").change(function(){
	$("#loader").css({'display':'flex'});
	getInfo($("#cmdConsul").val());	
});
getInfo($("#cmdConsul").val());
$("#txtFecha").val(fechaActual);
$("#txtFecha").change(function(){
	if($(this).val()!="")
		getDinerPorConsultorio($(this).val());
})
function getInfo(idConsultorio){
	$.ajax({
		type:'post',
		url:BASEURL+'index.php/catalogos/dashboard/getInfo',
		data:'idConsultorio='+idConsultorio,
		success:function(response){
			$("#loader").hide();
			var info=$.parseJSON(response);
			$("#citasVigentes").html(info.citasVigentes[0].totalCitas);
			$("#citasAtendidas,#pacientesConsultados").html(info.citasAtendidas[0].totalCitas);
			$("#citasCanceladas").html(info.citasCanceladas[0].totalCitas);
			crearGraficaCostoConultorio(info.graficaGananciaConsultorio);
			crearGraficaCostoConultorioMensual(info.graficaGananciaSemanal);
		}
	})
}
function getDinerPorConsultorio(fecha){
	$.ajax({
		type:'post',
		url:BASEURL+'index.php/catalogos/dashboard/getDinerPorConsultorio',
		data:'fecha='+fecha,
		success:function(response){
			var info=$.parseJSON(response);
			chartGananciaPorConsultorio.reset();
			crearGraficaCostoConultorio(info.graficaGananciaConsultorio);
		}
	})
}
function crearGraficaCostoConultorio(data){
 	chartGananciaPorConsultorio=new Chart(document.getElementById("chartDineroCitasConsul"), {
	    type: 'bar',
	    data: {
	      labels: data.labels,
	      datasets: [
	        {
	          label: "Citas ($)",
	          backgroundColor: data.colors,
	          data: data.data
	        }
	      ]
	    },
	    options: {
	      legend: { display: false },
	      title: {
	        display: true,
	        text: 'Ganancias por consultorios '
	      }
	    }
	});
}
function crearGraficaCostoConultorioMensual(data){
 	chartGananciaPorConsultorio=new Chart(document.getElementById("chartCitasMensual"), {
	  type: 'line',
	  data: {
	    labels: data.labels,
	    datasets:data.dataSet
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Ganancias por mes'
	    }
	  }
	});
}