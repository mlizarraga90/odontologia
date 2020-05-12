<?php
class Citas_model extends CI_model{
	function __construct(){
		parent::__construct();
		$this->table="citasagendadas";
	}
	function add($data){
		$idPaciente=0;
		$existPaciente=$this->existsPaciente($data['celular']);

		if(isset($existPaciente[0]->id) && (int) $existPaciente[0]->id>0){
			$idPaciente=$existPaciente[0]->id;
			$data['subsecuente']=1;
		}else{
			$idPaciente=$this->insertPaciente($data);
			
		}

		$data['idPaciente']=$idPaciente;

		$this->db->insert($this->table,$data);
		$id=$this->db->insert_id();

		return array('idCita'=>$id,'idPaciente'=>$idPaciente);
	}
	function existeCita($horaInicia,$horFin,$fechaCita){
		$this->db->select('id');
		$this->db->where("DATE_FORMAT(fechaCita,'%Y-%m-%d')",$fechaCita);
		$this->db->where("horaInicio",$horaInicia);
		$this->db->where("horaFin",$horFin);
		$this->db->where('status',1);
		return $this->db->get('citasagendadas')->result();
	}

	function existsPaciente($celular){
		return $this->db->select('id')->where('celular',$celular)->get('pacientes')->result();
	}
	function insertPaciente($data){
		$dataToSave=array();
		$nombre=explode(' ', $data['nombre']);
		if(count($nombre)==4){
			$dataToSave['nombre']=$nombre[0].' '.$nombre[1];
			$dataToSave['aPaterno']=$nombre[2];
			$dataToSave['aMaterno']=$nombre[3];
		}else if(count($nombre)==3){
			$dataToSave['nombre']=$nombre[0];
			$dataToSave['aPaterno']=$nombre[1];
			$dataToSave['aMaterno']=$nombre[2];
		}else if(count($nombre)==2){
			$dataToSave['nombre']=$nombre[0];
			$dataToSave['aPaterno']=$nombre[1];
		}else{
			$dataToSave['nombre']=$nombre[0];
		}
		$dataToSave['celular']=$data['celular'];
		$this->db->insert('pacientes',$dataToSave);
		$id=$this->db->insert_id();
		return $id;
		
	}
	function getCitasWeb($consultorio){
		$this->db->select("id,if(subsecuente=1,concat('Subsecuente','\n',nombre),nombre) AS title,CONCAT(DATE_FORMAT(fechaCita,'%Y-%m-%d'),'T',horaInicio) AS start,CONCAT(DATE_FORMAT(fechaCita,'%Y-%m-%d'),'T',horaFin) AS end,status,celular,nombre AS title,nombre,");
		$this->db->where('idConsultorio',$consultorio);
		$this->db->where('status',1);
		return $this->db->get('citasagendadas')->result();
	}
	function update($data,$id){
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}
	function cancelarCita($data,$id){
		$this->db->where('codigo',$id);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}
	function cancelarCitaAdmin($data,$idCita){
		$this->db->where('id',$idCita);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}
	function getCitasWebAdmin($consultorio,$status){
		$this->db->select("horaInicio,horaFin,idConsultorio,id,idPaciente,if(subsecuente=1,concat('Subsecuente','\n',nombre),nombre) AS title,nombre,CONCAT(DATE_FORMAT(fechaCita,'%Y-%m-%d'),'T',horaInicio) AS start,CONCAT(DATE_FORMAT(fechaCita,'%Y-%m-%d'),'T',horaFin) AS end,status,celular,if(status=0,'#fb6340',if(status=2,'#2dce89','#11cdef')) as color,'white' as textColor, 'papa' as descripcion");
		$this->db->where('idConsultorio',$consultorio);
		if($status!=-1)
			$this->db->where('status',$status);
		return $this->db->get('citasagendadas')->result();
	}

	function getCitasVigentes($idConsultorio){
		return $this->db->select('count(id) as totalCitas')->where('status',1)->where('idConsultorio',$idConsultorio)->get('citasagendadas')->result();	
	}

	function getCitasAtendidas($idConsultorio){
		return $this->db->select('count(id) as totalCitas')->where('status',2)->where('idConsultorio',$idConsultorio)->get('citasagendadas')->result();	
	}

	function getCitasCanceladas($idConsultorio){
		return $this->db->select('count(id) as totalCitas')->where('status',0)->where('idConsultorio',$idConsultorio)->get('citasagendadas')->result();	
	}
	function graficaGananciaMensual($idConsultorio){
		$dataSet=array();
		$data=array();
		$meses=['Enero','Febreo','Marzo','Abríl','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Dicmebre'];
		$consultorios=$this->getConsultorios();
		$indiceMeses=[1,2,3,4,5,6,7,8,9,10,11,12];
		$labels=array();
		$vueltas=count($indiceMeses);
		$index=0;
		foreach($consultorios as $row){
			for($i=0;$i<$vueltas;$i++){
				if($index==0)
					$labels[]=$meses[$i];

				$dinero=$this->db->select('SUM(getCostoConsulta(idConsultorio)) AS total')->where(' MONTH(fechaRegistro)',$indiceMeses[$i])->where('idConsultorio',$row->id)->get('consultas')->result();
				$data[]=(isset($dinero[0]->total))?(float)$dinero[0]->total:(float)0;
			}
			$dataSet[]=array(
				'data'=>$data,
				'label'=>$row->descripcion,
				'fill'=>false,
				'borderColor'=>$this->getColors($index)
			);
			$index++;
			$data=array();
		}
		return array(
			'labels'=>$labels,
			'dataSet'=>$dataSet
		);

	}
	function getCostosByConsultorio($fecha){
		$consultorios=$this->getConsultorios();
		$labels=array();
		$colors=array();
		$data=array();
		$index=0;
		foreach($consultorios as $row){
			$labels[]=$row->descripcion;
			$colors[]=$this->getColors($index);
			if($fecha=="")
				$dinero=$this->db->select('SUM(getCostoConsulta(idConsultorio)) AS total')->where('idConsultorio',$row->id)->get('consultas')->result();
			else{
				$fecha=str_replace('/', '-', $fecha);
				$dinero=$this->db->select('SUM(getCostoConsulta(idConsultorio)) AS total')->where('idConsultorio',$row->id)->where('date_format(fechaRegistro,"%m-%d-%Y")',$fecha)->get('consultas')->result();
			}
			
			$data[]=(isset($dinero[0]->total))?(float)$dinero[0]->total:(float)0;
			$index++;
		}
		return array(
			'labels'=>$labels,
			'colors'=>$colors,
			'data'=>$data
		);
	}
	function getConsultorios(){
		return $this->db->select('id,descripcion')->where('status',1)->get('consultorios')->result();
	}
	function getColors($index){
		$colors=["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd","#8e5ea2","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"];
		return $colors[$index];
	}
}
?>