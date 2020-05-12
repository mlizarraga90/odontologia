
<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
	<button class="btn btn-primary button" type="button" id="openModal">NUEVO</button>
</div>
<div class="table-responsive py-4">
	<table class="table table-flush" id="tblLineas">
		<thead class="thead-light">
			<tr>
				<th>Descripcion</th>
				<th>Fecha registro</th> 
				<th>Eliminar</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>descripcion</th>
				<th>Fecha registro</th>
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
				<h5 class="modal-title" id="exampleModalLabel">LINEAS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="frmGrupo">
					<div class="row">
						<div class="">
							<label for="txtId" class="form-control-label"></label>
							<input type="hidden" class="form-control form-control-sm" placeholder="" id="txtId" name="id">
						</div>
						<div class="col-lg-12">
							<label for="txtDescripcion" class="form-control-label">Descripción</label>
							<input type="text" class="form-control form-control-sm" placeholder="DESCRIPCIÓN" id="txtDescripcion" name="descripcion">
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
<script src="/boutique/assets/js/catalogos/lineas.js"></script>