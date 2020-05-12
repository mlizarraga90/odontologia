<?php
class Empleados_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->table="empleados";
	}
	function save($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
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
	function getConsultorios(){
		$this->db->select('id as value,descripcion as text');
		$this->db->where('status',1);
		$this->db->order_by('value');
		return $this->db->get('consultorios')->result();
	}
	function getCargos(){
		$this->db->select('id as value,descripcion as text');
		$this->db->where('status',1);
		$this->db->order_by('value');
		return $this->db->get('cargosmedicos')->result();
	}
	function getEspecialidad(){
		$this->db->select('id as value,descripcion as text');
		$this->db->where('status',1);
		$this->db->order_by('value');
		return $this->db->get('especialidades')->result();
	}
	function getMunicipios($idEdo){
		$this->db->select('id as value,nombre_municipio as text');
		$this->db->where('clave_estado',$idEdo);
		$this->db->order_by('value');
		return $this->db->get('sepo_municipios')->result();
	}
	function getTipoOrganicacion(){
		$this->db->select('id as value,descripcion as text');
		$this->db->where('status',1);
		$this->db->order_by('value');
		return $this->db->get('tipoorganizaciones')->result();
	}
	function getAll(){
		return $this->db->select('id,idOrganizacion,nombre,pPaterno,pMaterno,celular,telefono,correo,cedula,idConsultorio,idOrganizacion,idEspecialidad,idCargoMedico,getConsultorioById(idConsultorio) AS consultorio,getEspecialdadById(idEspecialidad) AS especialidad,getCargoMedico(idCargoMedico) as cargoMedico')->where('status',1)->get($this->table)->result();
	}
}
?>