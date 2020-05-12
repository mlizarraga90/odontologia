<?php
require_once 'application/libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class Pacientes extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','global','codegenerator'));
		$this->load->model(array('lugargeografico_model','pacientes_model','crud','consultar_model'));
		$this->urlFiles='assets/files/';
	}

	function index(){
		$data['jsFile']=array(base_url().'assets/js/datepicker.js',base_url().'assets/js/tags.js',base_url().'assets/js/catalogos/pacientes.js');
		$data['pacientes']=$this->pacientes_model->getAll();
		$data['municipios']=$this->lugargeografico_model->getMunicipios(25);
		$this->load->view('catalogos/pacientes',$data);
	}
	function getPaciente(){
		$id=$_POST['idPaciente'];
		if((int)$id>0){
			echo json_encode($this->pacientes_model->get_where($id));
		}else
			echo json_encode(array());
	}
	function getFilesConsulta(){
		$idConsulta=$_POST['idConsulta'];
		$archgivos=array();
		
		if($this->session->userdata('idUsuario')){
			$archivos=$this->pacientes_model->getFiles($idConsulta);
		}
		echo json_encode($archivos);

	}
	function saveFiles(){
		$archivos=$_FILES;
		$ids=array();
		$jr_recno="";
		$message=array('status'=>1,'message'=>'Se han subir las imagenes al servidor');
		if($this->checkFilesAttributes($archivos)){
			foreach($archivos['archivo']['tmp_name'] as $row){
				$jr_recno=getRandomCode();
				if(move_uploaded_file($row,'./'.$this->urlFiles.$jr_recno.'.jpg')){
					
					$idArchivo=$this->pacientes_model->saveFiles(array('archivo'=>$jr_recno.'.jpg'));
					if($idArchivo>0){
						$ids[]=$idArchivo;
						$message=array('status'=>1,'message'=>'Se han subido las imagenes al servidor','ids'=>$ids);
					}
					else{
						$message=array('status'=>-1,'message'=>'No se guardarón todas las imagenes');
						break;
					}
					
				}else{
					$message=array('status'=>-1,'message'=>'No fue posible guardar las imagenes');
					break;
				}
			}
		}else{
			$message=array('status'=>-1,'message'=>'Las imagenes no tiene el formato correcto o el peso permitido');
				
		}
		echo json_encode($message);
		
		//print_r($_FILES);
	}
	function checkFilesAttributes($archivos){
		//print_r($archivos);
		$exito=false;
		
		foreach($archivos['archivo']['type'] as $row){
				if($row=="image/jpeg" || $row=="image/JPEG" || $row=="image/png" || $row=="image/png"){
					$exito=true;
				}else{
					$exito=false;
					break;
				}
		}
		if($exito){
			foreach($archivos['archivo']['size'] as $row){
				if($row>0 && $row<=999999){
					$exito=true;
				}else{
					$exito=false;
					break;
				}
			}
		}
		
		return $exito;
	}
	function save(){
		$message=array('status'=>-1,'message'=>'Favor de volver intentar');
		//if(isset($_POST['fechaNacimiento']) && $_POST['fechaNacimiento']!="")
		//	$_POST['fechaNacimiento']=returnDatFormatMysql($_POST['fechaNacimiento']);

		/*$nombre=explode(' ', $_POST['nombre']);
		if(count($nombre)>2){
			if(count($nombre)==4){
				$_POST['nombre']=$nombre[0].' '.$nombre[1];
				$_POST['aPaterno']=$nombre[2];
				$_POST['aMaterno']=$nombre[3];
			}else{
				$_POST['nombre']=$nombre[0];
				$_POST['aPaterno']=$nombre[1];
				$_POST['aMaterno']=$nombre[2];
			}
		}*/
		if(isset($_POST['id']) && (int) $_POST['id']==0){
			if($this->pacientes_model->save($_POST))
				$message=array('status'=>1,'message'=>'Se guardarón los cambios');	
		}else{
			if($this->pacientes_model->update($_POST)>=0)
				$message=array('status'=>1,'message'=>'Se guardarón los cambios');	
		}
		echo json_encode($message);
	}
	function getData(){
		//$draw = intval($this->input->get("draw"));
        //$start = intval($this->input->get("start"));
        //$length = intval($this->input->get("length"));
		$filters=array();
		
		if(isset($_POST['search']['value']) && $_POST['search']['value']=='')
			$this->db->having('paciente is not null');

		//	$this->db->having('paciente',$_POST['search']['value']);
		//	print_r($_POST['search']['value']);	
		//}
		//else
			
		foreach($_POST["columns"] as $row)
			$filters[]=array("filter"=>$row["data"],"value"=>$_POST["search"]["value"]);
		
		$this->crud->orderBy('paciente','asc');
		
		$data=$this->crud->getRows("id,pacientes.nombre,pacientes.aPaterno,pacientes.aMaterno,CONCAT(nombre,' ',aPaterno) AS paciente,IF(sexo=1,'Hombre','Mujer') AS sexoo,sexo,
		DATE_FORMAT(fechaNacimiento,'%m-%d-%Y') AS fechaNacimiento,telefono,celular,ocupacion,nomEsposo,nomMadre,nomPadre,direccion,cp,idEstado,idMunicipio,edoCivil,STATUS",
			NULL,array("status"=>1),$filters,"pacientes",$_POST["start"],$_POST["length"]);
		//print_r($this->db->last_query());
		echo json_encode(
				array(
					"draw"=>intval($_POST["draw"]),
					"recordsTotal"=> intval($data["recordsTotal"]),
					"recordsFiltered"=> intval($data["recordsFiltered"]),//el numero de registros por pagina
					"data"=>$data["data"]
				)
			);	
	}
	function delete(){
		$id=json_decode(file_get_contents("php://input"));
		$message=array("status"=>-1,"message"=>"No fue posible guardar la información","title"=>"CONSULTORIOS: ","type"=>"danger");
		if($this->pacientes_model->delete($id->id))
			$message=array("status"=>1,"message"=>"SE ELIMINÓ EL CONSULTORIO CON EXÍTO","title"=>"CONSULTORIOS: ","type"=>"success");
		echo json_encode($message);	
	}
	function index2(){
		$data['jsFile']=array(base_url().'assets/js/catalogos/historialesClinico.js',base_url().'assets/js/tags.js');
		$this->load->view('catalogos/historialesClinicos',$data);
	}
	function consultarHistorial($idPaciente=0){
		if($idPaciente>0){

			$data['jsFile']=array(base_url().'assets/js/tags.js');
			$data['paciente']=$this->pacientes_model->get_where($idPaciente);
			$idEstado=(isset($data['paciente'][0]->idEstado))?$data['paciente'][0]->idEstado:0;
			$data['estados']=$this->lugargeografico_model->getEstados(142);
			$data['municipios']=$this->lugargeografico_model->getMunicipios($idEstado);
			$data['idPaciente']=$idPaciente;
			$data['idConsultorio']=0;
			$data['idCita']=0;
			$data['historialMedico']=$this->consultar_model->getHistorialClinicoPaciente($idPaciente);
		
			$this->load->view('catalogos/mostrarHistorial',$data);
		}
	}
	function imprimirReceta($idPciente,$idConsulta){
		ini_set('memory_limit', '256M');
		$data['agudezas']=$this->consultar_model->getAgudeza();
		$data['paciente']=$this->pacientes_model->get_where($idPciente);
		
		$data['consulta']=$this->consultar_model->getInfoConsulta($idConsulta);
		$data['notas']=$this->consultar_model->getNotasConsulta($idConsulta);
		
		$data['graduacionIzquierda']=$this->consultar_model->getGraduaciones(1,$idConsulta);
		$data['graduacionDerecha']=$this->consultar_model->getGraduaciones(2,$idConsulta);

		$data['exploraOftalIzquierda']=$this->consultar_model->getExploracionOftalmologica(1,$idConsulta);
		$data['exploraOftalDerecha']=$this->consultar_model->getExploracionOftalmologica(2,$idConsulta);
		
		$data['refraccionIzquierda']=$this->consultar_model->getRefraccion(1,$idConsulta);
		$data['refraccionDerecha']=$this->consultar_model->getRefraccion(2,$idConsulta);
		$data['retinosIzquierda']=$this->consultar_model->getRetinoscopia(1,$idConsulta);
		$data['retinosDerecha']=$this->consultar_model->getRetinoscopia(2,$idConsulta);
		$data['exploraFondoIzquierda']=$this->consultar_model->getExploracionFondo(1,$idConsulta);
		$data['exploraFondoDerecha']=$this->consultar_model->getExploracionFondo(2,$idConsulta);
		
		/*notas de imagenes*/
		/*ginescopia*/
		$data['ginescopiaIzquierda']=$this->consultar_model->getGinescopia(1,$idConsulta);
		$data['ginescopiaDerecha']=$this->consultar_model->getGinescopia(2,$idConsulta);
		/*meculñar*/
		$data['mecularIzquierda']=$this->consultar_model->getMecular(1,$idConsulta);
		$data['mecularDerecha']=$this->consultar_model->getMecular(2,$idConsulta);
		$html=$this->load->view('catalogos/receta',$data,true);
		///$this->load->view('catalogos/notas',$data,true).
		//print_r($html);
		//die();
		
		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';

		//print_r($data['ginescopiaIzquierda']);
		//echo $html;die();
		$pdf = new DOMPDF();
		$pdf->set_paper("letter", "portrait");
		$html=mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
		$pdf->load_html(utf8_decode($html));
		$pdf->render();
		$pdf->stream('receta-'.$idPciente.'.pdf');
	}


}
?>