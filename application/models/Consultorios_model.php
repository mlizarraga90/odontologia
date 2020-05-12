<?php
class Consultorios_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->table="consultorios";
		$this->idOrganizacion=1;
	}
	function getEmpleados(){
		$this->db->select("id as value,CONCAT_WS(' ',pPaterno,pMaterno,nombre) AS text");
		$this->db->where('status',1);
		$this->db->where('idOrganizacion',$this->idOrganizacion);
		return $this->db->get('empleados')->result();
	}
	function save($data){
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	
	function updated($data){
		$id=$data['id'];
		unset($data['id']);
		unset($data['idOrganizacion']);
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
		$this->db->select('direccion,consultorios.id,idOrganizacion,descripcion as consultorio,telefono,celular,correo,idEstado,idMunicipio,idEncargado,sepo_estados.nombre_estado as estado,sepo_municipios.nombre_municipio as municipio,getEmpledoById(idEncargado) as encargado');
		$this->db->join('sepo_estados','sepo_estados.id=consultorios.idEstado');
		$this->db->join('sepo_municipios','sepo_municipios.id=consultorios.idMunicipio');
		$this->db->where('idOrganizacion',$this->idOrganizacion);
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	
	function getInfoById($id){
		$this->db->select('descripcion,direccion');
		$this->db->where('id',$id);
		return $this->db->get('consultorios')->result();
	}
}
?>