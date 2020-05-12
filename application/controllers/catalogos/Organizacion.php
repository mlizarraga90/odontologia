<?php
class Organizacion extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('lugargeografico_model','organizacion_model'));
	}
	function index(){
		$data['jsFile']=base_url().'assets/js/catalogos/organizacion.js';
		$data['organizacion']=$this->organizacion_model->getInfo();
		$data['estados']=$this->lugargeografico_model->getEstados(142);
		$data['tipoOrganizaciones']=$this->organizacion_model->getTipoOrganicacion();
		$this->load->view('catalogos/organizacion',$data);
	}
	
	function getOrganizacion(){
		echo json_encode($this->organizacion_model->getInfo());
	}
	function getTipoOrganizacion(){
		echo json_encode($this->organizacion_model->getTipoOrganicacion());
	}
	function getMunicipios($idEdo){
		echo json_encode($this->lugargeografico_model->getMunicipios($idEdo));
	}
	function save(){
		$message=array('status'=>-1,'message'=>'Favor de volver intentar');

		if(!isset($_POST['tipoOrganizacion']) || (int) $_POST['tipoOrganizacion']==0 ){
			$message=array("status"=>-1,"message"=>"Favor de indicar el tipo de organización","title"=>"ORGANIZACIÓN: ","type"=>"danger");
			echo json_encode($message);
			return false;
		}
		if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
			$message=array("status"=>-1,"message"=>"Favor de introducir un correo valido","title"=>"ORGANIZACIÓN: ","type"=>"danger");
			echo json_encode($message);
			return false;
		}
		if(isset($_POST['id']) && (int) $_POST['id']==0){
			if($this->organizacion_model->save($_POST))
				$message=array('status'=>1,'message'=>'Se guardarón los cambios',"title"=>"ORGANIZACIÓN: ","type"=>"success");	
		}else{
			if($this->organizacion_model->update($_POST)>=0)
				$message=array('status'=>1,'message'=>'Se guardarón los cambios',"title"=>"ORGANIZACIÓN: ","type"=>"success");	
		}
		echo json_encode($message);
	}
}
?>