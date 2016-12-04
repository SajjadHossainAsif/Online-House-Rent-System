<?php
	class SearchFlatModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		
		function homeSearch($userInput){

			$sublocation = $userInput['sublocation'];
			$masterbed = $userInput['masterbed'];
			$bed = $userInput['bed'];
			$balcony = $userInput['balcony'];
			$washroom = $userInput['washroom'];
		

			$this->db->where('isPublished', '1');
			$this->db->where('location_id', $sublocation);
			$this->db->where('masterbed', $masterbed);
			$this->db->where('bed', $bed);
			$this->db->where('balcony', $balcony);
			$this->db->where('washroom', $washroom);

			$query = $this->db->get('tbl_flat'); 

			return $query->result_array();
		}
		
	}

?>