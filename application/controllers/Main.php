<?php
class Main extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('modulos_model'));
	}
	function index(){
		$this->load->view('main');
	}
	function getModule(){
		if($_POST['idModulo']){
			echo json_encode($this->modulos_model->getModuleById($_POST['idModulo']));
		}
	}
}
?>