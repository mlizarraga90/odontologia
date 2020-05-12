<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
		@page {
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            margin-left: 0.6em;
            margin-right: 0.6em;
        }
		html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
		body{font-size: 13px;}
		.container{width: 740px;}
		table,.separator{width: 100%;}

		.separator-helf{width: 50%;float: right;}
		table.border-bottom thead tr th ,.border-bottom tbody tr td{border-bottom:1px solid black;}
		.border-right{border-right: 1px solid black;}
		.border-both{border-left:1px solid black;border-right: 1px solid black;}
		.logo{position: relative;width: 250px;}
		h4,h3,h2{margin:0px;}
		.title{width: 250px;padding:5px;text-align: center;}
		.bordered{border-radius: 10px;}
		.fill,.infoParts{background-color:black;color:white; }
		.infoParts table tbody tr td{text-align: center;}
		.infoParts{width: 350px;border-radius: 15px;}
		.whte{background-color: white;color:black;}
		.border-white{border-right: 1px solid white;border-bottom: 1px solid white;}
		.border-top-radious thead tr th{border-top-left-radius: 10px;border-top-right-radius: 10px;color:white;background-color: black;}
		.border-bottom{border-bottom-color: 1px solid black;}
		.infoOjo{position: absolute;z-index: 10;width: 180px;text-align: left;font-size: 11px;}
		.ojo {
			left: 100px;
		    position: relative;
		    width: 110px;
	    	height: 108px;
	    	border:1px solid white;
	    	
		}
	.ojo img{width: 100%;height: 100%;}
	.circulo{left:230px;margin-bottom:5px;position:relative;padding-top:2px;width: 20px;
     height: 20px;
     
     border-radius: 70%;
     background: black;color:white;text-align: center;}
	</style>
</head>
<body>
	<?php
		if(isset($notas[0]->id) && (int) $notas[0]->id>0) {
			
			echo '<div  style="padding:25px!important;width:740px;">';
		}else{
			echo '<div style="width: 740px;">'; 
		}
	?>

		
		
			<table  style="position: relative;margin-bottom:-50px;">
				<tbody>
					<tr>
						<td><img class="logo" src="./assets/images/logo.png"/></td>
					</tr>
					<tr>
						<td align="" width="255">
							
							<table style="width: 250px;top:-20px;left: 500px;position: relative;" cellpadding="0" cellspacing="0">
								<tbody>
									<tr><td align="center" colspan="2"><div class="circulo">01</div></td></tr>
									<tr>
										<td style="padding:0px!important;border-top-left-radius: 10px!important;">
											<div  style="border-top-left-radius: 10px!important;color:white;background-color: black;padding:3px;">
												<h4 >REGISTRO ÚNICO</h4>
											</div>
										</td>
										<td style="border:1px solid black;"><?php echo $consulta[0]->folio;?></td>
									</tr>
									<tr>
										<td  style="border-bottom-left-radius: 10px!important;">
											<div  style="border-bottom-left-radius: 10px!important;color:white;background-color: black;padding:3px;">
												<h4 >FECHA</h4>
											</div>
										</td>
										<td style="padding:0px!important;border:1px solid black;">
											<table>
												<tbody>
													<tr>
														<td style="border-right: 1px solid black;"><?php echo date('d');?></td>
														<td style="border-right: 1px solid black;"><?php echo date('m');?></td>
														<td><?php echo date('Y');?></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div class="separator">
			<div class="bordered fill title">
				<h2>Historia Clinica</h2>
			</div>
		</div>
		<div class="separator">&nbsp;</div>
		<div class="separator">
			<table class="border-bottom">
				<tbody>
					<tr>
						<td class="border-right" width="100">Nombre del paciente</td>
						<td colspan="5"><?php echo $paciente[0]->aPaterno.' '.$paciente[0]->aMaterno.' '.$paciente[0]->nombre;?></td>
					</tr>
					<tr>
						<td class="border-right" width="100">Edad</td>
						<td><?php echo $paciente[0]->edad;?></td>
						<td class="border-both">Estado civil</td>
						<td><?php echo $paciente[0]->estadoCivil;?></td>
						<td class="border-both">Ocupación</td>
						<td><?php echo $paciente[0]->ocupacion;?></td>
					</tr>
					<tr>
						<td class="border-right" width="100">Domicilio</td>
						<td colspan="3"><?php echo $paciente[0]->direccion;?></td>
						<td class="border-both">Colonia</td>
						<td><?php echo $paciente[0]->colonia;?></td>
					</tr>
					<tr>
						<td class="border-right" width="100">Municipio</td>
						<td ><?php echo $paciente[0]->municipio;?></td>
						<td class="border-both">Estado</td>
						<td><?php echo $paciente[0]->estado;?></td>
						<td class="border-both">Teléfono</td>
						<td><?php echo $paciente[0]->telefono;?></td>
					</tr>
					<tr>
						<td class="border-right" width="100">Padre</td><td colspan="5"><?php echo $paciente[0]->nomPadre?></td>
					<tr>
						<td class="border-right" width="100">Madre</td><td colspan="5"><?php echo $paciente[0]->nomMadre?></td>
					</tr>
					<tr>
						<td class="border-right" width="100">Esposo(a)</td><td colspan="5"><?php echo $paciente[0]->nomEsposo?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="separator">&nbsp;</div>
		<div class="separator">
			<div class="bordered fill title">
				<h4>Interrogatorio</h4>
			</div>
		</div>
		
		<div class="separator">
			<table class="border-bottom">
				<tbody>
					<tr>
						<td class="border-right" width="125">Padecimiento Actual</td>
						<td ><?php echo $consulta[0]->padeciActual;?></td>
					</tr>
					
					<tr>
						<td class="border-right" width="125">Antecedentes Oculares</td>
						<td ><?php echo $consulta[0]->anteceOculares?></td>
					<tr>
						<td class="border-right" width="125">Antecedentes Patológicos</td>
						<td ><?php echo $consulta[0]->antecePatologi?></td>
					</tr>
					<tr>
						<td class="border-right" width="125">Medicamentos y Alergias</td>
						<td ><?php echo $consulta[0]->medicamenAlergi?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="separator">
			<!--derecho-->
			<div class="separator-helf">
				<div class="infoParts">
					<table>
						<tbody>
							<tr>
								<td>GRADUACIÓN</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								<td>ANTERIOR</td>
								<td class="whte"><?php echo (isset($graduacionDerecha[0]->esfera))?$graduacionDerecha[0]->esfera:'';?></td>
								<td class="whte"><?php echo (isset($graduacionDerecha[0]->cilindro))?$graduacionDerecha[0]->cilindro:'';?></td>
								<td class="whte"><?php echo (isset($graduacionDerecha[0]->eje))?$graduacionDerecha[0]->eje:'';?></td>
								<td class="whte"><?php echo (isset($graduacionDerecha[0]->adicion))?$graduacionDerecha[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div>
			<!--IZQUIERDO-->
			<div class="separator-helf">
				<div class="infoParts">
					<table>
						<tbody>
							<tr>
								<td>GRADUACIÓN</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								<td>ANTERIOR</td>
								<td class="whte"><?php echo (isset($graduacionIzquierda[0]->esfera))?$graduacionIzquierda[0]->esfera:'';?></td>
								<td class="whte"><?php echo (isset($graduacionIzquierda[0]->cilindro))?$graduacionIzquierda[0]->cilindro:'';?></td>
								<td class="whte"><?php echo (isset($graduacionIzquierda[0]->eje))?$graduacionIzquierda[0]->eje:'';?></td>
								<td class="whte"><?php echo (isset($graduacionIzquierda[0]->adicion))?$graduacionIzquierda[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div>
			
		</div>
		
		<div class="separator">&nbsp;</div>
		<div class="separator">
			<div class="bordered fill title">
				<h4>EXPLORACIÓN OFTALMOLOGA</h4>
			</div>
		</div>
		<!--IZQUIERDO-->
			<div class="separator-helf">
				<table class=" border-bottom">
					<thead>
						<tr>
							<th colspan="2">
								<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >OJO IZQUIERDO</h4>
								</div>
								
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="border-right" width="90">Agudeza visual </td>
							<td><?php echo (isset($exploraOftalIzquierda[0]->agudezaVisual))?$exploraOftalIzquierda[0]->agudezaVisual:'';?></td>
						</tr>
						<tr>
							<td  class="border-right" width="90">Capacidad visual </td>
							<td><?php echo (isset($exploraOftalIzquierda[0]->capacidadVisual))?$exploraOftalIzquierda[0]->capacidadVisual:'';?></td>
						</tr>
						<tr>
							<td colspan="2" height="17">
								<div style="width: 40%;height: 30px;float: left;" >
									<label >Esquiascopia</label>
									<div style="border:1px solid black;border-radius: 10px; width: 40%;height: 20px;text-align: center;float: right;">
										<?php echo (isset($exploraOftalIzquierda[0]->esquiascopia))?$exploraOftalIzquierda[0]->esquiascopia:'';?>
									</div>
								</div>
								<div style="width: 56%;height: 30px;float: right;" >
									<label>Queratometría</label>
									<div style="border:1px solid black;border-radius: 10px; width: 30%;height: 20px;text-align: center;float: right;">
										<?php echo (isset($exploraOftalIzquierda[0]->queratrometria))?$exploraOftalIzquierda[0]->queratrometria:'';?>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>	
			</div>
		<!--DERECHO-->
		<div class="separator">
			<div class="separator-helf">
					<table class=" border-bottom">
						<thead>
							<tr>
								<th colspan="2">
									<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
										<h4 >OJO DERECHO</h4>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td  class="border-right" width="90">Agudeza visual </td>
								<td><?php echo (isset($exploraOftalDerecha[0]->agudezaVisual))?$exploraOftalDerecha[0]->agudezaVisual:'';?></td>
							</tr>
							<tr>
								<td  class="border-right" width="90">Capacidad visual </td>
								<td><?php echo (isset($exploraOftalDerecha[0]->capacidadVisual))?$exploraOftalDerecha[0]->capacidadVisual:'';?></td>
							</tr>
							<tr>
								<td colspan="2" height="17">
									<div style="width: 40%;height: 30px;float: left;" >
										<label >Esquiascopia</label>
										<div style="border:1px solid black;border-radius: 10px; width: 40%;height: 20px;text-align: center;float: right;">
											<?php echo (isset($exploraOftalDerecha[0]->esquiascopia))?$exploraOftalDerecha[0]->esquiascopia:'';?>
										</div>
									</div>
									<div style="width: 56%;height: 30px;float: right;" >
										<label>Queratometría</label>
										<div style="border:1px solid black;border-radius: 10px; width: 30%;height: 20px;text-align: center;float: right;">
											<?php echo (isset($exploraOftalDerecha[0]->queratrometria))?$exploraOftalDerecha[0]->queratrometria:'';?>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>	
			</div>
			
		</div>
		<div class="separator">&nbsp;</div>
		<div class="separator">
			<!--izquierdo-->
			<div class="separator-helf">
				<div class="infoParts">
					<table>
						<tbody>
							<tr>
								<td width="105px;" rowspan="2" class="border-white">REFRACCIÓN</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								
								<td class="whte" height="10"><?php echo (isset($refraccionIzquierda[0]->esfera))?$refraccionIzquierda[0]->esfera:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionIzquierda[0]->cilindro))?$refraccionIzquierda[0]->cilindro:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionIzquierda[0]->eje))?$refraccionIzquierda[0]->eje:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionIzquierda[0]->adicion))?$refraccionIzquierda[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>
					<table>
						<tbody>
							<tr>
								<td width="105px;" rowspan="2" class="border-white" style="border-bottom: 1px solid black;">RETINOSCOPÍA</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								
								<td class="whte" height="10"><?php echo (isset($retinosIzquierda[0]->esfera))?$retinosIzquierda[0]->esfera:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosIzquierda[0]->cilindro))?$retinosIzquierda[0]->cilindro:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosIzquierda[0]->eje))?$retinosIzquierda[0]->eje:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosIzquierda[0]->adicion))?$retinosIzquierda[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div>
		<!--derecho-->
			<div class="separator-helf">
				<div class="infoParts">
					<table>
						<tbody>
							<tr>
								<td width="105px;" rowspan="2" class="border-white">REFRACCIÓN</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								
								<td class="whte" height="10"><?php echo (isset($refraccionDerecha[0]->esfera))?$refraccionDerecha[0]->esfera:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionDerecha[0]->cilindro))?$refraccionDerecha[0]->cilindro:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionDerecha[0]->eje))?$refraccionDerecha[0]->eje:'';?></td>
								<td class="whte" height="10"><?php echo (isset($refraccionDerecha[0]->adicion))?$refraccionDerecha[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>
					<table>
						<tbody>
							<tr>
								<td width="105px;" rowspan="2" class="border-white" style="border-bottom: 1px solid black;">RETINOSCOPÍA</td>
								<td>ESFERA</td>
								<td>CILINDRO</td>
								<td>EJE</td>
								<td>ADICIÓN</td>
							</tr>
							<tr class="topLess">
								
								<td class="whte" height="10"><?php echo (isset($retinosDerecha[0]->esfera))?$retinosDerecha[0]->esfera:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosDerecha[0]->cilindro))?$retinosDerecha[0]->cilindro:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosDerecha[0]->eje))?$retinosDerecha[0]->eje:'';?></td>
								<td class="whte" height="10"><?php echo (isset($retinosDerecha[0]->adicion))?$retinosDerecha[0]->adicion:'';?></td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div>
			
		</div>
		<div class="separator">&nbsp;</div>
		<div class="separator">
			<!--izquierdo-->
			<div class="separator-helf">
				<table class=" border-bottom">
					<tbody>
						<tr>
							<td class="border-right" widht="30%">Parpados/cejas/pestañas</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->parpadosCejas))?$exploraOftalIzquierda[0]->parpadosCejas:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Conjuntiva</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->conjuntiva))?$exploraOftalIzquierda[0]->conjuntiva:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Córnea</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->cornea))?$exploraOftalIzquierda[0]->cornea:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Camara Anterior</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->camaraAnterior))?$exploraOftalIzquierda[0]->camaraAnterior:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Irís(forma/reflejos/rubeosis)</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->iris))?$exploraOftalIzquierda[0]->iris:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Cristalino</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalIzquierda[0]->cristalino))?$exploraOftalIzquierda[0]->cristalino:'';?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--DERECHO-->
			<div class="separator-helf" style="page-break-after: always;">
				<table  class=" border-bottom">
					<tbody>
						<tr>
							<td class="border-right" widht="30%">Parpados/cejas/pestañas</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->parpadosCejas))?$exploraOftalDerecha[0]->parpadosCejas:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Conjuntiva</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->conjuntiva))?$exploraOftalDerecha[0]->conjuntiva:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Córnea</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->cornea))?$exploraOftalDerecha[0]->cornea:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Camara Anterior</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->camaraAnterior))?$exploraOftalDerecha[0]->camaraAnterior:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Irís(forma/reflejos/rubeosis)</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->iris))?$exploraOftalDerecha[0]->iris:'';?></td>
						</tr>
						<tr>
							<td class="border-right" widht="30%">Cristalino</td>
							<td class="border-bottom" width="70%"><?php echo (isset($exploraOftalDerecha[0]->cristalino))?$exploraOftalDerecha[0]->cristalino:'';?></td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>

		<div class="separator">&nbsp;</div>
		<div class="separator">&nbsp;</div>
		<div style="width: 100%;top:15px;" >
			<table >
				<tbody>
					<tr>
						<td><img class="logo" src="./assets/images/logo.png"/></td>
					</tr>
					<tr>
						<td align="" width="255">
							
							<table style="width: 250px;top:-20px;left: 500px;position: relative;" cellpadding="0" cellspacing="0">
								<tbody>
									<tr><td align="center" colspan="2"><div class="circulo">02</div></td></tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div class="separator">		
			<!--IZQUIERDO-->
			<div class="separator-helf">
				<table >
					<thead>
						<tr>
							<th colspan="2">
								<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >OJO IZQUIERDO</h4>
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td class="border-right" width="38%" >Presión Intraocular </td>
							<td width="62%" style="border-bottom:1px solid black;"><?php echo (isset($exploraOftalIzquierda[0]->agudezaVisual))?$exploraOftalIzquierda[0]->agudezaVisual:'';?></td>
						</tr>
						<tr >
							<td colspan="2" >Ginescopia<br></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<div class="ojo ojo-uno-izquierdo" >
									<?php
										if(isset($ginescopiaIzquierda[0]->positionLeft)){
											foreach($ginescopiaIzquierda as $row){
												echo '<p class="infoOjo" style="z-index:200;left:'.((int)$row->positionLeft+10).'px;margin-top:'.((int)$row->positionTop).'px">'.$row->nota.'</p>';
											}
										}
										
									?>
									<img src="./assets/images/ojo1izquierdo.png" alt="" class="ojo1izquierdo" id="ojo1IzquierdoImg" />
								</div>
							</td>
						</tr>
						<tr >
							<td class="border-right" width="38%" style="border-bottom:1px solid black;">Homor Vitreo </td>
							<td width="62%" style="border-bottom:1px solid black;"><?php echo (isset($exploraOftalIzquierda[0]->capacidadVisual))?$exploraOftalIzquierda[0]->capacidadVisual:'';?></td>
						</tr>
						
					</tbody>
				</table>	
			</div>
			<!--DERECHO-->
			<div class="separator-helf">
				<table class="border-bottom">
					<thead>
						<tr>
							<th colspan="2">
								<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >OJO DERECHO</h4>
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td class="border-right" width="38%" >Presión Intraocular </td>
							<td width="62%" style="border-bottom:1px solid black;"><?php echo (isset($exploraOftalDerecha[0]->agudezaVisual))?$exploraOftalDerecha[0]->agudezaVisual:'';?></td>
						</tr>
						<tr >
							<td colspan="2" >Ginescopia<br></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<div class="ojo ojo-uno-izquierdo" >
									<?php
										if(isset($ginescopiaDerecha[0]->positionLeft)){
											foreach($ginescopiaDerecha as $row){
												echo '<p class="infoOjo" style="z-index:200;left:'.((int)$row->positionLeft+10).'px;margin-top:'.((int)$row->positionTop).'px">'.$row->nota.'</p>';
											}
										}
										
									?>
									<img src="./assets/images/ojo1izquierdo.png" alt="" class="ojo1izquierdo" id="ojo1IzquierdoImg" />
								</div>
							</td>
						</tr>
						<tr >
							<td class="border-right" width="38%" style="border-bottom:1px solid black;">Homor Vitreo </td>
							<td width="62%" style="border-bottom:1px solid black;"><?php echo (isset($exploraOftalDerecha[0]->capacidadVisual))?$exploraOftalDerecha[0]->capacidadVisual:'';?></td>
						</tr>
						
					</tbody>
				</table>	
			</div>
			
			<div class="separator">&nbsp;</div>
			<div class="separator" style="page-break-after: always;">
				<!--IZQUIERDO-->
			<div class="separator-helf" >
				<table class=" border-bottom">
					<thead>
						<tr>
							<th colspan="2">
								<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >EXPLORACIÓN DE FONDO DE OJO</h4>
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="border-right">
							<td>Reflejo de fondo</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->reflejoFondo))?$exploraFondoIzquierda[0]->reflejoFondo:'';?></td>
						</tr>
						<tr>
							<td colspan="2" height="30">
								<div style="width: 40%;height: 30px;float: left;" >
									<label >Presente</label>
									<div style="border:1px solid black;border-radius: 10px; width: 40%;height: 20px;text-align: center;float: right;">
										<?php echo (isset($exploraFondoIzquierda[0]->presente) && (int) $exploraFondoIzquierda[0]->presente>0)?'X':'';?>
									</div>
								</div>
								<div style="width: 56%;height: 30px;float: right;" >
									<label>Ausente</label>
									<div style="border:1px solid black;border-radius: 10px; width: 30%;height: 20px;text-align: center;float: right;">
										<?php echo (isset($exploraFondoIzquierda[0]->ausente) && (int) $exploraFondoIzquierda[0]->ausente>0)?'X':'';?>
									</div>
								</div>
							</td>	
						</tr>
						<tr>
							<td class="border-right">Excavación</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->excavacion))?$exploraFondoIzquierda[0]->excavacion:'';?></td>
						</tr>
						<tr>
							<td class="border-right" colspan="2">Reflejo Rojo de Fondo </td>
							
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoIzquierda[0]->reflejoFondoRojo))?$exploraFondoIzquierda[0]->reflejoFondoRojo:'';?></td>
						</tr>
						<tr>
							<td class="border-right">Papila </td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->papila))?$exploraFondoIzquierda[0]->papila:'';?></td>
						</tr>
						<tr>
							<td class="border-right" width="30%;" colspan="2">Retina<label style="font-size: 12px;">(hemorragias/exadadis/desgarros/neoformaciones)</label></td>
							
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoIzquierda[0]->retina))?$exploraFondoIzquierda[0]->retina:'';?></td>
						</tr>
						<tr>
							<td class="border-right">Área Macular</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->areaMecular))?$exploraFondoIzquierda[0]->areaMecular:'';?></td>
						</tr>
						<tr>
							<td colspan="2" style="border-bottom:0px solid black;">
								<div class="ojo ojo-mecular-izquierdo" >
									<?php
										if(isset($mecularIzquierda[0]->positionLeft)){
											foreach($mecularIzquierda as $row){
												echo '<p class="infoOjo" style="z-index:200;left:'.((int)$row->positionLeft+10).'px;margin-top:'.((int)$row->positionTop).'px">'.$row->nota.'</p>';
											}
										}
										
									?>
									<img src="./assets/images/ojoizquierdo.png" alt="" class="img-ojo2-izquierdo" id="ojo2-izquierdo">
								</div>
							</td>
						</tr>
						<tr>
							<td class="border-right" colspan="2">Otras Exploraciones o Estudios Adicionales</td>
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoIzquierda[0]->exploestuadiciona))?$exploraFondoIzquierda[0]->exploestuadiciona:'';?></td>
						</tr>
						<tr>
							<td class="border-right">Impresión Diagnóstica</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->impreDiagno))?$exploraFondoIzquierda[0]->impreDiagno:'';?></td>
						</tr>
						<tr>
							<td class="border-right">Plan seguimiento</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoIzquierda[0]->planSegui))?$exploraFondoIzquierda[0]->planSegui:'';?></td>
						</tr>
						<tr>
							<td colspan="2" height="15">&nbsp;</td>
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($consulta[0]->tratamiento))?$consulta[0]->tratamiento:'';?></td>
						</tr>
					</tbody>
				</table>
				<table >
					<thead>
						<tr>
							<th colspan="2">
								<div  style="border-bottom-left-radius: 10px!important;border-bottom-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >TRATAMIENTO</h4>
								</div>
							</th>
						</tr>
					</thead>
				</table>
				
			</div>
			<!--DERECHO-->
			<div class="separator-helf">
				<table  class=" border-bottom">
					<thead>
						<tr>
							<th colspan="2">
							<div  style="border-top-left-radius: 10px!important;border-top-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
								<h4 >EXPLORACIÓN DE FONDO DE OJO</h4>
							</div>
						</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="border-right" width="20%">Reflejo de fondo </td>
							<td class="border-bottom" width="80%"><?php echo (isset($exploraFondoDerecha[0]->reflejoFondo))?$exploraFondoDerecha[0]->reflejoFondo:'';?></td>
						</tr>
						<tr>
							<td colspan="2" height="30">
								<div style="width: 40%;height: 30px;float: left;" >
									<label >Presente</label>
									<div style="border:1px solid black;border-radius: 10px; width: 40%;height: 20px;text-align: center;float: right;">
										<?php echo (isset($exploraFondoDerecha[0]->presente) && (int) $exploraFondoDerecha[0]->presente>0)?'X':'';?>
										
									</div>
								</div>
								<div style="width: 56%;height: 30px;float: right;" >
									<label>Ausente</label>
									<div style="border:1px solid black;border-radius: 10px; width: 30%;height: 20px;text-align: center;float: right;">
										
										<?php echo (isset($exploraFondoDerecha[0]->ausente) && (int) $exploraFondoDerecha[0]->ausente>0)?'X':'';?>
									</div>
								</div>
							</td>	
						</tr>
						<tr>
							<td  class="border-right">Excavación </td>
							<td class="border-bottom"><?php echo (isset($exploraFondoDerecha[0]->excavacion))?$exploraFondoDerecha[0]->excavacion:'';?></td>
						</tr>
						<tr>
							<td  class="border-right" colspan="2">Reflejo Rojo de Fondo  </td>
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoDerecha[0]->reflejoFondoRojo))?$exploraFondoDerecha[0]->reflejoFondoRojo:'';?></td>
						</tr>
						<tr>
							<td  class="border-right">Papila </td>
							<td class="border-bottom"><?php echo (isset($exploraFondoDerecha[0]->papila))?$exploraFondoDerecha[0]->papila:'';?></td>
						</tr>
						<tr>
							<td  class="border-right" colspan="2" style="border-right: 0px solid black;">Retina<label style="font-size: 12px;">(hemorragias/exadadis/desgarros/neoformaciones)</label> </td>
							
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoDerecha[0]->retina))?$exploraFondoDerecha[0]->retina:'';?></td>
						</tr>
						<tr>
							<td class="border-right">Área Macular</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoDerecha[0]->areaMecular))?$exploraFondoDerecha[0]->areaMecular:'';?></td>
						</tr>
						<tr>
							<td colspan="2" style="border-bottom:0px solid black;">
								<div class="ojo ojo-mecular-derecho" >
									<?php
										if(isset($mecularDerecha[0]->positionLeft)){
											foreach($mecularDerecha as $row){
												echo '<p class="infoOjo" style="z-index:200;left:'.((int)$row->positionLeft+10).'px;margin-top:'.((int)$row->positionTop).'px">'.$row->nota.'</p>';
											}
										}
										
									?>
									<img src="./assets/images/ojoderecho.png" alt="" class="img-ojo2-izquierdo" id="ojo2-derecho">
								</div>
							</td>
						</tr>
						<tr>
							<td class="border-right" colspan="2" style="border-right: 0px solid black;">Otras Exploraciones o Estudios Adicionales</td>
						</tr>
						<tr>
							<td class="border-bottom" colspan="2" height="15"><?php echo (isset($exploraFondoDerecha[0]->exploestuadiciona))?$exploraFondoDerecha[0]->exploestuadiciona:'';?></td>
						</tr>
						<tr>
							<td  class="border-right">Impresión Diagnóstica</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoDerecha[0]->impreDiagno))?$exploraFondoDerecha[0]->impreDiagno:'';?></td>
						</tr>
						<tr>
							<td  class="border-right">Plan seguimiento</td>
							<td class="border-bottom"><?php echo (isset($exploraFondoDerecha[0]->planSegui))?$exploraFondoDerecha[0]->planSegui:'';?></td>
						</tr>
						<tr>
							<td colspan="2" height="15">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" height="15"></td>
						</tr>
						
					</tbody>
				</table>
				<table >
					<thead>
						<tr>
							<th colspan="2">
							<div  style="border-bottom-left-radius: 10px!important;border-bottom-right-radius: 10px!important;color:white;background-color: black;padding:3px;">
									<h4 >NOMBRE,FIRMA Y CLAVE DEL MÉDICO</h4>
								</div>
							</th>
						</tr>
					</thead>
				</table>
				
			</div>
			
		</div>
		</div>
		
</div>
<?php
		if(isset($notas[0]->id) && (int) $notas[0]->id) 
			$this->load->view('catalogos/notas',$consulta);
			
	?>
</body>
</html>