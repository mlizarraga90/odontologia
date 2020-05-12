</div>
	</div>
		</div>
			</div>
				</div>
					</div>
<!--FOOTER-->
<div class="modal fade" id="dlgNotificacion" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">! ATENCIÓN ¡</h6> 
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">! ES NECESARIO CONFIRMACIÓN !</h4>
                    <input type="hidden" id="txtDeleteElement"/>
                    <p id="messageConfirm"></p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white" id="btnConfirmAccion">CONFIRMAR</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal" id="btnCancelConfirm">CERRAR</button>
            </div>
            
        </div>
	</div>
</div>
<form id="frmAux"></form>
<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/boostrap-datepicker.js" ></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js" type="text/javascript" ></script>
<!--*********************************************************************************************** -->
<script src="<?php echo base_url();?>assets/js/jquery-scrollLock.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/demo.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/cookie.js" type="text/javascript" ></script>	
<script src="<?php echo base_url();?>assets/js/jquery.lavalamp.min.js" type="text/javascript" ></script>



<!--DATA TABLE-->
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>
<!--DATA TABLE-->
<script src="<?php echo base_url();?>assets/js/main.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/cryptoJS.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/dinamycForms.js" type="text/javascript" ></script>

<!--CALENDAR-->
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/core/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/daygrid/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/timegrid/main.js'></script>
<script src='<?php echo base_url();?>assets/js/fullcalendar/packages/list/main.js'></script>
<script src="https://datoweb.com/visor/js/fresco/fresco.js"></script>
<!--CALENDAR-->
<!--ALLERTS
<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js" type="text/javascript" ></script>-->
<!--ALLERTS-->
<!--
<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/moment.js" type="text/javascript" ></script>




<script src="<?php echo base_url();?>assets/js/jquery.lavalamp.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>assets/js/dinamycForms.js"></script>
-->
<?php
	if(isset($jsFile) && is_array($jsFile)){
		foreach($jsFile as $row){
			echo "<script src='".$row."'></script>";
		}
		
	}else if(isset($jsFile) && $jsFile!=""){
		echo "<script src='".$jsFile."'></script>";
	}
?>
</body>
</html>
<script>
	$(document).ready(function(){
		/*footer metodos de footer*/
		$(".blockScreen").hide();
		$('.modal').modal({
			backdrop: 'static',
			show:false,
			keyboard:false
		});
		$('.datepicker').datepicker({
		    format: 'mm/dd/yyyy',
		     autoclose: true
		});
		/*footer metodos de footer*/
		/*$(".nav-link").click(function(){
			if($(this).data('modulo')!=undefined)
				$.ajax({
					type:'post',
					url:'<?php echo base_url();?>index.php/main/getModule',
					data:'idModulo='+$(this).data('modulo'),
					success:function(response){
						var modulo=$.parseJSON(response);
						$("#containerModule").html(modulo[0].bodyModule);
						$("#titleModule").html(modulo[0].title);
					}
				})
		})*/
	    
	    function isEmptyJSON(obj){
			for(var i in obj) { return false; }
			return true;
		}
		$("#loader").hide();
		
	});
</script>