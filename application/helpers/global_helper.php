<?php
	function is_valid_email($str){
  		return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
	}
	function returnDatFormatMysql($fecha){
		if($fecha!='---'){
			$fecha=explode('/', $fecha);
			$fecha=$fecha[2].'-'.$fecha[0].'-'.$fecha[1];	
		}
		
		return $fecha;
	}
	function returnDatFormatMysqll($fecha){
		if($fecha!='---'){
			$fecha=explode('-', $fecha);
			$fecha=$fecha[2].'-'.$fecha[0].'-'.$fecha[1];	
		}
		
		return $fecha;
	}
	function returnDatFormatMysqlll($fecha){
		if($fecha!='---'){
			$fecha=explode('-', $fecha);
			$fecha=$fecha[2].'-'.((int)$fecha[1]+1).'-'.$fecha[0];	
		}
		
		return $fecha;
	}
	function get_client_ip_env() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	        $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}
?>