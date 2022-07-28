<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {
    
function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('Course_model');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Load pagination library
        $this->load->library('pagination');
       
    }

	public function course_tab(){ 

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
        $data['courses'] = $this->Course_model->getRows();
        
        // Load the list page view
        $this->load->view('template/header');
		$this->load->view('template/manageCourse',$data);
		$this->load->view('template/footer'); 
}

public function view($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['course'] = $this->Course_model->getRows(array('courseId' => $id));;
            $data['title']  = 'Course Details';
            
            // Load the details page view
            $this->load->view('template/header');
			$this->load->view('template/viewCourse',$data);
			$this->load->view('template/footer');
        }else{
            redirect('Course/course_tab');
        }
    }

    public function add(){
        $data = array();
        $courseData = array();
        
        // If add request is submitted
        if($this->input->post('courseSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('courseName', 'course name', 'required|trim');
            $this->form_validation->set_rules('coursePrice', 'course price', 'required|trim');
            $this->form_validation->set_rules('courseStatus', 'course status', 'required|trim');
            // Prepare course data
            $courseData = array(
                'courseName'=> $this->input->post('courseName'),
                'coursePrice' => $this->input->post('coursePrice'),
                'courseStatus' => $this->input->post('courseStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert member data
                $insert = $this->Course_model->insert($courseData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Course has been added successfully.');
                    redirect('Course/course_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        $data['course'] = $courseData;
        $data['title'] = 'Add Course';
        
        // Load the add page view
        	$this->load->view('template/header');
			$this->load->view('template/addCourse',$data);
			$this->load->view('template/footer');
        
    }

public function edit($id){
        $data = array();
        // Get course data
        $courseData = $this->Course_model->getRows(array('courseId' => $id));
        
        // If update request is submitted
        if($this->input->post('courseSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('courseName', 'course name', 'required|trim');
            $this->form_validation->set_rules('coursePrice', 'course price', 'required|trim');
            $this->form_validation->set_rules('courseStatus', 'course status', 'required|trim');
            // Prepare course data
            $courseData = array(
                'courseName'=> $this->input->post('courseName'),
                'coursePrice' => $this->input->post('coursePrice'),
                'courseStatus' => $this->input->post('courseStatus'),
                'updatedDate' => $this->input->post('updatedDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update course data
                $update = $this->Course_model->update($courseData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Course has been updated successfully.');
                    redirect('Course/course_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['course'] = $courseData;
        //$data['title'] = 'Update Member';
        
        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editCourse', $data);
        $this->load->view('template/footer');
    }

    public function delete($id){
        // Check whether course id is not empty
        if($id){
            // Delete course
            $delete = $this->Course_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Course has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('Course/course_tab');
    }
    
}