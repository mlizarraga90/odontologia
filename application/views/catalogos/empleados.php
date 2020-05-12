<?php $this->load->view('header');?>
<style>
	table{width:100%;}
</style>
<div class="row">
	<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
	<div class=" col-lg-3   col-md-3  col-sm-4  col-xs-6 ">
		<button class="btn btn-primary button" type="button" id="openModal">NUEVO</button>
	</div>	
</div>

<div class="table-responsive py-4">
	<table class="table table-flush" id="tblEmpleados">
		<thead class="thead-light">
			<tr>
				<th>Nombre</th>
				<th>Cedula</th>
				<th>Consultorio</th>
				<th>Especialidad</th>
				<th></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Nombre</th>
				<th>Cedula</th>
				<th>Consultorio</th>
				<th>Especialidad</th>
				<th></th>
			</tr>
		</tfoot>
		<tbody></tbody>
	</table>
</div>
<!-- Modal  consultorios-->
<div class="modal fade" id="dlgEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="frmEmpleado">
           	<div class="row">
                <input class="form-control" name="idOrganizacion" type="hidden"  id="txtIdOrganizacion" value="<?php echo (isset($organizacion[0]->id))?$organizacion[0]->id:'';?>">
                <input class="form-control" name="id" type="hidden"  id="txtId" >
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtNombre">Nombre</label>
							        <input class="form-control" name="nombre" type="text"  id="txtNombre">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtPpATERNO">Apellido paterno</label>
							        <input class="form-control" name="pPaterno" type="text"  id="txtPpATERNO">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtPmATERNO">Apellido materno</label>
							        <input class="form-control" name="pMaterno" type="text"  id="txtPmATERNO">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
					                <label class="form-control-label" for="cmdCargos">Cargo</label>
					                <select class="form-control" id="cmdCargos" name="idCargoMedico">
					                    <option value="-1">Seleccione un cargo</option>
					                    <?php
					                      	if(isset($cargos[0]->value)){
					                      		foreach($cargos as $row){
					                      			echo '<option value="'.$row->value.'">'.$row->text.'</option>';
					                      		}
					                      	}
					                    ?>
					                </select>
					           	</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
					                <label class="form-control-label" for="cmdEspecialidad">Especialidad</label>
					                <select class="form-control" id="cmdEspecialidad" name="idEspecialidad">
					                    <option value="-1">Seleccione un consultorio</option>
					                    <?php
					                      	if(isset($especialidades[0]->value)){
					                      		foreach($especialidades as $row){
					                      			echo '<option value="'.$row->value.'">'.$row->text.'</option>';
					                      		}
					                      	}
					                    ?>
					                </select>
					           	</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
					                <label class="form-control-label" for="cmdConcultorio">Consultorio</label>
					                <select class="form-control" id="cmdConcultorio" name="idConsultorio">
					                    <option value="-1">Seleccione un consultorio</option>
					                    <?php
					                      	if(isset($consultorios[0]->value)){
					                      		foreach($consultorios as $row){
					                      			echo '<option value="'.$row->value.'">'.$row->text.'</option>';
					                      		}
					                      	}
					                    ?>
					                </select>
					           	</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtTel">Teléfono</label>
							        <input class="form-control" name="telefono" type="text"  id="txtTel">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtCelular">Celular</label>
							        <input class="form-control" name="celular" type="text"  id="txtCelular">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtCorreo">Correo</label>
							        <input class="form-control" name="correo" type="email"  id="txtCorreo">
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
							        <label class="form-control-label" for="txtCedula">Cedula profesional</label>
							        <input class="form-control" name="cedula" type="text"  id="txtCedula">
							    </div>
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