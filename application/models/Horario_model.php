<?php
class Horario_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->table="horarios";
	}
	function getHorarioDiaConsul($dia,$idConsultorio){
		return $this->db->select('dia,horaInicia,horaTermina')->where('dia',$dia)->where('idConsultorio',$idConsultorio)->where('cerrado',0)->get('horarios')->result();
	}
	function save($data){

		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	
	}
	function getHorarioTrabajo($idConsultorio){
		$this->db->select('dia,horaInicia,horaTermina ');
		$this->db->where('idConsultorio',$idConsultorio);
		$this->db->where('cerrado',0);
		$this->db->where('status',1);
		return $this->db->get('horarios')->result();
	}

	function getDiasCerrado($idConsultorio){
		$this->db->select('dia');
		$this->db->where('idConsultorio',$idConsultorio);
		$this->db->where('cerrado',1);
		$this->db->where('status',1);
		return $this->db->get('horarios')->result();
	}
	function getHoraMinima($idConsultorio){
		$this->db->select('horaInicia');
		$this->db->where('idConsultorio',$idConsultorio);
		$this->db->where('cerrado',0);
		$this->db->where('status',1);
		$this->db->order_by("TIME_FORMAT(horaInicia,'%P') ASC");
		$result=$this->db->get('horarios')->result();
		if(count($result)>0)
			return $result[0];
		return array();
	}
	function getHoraMaxima($idConsultorio){
		$this->db->select('horaTermina');
		$this->db->where('idConsultorio',$idConsultorio);
		$this->db->where('cerrado',0);
		$this->db->where('status',1);
		$this->db->order_by("horaTermina desc");
		$result=$this->db->get('horarios')->result();
		if(count($result)>0)
			return $result[0];
		return array();
	}
	function borrarHorario($idConsultorio){
		$status=array('status'=>0);
		$this->db->where('idConsultorio',$idConsultorio);
		$this->db->update($this->table,$status);
		return $this->db->affected_rows();
	}
}
?>