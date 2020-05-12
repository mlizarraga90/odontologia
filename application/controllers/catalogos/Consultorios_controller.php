<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consultorios_controller extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('consultorios_model','lugargeografico_model','organizacion_model','crud'));
	}
	function index(){
		$data['jsFile']=base_url().'assets/js/catalogos/consultorios.js';
		$this->load->view('catalogos/consultorios',$data);
	}
	function getEdos(){
		echo json_encode($this->lugargeografico_model->getEstados(142));
	}
	function getEncargados(){
		echo json_encode($this->consultorios_model->getEmpleados());
	}

	function getData(){
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
		$filters=array();
		foreach($_POST["columns"] as $row)
			$filters[]=array("filter"=>$row["data"],"value"=>$_POST["search"]["value"]);

		$data=$this->crud->getRows("status,getOrganizacion(consultorios.idOrganizacion) as organizacion,consultorios.descripcion AS consultorio,getEmpledoById(idEncargado) AS encargado,direccion,consultorios.id,consultorios.idOrganizacion,telefono,celular,correo,idEstado,
			idMunicipio,idEncargado,sepo_estados.nombre_estado AS estado,sepo_municipios.nombre_municipio AS municipio,precioConsulta",
			array(
				array('join'=>'sepo_estados','on'=>'sepo_estados.id=consultorios.idEstado'),
				array('join'=>'sepo_municipios','on'=>'sepo_municipios.id=consultorios.idMunicipio')
			),array("status"=>1),$filters,"consultorios",$_POST["start"],$_POST["length"]);

		echo json_encode(
				array(
					"draw"=>intval($_POST["draw"]),
					"recordsTotal"=> intval($data["recordsTotal"]),
					"recordsFiltered"=> intval($data["recordsFiltered"]),//el numero de registros por pagina
					"data"=>$data["data"]
				)
			);		
	}
						
	function save(){

		unset($_POST['organizacion']);
		$_POST['descripcion']=$_POST['consultorio'];
		unset($_POST['consultorio']);
		$message=array("status"=>-1,"message"=>"No fue posible guardar la información","title"=>"CONSULTORIOS: ","type"=>"danger");
		
		if((float) $_POST['precioConsulta']==0){
			$message=array("status"=>-1,"message"=>"El precio de la consulta debe ser mayor a 0","title"=>"CONSULTORIOS: ","type"=>"danger");
			echo json_encode($message);
			return false;
		}
		if(isset($_POST["id"]) && (int) $_POST["id"]>0){
			if($this->consultorios_model->updated($_POST)>=0)
				$message=array("status"=>1,"message"=>"SE GUARDÓ LA INFOMACIÓN CON EXÍTO","title"=>"CONSULTORIOS: ","type"=>"success");
		}else{
			unset($_POST["id"]);
			$organizacion=$this->organizacion_model->getInfo();
			$_POST['idOrganizacion']=$organizacion[0]->id;
			if($this->consultorios_model->save($_POST))
				$message=array("status"=>1,"message"=>"SE GUARDÓ LA INFOMACIÓN CON EXÍTO","title"=>"CONSULTORIOS: ","type"=>"success");
							
		}
		
		echo json_encode($message);
	}
	function delete(){
		$id=json_decode(file_get_contents("php://input"));
		$message=array("status"=>-1,"message"=>"No fue posible guardar la información","title"=>"CONSULTORIOS: ","type"=>"danger");
		if($this->consultorios_model->delete($id->id))
			$message=array("status"=>1,"message"=>"SE ELIMINÓ EL CONSULTORIO CON EXÍTO","title"=>"CONSULTORIOS: ","type"=>"success");
		echo json_encode($message);
	}
	
}
?>