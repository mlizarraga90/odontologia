<?php
class Organizacion_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->table="organizaciones";
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
	function getInfo(){
		return $this->db->where('status',1)->get($this->table)->result();
	}
}
?>