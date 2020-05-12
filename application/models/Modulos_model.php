<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modulos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getModuleById($idModulo){
		$this->db->select('body as bodyModule,title');
		$this->db->where('id',$idModulo);
		return $this->db->get('modulos')->result();
	}
}
?>