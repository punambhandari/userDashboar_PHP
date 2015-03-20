<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('register/register');
	}

	public function Create()
	{
		
		$this->load->library('form_validation');
		if($this->form_validation->Run('register')==False)
		{
			$this->load->view('register/Register');
		}
		else

		{	//check if this user is the first user to register
			$user_level=1;
			$this->load->model('User_Dashboard');
			$count=$this->User_Dashboard->get_count();
			
			if($count['count']==0)
			{
				$user_level=9;
			}
			
			$post=$this->input->post(NULL,true);
			//$this->load->model('User_Dashboard');
			if($this->User_Dashboard->create($post,$user_level))
			{
				$this->session->set_flashdata('success','user successfully registered! please login');
				redirect('/signin/index');
			}

		}


	}

}

//end of main controller