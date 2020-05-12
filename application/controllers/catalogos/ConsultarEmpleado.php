<?php
class ConsultarEmpleado extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('consultorios_model','horario_model','pacientes_model','lugargeografico_model','consultar_model'));
	}
	function index(){

	}
	function consultar($idPaciente=0,$idConsultorio=0,$idConsulta=0){
		if($idPaciente>0 && $idConsultorio>0 && $idConsulta>0){
			$data['jsFile']=array(base_url().'assets/js/tags.js');
			$data['paciente']=$this->pacientes_model->get_where($idPaciente);
			$data['habitos']=$this->consultar_model->getHabitos();
			$data['examenesDiagnos']=$this->consultar_model->getExamenesDiagnosticos();
			$data['antecedentes']='';
			$data['odontogramaDx']=$this->consultar_model->getOdontogramaDx();
			$data['odontogramaTx']=$this->consultar_model->getOdontogramaTx();
			$data['tratamientos']=$this->consultar_model->getTratamientos();
			$idEstado=(isset($data['paciente'][0]->idEstado))?$data['paciente'][0]->idEstado:0;
			$data['estados']=$this->lugargeografico_model->getEstados(142);
			$data['municipios']=$this->lugargeografico_model->getMunicipios($idEstado);
			$data['idPaciente']=$idPaciente;
			$data['idConsultorio']=$idConsultorio;
			$data['idCita']=$idConsulta;
		}
		$this->load->view('catalogos/consultar',$data);
	}	
}
?>