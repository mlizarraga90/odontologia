<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crud extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->order_by='';
	}
	function clearWhere($where){
		if(is_array($where)){
			foreach($where as $w=>$key){
				if($where[$w]=="")
					unset($where[$w]);
			}	
		}
		
		return $where;
	}
	function orderBy($field,$type='asc'){
		$this->order_by=array('field'=>$field,'type'=>$type);
	}	
	/*Bueno*/
	function getRows($select="",$joins=NULL,$where,$filters=NULL,$table="",$begin,$end,$groupBy=NULL,$debug=false){
		$data=array();
		if($select!=""){
			$this->db->select($select,FALSE);

			if(is_array($joins)){
		    	foreach ($joins as $join) {
		        	$this->db->join($join['join'],$join['on']);
		      	}
		    }
		    
		    if(is_array($filters) && count($filters)>0){
		    	for($i=0;$i<count($filters);$i++){
		    		
		    		if($filters[$i]['value']!="")
		    			//$this->db->having($filters[$i]['filter'], $filters[$i]['value']);
		    			$this->db->or_having($filters[$i]['filter']." LIKE '%".$filters[$i]['value']."%' " );
		    	}
		    }
		     if(is_array($where) && count($where)>0){
		    	
		    	foreach($where as $row=>$value){

		    		$this->db->where($row,$value);
		    		//$this->db->or_having($row." LIKE '%".$value."%' " );
		    	}
		    }	
		   
		    if(is_array($groupBy) && count($groupBy)>0){

		    	for($i=0;$i<count($groupBy);$i++){
		    		$this->db->group_by($groupBy[$i]);
		    	}
		    }
		    if(is_array($this->order_by)){
		    	$this->db->order_by($this->order_by['field'],$this->order_by['type']);
		    }
		    
		    if($table!=""){
		    	if($begin>0)
		    		$this->db->limit($end,$begin);
		    	else
		    		$this->db->limit($end);
		    	$data['data']=$this->db->get($table)->result();
		    	$data['recordsTotal']=count($data['data']);
		    	$data['recordsFiltered']=$this->getNumRows($select,$joins,$where,$filters,$table);
		    }
		    if($debug){
				echo '<pre>';
				print_r($this->db->last_query());
				echo '</pre>';
			}

		}
		return $data;

	}
	function  getNumRows($select="",$joins=NULL,$where=NULL,$where_like=NULL,$table="",$groupBy=NULL){
		$data=array();
		if($select!=""){
			$this->db->select($select,FALSE);

			if(is_array($joins)){
		    	foreach ($joins as $join) {
		        	$this->db->join($join['join'],$join['on']);
		      	}
		    }
		    

		    if(is_array($where_like) && count($where_like)>0){
		    	for($i=0;$i<count($where_like);$i++){
		    		if($where_like[$i]['value']!="")
		    		$this->db->or_having($where_like[$i]['filter']." LIKE '%".$where_like[$i]['value']."%' " );
		    	}
		    }
		    if(is_array($where) && count($where)>0){
		    	
		    	foreach($where as $row=>$value){
		    		//$this->db->or_having($row." LIKE '%".$value."%' " );
		    		$this->db->where($row,$value);
		    	}
		    }
		    if(is_array($groupBy) && count($groupBy)>0){

		    	for($i=0;$i<count($groupBy);$i++){
		    		$this->db->group_by($groupBy[$i]);
		    	}
		    }
		    if(is_array($this->order_by)){
		    	$this->db->order_by($this->order_by['field'],$this->order_by['type']);
		    }
		    return $this->db->get($table)->num_rows();
		   
		    
		    
			
		}
	}

	/*FUNCIÓN QUE LLENA LOS DATA TABLE*/
	function get($select=NULL,$joins=NULL,$where=NULL,$table,$orderBy=NULL,$groupBy=NULL,$begin=0,$end=0,$whereInd=FALSE,$debug=false){
		$data;
	
		if($orderBy!=NULL)
			$orderBy=json_decode($where['orderBy']);
		if(isset($where['orderBy']))
			unset($where['orderBy']);
		if(isset($where['begin']))
			unset($where['begin']);
		if(isset($where['end']))
			unset($where['end']);
		$where=$this->clearWhere($where);
		
		if($select)
			$this->db->select($select);
		if(is_array($joins)){
	      foreach ($joins as $join) {
	        $this->db->join($join['join'],$join['on']);
	      }
	    }

		if(is_array($where) && count($where)>0)
			$this->db->like($where,false);

		if($whereInd!="" && $whereInd!=FALSE)
			$this->db->where($whereInd);

		if(is_array($orderBy))	
			if(isset($orderBy[0]->orderBy))
			$this->db->order_by($orderBy[0]->field,$orderBy[0]->orderBy);
		if(is_array($groupBy))
			$this->db->group_by($groupBy);
		if($table){
			if($begin>0){
				$data['rows']=$this->db->get($table,$begin,$end)->result();
			}
			else{
				if(($begin==0 && $end==-1) || ($begin==-1 && $end==-1))
					$data['rows']=$this->db->get($table)->result();
				else if($end==10  || $end==5)
					$data['rows']=$this->db->get($table,$end)->result();
				else
					$data['rows']=$this->db->get($table,$begin,$end)->result();
			}
		}


		
		if($debug){
			echo '<pre>';
			print_r($this->db->last_query());
			echo '</pre>';
		}
		
		$data['num_rows']=$this->numRows($select,$joins,$where,$table,$orderBy,$groupBy,$begin,$end,$whereInd);
		return $data;
	}
	
	function numRows($select=NULL,$joins=NULL,$where=NULL,$table,$orderBy=NULL,$groupBy=NULL,$begin=0,$end=0,$whereInd=FALSE){
		$data;
		$where=$this->clearWhere($where);
		if($select)
			$this->db->select($select);
		
		if(is_array($joins)){
	      foreach ($joins as $join) 
	        $this->db->join($join['join'],$join['on']);
	    }
		if(is_array($where) && count($where)>0)
			$this->db->like($where,FALSE);

		if($whereInd!="" && $whereInd!=FALSE)
			$this->db->where($whereInd);


		if(is_array($orderBy))	
			if(isset($orderBy[0]->orderBy))
				$this->db->order_by($orderBy[0]->field,$orderBy[0]->orderBy);
		if(is_array($groupBy))
			$this->db->group_by($groupBy);
		$data=$this->db->get($table)->num_rows();
		return $data;
	}
	function get_where($fields=NULL,$joins=NULL,$where=NULL,$table=NULL,$groupBy=NULL,$orederBy=NULL){
		if($fields!=NULL)
			$this->db->select($fields);
		if(is_array($joins)){
	      foreach ($joins as $join) {
	      	if(isset($join['type'])){
	      		
	        	$this->db->join($join['join'],$join['on'],$join['type']);
	      	}
	        else
	        	$this->db->join($join['join'],$join['on']);
	      }
	    }
		if(is_array($where))
			$this->db->where($where);
		if(!is_array($groupBy) && $groupBy!=NULL )
			$this->db->group_by($groupBy);

		if(is_array($orederBy))
			$this->db->order_by($orederBy[0]);
		return $this->db->get($table)->result();
		
	}
	function like($select=NULL,$joins=NULL,$where=NULL,$table,$orderBy=NULL,$groupBy=NULL,$begin=0,$end=0,$debug=false){
		$data;
		if($orderBy!=NULL)
			$orderBy=json_decode($where['orderBy']);
		if(isset($where['orderBy']))
			unset($where['orderBy']);
		if(isset($where['begin']))
			unset($where['begin']);
		if(isset($where['end']))
			unset($where['end']);
		$where=$this->clearWhere($where);
		
		if($select)
			$this->db->select($select);
		if(is_array($joins)){
	      foreach ($joins as $join) {
	        $this->db->join($join['join'],$join['on']);
	      }
	    }
	    if(is_array($where)){
	    	foreach($where as $having=>$value){

	    		if($having!="existencia")
	    			$this->db->having($having .' like "%'.$value.'%"');
	    		else
	    			$this->db->having('existencia >0');

	    	}
	    }
		if(is_array($orderBy))	
			if(isset($orderBy[0]->orderBy))
			$this->db->order_by($orderBy[0]->field,$orderBy[0]->orderBy);
		if(is_array($groupBy))
			$this->db->group_by($groupBy);
		if($table){
			if($begin>0){
				$data['rows']=$this->db->get($table,$begin,$end)->result();
			}
			else{
				if(($begin==0 && $end==-1) || ($begin==-1 && $end==-1))
					$data['rows']=$this->db->get($table)->result();
				else if($end==10  || $end==5)
					$data['rows']=$this->db->get($table,$end)->result();
				else
					$data['rows']=$this->db->get($table,$begin,$end)->result();
			}
		}


		
		if($debug){
			echo '<pre>';
			print_r($this->db->last_query());
			echo '</pre>';
		}
		
		$data['num_rows']=$this->numRowsLike($select,$joins,$where,$table,$orderBy,$groupBy,$begin,$end);
		return $data;
	}
	function numRowsLike($select=NULL,$joins=NULL,$where=NULL,$table,$orderBy=NULL,$groupBy=NULL,$begin=0,$end=0){
		$data;
		$where=$this->clearWhere($where);
		if($select)
			$this->db->select($select);
		
		if(is_array($joins)){
	      foreach ($joins as $join) 
	        $this->db->join($join['join'],$join['on']);
	    }
		if(is_array($where)){
	    	foreach($where as $having=>$value){

	    		if($having!="existencia")
	    			$this->db->having($having .' like "%'.$value.'%"');
	    		else
	    			$this->db->having('existencia >0');

	    	}
	    }
		if(is_array($orderBy))	
			if(isset($orderBy[0]->orderBy))
				$this->db->order_by($orderBy[0]->field,$orderBy[0]->orderBy);
		if(is_array($groupBy))
			$this->db->group_by($groupBy);
		$data=$this->db->get($table)->num_rows();
		return $data;
	}
	function insert($columns_arr,$table=NULL){
    	if(is_array($columns_arr)){
      		if($this->db->insert($table,$columns_arr)){
        		return $this->db->insert_id();
      		}else{
        		return FALSE;
      		}
    	}
  	}
  	function update($columns_arr, $where_arr = NULL,$table="",$debug=FALSE){
	    if(isset($where_arr)){
		      $this->db->where($where_arr);
		      $this->db->update($table,$columns_arr);
		      if($debug)
		      	print_r($this->db->last_query());
	      	if($this->db->affected_rows()>0){
	        	return $this->db->affected_rows();
	      	}
	    }
	    else{
	    	return FALSE;
	    }
	}
	function updateQuery($query,$debug=FALSE){
		$this->db->query($query);
		return $this->db->affected_rows();
	}
	function delete($table="",$where=NULL){
		if($table!="" && $where!=NULL){
			$this->db->delete($table,$where);
			return $this->db->affected_rows();
		}

	}
	

}

?>