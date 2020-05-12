<?php $this->load->view('header');?>
<?php $this->load->view('catalogos/historialClinicoDetails');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/boostraptags.css">
<style>
	
</style>


<div class="table-responsive py-4">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="divConsultar">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4>CONSULTAR</h4>
		</div>

		<div class="accordion" id="accordionExample">
		    <div class="card">
		        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		            <h5 class="mb-0">INFORMACIÓN PERSONAL</h5>
		        </div>
		        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
		            <div class="card-body">
		            	<form id="frmInfoPaciente">
		            		<div class="row">
			            		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtNombre">Nombre</label>
					                <input type="hidden" id="txtIdPaciente" name="id" value="<?php echo $idPaciente;?>"/>
					                <input type="text" class="form-control" id="txtNombre" placeholder="Nombre" name="nombre" value="<?php echo isset($paciente[0]->nombre)?$paciente[0]->nombre:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtApellido">Apellidos</label>
					                <input type="text" class="form-control" id="txtApellido" placeholder="Apellidos" name="apellidos" value="<?php echo isset($paciente[0]->apellidos)?$paciente[0]->apellidos:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtApodo">Apodo</label>
					                <input type="text" class="form-control" id="txtApodo" placeholder="Apodo" name="apodo" value="<?php echo isset($paciente[0]->apodo)?$paciente[0]->apodo:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtEdad">Edad</label>
					                <input type="text" class="form-control" id="txtEdad" placeholder="Edad" name="edad" value="<?php echo isset($paciente[0]->edad)?$paciente[0]->edad:''?>">
					              </div>
					            </div>
					            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdSexo">Género</label>
							            <select class="form-control form-control-sm" id="cmdSexo" name="sexo" >
							               	<option value="-1">Seleccione una opción</option>
							               	<option value="1" <?php echo (isset($paciente[0]->sexo) && $paciente[0]->sexo==1)?'selected="selected"':'';?>>Hombre</option>
											<option value="2" <?php echo (isset($paciente[0]->sexo) && $paciente[0]->sexo==2)?'selected':'';?>>Mujer</option>	
						                </select>
						           	</div>
					       		</div>
					       		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtPasa">Pasatiempo</label>
					                <input type="text" class="form-control" id="txtPasa" placeholder="Pasatiempo" name="pasatiempo" value="<?php echo isset($paciente[0]->pasatiempo)?$paciente[0]->pasatiempo:''?>">
					              </div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<div class="form-group">
							            <label class="form-control-label" for="cmdEdoNaci">Estado</label>
							                <select class="form-control form-control-sm" id="cmdEdoNaci" name="idEdoNaci" >
							                   	<?php
							                  		$selected="";
							                   		$idEdo=(isset($paciente[0]->idEdoNaci))?$paciente[0]->idEdoNaci:0;
							                   		foreach($estados as $row){
							                  			$selected=($idEdo==$row->value)?'selected="selected"':'';
							                   			echo '<option value="'.$row->value.'" '.$selected.'>'.$row->text.'</option>';
							                   		}
							                   	?>
							                </select>
							        </div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdMunicipioNaci">Municipio</label>
							            <select class="form-control form-control-sm" id="cmdMunicipioNaci" name="idMuniNaci" >
							               	<?php
							              		$selected="";
							               		$idMunicipio=(isset($paciente[0]->idMuniNaci))?$paciente[0]->idMuniNaci:0;
							               		foreach($municipios as $row){
							              			$selected=($idMunicipio==$row->value)?'selected="selected"':'';
							               			echo '<option value="'.$row->value.'" '.$selected.'>'.$row->text.'</option>';
							               		}
							               	?>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
			                     	<div class="form-group">
			                        	<label class="form-control-label" for="txtFechaNacimiento">Fecha nacimiento</label>
			                        	<input class="form-control datepicker" id="txtFechaNacimiento" placeholder="" type="text" name="fechaNacimiento" value="<?php echo isset($paciente[0]->fechaNacimiento)?$paciente[0]->fechaNacimiento:''?>">
			                      	</div>
			                    </div>
			                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtNombreTutor">Nombre padre/tutor</label>
					                <input type="text" class="form-control" id="txtNombreTutor" placeholder="padre/tutor" name="nomPadreTutor" value="<?php echo isset($paciente[0]->nomPadreTutor)?$paciente[0]->nomPadreTutor:''?>">
					              </div>
					            </div>
					            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<div class="form-group">
							            <label class="form-control-label" for="cmdEdoDire">Estado</label>
							                <select class="form-control form-control-sm" id="cmdEdoDire" name="idEdoDire" >
							                   	<?php
							                  		$selected="";
							                   		$idEdo=(isset($paciente[0]->idEdoDire))?$paciente[0]->idEdoDire:0;
							                   		foreach($estados as $row){
							                  			$selected=($idEdo==$row->value)?'selected="selected"':'';
							                   			echo '<option value="'.$row->value.'" '.$selected.'>'.$row->text.'</option>';
							                   		}
							                   	?>
							                </select>
							        </div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdMunicipioDire">Municipio</label>
							            <select class="form-control form-control-sm" id="cmdMunicipioDire" name="idMuniDire" >
							               	<?php
							              		$selected="";
							               		$idMunicipio=(isset($paciente[0]->idMuniDire))?$paciente[0]->idMuniDire:0;
							               		foreach($municipios as $row){
							              			$selected=($idMunicipio==$row->value)?'selected="selected"':'';
							               			echo '<option value="'.$row->value.'" '.$selected.'>'.$row->text.'</option>';
							               		}
							               	?>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtDireccion">Dirección</label>
					                <input type="text" class="form-control" id="txtDireccion" placeholder="Dirección" name="direccion" value="<?php echo isset($paciente[0]->direccion)?$paciente[0]->direccion:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtOcupacion">Ocupación</label>
					                <input type="text" class="form-control" id="txtOcupacion" placeholder="Ocupación" name="ocupacion" value="<?php echo isset($paciente[0]->ocupacion)?$paciente[0]->ocupacion:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtTel">Teléfono</label>
					                <input type="text" class="form-control" id="txtTel" placeholder="Teléfono" name="telefono" value="<?php echo isset($paciente[0]->telefono)?$paciente[0]->telefono:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtCelular">Celular</label>
					                <input type="text" class="form-control" id="txtCelular" placeholder="Celular" name="celular" value="<?php echo isset($paciente[0]->celular)?$paciente[0]->celular:''?>">
					              </div>
					            </div>
					            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdNumHijos">Núm. hijos</label>
							            <select class="form-control form-control-sm" id="cmdNumHijos" name="numHijos" >
							               	<?php
							              		$selected="";
							               		$numHijos=(isset($paciente[0]->numHijos))?$paciente[0]->numHijos:0;
							               		for($i=0;$i<10;$i++){
							              			$selected=($numHijos==$i)?'selected="selected"':'';
							               			echo '<option value="'.$i.'" '.$selected.'>'.$i.'	</option>';
							               		}
							               	?>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtLugarOcupa">Lugar que ocupa</label>
					                <input type="text" class="form-control" id="txtLugarOcupa" placeholder="Lugar que ocupa" name="lugarOcupa" value="<?php echo isset($paciente[0]->lugarOcupa)?$paciente[0]->lugarOcupa:''?>">
					              </div>
					            </div>
					            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdVive">Vive con</label>
							            <select class="form-control form-control-sm" id="cmdVive" name="viveCon" >
							               	<option value="1">Padre</option>
							               	<option value="2">Madre</option>
							               	<option value="3">Ambos</option>
							               	<option value="4">Otros</option>
							            </select>
							        </div>
					            </div>
		            		</div>
		            	</form>
		            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
							<button type="button" class="btn btn-primary" id="btnSaveInfoPaciente">GUARDAR</button>
						</div>
		            </div>
		        </div>
		  	</div>
		</div>

		<div class="accordion" id="tabExplo">
		    <div class="card">
		        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#exploRegional" aria-expanded="true" aria-controls="exploRegional">
		            <h5 class="mb-0">ANTECEDENTES PERSONALES</h5>
		        </div>
		        <div id="exploRegional" class="collapse show" aria-labelledby="headingOne" data-parent="#tabExplo">
		            <div class="card-body">
		            	<form id="frmAntecedentes">
		            		<div class="row">
		            			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtPadeceSindrome">¿Padece algún sindrome o enfermedad?</label>
					                	<textarea class="form-control" id="txtPadeceSindrome" rows="3" resize="none" name="sindromeDescripcion" value="<?php echo isset($antecedentes[0]->sindromeDescripcion)?$antecedentes[0]->sindromeDescripcion:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtHospitalizado">¿Ha estado hospitalizado?</label>
					                	<textarea class="form-control" id="txtHospitalizado" rows="3" resize="none" name="hospitaDescripcion" value="<?php echo isset($antecedentes[0]->hospitaDescripcion)?$antecedentes[0]->hospitaDescripcion:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtOperado">¿Ha sido operado?</label>
					                	<textarea class="form-control" id="txtOperado" rows="3" resize="none" name="operadoDescripcion" value="<?php echo isset($antecedentes[0]->operadoDescripcion)?$antecedentes[0]->operadoDescripcion:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtAlergia">¿Padece alergías?</label>
					                	<textarea class="form-control" id="txtAlergia" rows="3" resize="none" name="alergiasDescripcion" value="<?php echo isset($antecedentes[0]->alergiasDescripcion)?$antecedentes[0]->alergiasDescripcion:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtMedico">¿Actualmente se encuentra bajo tratamiento médico?</label>
					                	<textarea class="form-control" id="txtMedico" rows="3" resize="none" name="tratamientoDescripcion" value="<?php echo isset($antecedentes[0]->tratamientoDescripcion)?$antecedentes[0]->tratamientoDescripcion:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="custom-control custom-checkbox mb-6">
					            	<label class="form-control-label">¿Esquema de vacunación completo?</label>
			                        <input class="custom-control-input" id="cmdVacunacion" type="checkbox" checked="" name="vacunacionCompleto"></br>
			                        <label class="custom-control-label" for="cmdVacunacion" style="float: right;">Sí</label>
			                    </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtTratamientoDental">¿Ha recibido tratamiento dental?</label>
					                	<textarea class="form-control" id="txtTratamientoDental" rows="3" resize="none" name="tratamientoDentalDes" value="<?php echo isset($antecedentes[0]->tratamientoDentalDes)?$antecedentes[0]->tratamientoDentalDes:''?>"></textarea>
					              	</div>
					            </div>
			                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdConducta">¿Cómo fue la conducta del niño?</label>
							            <select class="form-control form-control-sm" id="cmdConducta" name="conductaNino" >
							               	<option value="1">Buena</option>
							               	<option value="2">Regular</option>
							               	<option value="3">Mala</option>
							            </select>
							        </div>
					            </div>
		            		</div>
		            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					            <div class="form-group">
					               	<label class="form-control-label" for="txtPadeActual">Padecimiento actual</label>
					               	<textarea class="form-control" id="txtPadeActual" rows="3" resize="none" name="padecimientoActual" value="<?php echo isset($antecedentes[0]->padecimientoActual)?$antecedentes[0]->padecimientoActual:''?>"></textarea>
					            </div>
					        </div>
		            	</form>
		            	<div class="row">
		            		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">&nbsp;</div>
			            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
								<button type="button" class="btn btn-primary" id="btnSaveAntecedentes">GUARDAR</button>
							</div>
		            	</div>
		            </div>
		        </div>
		  	</div>
		</div>


		<div class="accordion" id="TABhIGIENE">
		    <div class="card">
		        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#higieneOral" aria-expanded="true" aria-controls="higieneOral">
		            <h5 class="mb-0">HÁBITOS E HIGIENE ORAL</h5>
		        </div>
		        <div id="higieneOral" class="collapse show" aria-labelledby="headingOne" data-parent="#TABhIGIENE">
		            <div class="card-body">
		            	<form id="frmAntecedentes">
		            		<div class="row">
		            			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdCepilla">¿Cúantas veces al día se cepilla los dientes?</label>
							            <select class="form-control form-control-sm" id="cmdCepilla" name="numCepilla" >
							               	<option value="1">1</option>
							               	<option value="2">2</option>
							               	<option value="3">3</option>
							               	<option value="4">4</option>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdAyuda">¿Con ayuda?</label>
							            <select class="form-control form-control-sm" id="cmdAyuda" name="conAyuda" >
							               	<option value="1">Sí</option>
							               	<option value="2">No</option>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdUtiliEnjuague">¿Utiliza hilo dental y/o enjuague?</label>
							            <select class="form-control form-control-sm" id="cmdUtiliEnjuague" name="utiliEnjuaHilo" >
							               	<option value="1">Sí</option>
							               	<option value="2">No</option>
							            </select>
							        </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							       	<div class="form-group">
							            <label class="form-control-label" for="cmdHabitoTiene">¿Tiene algún hábito?</label>
							            <input class="custom-control-input" id="cmdHabitoTiene" type="checkbox"  value="1" name="tieneHabito"></br>
			                        	<label class="custom-control-label" for="cmdHabitoTiene" style="float: right;">Sí</label>
							        </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtDuracion">Duración</label>
					                <input type="text" class="form-control" id="txtDuracion" placeholder="Duración" name="duracion" value="<?php echo isset($paciente[0]->duracion)?$paciente[0]->duracion:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtIntensidad">Intensidad</label>
					                <input type="text" class="form-control" id="txtIntensidad" placeholder="Intensidad" name="intencidad" value="<?php echo isset($paciente[0]->intencidad)?$paciente[0]->intencidad:''?>">
					              </div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtFrecuencia">Freciencia</label>
					                <input type="text" class="form-control" id="txtFrecuencia" placeholder="Freciencia" name="frecuencia" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            	<?php
					            		foreach($habitos as $habito){
					            			echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 custom-control custom-radio">
												  <input type="radio" id="rdbHabito'.$habito->id.'" name="idHabito" class="custom-control-input" value="'.$habito->id.'">
												  <label class="custom-control-label" for="rdbHabito'.$habito->id.'">'.$habito->descripcion.'</label>
												
					            			</div>';
					            		}
					            	?>
					            </br>
					            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					            	<h4>Tipo de alimentación más común</h4>
					            </div>
		            			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtDesayuno">Desayuno</label>
					                	<textarea class="form-control" id="txtDesayuno" rows="3" resize="none" name="habitoDesayuno" value="<?php echo isset($antecedentes[0]->habitoDesayuno)?$antecedentes[0]->habitoDesayuno:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtLunch">Lunch</label>
					                	<textarea class="form-control" id="txtLunch" rows="3" resize="none" name="habitoLunch" value="<?php echo isset($antecedentes[0]->habitoLunch)?$antecedentes[0]->habitoLunch:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtComida">Comida</label>
					                	<textarea class="form-control" id="txtComida" rows="3" resize="none" name="habitoComida" value="<?php echo isset($antecedentes[0]->habitoComida)?$antecedentes[0]->habitoComida:''?>"></textarea>
					              	</div>
					            </div>
					            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					            	<div class="form-group">
					                	<label class="form-control-label" for="txtCena">Cena</label>
					                	<textarea class="form-control" id="txtCena" rows="3" resize="none" name="habitoCena" value="<?php echo isset($antecedentes[0]->habitoCena)?$antecedentes[0]->habitoCena:''?>"></textarea>
					              	</div>
					            </div>

					            
		            	</form>
		            	<div class="row">
		            		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">&nbsp;</div>
			            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
								<button type="button" class="btn btn-primary" id="btnSaveAntecedentes">GUARDAR</button>
							</div>
		            	</div>
		            </div>
		        </div>
		  	</div>
		</div>


		<div class="accordion" id="tabExploOral">
		    <div class="card">
		        <div class="card-header" id="exploraOral" data-toggle="collapse" data-target="#exploOral" aria-expanded="true" aria-controls="exploOral">
		            <h5 class="mb-0">EXPLORACIÓN ORAL POR REGIONES</h5>
		        </div>
		        <div id="exploOral" class="collapse show" aria-labelledby="exploraOral" data-parent="#tabExploOral">
		            <div class="card-body">
		            	<form id="frmExploOral">
		            		<div class="row">
		            			
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtLabios">Labios</label>
					                <input type="text" class="form-control" id="txtLabios" placeholder="Labios" name="labios" value="<?php echo isset($paciente[0]->labios)?$paciente[0]->labios:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtPisoBoca">Piso de boca</label>
					                <input type="text" class="form-control" id="txtPisoBoca" placeholder="Piso de boca" name="pisoBoca" value="<?php echo isset($paciente[0]->intencidad)?$paciente[0]->intencidad:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtLengua">Lengua</label>
					                <input type="text" class="form-control" id="txtLengua" placeholder="Lengua" name="lengua" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtPalaBlando">Paladar blando</label>
					                <input type="text" class="form-control" id="txtPalaBlando" placeholder="Paladar blando" name="palaBlando" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtPalaDuro">Paladar duro</label>
					                <input type="text" class="form-control" id="txtPalaDuro" placeholder="Paladar duro" name="palaDuro" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtAmigdalas">Amígdalas</label>
					                <input type="text" class="form-control" id="txtAmigdalas" placeholder="Amígdalas" name="amigdalas" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtCarrillos">Carrillos</label>
					                <input type="text" class="form-control" id="txtCarrillos" placeholder="Carrillos" name="carrillos" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					              <div class="form-group">
					                <label class="form-control-label" for="txtFondoSaco">Fondo de saco</label>
					                <input type="text" class="form-control" id="txtFondoSaco" placeholder="Fondo de saco" name="fondoSaco" value="<?php echo isset($paciente[0]->frecuencia)?$paciente[0]->frecuencia:''?>">
					              </div>
					            </div>
					            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					              <div class="form-group">
					                <label class="form-control-label" for="txtObservaciones">Observaciones</label>
					                <textarea class="form-control" id="txtObservaciones" rows="3" resize="none" name="observaciones" value="<?php echo isset($antecedentes[0]->habitoCena)?$antecedentes[0]->habitoCena:''?>"></textarea>
					              </div>
					            </div>
		            	</form>
		            	<div class="row">
		            		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">&nbsp;</div>
			            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
								<button type="button" class="btn btn-primary" id="btnGuardarExploOral">GUARDAR</button>
							</div>
		            	</div>
		            </div>
		        </div>
		  	</div>
		</div>


		<div class="accordion" id="tabExamenDiagnostico">
		    <div class="card">
		        <div class="card-header" id="diagno" data-toggle="collapse" data-target="#examenDiagnostico" aria-expanded="true" aria-controls="examenDiagnostico">
		            <h5 class="mb-0">EXAMEN Y DIAGNÓSTICO DE OCULACIÓN</h5>
		        </div>
		        <div id="examenDiagnostico" class="collapse show" aria-labelledby="diagno" data-parent="#tabExamenDiagnostico">
		            <div class="card-body">
		            	<form id="frmExamen">
		            		<div class="row">
		            			<?php
					            	foreach($examenesDiagnos as $examen){
					            		echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 custom-control custom-radio">
											  <input type="radio" id="rdbExamen'.$examen->id.'" name="idHabito" class="custom-control-input" value="'.$examen->id.'">
											  <label class="custom-control-label" for="rdbExamen'.$examen->id.'">'.$examen->descripcion.'</label>
											
					            		</div>';
					            	}
					            ?>	
					        </div>
		            	</form>
		            	<div class="row">
		            		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">&nbsp;</div>
			            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
								<button type="button" class="btn btn-primary" id="btnGuardarExploOral">GUARDAR</button>
							</div>
		            	</div>
		            </div>
		        </div>
		  	</div>
		</div>

		<div class="accordion" id="tabOdontoGrama">
		    <div class="card">
		        <div class="card-header" id="diagno" data-toggle="collapse" data-target="#odontograma" aria-expanded="true" aria-controls="odontograma">
		            <h5 class="mb-0">ODONTOGRAMA</h5>
		        </div>
		        <div id="odontograma" class="collapse show" aria-labelledby="diagno" data-parent="#tabOdontoGrama">
		            <div class="card-body">
		            	<form id="frmExamen">
		            		<div class="row">
		            			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		            				<table class="table align-items-center" style="border: 1px solid rgba(0,0,0,.05);" id="odontogramaDx">
		            					
		            					<tbody>
		            						<tr>
		            							<td colspan="5" align="center"><b>DX</b></td>
		            						</tr>
		            						<?php
		            							$select='<option value="-1">Selecciona una opción</option>';
		            							foreach($tratamientos as $trata){
		            								$select.='<option value="'.$trata->id.'">'.$trata->descripcion.'</option>';
		            							}
		            							foreach($odontogramaDx as $dx){
		            								echo '<tr idtratamiento='.$dx->id.'>
		            									<td>'.$dx->opc1.'</td>
		            									<td>'.$dx->opc2.'</td>
		            									<td>
		            										<select class="cmdDx form-control form-control-sm">
		            											'.$select.'
		            										</select>
		            									</td>
		            									<td>'.$dx->opc3.'</td>
		            									<td>'.$dx->opc4.'</td>
		            								</tr>';
		            							}
		            						?>
		            					</tbody>
		            				</table>
		            			</div>
		            			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		            				<table class="table align-items-center" style="border: 1px solid rgba(0,0,0,.05);" id="odontogramaTx">
		            					
		            					<tbody>
		            						<tr>
		            							<td colspan="5" align="center"><b>TX</b></td>
		            						</tr>
		            						<?php
		            							$select='<option value="-1">Selecciona una opción</option>';
		            							foreach($tratamientos as $trata){
		            								$select.='<option value="'.$trata->id.'">'.$trata->descripcion.'</option>';
		            							}
		            							foreach($odontogramaTx as $tx){
		            								echo '<tr idtratamiento='.$tx->id.'>
		            									<td>'.$tx->opc1.'</td>
		            									<td>'.$tx->opc2.'</td>
		            									<td>
		            										<select class="cmdTx form-control form-control-sm">
		            											'.$select.'
		            										</select>
		            									</td>
		            									<td>'.$tx->opc3.'</td>
		            									<td>'.$tx->opc4.'</td>
		            								</tr>';
		            							}
		            						?>
		            					</tbody>
		            				</table>
		            			</div>
					        </div>
		            	</form>
		            	<div class="row">
		            		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">&nbsp;</div>
			            	<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
								<button type="button" class="btn btn-primary" id="btnGuardarExploOral">GUARDAR</button>
							</div>
		            	</div>
		            </div>
		        </div>
		  	</div>
		</div>



	</div>
</div>	

<?php $this->load->view('footer');?>
<script>
	$(document).ready(function(){
		var infoPaciente=$.parseJSON('<?php echo json_encode($paciente)?>');

		formulario=frm.setId("frmInfoPaciente");
		formulario.fillCdm('cmdMunicipioNaci','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+infoPaciente[0].idEdoNaci,infoPaciente[0].idMuniNaci);
		formulario.fillCdm('cmdMunicipioDire','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+infoPaciente[0].idEdoDire,infoPaciente[0].idMuniDire);

		$("#cmdEdoNaci").change(function(){
			formulario.fillCdm('cmdMunicipioNaci','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+$(this).val(),'');
		});
		$("#cmdEdoDire").change(function(){
			formulario.fillCdm('cmdMunicipioDire','Sin registros',BASEURL+'index.php/catalogos/organizacion/getMunicipios/'+$(this).val(),'');
		});
		$('#cmdVive option[value="'+infoPaciente[0].viveCon+'"]').prop('selected',true);
		$("#btnSaveInfoPaciente").click(function(){
			$("#loader").show();
			formulario=frm.setId("frmInfoPaciente");
	    	if(formulario.validateFrm(["txtNombre","txtEdad","cmdSexo","txtOcupacion","txtDireccion","txtTelefono","cmdEdo","cmdMunicipio"])==true){
				formulario.send(BASEURL+"index.php/catalogos/pacientes/save","post",function(response){
					$("#loader").hide();
					var status=$.parseJSON(response);
					notify(status.title,status.message,status.type);
				})
			}else{
				$("#loader").hide();
				notify("","FAVOR DE LLENAR LOS CAMPOS VACIOS","warning");
			}
		});
	});	
</script>