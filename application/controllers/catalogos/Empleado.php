<?php
class Empleado extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model(array('empleados_model','organizacion_model','crud'));
	}
	function index(){
		$data['jsFile']=base_url().'assets/js/catalogos/empleados.js';
		$data['empleados']=$this->empleados_model->getAll();
		$data['organizacion']=$this->organizacion_model->getInfo();
		$data['especialidades']=$this->empleados_model->getEspecialidad();
		$data['consultorios']=$this->empleados_model->getConsultorios();
		$data['cargos']=$this->empleados_model->getCargos();
		$this->load->view('catalogos/empleados',$data);
	}
	function getData(){
		$filters=array();
		foreach($_POST["columns"] as $row)
			$filters[]=array("filter"=>$row["data"],"value"=>$_POST["search"]["value"]);

		$data=$this->crud->getRows("status,id,idOrganizacion,concat_ws(' ',pPaterno,pMaterno,nombre) as empleado,pPaterno,pMaterno,nombre,celular,telefono,correo,cedula,idConsultorio,idOrganizacion,idEspecialidad,idCargoMedico,getConsultorioById(idConsultorio) AS consultorio,getEspecialdadById(idEspecialidad) AS especialidad,getCargoMedico(idCargoMedico) as cargoMedico",
			NULL,array("status"=>1),$filters,"empleados",$_POST["start"],$_POST["length"]);
		echo json_encode(
				array(
					"draw"=>intval($_POST["draw"]),
					"recordsTotal"=> intval($data["recordsTotal"]),
					"recordsFiltered"=> intval($data["recordsFiltered"]),//el numero de registros por pagina
					"data"=>$data["data"]
				)
			);		
	}
	function getEspecialidad(){
		echo json_encode($this->empleados_model->getEspecialidad());
	}
	function getConsultorios(){
		echo json_encode($this->empleados_model->getConsultorios());
	}
	function getCargos(){
		echo json_encode($this->empleados_model->getCargos());
	}
	function getEmpleados(){
		echo json_encode($this->empleados_model->getAll());
	}
	function save(){
		$message=array('status'=>-1,'message'=>'Favor de volver intentar');
		if(isset($_POST['id']) && (int) $_POST['id']==0){
			$organizacion=$this->organizacion_model->getInfo();
			$_POST['idOrganizacion']=$organizacion[0]->id;
			if($_POST['idEspecialidad']==-1)
				unset($_POST['idEspecialidad']);
			if($this->empleados_model->save($_POST))
				$message=array('status'=>1,'message'=>'Se guardarón los cambios');	
		}else{
			if($this->empleados_model->update($_POST)>=0)
				$message=array('status'=>1,'message'=>'Se guardarón los cambios');	
		}
		echo json_encode($message);
	}


	function delete(){
		$id=json_decode(file_get_contents("php://input"));
		$message=array("status"=>-1,"message"=>"No fue posible guardar la información","title"=>"EMPLEADOS: ","type"=>"danger");
		if($this->empleados_model->delete($id->id))
			$message=array("status"=>1,"message"=>"SE ELIMINÓ EL CONSULTORIO CON EXÍTO","title"=>"EMPLEADOS: ","type"=>"success");
		echo json_encode($message);
	}
}
?>