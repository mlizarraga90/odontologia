<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','global'));
		$this->load->library(array('session'));
		$this->load->model('login_model');
		$this->statusIp=$this->login_model->ipIsBlock(get_client_ip_env());
		
	}
	function index(){
		
		if(!isset($this->statusIp[0]->ip) ){
			if($this->session->userdata('idUsuario')=="")
				$this->load->view('login');
			else
				$this->load->view('catalogos/agenda');

		}
	}
	function logIn(){
		$message=array('title'=>'CLINICA: ','type'=>'warning','status'=>-1,'message'=>'Usuario y/o contraseña incorrectos');
		if(!isset($this->statusIp[0]->ip)){
			$message=array('title'=>'CLINICA: ','type'=>'warning','status'=>-1,'message'=>'Usu222rio y/o contraseña incorrectos');
			$usuario=$this->login_model->logIn($_POST['usuario'],$_POST['password']);
			if( $usuario[0]->id!=""){
				$sesion=array(
					'usuario'=>$usuario[0]->usuario,
					'idUsuario'=>$usuario[0]->id,
					'idConsultorio'=>$usuario[0]->idConsultorio
				);
				$this->session->set_userdata($sesion);
				$message=array('title'=>'CLINICA: ','type'=>'success','status'=>1,'message'=>'Bienvenido');
			}else{
				$this->login_model->addFailedLogin($_POST['usuario'],$this->get_client_ip_env());
			}	
		}
		
		echo json_encode($message);
	}
	function logout(){
		if($this->session->userdata('idUsuario')){
			$this->session->sess_destroy();
      		redirect(base_url());
		}
	}
	
}
?>