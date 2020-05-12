<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
	function __consctruct(){
		parent::__consctruct();
	}
	function logIn($user,$pass){
		$this->db->select('md5(id) as id,usuario,multipleCuenta,MD5(idConsultorio) AS idConsultorio,md5(idPerfil) as idPerfil');
		$this->db->where('usuario',$user);
		$this->db->where('password',md5($pass));
		$this->db->where('status',1);
		return $this->db->get('usuarios')->result();
	}
	/*Agrega un intento fallido en la tabla de usuarios en el campo intentos, si llega a 4, este se bloquea*/
	function addFailedLogin($usuario,$ip){
		$this->db->query('update usuarios set intentos=intentos+1 where usuario="'.$usuario.'"');
		$this->tryBockUser($usuario,$ip);
		$this->insertLogginAttemps($ip,$usuario);
	}
	/*Actualiza el campo intentos a 0, para evitar que se bloque el usuario*/
	function restartFailedLogin($usuario){
		$this->db->query('update usuarios set intentos=0 where usuario="'.$usuario.'"');

	}
	/*verifica si los intentos de inicio de sesion son ´mas de tres, de ser asi, se bloquea el usuario con staus=2*/
	function tryBockUser($usuario,$ip){
		$this->db->select('id,usuario,intentos');
		$this->db->where('usuario',$usuario);
		$infoUser=$this->db->get('usuarios')->result();
		if(isset($infoUser[0]->intentos) && $infoUser[0]->intentos>3){
			$status=array('status'=>2);
			$this->db->where('id',$infoUser[0]->id);
			$this->db->update('usuarios',$status);
			$this->insertIpBlock($usuario,$ip);
		}
	}
	function insertIpBlock($usuario,$ip){
		$info=array('ip'=>$ip,'usuario'=>$usuario);
		$this->db->insert('ipsblocked',$info);
	}
	function insertLogginAttemps($ip,$usuario){
		$info=array('ip'=>$ip,'usuario'=>$usuario);
		$this->db->insert('logginattemps',$info);
	}

	/*Veirfica si la ip de donde se esta realizadno la petición, esta bloqueda o no*/
	function ipIsBlock($ip){
		$this->db->select('id,ip');
		$this->db->where('ip',$ip);
		$isBlock=$this->db->get('ipsblocked')->result();
		if(!isset($isBlock[0]->id)){
			$this->db->select('count(id) as numberAttemps,ip');
			$this->db->where('ip',$ip);
			$isBlock=$this->db->get('logginattemps')->result();
			if(isset($isBlock[0]->numberAttemps) && (int) $isBlock[0]->numberAttemps>=3)
				return $isBlock;
			else
				return array();
		}
	}
	/*Checa si la ip del cliente es otra, de ser así se bloquea el usuario y se manda un correo  para desloquear el usuario*/
	function isOtherIpClient($idUsuario,$ip){
		$this->db->select('id,ip');
		$this->db->where('idUsuario',$idUsuario);
		$this->db->where('ip',$ip);
		return $this->db->get('sesiones')->result();
	}

	function insertLog($idUsuario,$idModulo,$detalles){

	}
	function insertSesion($idUsuario,$IdNavegador,$ip){

	}


}
?>