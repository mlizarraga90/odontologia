<?php
class LugarGeografico_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getPaises(){
		$this->db->select('id as value,nombre_corto as text');
		$this->db->where('status',1);
		$this->db->order_by('value');
		return $this->db->get('sepo_paises')->result();
	}
	
	function getEstados($idPais){
		$this->db->select('id as value,nombre_estado as text');
		$this->db->where('id_pais',$idPais);
		$this->db->order_by('value');
		return $this->db->get('sepo_estados')->result();
	}
	function getMunicipios($idEdo){
		$this->db->select('id as value,nombre_municipio as text');
		$this->db->where('clave_estado',$idEdo);
		$this->db->order_by('value');
		return $this->db->get('sepo_municipios')->result();
	}
}
?>