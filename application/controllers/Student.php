<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    
function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('Student_model');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Load pagination library
        $this->load->library('pagination');
       
    }
    public function index()
    {
        
        if($this->session->userdata('roleId') === '3')
        {   
        $this->load->view('template/dashboard_student');
        }
        else{
            echo "Access Denied!"; 
        }
    }

	public function student_tab(){ 

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
        
       
        $data['students'] = $this->Student_model->getRows();
        
        // Load the list page view
        $this->load->view('template/header');
		$this->load->view('template/manageStudent',$data);
		$this->load->view('template/footer'); 
}

public function view($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['student'] = $this->Student_model->getRows(array('studentId' => $id));
            $data['title']  = 'Student Details';
            
            // Load the details page view
            $this->load->view('template/header');
			$this->load->view('template/viewStudent',$data);
			$this->load->view('template/footer');
        }else{
            redirect('Student/student_tab');
        }
    }

    public function add(){
        $data = array();
        $studentData = array();
        
        // If add request is submitted
        if($this->input->post('studentSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('studentName', 'student name', 'required|trim');
            //$this->form_validation->set_rules('studentEmail', 'student email', 'required|trim');
            $this->form_validation->set_rules('studentMobile', 'student mobile', 'required|trim');
            $this->form_validation->set_rules('studentStatus', 'student status', 'required|trim');
            // Prepare course data
            $studentData = array(
                'studentEnrolled'=> $this->input->post('studentEnrolled'),
                'studentName'=> $this->input->post('studentName'),
                'studentEmail' => $this->input->post('studentEmail'),
                'studentMobile' => $this->input->post('studentMobile'),
                'studentDetails' => $this->input->post('studentDetails'),
                'studentStatus' => $this->input->post('studentStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert member data
                $insert = $this->Student_model->insert($studentData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Student has been added successfully.');
                    redirect('Student/student_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        $data['student'] = $studentData;

        // Load the add page view
        	$this->load->view('template/header');
			$this->load->view('template/addStudent',$data);
			$this->load->view('template/footer');
        
    }

public function edit($id){
        $data = array();
        // Get course data
        $studentData = $this->Student_model->getRows(array('studentId' => $id));
        
        // If update request is submitted
        if($this->input->post('studentSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('studentName', 'student name', 'required|trim');
            //$this->form_validation->set_rules('studentEmail', 'student email', 'required|trim');
            $this->form_validation->set_rules('studentMobile', 'student mobile', 'required|trim');
            $this->form_validation->set_rules('studentStatus', 'student status', 'required|trim');
            // Prepare course data
            $studentData = array(
                'studentEnrolled'=> $this->input->post('studentEnrolled'),
                'studentName'=> $this->input->post('studentName'),
                'studentEmail' => $this->input->post('studentEmail'),
                'studentMobile' => $this->input->post('studentMobile'),
                'studentDetails' => $this->input->post('studentDetails'),
                'studentStatus' => $this->input->post('studentStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update course data
                $update = $this->Student_model->update($studentData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Student has been updated successfully.');
                    redirect('Student/student_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['student'] = $studentData;
                
        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editStudent', $data);
        $this->load->view('template/footer');
    }

    public function delete($id){
        // Check whether course id is not empty
        if($id){
            // Delete course
            $delete = $this->Student_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Student has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('Student/student_tab');
    }
    
}