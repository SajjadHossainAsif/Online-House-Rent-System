<?php
	class OwnerModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function ownerInsert($data){

			$this->db->insert('tbl_owner', $data);

		}
		function getOwnerData($data){

			$username=$data['username'];
			$this->db->where('username', $username);
			$query = $this->db->get('tbl_owner');
			return $query->row();

		}

		function ownerLoginCheck($data){

			$username=$data['username'];
			$password=$data['password'];

			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('tbl_owner'); 

			if($query -> num_rows() == 1)
			{
			 	return $query->row();
				
			}
			else
			{
			 	return false;
			}
		}

	}

?>