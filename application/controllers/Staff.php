<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')!= TRUE){
			redirect('Login');
		}
	}
	public function index()
	{
		
		if($this->session->userdata('roleId') === '2')
		{	
		$this->load->view('template/header');	
		$this->load->view('template/dashboard_staff');
		$this->load->view('template/footer');
		}
		else{
			echo "Access Denied!"; 
		}
	}


}