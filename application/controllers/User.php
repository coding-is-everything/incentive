<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('User_model');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // Load pagination library
        $this->load->library('pagination');
        
    }

	public function user_tab(){ 

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
        
        $data['users'] = $this->User_model->getRows();
        $data['roles'] = $this->User_model->getAllRoles();
        // Load the list page view
        $this->load->view('template/header');
		$this->load->view('template/manageUser',$data);
		$this->load->view('template/footer'); 
}

public function view($id){
        $data = array();
        
        // Check whether member id is not empty
        if(!empty($id)){
            $data['user'] = $this->User_model->getRows(array('userId' => $id));;
            $data['title']  = 'User Details';
            $data['roles'] = $this->User_model->getAllRoles();
            // Load the details page view
            $this->load->view('template/header');
			$this->load->view('template/viewUser',$data);
			$this->load->view('template/footer');
        }else{
            redirect('User/user_tab');
        }
    }

    public function add(){
        $data = array();
        $userData = array();
        $data['roles'] = $this->User_model->getAllRoles();
        $data['leads'] = $this->User_model->getAllLeads();
        
        // If add request is submitted
        if($this->input->post('userSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('roleId','Roles','required');
            $this->form_validation->set_rules('userName', 'user name', 'required|trim');
            $this->form_validation->set_rules('userMobile', 'user mobile', 'required|trim');
            $this->form_validation->set_rules('userEmail', 'user email', 'required|trim');
            $this->form_validation->set_rules('userPassword', 'user password', 'required|trim');
            $this->form_validation->set_rules('roleType', 'role type', 'required|trim');
            $this->form_validation->set_rules('userStatus', 'user status', 'required|trim');
            // Prepare course data
            $userData = array(
                'roleId'=> $this->input->post('roleId'),
                'userName' => $this->input->post('userName'),
                'userMobile' => $this->input->post('userMobile'),
                'userEmail'=> $this->input->post('userEmail'),
                'userPassword' => base64_encode($this->input->post('userPassword')),
                'roleType'=> $this->input->post('roleType'),
                'incecntivePer'=> $this->input->post('incecntivePer'),
                'checked'=> $this->input->post('checked'),
                'teamLeadName'=> $this->input->post('teamLeadName'),
                'teamLeadPer'=> $this->input->post('teamLeadPer'),
                'userStatus' => $this->input->post('userStatus'),
                'createdDate' => $this->input->post('createdDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert member data
                $insert = $this->User_model->insert($userData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'User has been added successfully.');
                    redirect('User/user_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        $data['user'] = $userData;
        
        // Load the add page view
        	$this->load->view('template/header');
			$this->load->view('template/addUser',$data);
			$this->load->view('template/footer');
        
    }

public function edit($id){
        $data = array();
        // Get course data
        $userData = $this->User_model->getRows(array('userId' => $id));
        $data['roles'] = $this->User_model->getAllRoles();
        $data['leads'] = $this->User_model->getAllLeads();
        // If update request is submitted
        if($this->input->post('userSubmit')){
            // Form field validation rules
           // $this->form_validation->set_rules('userId','User','required|callback_check_default');
           //$this->form_validation->set_message('check_default', 'Please Select Role');
            /*$this->form_validation->set_rules('userName', 'user name', 'required|trim');
            $this->form_validation->set_rules('userMobile', 'user mobile', 'required|trim');
            $this->form_validation->set_rules('userEmail', 'user email', 'required|trim');
            $this->form_validation->set_rules('userPassword', 'user password', 'required|trim');
            $this->form_validation->set_rules('userStatus', 'user status', 'required|trim');*/
            // Prepare course data
            $userData = array(
                'roleId'=> $this->input->post('roleId'),
                'userName' => $this->input->post('userName'),
                'userMobile' => $this->input->post('userMobile'),
                'userEmail'=> $this->input->post('userEmail'),
                'userPassword' => base64_encode($this->input->post('userPassword')),
                'roleType'=> $this->input->post('roleType'),
                'incecntivePer'=> $this->input->post('incecntivePer'),
                'checked'=> $this->input->post('checked'),
                'teamLeadName'=> $this->input->post('teamLeadName'),
                'teamLeadPer'=> $this->input->post('teamLeadPer'),
                'userStatus' => $this->input->post('userStatus'),
                'updatedDate' => $this->input->post('updatedDate')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update course data
                $update = $this->User_model->update($userData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'User has been updated successfully.');
                    redirect('User/user_tab');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['user'] = $userData;
        
        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editUser', $data);
        $this->load->view('template/footer');
    }

    public function delete($id){
        // Check whether course id is not empty
        if($id){
            // Delete course
            $delete = $this->User_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'User has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('User/user_tab');
    }
    
}