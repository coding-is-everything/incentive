<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Incentive extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load member model
        $this->load->model('Incentive_model');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');

        // Load pagination library
        $this->load->library('pagination');
    }

    public function incentive_tab()
    {
        $data = array();

        // Get messages from the session
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['incentives'] = $this->Incentive_model->getRows();
        $data['users'] = $this->Incentive_model->getAllUsers();

        // Load the list page view
        $this->load->view('template/header');
        $this->load->view('template/manageIncentive', $data);
        $this->load->view('template/footer');
    }

    public function checkIncentive($id, $incentivePer)
    {
        $data = array();
        if(!empty($id)) {
            $data['sales'] = $this->Incentive_model->checkIncentive($id);
            $data['IP'] = $incentivePer;
            $data['title'] = "Check Incentive";
            $this->load->view('template/header');
            $this->load->view('template/viewIncentive', $data);
            $this->load->view('template/footer');
        }
    }

    public function view($id)
    {
        $data = array();

        // Check whether batch id is not empty
        if (!empty($id)) {
            $data['incentive'] = $this->Incentive_model->getRows(array('incentiveId' => $id));
            $data['title']  = 'Incentive Details';
            $data['users'] = $this->Incentive_model->getAllUsers();
            $data['leads'] = $this->Incentive_model->getAllLeads();
            // Load the details page view
            $this->load->view('template/header');
            $this->load->view('template/viewIncentive', $data);
            $this->load->view('template/footer');
        } else {
            redirect('Incentive/incentive_tab');
        }
    }

    public function add()
    {

        $data = array();
        $incentiveData = array();
        $data['batches'] = $this->Incentive_model->getAllBatches();
        $data['users'] = $this->Incentive_model->getAllUsers();
        $data['students'] = $this->Incentive_model->getAllStudents();
        $data['leads'] = $this->Incentive_model->getAllLeads();
        // If add request is submitted
        if ($this->input->post('incentiveSubmit')) {

            // Form field validation rules
            $this->form_validation->set_rules('userId', 'Sale representative', 'required');
            $this->form_validation->set_rules('roleType', 'role type', 'required|trim');

            // Prepare batch data
            $incentiveData = array(
                'userId' => $this->input->post('userId'),
                'batchId' => $this->input->post('batchId'),
                'studentId' => $this->input->post('studentId'),
                'courseCommited' => $this->input->post('courseCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'actualCourseFee' => $this->input->post('actualCourseFee'),
                'coursePriceGiven' => $this->input->post('coursePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transDate' => $this->input->post('transDate'),
                'nextDate' => $this->input->post('nextDate'),
                'roleType' => $this->input->post('roleType'),
                'incecntivePer' => $this->input->post('incecntivePer'),
                'courseIncentive' => $this->input->post('courseIncentive'),
                'checked' => $this->input->post('checked'),
                'teamLeadName' => $this->input->post('teamLeadName'),
                'teamLeadPer' => $this->input->post('teamLeadPer'),
                'teamLeadIncentive' => $this->input->post('teamLeadIncentive'),
                'createdDate' => $this->input->post('createdDate')
            );
        }
        // Validate submitted form data
        if ($this->form_validation->run() == true) {
            // Insert batch data
            $insert = $this->Incentive_model->insert($incentiveData);
            if ($insert) {
                $this->session->set_userdata('success_msg', 'Incentive has been added successfully.');
                redirect('Incentive/incentive_tab');
            } else {
                $data['error_msg'] = 'Some problems occured, please try again.';
            }
        }

        $data['incentive'] = $incentiveData;

        // Load the add page view
        $this->load->view('template/header');
        $this->load->view('template/addIncentive', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data = array();
        // Get batch data
        $incentiveData = $this->Incentive_model->getRows(array('incentiveId' => $id));
        $data['batches'] = $this->Incentive_model->getAllBatches();
        $data['users'] = $this->Incentive_model->getAllUsers();
        $data['students'] = $this->Incentive_model->getAllStudents();
        $data['leads'] = $this->Incentive_model->getAllLeads();
        // If update request is submitted
        if ($this->input->post('incentiveSubmit')) {

            //print_r($_POST);

            // Form field validation rules
            /*  $this->form_validation->set_rules('userId','Sale representative','required');
            $this->form_validation->set_rules('roleType', 'role type', 'required|trim');
            $this->form_validation->set_rules('incecntivePer', 'incentive percentage', 'required');
             $this->form_validation->set_rules('teamLeadName', 'team lead', 'required');
              $this->form_validation->set_rules('teamLeadPer', 'incentive percentage', 'required');*/
            // Prepare batch data
            $incentiveData = array(
                //'saleId'=> $id,   
                'userId' => $this->input->post('userId'),
                'batchId' => $this->input->post('batchId'),
                'studentId' => $this->input->post('studentId'),
                'courseCommited' => $this->input->post('courseCommited'),
                'courseDiscount' => $this->input->post('courseDiscount'),
                'actualCourseFee' => $this->input->post('actualCourseFee'),
                'coursePriceGiven' => $this->input->post('coursePriceGiven'),
                'coursePriceRemain' => $this->input->post('coursePriceRemain'),
                'transDate' => $this->input->post('transDate'),
                'nextDate' => $this->input->post('nextDate'),
                'roleType' => $this->input->post('roleType'),
                'incecntivePer' => $this->input->post('incecntivePer'),
                'courseIncentive' => $this->input->post('courseIncentive'),
                'checked' => $this->input->post('checked'),
                'teamLeadName' => $this->input->post('teamLeadName'),
                'teamLeadPer' => $this->input->post('teamLeadPer'),
                'teamLeadIncentive' => $this->input->post('teamLeadIncentive'),
                'updatedDate' => $this->input->post('updatedDate')
            );


            // Validate submitted form data
            if ($this->form_validation->run() == false) {
                // Update batch data
                //print_r($saleData);
                $update = $this->Incentive_model->update($incentiveData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Incentive has been updated successfully.');
                    redirect('Incentive/incentive_tab');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['incentive'] = $incentiveData;

        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editIncentive', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        // Check whether batch id is not empty
        if ($id) {
            // Delete batch
            $delete = $this->Incentive_model->delete($id);

            if ($delete) {
                $this->session->set_userdata('success_msg', 'Incentive has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }

        // Redirect to the list page
        redirect('Incentive/incentive_tab');
    }
}
