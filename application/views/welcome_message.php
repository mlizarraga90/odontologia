<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/nucleo.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bouqitue.css">

	<!--DATA TABLES-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<!--DATA TABLES-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css">
  	<style>
  		.blockScreen {position: absolute;height: 100%;width: 100%;z-index: 10;background-color: #80808069;display: none;display: flex;justify-content: center;align-items: center;top: 0px;}
  		form{width: 100%;}
  	</style>
	
</head>
<body>
	<div class="main-content" id="panelAgenaAdmin">
	<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row">
          	<div class="col-xl-12 col-lg-12"><h1 class="text-white text-uppercase">AGENDA</h1></div>

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
	    <div class="col-xl-12 mb-12 mb-xl-12">
	   		<div class="card card-calendar">
				<div class="card-header">
				    <div class="card-body p-0">
				    	<div class="col-lg-3  col-md-12 col-sm-12 col-xs-12">
				    		<button class="btn btn-primary" type="button" id="openModal">NUEVO</button>
				    	</div>
				    	<!--TABLA -->
				    	<div class="table-responsive py-4">
					    	<table class="table table-flush" id="datatable-basic">
						        <thead class="thead-light">
						            <tr>
						                <th>Menu</th>
						                <th>Link</th>
						                <th></th>
						            </tr>
						        </thead>
						        <tfoot>
						            <tr>
						                <th>Menu</th>
						                <th>Link</th>
						                <th></th>
						            </tr>
						        </tfoot>
						        <tbody>
						       
						        </tbody>
						    </table>
						</div>

				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="dlgCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODULOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmCrud">
	        	<div class="row">
	        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	        			<input type="hidden" name="id" id="id"/>
	        			<div class="form-group">
					        <label for="txtModulo" class="form-control-label">Modulo</label>
					        <input class="form-control" type="text" value="John Snow" id="txtModulo" name="descripcion">
					    </div>
	        		</div>
	        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	        			<div class="form-group">
					        <label for="txtLink" class="form-control-label">Link</label>
					        <input class="form-control" type="text" value="John Snow" id="txtLink" name="link">
					    </div>
	        		</div>
	        	</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" id="btnAgregar">GUARDAR</button>
      </div>
    </div>
  </div>
</div>

<!--FOOTER-->
<div class="modal fade" id="dlgNotificacion" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">! ATENCIÓN ¡</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">! ES NECESARIO CONFIRNACIÓN !</h4>
                    <input type="hidden" id="txtDeleteElement"/>
                    <p id="messageConfirm"></p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white" id="btnConfirmAccion">CONFIRMAR</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal" id="btnCancelConfirm">CERRAR</button>
            </div>
            
        </div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery3.4.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>

<!--DATA TABLE-->
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>
<!--DATA TABLE-->

<script src="<?php echo base_url();?>assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/dinamycForms.js"></script>

</body>
</html>
<script>
	$(document).ready(function(){
		/*footer metodos de footer*/
		$(".blockScreen").hide();
		$('.modal').modal({show:false});
		


	    var form=formulario=frm.setId("frmCrud"),
	    table =$('#datatable-basic').DataTable({
	    	"processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url":"<?php echo base_url();?>index.php/welcome/getData",
	            "type": "POST"
	        },
	        "columns": [
	            { "data": "descripcion" },
	            { "data": "link" },
	            {
				    "data": 'id',
				    "render": function ( data, type, row ) {
				        return '<label class="custom-toggle"><input type="checkbox" data-id="'+data+'" class="delete" ><span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span></label>';
				    }
				}
	        ]
	    });

	    /*agregar y actualizar*/
	    $("#openModal").click(function(){
	    	formulario.clearFrm();
	    	$("#dlgCrud").modal('show');
	    });
	    $("#btnAgregar").click(function(){
	    	formulario=form.setId("frmCrud");
	    	if(form.validateFrm([""])==true){
				form.send('<?php echo base_url();?>index.php/welcome/save','post',function(response){
					var status=$.parseJSON(response);
					if(status.status==1){
						formulario.clearFrm();
						$("#dlgCrud").modal('hide');
						$('#datatable-basic').DataTable().ajax.reload();
					}
						
					notify(status.title,status.message,status.type);


				})
			}else{
				notify('','FAVOR DE LLENAR LOS CAMPOS VACIOS','warning');
			}
	    });
	    
	    /*ELEMENTOS DE ELIMINACION*/
	    $('#datatable-basic tbody').on('change', 'input[type="checkbox"]', function (e) {
	    	var data = table.row( $(this).parent().parent().parent() ).data();
	    	$("#messageConfirm").html('¿ DESEA ELIMNAR EL ELEMENTO <b>'+ data.descripcion +'</b> ?')
	    	if($(this).prop('checked')){
	    		$("#txtDeleteElement").val($(this).data('id'));
	    		$("#dlgNotificacion").modal('show');
	    	}
	    } );

	    $("#btnConfirmAccion").click(function(){
	    	eleiminar()
	    });
	    $("#btnCancelConfirm").click(function(){
	    	$('#datatable-basic tbody input[type="checkbox"]').prop('checked',false);
	    });
	    function eleiminar(){
	    	formulario=form.setId("frmCrud");
			form.sendData('<?php echo base_url();?>index.php/welcome/delete','post',{id:$("#txtDeleteElement").val()},function(response){
				var status=$.parseJSON(response);
				if(status.status==1){
					//formulario.clearFrm();
					//$("#exampleModal").modal('hide');
					$('#datatable-basic').DataTable().ajax.reload();
				}
				$("#dlgNotificacion").modal('hide');
					
				notify(status.title,status.message,status.type);
			})
	    }
	    $('#datatable-basic tbody').on('dblclick', 'tr', function (e) {
	        var data = table.row( this ).data();
	        form=formulario=form.setId("frmCrud");
	        form.fillFrm(data);
	        $("#dlgCrud").modal('show');
	         
	        
	    } );
	    /*termina ELEMENTOS DE ELIMINACION*/

	    /*footer metodos de footer*/
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
	  

	});
</script>