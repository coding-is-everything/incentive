<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Batch extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load member model
        $this->load->model('Batch_model');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load pagination library
        $this->load->library('pagination');

        // Per page limit
        //$this->perPage = 10;
    }

    public function batch_tab()
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

        $batchDataRow = $data['batches'] = $this->Batch_model->getRows();
        // foreach($batchDataRow as $row) {
        //     $data['batchIdsCount'] = $this->Batch_model->getSalesCount(array('batchId' => $row['batchId']));
        // }

        // Load the list page view
        $this->load->view('template/header');
        $this->load->view('template/manageBatch', $data);
        $this->load->view('template/footer');
    }

    public function view($id)
    {
        $data = array();

        // Check whether batch id is not empty
        if (!empty($id)) {
            $data['batch'] = $this->Batch_model->getRows(array('batchId' => $id));;
            $data['title']  = 'Batch Details';

            // Load the details page view
            $this->load->view('template/header');
            $this->load->view('template/viewBatch', $data);
            $this->load->view('template/footer');
        } else {
            redirect('Batch/batch_tab');
        }
    }

    //Fetch Batch wise student data
    public function batchStudent($id) {
        $data = array();
        if(!empty($id)) {
            $data['student'] = $this->Batch_model->getStudentRows(array('batchId' => $id));
            $data['title'] = "Batch Wise Student Details";
            $data['users'] = $this->Batch_model->getAllUsers();

            //Load the details page view
            $this->load->view('template/header');
            $this->load->view('template/viewStudentBatch', $data);
            $this->load->view('template/footer');
        }else{
            redirect('Batch/batch_tab');
        }
    }

    public function add()
    {

        $data = array();
        $batchData = array();
        $data['groups'] = $this->Batch_model->getAllGroups();
        // If add request is submitted
        if ($this->input->post('batchSubmit')) {

            // Form field validation rules
            $this->form_validation->set_rules('courseId', 'Course', 'required');
            //$this->form_validation->set_message('check_default', 'Please Select Course');
            $this->form_validation->set_rules('batchName', 'batch name ', 'required|trim');
            $this->form_validation->set_rules('batchStartDate', 'batch start date', 'required|trim');
            $this->form_validation->set_rules('batchEndDate', 'batch end date', 'required|trim');
            $this->form_validation->set_rules('batchStatus', 'batch status', 'required|trim');
            // Prepare batch data
            $batchData = array(
                'courseId' => $this->input->post('courseId'),
                'batchName' => $this->input->post('batchName'),
                'batchStartDate' => $this->input->post('batchStartDate'),
                'batchEndDate' => $this->input->post('batchEndDate'),
                'batchStatus' => $this->input->post('batchStatus'),
                'createdDate' => $this->input->post('createdDate')
            );

            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Insert batch data
                $insert = $this->Batch_model->insert($batchData);


                if ($insert) {
                    $this->session->set_userdata('success_msg', 'Batch has been added successfully.');
                    redirect('Batch/batch_tab');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['batch'] = $batchData;

        // Load the add page view
        $this->load->view('template/header');
        $this->load->view('template/addBatch', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data = array();
        // Get batch data
        $batchData = $this->Batch_model->getRows(array('batchId' => $id));
        $data['groups'] = $this->Batch_model->getAllGroups();

        // If update request is submitted
        if ($this->input->post('batchSubmit')) {
            // Form field validation rules
            //$this->form_validation->set_rules('courseId','Course','required|callback_check_default');
            //$this->form_validation->set_message('check_default', 'Please Select Course');
            $this->form_validation->set_rules('batchName', 'batch name ', 'required|trim');
            $this->form_validation->set_rules('batchStartDate', 'batch start date', 'required|trim');
            $this->form_validation->set_rules('batchEndDate', 'batch end date', 'required|trim');
            $this->form_validation->set_rules('batchStatus', 'batch status', 'required|trim');
            // Prepare batch data
            $batchData = array(
                'courseId' => $this->input->post('courseId'),
                'batchName' => $this->input->post('batchName'),
                'batchStartDate' => $this->input->post('batchStartDate'),
                'batchEndDate' => $this->input->post('batchEndDate'),
                'batchStatus' => $this->input->post('batchStatus'),
                'createdDate' => $this->input->post('createdDate')
            );

            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Update batch data
                $update = $this->Batch_model->update($batchData, $id);

                if ($update) {
                    $this->session->set_userdata('success_msg', 'Batch has been updated successfully.');
                    redirect('Batch/batch_tab');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }

        $data['batch'] = $batchData;

        // Load the edit page view
        $this->load->view('template/header');
        $this->load->view('template/editBatch', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        // Check whether batch id is not empty
        if ($id) {
            // Delete batch
            $delete = $this->Batch_model->delete($id);

            if ($delete) {
                $this->session->set_userdata('success_msg', 'Batch has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }

        // Redirect to the list page
        redirect('Batch/batch_tab');
    }
}
