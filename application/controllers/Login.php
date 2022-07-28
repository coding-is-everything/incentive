<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');

	}
	public function index()
	{
		$this->load->view('template/login');
	}
	function auth(){
		if($this->input->post('login')){
		$useremail = $this->input->post('userEmail',TRUE);
		$password = $this->input->post('userPassword',TRUE);
		//print($useremail.$password);
		//exit();
		$result = $this->Login_model->check_user($useremail,$password);
		 
		if($result->num_rows() > 0){
			$data = $result->row_array();
			$name = $data['userName'];
			$email = $data['userEmail'];
			$level = $data['roleId'];
			$userId = $data['userId'];
			$sesdata = array(
				'userName'=> $name,
				'userEmail'=> $email,
				'roleId'=> $level,
				'userId'=> $userId,
				'logged_in'=> TRUE,
			);
			$this->session->set_userdata($sesdata);
			if($level == '1'){
				redirect('Admin/fees');
			}elseif($level == '2'){
				redirect('Staff');
			}else{
			redirect('Student');
		    }
		}
		else{
			echo "<script>alert('access denied');history.go(-1);</script>";
		}

}
		
		$this->load->view('template/login');
	}

 function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}
