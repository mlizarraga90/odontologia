<?php $this->load->view('header');?>
<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
	<button class="btn btn-primary button" type="button" id="openModal">NUEVO</button>
</div>
<div class="table-responsive py-4">
	<table class="table table-flush" id="tblProveedores">
		<thead class="thead-light">
			<tr>
				<th>Nombre</th>
				<th>RFC</th> 
				<th>Razón social</th>
				<th>Contacto</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Nombre</th>
				<th>RFC</th> 
				<th>Razón social</th>
				<th>Contacto</th>
				<th></th>
			</tr>
		</tfoot>
		<tbody></tbody>
	</table>
</div>
<!-- Modal -->
<div class="modal fade" id="dlgCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">PROVEEDORES</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="frmProveedores">
					<div class="row">
						<div class="">
							<label for="txtId" class="form-control-label"></label>
							<input type="hidden" class="form-control form-control-sm" placeholder="" id="txtId" name="id">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="txtNombreComercial" class="form-control-label">Nombre comercial</label>
							<input type="text" class="form-control form-control-sm" placeholder="Nombre comercial" id="txtNombreComercial" name="nombreComercial">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
							<label for="txtRazon" class="form-control-label">Razón social</label>
							<input type="text" class="form-control form-control-sm" placeholder="Razón social" id="txtRazon" name="razonSocial">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
							<label for="txtRfc" class="form-control-label">RFC</label>
							<input type="text" class="form-control form-control-sm" placeholder="RFC" id="txtRfc" name="rfc">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="txtDomicilio" class="form-control-label">Domicilio</label>
							<input type="text" class="form-control form-control-sm" placeholder="Domicilio" id="txtDomicilio" name="domicilio">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtCp" class="form-control-label">Codigo postal</label>
							<input type="text" class="form-control form-control-sm" placeholder="Codigo postal" id="txtCp" name="cp">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtCiudad" class="form-control-label">Ciudad</label>
							<input type="text" class="form-control form-control-sm" placeholder="Ciudad" id="txtCiudad" name="ciudad">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtEdo" class="form-control-label">Estado</label>
							<input type="text" class="form-control form-control-sm" placeholder="Estado" id="txtEdo" name="estado">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtTel" class="form-control-label">Teléfono</label>
							<input type="text" class="form-control form-control-sm" placeholder="Teléfono" id="txtTel" name="telefono">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtCorreo" class="form-control-label">Correo</label>
							<input type="email" class="form-control form-control-sm" placeholder="Correo" id="txtCorreo" name="correo">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label for="txtFax" class="form-control-label">Fax</label>
							<input type="text" class="form-control form-control-sm" placeholder="Fax" id="txtFax" name="fax">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="txtContacto" class="form-control-label">Contacto</label>
							<input type="text" class="form-control form-control-sm" placeholder="Contacto" id="txtContacto" name="contacto">
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
<?php $this->load->view('footer');?>
<script src="/boutique/assets/js/catalogos/proveedores.js"></script>