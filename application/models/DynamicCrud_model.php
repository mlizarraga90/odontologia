<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DynamicCrud_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getDataBaseTables(){
		return $this->db->query("show tables")->result();
	}
	function getFieldsTable($table){
		return $this->db->query("describe ".$table)->result();
	}
	function listar_directorios_ruta($ruta){ 
		$folders=array();
	   // abrir un directorio y listarlo recursivo 
	   if (is_dir($ruta)) { 
	      if ($dh = opendir($ruta)) { 
	         while (($file = readdir($dh)) !== false) { 
	            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
	            //mostraría tanto archivos como directorios 
	            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
	            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
	               //solo si el archivo es un directorio, distinto que "." y ".." 
	            	$folders[]=$file;
	               
	               $this->listar_directorios_ruta($ruta . $file . "/"); 
	            } 
	         } 
	      closedir($dh); 
	      } 
	   }
	      return $folders;
	}
}
?>