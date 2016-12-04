<?php
	class FlatModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function addNewFlat($data){

			$this->db->insert('tbl_flat', $data);

		}

		function getOneFlatInfoToPublish($id){

			$this->db->where('id', $id);
			$this->db->where('isPublished', '0');
			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}

		function published(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$this->db->where('isPublished', '1');

			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}

		function getAllFlat(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}

		function deleteFlat($id){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('id', $id);
			$this->db->where('owner_username', $username);
			$this->db->delete('tbl_flat');

		}

		function publishIt($updateData){

			
			$data = array(
			        'available_from' => $updateData['available_from'],
			        'isPublished' => '1'
			);
			$username=$this->session->userdata('ownerUsername');
			
			$this->db->where('id', $updateData['id']);
			$this->db->where('owner_username', $username);
			$this->db->update('tbl_flat', $data);


		}

		function unPublishIt($id){

		
			$data = array(
			        'available_from' => 'unpublished',
			        'isPublished' => '0'
			);

			$username=$this->session->userdata('ownerUsername');
			$this->db->where('id', $id);
			$this->db->where('owner_username', $username);
			$this->db->update('tbl_flat', $data);


		}

		function unpublished(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$this->db->where('isPublished', '0');

			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}
		

	}

?>