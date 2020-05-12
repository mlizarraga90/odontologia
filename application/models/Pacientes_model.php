<?php
class Pacientes_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->table="pacientes";
	}
	function getFiles($idConsulta){
		$this->db->select('id,archivo');
		$this->db->where('idConsulta',$idConsulta);
		return $this->db->get('archivosconsultas')->result();
	}
	function saveFiles($file){
		$this->db->insert('archivosconsultas',$file);
		return $this->db->insert_id();
	}
	function save($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	function get_where($id){
		return $this->db->select('*,isSubSecuente(pacientes.id) as isSubSecuente,getEdo(idEdoNaci) as estado,getMuni(idMuniNaci) as municipio,IF(edad is null,YEAR(CURDATE())-YEAR(fechaNacimiento),edad ) AS edad,date_format(fechaNacimiento,"%m/%d/%Y") as fechaNacimiento ')->where('id',$id)->get('pacientes')->result();
	}
	
	function update($data){
		$id=$data['id'];
		unset($data['id']);
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}
	function delete($id){
		$data=array('status'=>0); 
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

	function getAll(){
		return $this->db->select('*')->where('status',1)->get($this->table)->result();
	}
}
?>