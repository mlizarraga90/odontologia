<?php
class DashBoard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model(array('citas_model','consultorios_model'));
		
	}
	function index (){
		$data['consultorios']=$this->consultorios_model->getAll();
		$data['jsFile']=base_url().'assets/js/catalogos/dashboard.js';
		$this->load->view('catalogos/dashboard',$data);
	}
	function getInfo(){
		$idConsultorio=$_POST['idConsultorio'];
		
		$data['citasVigentes']=$this->citas_model->getCitasVigentes($idConsultorio);
		$data['citasAtendidas']=$this->citas_model->getCitasAtendidas($idConsultorio);
		$data['citasCanceladas']=$this->citas_model->getCitasCanceladas($idConsultorio);
		$data['graficaGananciaSemanal']=$this->citas_model->graficaGananciaMensual($idConsultorio);
		$data['graficaGananciaConsultorio']=$this->citas_model->getCostosByConsultorio("");
		echo json_encode($data);
	}
	function getDinerPorConsultorio(){

		$data['graficaGananciaConsultorio']=$this->citas_model->getCostosByConsultorio($_POST['fecha']);
		echo json_encode($data);
	}
}
?>