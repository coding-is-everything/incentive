<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')!= TRUE){
			redirect('Login');
		}
		$this->load->model('Admin_model');
	}
	public function index()
	{
		if($this->session->userdata('roleId') === '1')
		{
		$this->load->view('template/header');
		$this->load->view('template/dashboard');
		$this->load->view('template/footer');
		}
		else{
			echo "Access Denied!"; 
		}
	}
         public function fees()
         {
         $data = array();
         $data['fees'] = $this->Admin_model->getAllFees();
         $data['totals'] = $this->Admin_model->getTotalFees();
         $this->load->view('template/header');
		$this->load->view('template/dashboard',$data);
		$this->load->view('template/footer');

         }
}
