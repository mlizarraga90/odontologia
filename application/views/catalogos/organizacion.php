<?php $this->load->view('header');?>
<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
<div class="table-responsive py-4">
	<form id="frmOrganizacion">
	 	<div class="row">
	 			<input class="form-control" name="id" type="hidden"  id="txtId">
	  		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
			        <label class="form-control-label" for="txtNombre">Nombre</label>
			        <input class="form-control" name="nombre" type="text"  id="txtNombre" >
			    </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
			        <label class="form-control-label" for="txtDiraccion">Dirección</label>
			        <input class="form-control" name="direccion" type="text"  id="txtDiraccion" >
			    </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
		               <label class="form-control-label" for="cmdEdo">Estado</label>
		               <select class="form-control" id="cmdEdo" name="idEstado"></select>
		          	</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
		               <label class="form-control-label" for="cmdMunicipio">Municipio</label>
		               <select class="form-control" id="cmdMunicipio" name="idMunicipio"></select>
		          	</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
			        <label class="form-control-label" for="txtNumEmpleados">Número empleados</label>
			        <input class="form-control" name="numEmpleados" type="number"  id="txtNumEmpleados" >
			    </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
		               <label class="form-control-label" for="cmdTipoOrganizacion">Tipo organización</label>
		               <select class="form-control" id="cmdTipoOrganizacion" name="tipoOrganizacion"> </select>
		          	</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
			        <label class="form-control-label" for="txtTel">Teléfono</label>
			        <input class="form-control" name="telefono" type="text"  id="txtTel" >
			    </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
			        <label class="form-control-label" for="txtCelular">Celular</label>
			        <input class="form-control" name="celular" type="text"  id="txtCelular" >
			    </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
			        <label class="form-control-label" for="txtCorreo">Correo</label>
			        <input class="form-control" name="correo" type="email"  id="txtCorreo" >
			    </div>
			</div>
		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			    <br>
			   	<button class="btn btn-primary right" type="button" id="btnGuardar">GUARDAR</button>
			</div>
	 	</div>
	</form>
</div>
<?php $this->load->view('footer');?>