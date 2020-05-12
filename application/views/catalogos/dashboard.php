<?php $this->load->view('header');?>
<style>
	label>b{font-size:20px;}
	.bg-default {background-color: #ffffff!important;}
</style>
<div class="row">
	<div class="col-lg-12     col-md-12  col-sm-12  col-xs-12">&nbsp;</div>
	<div class="col-lg-6     col-md-6  col-sm-6  col-xs-12">&nbsp;</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label class="form-control-label" for="cmdConsul" >Consultorio</label>
			<select class="form-control" id="cmdConsul" name="idConsultorio">
			    <?php
			    	if(isset($consultorios[0]->id)){
		    		foreach($consultorios as $row){
				   			echo '<option value="'.$row->id.'">'.$row->consultorio.'</option>';
				   		}
			    	}
			    	
			    ?>
	    	</select>
		</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-stats">
		    	<!-- Card body -->
		    	<div class="card-body">
					<div class="row">
					    <div class="col">
					        <h5 class="card-title text-uppercase text-muted mb-0">CITAS VIGENTES</h5>
					        <span class="h2 font-weight-bold mb-0" id="citasVigentes">0</span>
					    </div>
					    <div class="col-auto">
					      <div class="icon icon-shape bg-red text-white rounded-circle shadow">
					          <i class="ni ni-active-40"></i>
					      </div>
					    </div>
					</div>
					<p class="mt-3 mb-0 text-sm">
					    <!--<span class="text-success mr-2" id="infoStatusVigente"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
					    <span class="text-nowrap">Día <?php echo date('d/m/Y');?></span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-stats">
		    	<!-- Card body -->
		    	<div class="card-body">
					<div class="row">
					    <div class="col">
					        <h5 class="card-title text-uppercase text-muted mb-0">CITAS ATENDIDAS</h5>
					        <span class="h2 font-weight-bold mb-0" id="citasAtendidas">0</span>
					    </div>
					    <div class="col-auto">
					      <div class="icon icon-shape bg-red text-white rounded-circle shadow">
					          <i class="ni ni-active-40"></i>
					      </div>
					    </div>
					</div>
					<p class="mt-3 mb-0 text-sm">
					    <!--<span class="text-success mr-2" id="infoStatusAtendidas"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
					    <span class="text-nowrap">Día <?php echo date('d/m/Y');?></span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-stats">
		    	<!-- Card body -->
		    	<div class="card-body">
					<div class="row">
					    <div class="col">
					        <h5 class="card-title text-uppercase text-muted mb-0">CITAS CANCELADAS</h5>
					        <span class="h2 font-weight-bold mb-0" id="citasCanceladas">0</span>
					    </div>
					    <div class="col-auto">
					      <div class="icon icon-shape bg-red text-white rounded-circle shadow">
					          <i class="ni ni-active-40"></i>
					      </div>
					    </div>
					</div>
					<p class="mt-3 mb-0 text-sm">
					    <!--<span class="text-success mr-2" id="infoStatusCanceladas"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
					    <span class="text-nowrap">Día <?php echo date('d/m/Y');?></span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card card-stats">
		    	<!-- Card body -->
		    	<div class="card-body">
					<div class="row">
					    <div class="col">
					        <h5 class="card-title text-uppercase text-muted mb-0">PACIENTES CONSULTADOS</h5>
					        <span class="h2 font-weight-bold mb-0" id="pacientesConsultados">0</span>
					    </div>
					    <div class="col-auto">
					      <div class="icon icon-shape bg-red text-white rounded-circle shadow">
					          <i class="ni ni-active-40"></i>
					      </div>
					    </div>
					</div>
					<p class="mt-3 mb-0 text-sm">
					    <!--<span class="text-success mr-2" id="infopacientesConsultados"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
					    <span class="text-nowrap">Día <?php echo date('d/m/Y');?></span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-12     col-md-12  col-sm-12  col-xs-12">&nbsp;</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card bg-default">
				<div class="card-body">
					<div class="chart">
					<!-- Chart wrapper -->
						<canvas id="chartCitasMensual" class="chart-canvas"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12     col-md-12  col-sm-12  col-xs-12">&nbsp;</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card bg-default">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12     col-md-12  col-sm-12  col-xs-12">
							<div class="form-group">
				               	<label class="form-control-label" for="cmdSexo">Fecha</label>
								<div class="input-group">
								    <div class="input-group-prepend">
								       	<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
									</div>
								   	<input class="form-control form-control-sm datepicker" placeholder="Fecha nacimiento" type="text" value="" name="fechaNacimiento" id="txtFecha">
								</div>
							</div>
						</div>
						<div class="col-lg-12     col-md-12  col-sm-12  col-xs-12">
							<div class="chart">
								<canvas id="chartDineroCitasConsul" class="chart-canvas" style="width: 100%;"></canvas>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php $this->load->view('footer');?>
