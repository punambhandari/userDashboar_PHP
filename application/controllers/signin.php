<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('signin/signin');
	}

	public function login()
	{
		$this->load->library('form_validation');

		if($this->form_validation->Run('login')==false)
		{
			$this->load->view('signin/signin');
		}
		else
		{
			redirect('/dashboard/index');

		}


	}


	public function login_password_exists()
	{
		//load model
		$email=$this->input->post('email',true);
		$password=$this->input->post('password',true);
		$this->load->model('User_Dashboard');
		
		if(	$result=$this->User_Dashboard->get_user($email,$password))
		{

			$logged_user= array("username"=>$result['first_name'], "id"=>$result['id'],
				"user_level"=>$result['user_level']);
			
			$this->session->set_userdata('logged_user',$logged_user);
			return true;
		}
		else
		{	$this->form_validation->set_message('login_password_exists','either username or password do not match');
			return false;
		}
	}

	
	


}

//end of main controller