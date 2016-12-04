<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->input->post('search')==FALSE)
		{
			$this->load->model('locationModel');
			$data['locations']=$this->locationModel->getLocation();
			$data['sublocations']=$this->locationModel->getSubLocation();
			$this->load->view('homeview/view_home',$data);

		}else{

			//===================================Home Form validation 
			if ($this->form_validation->run('searchValidation') == FALSE)
            {
                    $this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('homeview/view_home',$data);
            }
            else
            {
                    $data = array(

						'sublocation' => $this->input->post('sublocation'),
						'masterbed' => $this->input->post('masterbed'),
						'bed' => $this->input->post('bed'),
						'balcony' => $this->input->post('balcony'),
						'washroom' => $this->input->post('washroom'),
					);

                    $this->load->model('searchFlatModel');
                    $result['accurateSearch']=$this->searchFlatModel->homeSearch($data);
                    $result['total']=count($result['accurateSearch']);
					$this->parser->parse('homeview/view_searchResult',$result);
					
            }
		}
		
	}
	public function ownerRegistration()
	{
		if($this->input->post('register')==FALSE)
		{
			$this->load->view('homeview/view_ownerRegistration');
		}else{

			//===================================Form validation
			if ($this->form_validation->run('ownerValidation') == FALSE)
            {
                    $this->load->view('homeview/view_ownerRegistration');
            }
            else
            {
                    $data = array(

						'username' => $this->input->post('username'),
						'password' => $this->input->post('matchPassword'),
						'email' => $this->input->post('email'),
						'mobile' => $this->input->post('mobile'),
						'user_role' => '0'
					);

                    $this->load->model('ownerModel');
                    $this->ownerModel->ownerInsert($data);
					$this->load->view('homeview/view_resistrationSuccess');

            }

		}
	}

	public function Login()
	{
		if($this->input->post('login')==FALSE)
		{
			$this->load->view('homeview/view_LogIn');

		}else{
			//=========================================login Validation
			if ($this->form_validation->run('loginValidation') == FALSE)
            {
                    $this->load->view('homeview/view_LogIn');
            }
            else
            {
                    $data = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);

                    $this->load->model('ownerModel');
                    $loginOK=$this->ownerModel->ownerLoginCheck($data);

					if($loginOK==TRUE && $loginOK->user_role=='0'){

						$this->session->set_userdata('ownerUsername', $loginOK->username);
						redirect(base_url().'owner/index');

					}else if($loginOK==TRUE && $loginOK->user_role=='1'){

						redirect(base_url().'admin/index');
						
						
					}
					else{
						echo "Login failed";
					}

            }
		}
		
	}
}
