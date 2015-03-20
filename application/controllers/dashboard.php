<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Dashboard');
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles');
		//$this->output->enable_profiler();
	}

	public function index()
	{

		//load data
		$this->load->model('User_Dashboard');
		$result=$this->User_Dashboard->get_all();

		$this->load->view('dashboard/dashboard', array('users'=>$result));
	}

	public function show($id)
	{
		//get the user data

		$this->load->model('User_Dashboard');
		$user=$this->User_Dashboard->get($id);
		$messages=$this->User_Dashboard->get_all_messages($id);
		$new_messages=array();
		$comments=array();

		foreach ($messages as  $value) {
		
			$new_messages[]=array("message_id"=>$value['message_id'],"message_to_id"=>$value["message_to_id"],
			"message_from_user"=>$value["message_from_user"],"message_date"=>$value["message_date"]	
			,"message"=>$value["message"]);
			
			$comments[]=array("message_id"=>$value['message_id'],"comment_from_user"=>$value["comment_from_user"],
			"comment"=>$value["comment"],"comment_created"=>$value["comment_created"]);
			
		}

		$tmp = array();
	    $result = array();
	    foreach ($new_messages as $value) {
	        if (!in_array($value['message_id'], $tmp)) {
	            array_push($tmp, $value['message_id']);
	            array_push($result, $value);
	        }
	    }
	   
		$this->load->view('dashboard/show',array('user'=>$user,'messages'=>$result,"comments"=>$comments));
		
	}

	public function create_message()
	{
		$post=$this->input->post(null,true);
		$to_user_id=$post['to_user_id'];

		$from_user_id=$this->session->userdata('logged_user')['id'];	
		$this->load->model('User_Dashboard');
		$this->User_Dashboard->create_new_message($post,$from_user_id);
		redirect("/dashboard/show/$to_user_id");
	}
	public function create_comment()
	{
		$post=$this->input->post(null,true);
		$to_user_id=$post['to_user_id'];		
		$from_user_id=$this->session->userdata('logged_user')['id'];	
		$this->load->model('User_Dashboard');
		if($this->User_Dashboard->create_new_comment($post,$from_user_id))
		{
		redirect("/dashboard/show/$to_user_id");
		}
	}

	public function edit_profile()
	{
		$id=$this->session->userdata('logged_user')['id'];
		$profile['profile']=$this->User_Dashboard->get_profile($id);
		$this->load->view('dashboard/profile',$profile);
	}
	public function edit_user_profile($id)
	{
		$profile['profile']=$this->User_Dashboard->get_profile($id);
		$this->load->view('dashboard/profile',$profile);
	}

	public function update_profile_info()
	{	if($this->form_validation->run('profile-info')==true)
			{
				$post=$this->input->post(null,true);			
				$this->load->model('User_Dashboard');
				if($this->User_Dashboard->update_profile_info($post))
				{
				redirect("/dashboard/edit_profile");
				}
			}
		else
		{
			$this->edit_profile();
		}
	}

	public function update_user_profile_info()
	{	$post=$this->input->post(null,true);
		$id=$this->input->post('user_id');
		if($this->form_validation->run('profile-info')==true)
			{
							
				$this->load->model('User_Dashboard');
				if($this->User_Dashboard->update_profile_info($post))
				{
				redirect("/dashboard/edit_user_profile");
				}
			}
			else
			{
				$this->edit_user_profile($id);
			}		

	}

	public function update_profile_password()
	{
		if($this->form_validation->run('profile-password')==true)
			{
			
				$post=$this->input->post(null,true);		
				$this->load->model('User_Dashboard');
				if($this->User_Dashboard->update_profile_password($post))
				{
				redirect("/dashboard/edit_profile");
				}
			}
			else
			{

			$this->edit_profile();
			}
	}

	public function update_user_profile_password()
	{
		$post=$this->input->post(null,true);
		$id=$this->input->post('user_id');
		if($this->form_validation->run('profile-password')==true)
			{
			
						
				$this->load->model('User_Dashboard');
				if($this->User_Dashboard->update_profile_password($post))
				{
				redirect("/dashboard/edit_user_profile");
				}
			}
			else
			{

			$this->edit_user_profile($id);
			}
	}

	public function update_profile_desc()
	{
		if($this->form_validation->run('profile-desc')==true)
		{	
			$post=$this->input->post(null,true);		
			$this->load->model('User_Dashboard');
			if($this->User_Dashboard->update_profile_desc($post))
			{
			redirect("/dashboard/edit_profile");
			}
		}
		else
		{
			$this->edit_profile();
		}
	}

	public function destroy($id)
	{
		$this->User_Dashboard->delete_user($id);
		
			redirect("/dashboard/index");
		

	}

}

//end of main controller