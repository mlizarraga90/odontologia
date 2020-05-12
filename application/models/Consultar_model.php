<?php
class Consultar_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getHabitos(){
		return $this->db->query('select id,descripcion from habitos where status=1 order by orden')->result();
	}
	function getExamenesDiagnosticos(){
		return $this->db->query('select id,descripcion from examenesdiagnos where status=1 order by orden')->result();
	}
	function getOdontogramaDx(){
		return $this->db->query('SELECT id,opc1,opc2,opc3,opc4 FROM odontogramadx WHERE STATUS=1')->result();
	}
	function getOdontogramaTx(){
		return $this->db->query('SELECT id,opc1,opc2,opc3,opc4 FROM odontogramatx WHERE STATUS=1')->result();
	}
	function getTratamientos(){
		return $this->db->query('select id,clave,descripcion from tratamientos where status=1 order by orden')->result();
	}

	

}
?>