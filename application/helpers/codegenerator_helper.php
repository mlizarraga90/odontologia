<?php
	function validarHoraDisponible($horaAgendada,$horarios){
		$pasa=0;
		foreach($horarios as $row){
			if(strtotime($horaAgendada) >= strtotime($row->horaInicia) && strtotime($horaAgendada) <= strtotime($row->horaTermina) ){
				$pasa=1;
				break;
			}
		}
		$pasa=1;
		return $pasa;
	}
	function getRandomCode(){
	    /*$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $su = strlen($an) - 1;
	    return '_'.substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) ;*/
	    $inicio = new \DateTime(date('Y').'-01-01');
		$diasDesdeInicio = $inicio->diff(new \DateTime())->format('%a')+1;
		$diasTotales = $diasDesdeInicio+ (date('y')*367);
		$diasTotalesBase36 = base_convert($diasTotales, 10, 36);

		$horaMilisec = date('H')*3600000;
		$minMilisec = date('i')*60000;
		$secMilisec = date('s')*1000;
		$milisec = floor(gettimeofday()['usec']/1000);

		$horaMilisegundos = $horaMilisec+$minMilisec+$secMilisec+$milisec;
		$horaBase36 = sprintf('%06s',base_convert($horaMilisegundos, 10, 36));
		$sys2015 = '_'.strtoupper($diasTotalesBase36.$horaBase36);
		return $sys2015;
	}
	/*true=valido,false=no valido*/
	/*function is_valid_email($str){
  		return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
	}
	function returnDatFormatMysql($fecha){
		if($fecha!='---'){
			$fecha=explode('/', $fecha);
			$fecha=$fecha[2].'-'.$fecha[0].'-'.$fecha[1];	
		}
		
		return $fecha;
	}*/

?>