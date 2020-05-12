<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('crud');
	}
	public function index(){
		$this->load->view('welcome_message');
	}
	public function getData(){
		$where=array();
		foreach($_POST['columns'] as $row)
			$where[]=array('filter'=>$row['data'],'value'=>$_POST['search']['value']);
			
		$data=$this->crud->getRows("*",NULL,$where,'grupos',$_POST['start'],$_POST['length']);
		echo json_encode(
				array(
					"draw"=>intval($_POST['draw']),
	  				"recordsTotal"=> intval($data['recordsTotal']),
	  				"recordsFiltered"=> intval($data['recordsFiltered']),//el numero de registros por pagina
	  				'data'=>$data['data']
	  			)
			);		
	}
	
	function save(){
		print_r($_POST);
	}
}
