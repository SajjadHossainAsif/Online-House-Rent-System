<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('ownerUsername')){

		}else{
			redirect(base_url().'home/login');
		}
	}

	public function index()
	{
		
		$data['username']=$this->session->userdata('ownerUsername');

		$this->load->model('ownerModel');
        $userdata=$this->ownerModel->getOwnerData($data);

		$this->parser->parse('houseownerview/view_ownerHome',$userdata);


	}
	public function addFlat()
	{

		if($this->input->post('addFlat')==FALSE)
		{
			$this->load->model('locationModel');
			$data['locations']=$this->locationModel->getLocation();
			$data['sublocations']=$this->locationModel->getSubLocation();
			$this->load->view('houseownerview/view_addFlat',$data);

		}else{

			//===================================addFlat Form validation
			if ($this->form_validation->run('addFlatValidation') == FALSE)
            {
                    $this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('houseownerview/view_addFlat',$data);
            }
            else
            {
                    $addFlatdata = array(

						'flat_name' => $this->input->post('flatname'),
						'owner_username' => $this->session->userdata('ownerUsername'),
						'location_details' => $this->input->post('locationDetails'),
						'location_id' => $this->input->post('sublocation'),
						'flat_type' => $this->input->post('flattype'),
						'masterbed' => $this->input->post('masterbed'),
						'bed' => $this->input->post('bed'),
						'balcony' => $this->input->post('balcony'),
						'washroom' => $this->input->post('washroom'),
						'flat_details' => $this->input->post('flatDetails'),
						'flat_price' => $this->input->post('price'),
						'isPublished' => '0'
						
					);

                    $this->load->model('flatModel');
                    $this->flatModel->addNewFlat($addFlatdata);

                    $this->session->set_flashdata('addSuccessMessage', ' ');

					$this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('houseownerview/view_addFlat',$data);

            }

		}
		


	}
	public function LogOut()
	{
		
		$this->session->sess_destroy();
		redirect(base_url().'home/index');


	}
	public function allFlat()
	{
		
		$this->load->model('flatModel');
		$data['allFlat']=$this->flatModel->getAllFlat();
		$data['totalFound']=count($data['allFlat']);
		$data['username']=$this->session->userdata('ownerUsername');
		$this->parser->parse('houseownerview/view_allFlat',$data);
	}
	public function editFlat()
	{
		
		/*$this->load->model('flatModel');
		$data['allFlat']=$this->flatModel->getAllFlat();
		$data['totalFound']=count($data['allFlat']);
		$data['username']=$this->session->userdata('ownerUsername');
		$this->parser->parse('houseownerview/view_allFlat',$data);*/


	}

	public function deleteFlat($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->deleteFlat($id);
		$this->session->set_flashdata('deleteSuccess', 'Selected Flat Delete Successfully');
		redirect(base_url().'owner/allFlat');
		/*$data['totalFound']=count($data['allFlat']);
		$data['username']=$this->session->userdata('ownerUsername');
		$this->parser->parse('houseownerview/view_allFlat',$data);*/


	}

	public function publishedFlat()
	{
		
		$this->load->model('flatModel');
		$data['publishedFlat']=$this->flatModel->published();
		$data['totalFound']=count($data['publishedFlat']);
		$this->parser->parse('houseownerview/view_publishedFlat',$data);


	}
	public function publishIt($id)
	{
		if($this->input->post('publishSubmit')==FALSE)
		{
			$this->load->model('flatModel');
			$data['getFlat']=$this->flatModel->getOneFlatInfoToPublish($id);
			$this->parser->parse('houseownerview/view_publishIt',$data);
			

		}else{


			//===================================addFlat Form validation
			if ($this->form_validation->run('dateValidation') == FALSE)
            {
             	$this->load->model('flatModel');
				$data['getFlat']=$this->flatModel->getOneFlatInfoToPublish($id);
				$this->parser->parse('houseownerview/view_publishIt',$data);
            }   
            else
            {
                    $updateData = array(
                    	'id' => $this->input->post('faltid'),
						'available_from' => $this->input->post('available_from'),
						
					);
                    
                    $this->load->model('flatModel');
                    $this->flatModel->publishIt($updateData);
                    $this->session->set_flashdata('unPublishItSuccess', 'Flat Published Successfully');
                  	redirect(base_url().'owner/publishedFlat');

            }

		}


		
	}




	public function unpublishedFlat()
	{
		
		$this->load->model('flatModel');
		$data['unpublishedFlat']=$this->flatModel->unpublished();
		$data['totalFound']=count($data['unpublishedFlat']);
		$this->parser->parse('houseownerview/view_unpublishedFlat',$data);
	}
	public function unPublishIt($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->unPublishIt($id);
		$this->session->set_flashdata('unPublishItSuccess', 'Flat Unpublished Successfully');
		redirect(base_url().'owner/publishedFlat');

	}
	
		
	
}
