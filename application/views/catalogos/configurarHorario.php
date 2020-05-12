<?php $this->load->view('header');?>
<style>
	label>b{font-size:20px;}
</style>
<div class="col-lg-9     col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
<div class="table-responsive py-4">
<form id="frmHorario">
						    	<div class="form-group">
				                    <label class="form-control-label" for="cmdConsultorio">Consultorio</label>
				                    <select class="form-control" id="cmdConsultorio"></select>
				                </div>
						    	<hr>
						    	<div class="row">
					    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Lunes</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaLunes">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_1">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaLunes">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_1">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaLunes">Hora apertura 2</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_1_1">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaLunes">Hora cierre 2</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_1_1">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_1" name="chkCerrado_1" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>

					    				</div>
					    				
							    	</div>
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Martes</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaMartes">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_2">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaMartes">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_2">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaMartes">Hora apertura 2</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_2_2">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaMartes">Hora cierre 2</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_2_2">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_2" name="chkCerrado_2" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>

					    				</div>
							    	</div>
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Miercoles</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaMiercoles">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_3">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaMiercoles">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_3">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaMiercoles">Hora apertura 2</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_3_3">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaMiercoles">Hora cierre 2</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_3_3">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_3" name="chkCerrado_3" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>

					    				</div>
							    	</div>
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Jueves</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaJueves">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_4">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaJueves">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_4">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaJueves">Hora apertura 2</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_4_4">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaJueves">Hora cierre 2</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_4_4">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_4" name="chkCerrado_4" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>
					    				</div>
							    	</div>
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Viernes</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaViernes">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_5">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaViernes">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_5">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaViernes">Hora apertura 2	</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_5_5">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaViernes">Hora cierre 2	</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_5_5">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_5" name="chkCerrado_5" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>
					    				</div>
							    	</div>
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Sabado</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaSabado">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_6">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaSabado">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_6">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaSabado">Hora apertura 2</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_6_6">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaSabado">Hora cierre 2</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_6_6">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_6" name="chkCerrado_6" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>
					    				</div>
							    	</div> 
							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    				<label class="form-control-label" ><b>Domingo</b></label>
					    				<div class="row">
					    					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaDomingo">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_7">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaDomingo">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_7">
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
					    						<label for="txtHoraIniciaDomingo">Hora apertura</label>
						                    	<input class="form-control" name="horaInicia[]" type="time" value="00:00:00" id="txtHoraInicia_7_7">
							                </div>
								    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
								    		   <label for="txtHoraTerminaDomingo">Hora cierre</label>
							                   <input class="form-control" name="horaTermina[]" type="time" value="00:00:00" id="txtHoraTermina_7_7">
							                </div>
							                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group cerrado">
							                	<label >Cerrado</label><br>
								                	<label class="custom-toggle">
												    <input type="checkbox"  id="chkCerrado_7" name="chkCerrado_7" value="1">
												    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Sí"></span>
												</label>
							                </div>
					    				</div>
							    	</div>

							    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
							    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
							    		<br>
							    		<button class="btn btn-primary right" type="button" id="btnGuardar">GUARDAR</button>
									</div>
					    		</div>
						    </form>
</div>
<?php $this->load->view('footer');?>
