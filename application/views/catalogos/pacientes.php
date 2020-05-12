<?php $this->load->view('header');?>
<style>
	.card {
		border: 1px solid #eaf0f7;
	}
	#btnGuardar{float:right;}
	#frmPaciente{display:none;}
</style>
<div class="row">
	<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
	<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
		<button class="btn btn-primary button" type="button" id="openModal">NUEVO</button>
	</div>	
</div>

<div class="table-responsive py-4">
<div id="tblContainer">
	<table class="table table-flush" id="tblPacientes">
		<thead class="thead-light">
			<tr>
				<th>Nombre</th>
				<th>Sexo</th>
				<th>Celular</th>
				<th></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Nombre</th>
				<th>Sexo</th>
				<th>Celular</th>
				<th></th>
			</tr>
		</tfoot>
		<tbody></tbody>
	</table>
</div>
	<form id="frmPaciente">
		
			<div class="accordion" id="accordionExample">
			    <div class="card">
			        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			            <h5 class="mb-0">INFORMACIÓN GENERAL</h5>
			        </div>
			        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			            <div class="card-body">
					<div class="row">
			            		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				            		<input type="hidden" id="txtIdPaciente" name="id"/>
									<label for="txtNombre" class="form-control-label">Nombre</label>
									<input type="text" class="form-control form-control-sm" placeholder="Nombre" id="txtNombre" name="nombre">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtAPaterno" class="form-control-label">Apellido paterno</label>
									<input type="text" class="form-control form-control-sm" placeholder="Apellido paterno" id="txtAPaterno" name="aPaterno">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtAMaterno" class="form-control-label">Apellido materno</label>
									<input type="text" class="form-control form-control-sm" placeholder="Apellido materno" id="txtAMaterno" name="aMaterno">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                	<div class="form-group">
				                        <label class="form-control-label" for="cmdSexo">Sexo</label>
				                        <select class="form-control form-control-sm" id="cmdSexo" name="sexo">
				                        	<option value="-1">Seleccione una opción</option>
											<option value="1">Hombre</option>
											<option value="2">Mujer</option>				                        	        
				                        </select>
				                  	</div>
				                </div>
				                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				                	<div class="form-group">
				                		<label class="form-control-label" for="txtFechaNacimiento">Fecha nacimiento</label>
									    <div class="input-group">
									        <div class="input-group-prepend">
									            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
									        </div>
									        <input class="form-control form-control-sm datepicker" id="txtFechaNacimiento" placeholder="Fecha nacimiento" type="text" value="" name="fechaNacimiento">
									    </div>
									</div>
				                </div>
				                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                	<div class="form-group">
				                        <label class="form-control-label" for="cmdEdoCivil">Estado civil</label>
				                        <select class="form-control form-control-sm" id="cmdEdoCivil" name="edoCivil">
				                        	<option value="-1">Seleccione una opción</option>
				                        	<option value="1">Soltero(a)</option>
											<option value="2">Casado(a)</option>	
											<option value="3">Divorciado(a)</option>
											<option value="4">Viudo(a)</option>					                        	        
				                        </select>
				                  	</div>
				                </div>
				                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<label for="txtTel" class="form-control-label">Edad</label>
									<input type="text" class="form-control form-control-sm" placeholder="Edad" id="txtEdad" name="">
								</div>
				                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtTel" class="form-control-label">Teléfono</label>
									<input type="text" class="form-control form-control-sm" placeholder="Teléfono" id="txtTel" name="telefono">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtCelular" class="form-control-label">Celular</label>
									<input type="text" class="form-control form-control-sm" placeholder="Celular" id="txtCelular" name="celular">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtOcupacion" class="form-control-label">Ocupación</label>
									<input type="text" class="form-control form-control-sm" placeholder="Ocupación" id="txtOcupacion" name="ocupacion">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtNomEsposo" class="form-control-label">Nom. esposo(a)</label>
									<input type="text" class="form-control form-control-sm" placeholder="Nom. esposo(a)" id="txtNomEsposo" name="nomEsposo">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtNomPadre" class="form-control-label">Nom. padre</label>
									<input type="text" class="form-control form-control-sm" placeholder="Nom. padre" id="txtNomPadre" name="nomPadre">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtNomMadre" class="form-control-label">Nom. madre</label>
									<input type="text" class="form-control form-control-sm" placeholder="Nom. madre" id="txtNomPadre" name="nomMadre">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<label for="txtDireccion" class="form-control-label">Dirección</label>
									<input type="text" class="form-control form-control-sm" placeholder="Dirección" id="txtDireccion" name="direccion">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<label for="txtCp" class="form-control-label">Cp</label>
									<input type="text" class="form-control form-control-sm" placeholder="Cp" id="txtCp" name="cp">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
							            <label class="form-control-label" for="cmdEdo">Estado</label>
							            <select class="form-control form-control-sm" id="cmdEdo" name="idEstado"></select>
							        </div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
							    	    <label class="form-control-label" for="cmdMunicipio">Municipio</label>
							    	    <select class="form-control form-control-sm" id="cmdMunicipio" name="idMunicipio"></select>
							    	</div>
			            		</div>
			            </div>

			            </div>
			        </div>
				
			  </div>
			    <div class="row">
				<div class=".d-block .d-sm-none col-xs-12">&nbsp;</div>

				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="button" class="btn btn-primary" id="btnRegresar">REGRESAR</button></div>
				<div class=".d-block .d-sm-none col-xs-12">&nbsp;</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="button" class="btn btn-primary" id="btnAgregar">GUARDAR</button></div>
				<div class=".d-block .d-sm-none  col-xs-12">&nbsp;</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><button type="button" class="btn btn-primary" id="btnVerHisotrial">HISTORIAL</button></div>
			   </div>
			</div>
		
	</form>
</div>
<?php $this->load->view('footer');?>