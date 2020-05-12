<?php
class Configuracion extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('consultorios_model','horario_model'));
	}
	function index(){
		$data['jsFile']=base_url().'assets/js/catalogos/configHorarioClinica.js';
		$data['consultorios']=$this->consultorios_model->getAll();
		$this->load->view('catalogos/configurarHorario',$data);
	}
	function getHorarioTrabajo(){
		$idConsultorio=$_POST['idConsultorio'];
		echo json_encode($this->horario_model->getHorarioTrabajo($idConsultorio));

		

	}
	function saveHorario(){
		$horario=json_decode($_POST['horario']);
		$message=array('status'=>-1,'message'=>'Favor de volver a intentar');
		$id=0;
		$this->horario_model->borrarHorario($horario[0]->idConsultorio);
		foreach($horario as $row){
			if($this->horario_model->save($row)>0)
				$id++;
		}
		if($id>0)
			$message=array('status'=>1,'message'=>'Se han guardado los cambios');
		echo json_encode($message);
	}
	
}
?>