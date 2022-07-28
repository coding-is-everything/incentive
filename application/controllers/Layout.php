<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/footer');
	}
	public function login()
	{
		//$this->load->view('template/header');
		$this->load->view('template/login');
		//$this->load->view('template/footer');
	}
	public function home()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/dashboard');
		$this->load->view('template/footer');
	}
	public function batch()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/manageBatch');
		$this->load->view('template/footer');
	}
	public function batchAdd()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/addBatch');
		$this->load->view('template/footer');
	}
	public function course()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/manageCourse');
		$this->load->view('template/footer');
	}
	public function courseAdd()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/addCourse');
		$this->load->view('template/footer');
	}
	
	public function sale()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/manageSale');
		$this->load->view('template/footer');
	}
	public function saleAdd()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/addSale');
		$this->load->view('template/footer');
	}
	public function user()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/manageUser');
		$this->load->view('template/footer');
	}
	public function userAdd()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/addUser');
		$this->load->view('template/footer');
	}
	public function student()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/manageStudent');
		$this->load->view('template/footer');
	}
	public function studentAdd()
	{
		if(!$this->session->userdata("userId"))
			return redirect('Login');
		$this->load->view('template/header');
		$this->load->view('template/addStudent');
		$this->load->view('template/footer');
	}

}
