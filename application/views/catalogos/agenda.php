<?php $this->load->view('header');?>
<style>
	#dicCancelacion{display: none;}
	.form-group label{color:#8898aa!important;}
	#btnConcultar{float: right;}
	.groupContainer{text-align: center;}
	.swal2-container{z-index:12000;}
</style>

<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>

<div class="table-responsive ">
	<div class="row">
	 		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				    <label class="form-control-label" for="cmdConsul" style="color:white;">Consultorio</label>
				    <select class="form-control" id="cmdConsul" name="idConsultorio">

				    	<?php
				    		if(isset($consultorios[0]->id)){
				    			echo '<option value="-1">Selecciona una opción</option>';
				    			foreach($consultorios as $row){
					    			echo '<option value="'.$row->id.'">'.$row->consultorio.'</option>';
					    		}
				    		}
				    		
				    	?>

				    </select>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
				    <label class="form-control-label" for="cmdStauts" style="color:white;">Status</label>
				    <select class="form-control" id="cmdStauts" name="idConsultorio">
				    	<option value="-1">Todos</option>
				    	<option value="1">PENDIENTES</option>
				    	<option value="0">CANCELADAS</option>
				    	<option value="2">TERMINADAS</option>
				    	
				    </select>
				</div>
			</div>

			<div class="col-xl-12 mb-12 mb-xl-12">
				<div class="row">
					<div class=" col-lg-9   col-md-9  col-sm-8  col-xs-6 ">&nbsp;</div>
					<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
						<button class="btn btn-primary button" type="button" id="btnActulizarAgenda">ACTUALIZAR</button>
					</div>	
				</div>
				
				<div class="card card-calendar">
			    <!-- Card header -->
				    <div class="card-header">
				       <div id='calendar'></div>
				   	</div>
			    <!-- Card body -->
				    <div class="card-body p-0">
				    	<div class="calendar" data-toggle="calendar" id="calendar"></div>
				    </div>
				</div>
			</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="dlgCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="frmCita">
					<input type="hidden" id="idCita"/>
		           	<div class="row">
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtNombre">Nombre</label>
		                        <input class="form-control" name="nombre" type="text"  id="txtNombre" >
		                    </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtApellidos">Apellidos</label>
		                        <input class="form-control" name="apellidos" type="text"  id="txtApellidos" >
		                    </div>
		                </div>
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtCelular">Celular</label>
		                        <input class="form-control" name="celular" type="text"  id="txtCelular" >
		                    </div>
		                </div>
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 groupContainer">
		                	<label class="form-control-label d-block mb-3 btn-group">Marcar como</label>
	                      	<div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
	                        	<label class="btn bg-warning" data-toggle="tooltip" title="CANCELADA"><input type="radio" data-status="0" name="event-tag" value="bg-warning" autocomplete="off"></label>
	                        	<label class="btn bg-success" data-toggle="tooltip" title="TERMINADA"><input type="radio" data-status="2"  name="event-tag" value="bg-success" autocomplete="off"></label>
	                      	</div>
		                </div>
		                <div class=" col-lg-12   col-md-12  col-sm-12  col-xs-12">
							<button class="btn btn-primary button" type="button" id="btnConcultar">CONSULTAR</button>
						</div>
						
						<div class=" col-lg-12   col-md-12  col-sm-12  col-xs-12" id="dicCancelacion">
			                <label class="form-control-label" for="exampleFormControlTextarea2">Motivo cancelación</label>
			                <textarea class="form-control"  rows="3" resize="none" id="txtRazon"></textarea>
			            </div>
		            </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
				<button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>
