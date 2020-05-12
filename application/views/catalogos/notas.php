<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style>
		@page {
            margin-top: 0.1em;
            margin-bottom: 0.1em;
            margin-left: 0.1em;
            margin-right: 0.1em;
        }
        .table{width: 100%;}
        .agua{position: absolute;top:0px;left:0px;width: 100%;height:100%;z-index: -1}
		.blue{color:#b9cde9;text-align: left;}
		.blue2{color:#83aada;text-align: left;}
        .logo2{position: relative;width: 250px;}
        .header,.container,.footer,.firma{position: relative;z-index: 10;top:0px;}
        .container{width:100%;height: 830px;padding-top:50px;}
        .smallText{font-size:11px;}
        .section{position: relative;width: 100%;padding:50px;}
        .section label{font-weight: bold;}
        .firma{width: 100%;}
       

		
	</style>
</head>
<body>
	<table class="header table" style="position: relative;">
		<thead>
			<tr>
				<th width="45%" style="padding-left:40px;">
					<img class="logo2" src="./assets/images/logo.png" />
				</th>
				<th><div class="blue ">Especialista en Enfermedades</div><div class="blue">y Cirugía de Vitreo y Retina </div></th>
			</tr>
		</thead>
	</table>
	<div class="container">
		<div class="section">
			<div><label>Impresión diagnóstica</label></div>
			<div><?php echo (isset($notas[0]->impresion))?$notas[0]->impresion:'';?></div>
		</div>
		<div class="section">
			<div><label>Tratamiento</label></div>
			<div><?php echo nl2br((isset($notas[0]->tratamiento))?$notas[0]->tratamiento:'');?></div>
		</div>
		<div class="section">
			<div><label>Plan</label></div>
			<div><?php echo nl2br((isset($notas[0]->plan))?$notas[0]->plan:'');?></div>
		</div>
		<div class="firma" style="position: absolute;top:780px;left:300px;">
			<div class="center border" style="width: 250px;">
				<table class="footer table">
					<thead>
						<tr><td style="border-top:1px solid black;" align="center;"><h4><?php echo /*strtoupper(*/(isset($consulta[0]->encargado))?$consulta[0]->encargado:''/*)*/;?></h4></td></tr>
					</thead>
				</table>
				
			</div>
		</div>
	</div>
	
	<table class="footer table" >
		<thead>
			<tr>
				<th width="56%" align="center" style="padding-left: 70px;">
					<div class="blue2 smallText">REG. S.S.A. 04215 | CED.PROF. 4418200 | CED. ESPECIALIDAD 5731738</div>
					<div class="blue2 smallText">Universidad Autónoma de Sinaloa</div>
					<div class="blue2 smallText">Universidad de Guadalajara</div>
				</th>
				<th style="padding-left: 30px;">
					<div class="smallText"><?php echo $consulta[0]->direccion.' '.$consulta[0]->muni.','.$consulta[0]->edo;?></div>
					<div class="smallText"><?php echo 'Telefono:'.$consulta[0]->telefono.', Celular:'.$consulta[0]->celular.', email:'.$consulta[0]->correo;?></div>
				</th>
			</tr>	
		</thead>
	</table>
	<img class="agua" src="./assets/images/marcaAgua.png"/>
</body>
</html>