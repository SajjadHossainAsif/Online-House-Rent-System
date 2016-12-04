<?php
	class LocationModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function getLocation(){

			$query = $this->db->get('tbl_location'); 
			return $query->result_array();

		}

		function getSubLocation(){
			
			$query = $this->db->get('tbl_sublocation'); 
			return $query->result_array();
		}
		
	}

?>