<?php

class DynamicCrud extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('dynamicCrud_model'));
		$this->urlControllers='application/controllers/';
		$this->urlViews="application/views/";
	}
	function index(){
		$data['dataBaseTables']=$this->dynamicCrud_model->getDataBaseTables();
		$data['controllersFolders']=$this->dynamicCrud_model->listar_directorios_ruta($this->urlControllers);
		$data['viewsFolders']=$this->dynamicCrud_model->listar_directorios_ruta($this->urlViews);
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
}
?>