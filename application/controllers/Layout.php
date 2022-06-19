<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Controller {

	public function index()
	{
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
		$this->load->view('template/header');
		$this->load->view('template/dashboard');
		$this->load->view('template/footer');
	}
	public function batch()
	{
		$this->load->view('template/header');
		$this->load->view('template/viewBatch');
		$this->load->view('template/footer');
	}
	public function batchAdd()
	{
		$this->load->view('template/header');
		$this->load->view('template/addBatch');
		$this->load->view('template/footer');
	}
	public function course()
	{
		$this->load->view('template/header');
		$this->load->view('template/viewCourse');
		$this->load->view('template/footer');
	}
	public function courseAdd()
	{
		$this->load->view('template/header');
		$this->load->view('template/addCourse');
		$this->load->view('template/footer');
	}
	public function category()
	{
		$this->load->view('template/header');
		$this->load->view('template/viewCategory');
		$this->load->view('template/footer');
	}
	public function categoryAdd()
	{
		$this->load->view('template/header');
		$this->load->view('template/addCategory');
		$this->load->view('template/footer');
	}
	public function sale()
	{
		$this->load->view('template/header');
		$this->load->view('template/viewSale');
		$this->load->view('template/footer');
	}
	public function saleAdd()
	{
		$this->load->view('template/header');
		$this->load->view('template/addSale');
		$this->load->view('template/footer');
	}
	public function user()
	{
		$this->load->view('template/header');
		$this->load->view('template/viewUser');
		$this->load->view('template/footer');
	}
	public function userAdd()
	{
		$this->load->view('template/header');
		$this->load->view('template/addUser');
		$this->load->view('template/footer');
	}

}
