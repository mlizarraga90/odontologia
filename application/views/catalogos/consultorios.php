<?php $this->load->view('header');?>
<style>
	table{width:100%;}
</style>
<div class="row">
	<div class="col-lg-9   col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
	<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
		<button class="btn btn-primary button" type="button" id="openModal">NUEVO</button>
	</div>	
</div>

<div class="table-responsive py-4">
	<table class="table table-flush" id="tblGrupos">
		<thead class="thead-light">
			<tr>
				<th>Consultorio</th>
				<th>Municipio</th>
				<th>Encargado</th>
				<th></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Consultorio</th>
				<th>Municipio</th>
				<th>Encargado</th>
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
				<h5 class="modal-title" id="exampleModalLabel">CONSULTORIO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="frmConsultorio">
		           	<div class="row">
		                <input class="form-control" name="idOrganizacion" type="hidden"  id="txtIdOrganizacion" value="0" >
		                <input class="form-control" name="id" type="hidden"  id="txtId" >
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtNombre">Nombre consultorio</label>
		                        <input class="form-control" name="consultorio" type="text"  id="txtNombre" >
		                    </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtDiraccion">Dirección</label>
		                        <input class="form-control" name="direccion" type="text"  id="txtDiraccion" >
		                    </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                            <label class="form-control-label" for="cmdEdo">Estado</label>
		                            <select class="form-control" id="cmdEdo" name="idEstado">
		                               
		                                
		                            </select>
		                        </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="cmdMunicipio">Municipio</label>
		                        <select class="form-control" id="cmdMunicipio" name="idMunicipio"></select>
		                  </div>
		                </div>
		                
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="cmdMunicipio">Encargado</label>
		                        <select class="form-control" id="cmdEncargado" name="idEncargado"></select>
		                  </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtPrecio">Costo consulta</label>
		                        <input class="form-control" name="precioConsulta" type="text"  id="txtPrecio" >
		                  </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtTel">Télefono</label>
		                        <input class="form-control" name="telefono" type="text"  id="txtTel" >
		                    </div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtCelular">Celular</label>
		                        <input class="form-control" name="celular" type="text"  id="txtCelular" >
		                    </div>
		                </div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                  <div class="form-group">
		                        <label class="form-control-label" for="txtCorreo">Correo</label>
		                        <input class="form-control" name="correo" type="text"  id="txtCorreo" >
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
<?php $this->load->view('footer');?>