<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {
    
function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('Sale_model');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        // Load pagination library
        $this->load->library('pagination');
    }

	public function sale_tab(){ 
	$data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['sales'] = $this->Sale_model->getRows();
        $data['batches'] = $this->Sale_model->getAllBatches();
         $data['students'] = $this->Sale_model->getAllStudents();
         $data['users'] = $this->Sale_model->getAllUsers();
        
        // Load the list page view
        $this->load->view('template/header');
		$this->load->view('template/manageSale',$data);
		$this->load->view('template/footer'); 
}

public function view($id){
        $data = array();
        
        // Check whether batch id is not empty
        if(!empty($id)){
            $data['sale'] = $this->Sale_model->getRows(array('saleId' => $id));;
            $data['title']  = 'Sale Details';
            $data['batches'] = $this->Sale_model->getAllBatches();
            $data['users'] = $this->Sale_model->getAllUsers();
            $data['students'] = $this->Sale_model->getAllStudents();
            // Load the details page view
            $this->load->view('template/header');
			$this->load->view('template/viewSale',$data);
			$this->load->view('template/footer');
        }else{
            redirect('Sale/sale_tab');
        }
    }

    public function add(){

        $data = array();
        $saleData = array();
        $data['batches'] = $this->Sale_model->getAllBatches();
        $data['users'] = $this->Sale_model->getAllUsers();
        $data['students'] = $this->Sale_model->getAllStudents();
        // If add request is submitted
        if($this->input->post('saleSubmit')){

            // Form field validation rules
           $this->form_validation->set_rules('batchId','Batch','required');
           $this->form_validation->set_rules('userId','User','required');
           $this->form_validation->set_rules('studentId','Student','required');
           $this->form_validation->set_rules('couesePriceGiven', 'given price', 'required|trim');
            $this->form_validation->set_rules('transactionDate', 'transaction date', 'required|trim');
            $this->form_validation->set_rules('nextCommitedDate', 'next commited date', 'required|trim');
            $this->form_validation->set_rules('saleStatus', 'sale status', 'required|trim');
            // Prepare batch data
            $picture = array(
                 'upload_path'=>'public/admin/screenshot',
                 'allowed_types'=> 'jpg|png|jpeg',
                 'max_size' => 4000
                );
            $this->load->library("upload",$picture);
            $this->upload->initialize($picture);
            if(!$this->upload->do_upload('screenShot')){
                $saleData = array(
                 //'saleId'=> $id,   
                'batchId'=> $this->input->post('batchId'),
                'userId'=> $this->input->post('userId'),
                'studentId'=> $this->input->post('studentId'),
                'price'=> $this->input->post('price'),
                'courseIncentivePer'=> $this->input->post('courseIncentivePer'),
                'courseIncentive'=> $this->input->post('courseIncentive'),
                'courseIncentivePerTeam'=> $this->input->post('courseIncentivePerTeam'),
                'courseIncentiveTeam'=> $this->input->post('courseIncentiveTeam'),
                'coursePriceCommited' => $this->input->post('coursePriceCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'couesePriceGiven' => $this->input->post('couesePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transactionDate' => $this->input->post('transactionDate'),
                'nextCommitedDate' => $this->input->post('nextCommitedDate'),
                'details' => $this->input->post('details'),
                'saleStatus' => $this->input->post('saleStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
                 }
                else{
                    $fd = $this->upload->data();
                    $fn = $fd['file_name'];
                    $saleData = array(
                'batchId'=> $this->input->post('batchId'),
                'userId'=> $this->input->post('userId'),
                'studentId'=> $this->input->post('studentId'),
                'price'=> $this->input->post('price'),
                'courseIncentivePer'=> $this->input->post('courseIncentivePer'),
                'courseIncentive'=> $this->input->post('courseIncentive'),
                'courseIncentivePerTeam'=> $this->input->post('courseIncentivePerTeam'),
                'courseIncentiveTeam'=> $this->input->post('courseIncentiveTeam'),
                'coursePriceCommited' => $this->input->post('coursePriceCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'couesePriceGiven' => $this->input->post('couesePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transactionDate' => $this->input->post('transactionDate'),
                'nextCommitedDate' => $this->input->post('nextCommitedDate'),
                'screenShot' => $fn,
                'details' => $this->input->post('details'),
                'saleStatus' => $this->input->post('saleStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
           
        }
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert batch data
                $insert = $this->Sale_model->insert($saleData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Sale has been added successfully.');
                    redirect('Sale/sale_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
            
        }
        
        $data['sale'] = $saleData;
       
        // Load the add page view
        	$this->load->view('template/header');
            $this->load->view('template/addSale',$data);
			$this->load->view('template/footer');
        
    }

public function edit($id){
        $data = array();

        // Get batch data
        $saleData = $this->Sale_model->getRows(array('saleId' => $id));

        $data['batches'] = $this->Sale_model->getAllBatches();
        $data['users'] = $this->Sale_model->getAllUsers();
        $data['students'] = $this->Sale_model->getAllStudents();
        // If update request is submitted
        if($this->input->post('saleSubmit')){

            //print_r($_POST);

            // Form field validation rules
           /* $this->form_validation->set_rules('batchId','Batch','required|callback_check_default');
           $this->form_validation->set_message('check_default', 'Please Select Batch');
           $this->form_validation->set_rules('userId','User','required|callback_check_default');
           $this->form_validation->set_message('check_default', 'Please Select Sale Representative');
           $this->form_validation->set_rules('studentId','Student','required|callback_check_default');
           $this->form_validation->set_message('check_default', 'Please Select Student');
            $this->form_validation->set_rules('coursePriceCommited', 'price commited', 'required|trim');
            $this->form_validation->set_rules('couesePriceGiven', 'given price', 'required|trim');
            $this->form_validation->set_rules('transactionDate', 'transaction date', 'required|trim');
            $this->form_validation->set_rules('nextCommitedDate', 'next commited date', 'required|trim');
            $this->form_validation->set_rules('saleStatus', 'sale status', 'required|trim');*/
            // Prepare batch data
            $picture = array(
                 'upload_path'=>'public/admin/screenshot',
                 'allowed_types'=> 'jpg|png|jpeg|gif',
                 'max_size' => 4000 //4Mb
                );
            $this->load->library("upload",$picture);
            $this->upload->initialize($picture);
            if(!$this->upload->do_upload('screenShot')){
                $saleData = array(
                 //'saleId'=> $id,   
                'batchId'=> $this->input->post('batchId'),
                'userId'=> $this->input->post('userId'),
                'studentId'=> $this->input->post('studentId'),
                'price'=> $this->input->post('price'),
                'courseIncentivePer'=> $this->input->post('courseIncentivePer'),
                'courseIncentive'=> $this->input->post('courseIncentive'),
                'courseIncentivePerTeam'=> $this->input->post('courseIncentivePerTeam'),
                'courseIncentiveTeam'=> $this->input->post('courseIncentiveTeam'),
                'coursePriceCommited' => $this->input->post('coursePriceCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'couesePriceGiven' => $this->input->post('couesePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transactionDate' => $this->input->post('transactionDate'),
                'nextCommitedDate' => $this->input->post('nextCommitedDate'),
                'details' => $this->input->post('details'),
                'saleStatus' => $this->input->post('saleStatus'),
                'updatedDate' => $this->input->post('updatedDate')
            );
                 }
                else{
                    $fd = $this->upload->data();
                    $fn = $fd['file_name'];
                    $saleData = array(
                 //'saleId'=> $id,        
                'batchId'=> $this->input->post('batchId'),
                'userId'=> $this->input->post('userId'),
                'studentId'=> $this->input->post('studentId'),
                'price'=> $this->input->post('price'),
                'courseIncentivePer'=> $this->input->post('courseIncentivePer'),
                'courseIncentive'=> $this->input->post('courseIncentive'),
                'courseIncentivePerTeam'=> $this->input->post('courseIncentivePerTeam'),
                'courseIncentiveTeam'=> $this->input->post('courseIncentiveTeam'),
                'coursePriceCommited' => $this->input->post('coursePriceCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'couesePriceGiven' => $this->input->post('couesePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transactionDate' => $this->input->post('transactionDate'),
                'nextCommitedDate' => $this->input->post('nextCommitedDate'),
                'screenShot' => $fn,
                'details' => $this->input->post('details'),
                'saleStatus' => $this->input->post('saleStatus'),
                'updatedDate' => $this->input->post('updatedDate')
            );
           
        }        
            // Validate submitted form data
            if($this->form_validation->run() == false){
                // Update batch data
                //print_r($saleData);
                $update = $this->Sale_model->update($saleData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Sale has been updated successfully.');
                    redirect('Sale/sale_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['sale'] = $saleData;
                
        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editSale', $data);
        $this->load->view('template/footer');
    }

    public function delete($id){
        // Check whether batch id is not empty
        if($id){
            // Delete batch
            $delete = $this->Sale_model->delete($id);
            
            if($delete){
             $this->session->set_userdata('success_msg', 'Sale has been removed successfully.');

            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('Sale/sale_tab');
    }
}