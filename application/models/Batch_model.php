<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Batch_model extends CI_Model
{

    function __construct()
    {
        // Set table name
        $this->table = 'batches';
        $this->salestable = 'sales';
    }

    /* Fetch  data from the database */
    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("batchId", $params)) {
                $this->db->where('batchId', $params['batchId']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('batchId', 'desc');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // Return fetched data
        return $result;
    }
    //Fetch Sales Student Data From Database
    function getStudentRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->salestable);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("batchId", $params)) {
                $this->db->where('batchId', $params['batchId']);
                $query = $this->db->get();
                $result = $query->result_array();
            } else {
                $this->db->order_by('batchId', 'desc');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        //Return fetched data
        return $result;
    }

    //Fetch Student Data from table
    function studentData($params = array()) {
        $this->db->select('*');
        $this->db->from('students');

        if(array_key_exists("conditions", $params)) {
            foreach($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if(array_key_exists("returnType", $params) && $params['returnType'] == "count") {
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("studentId", $params)) {
                $this->db->where("studentId", $params['studentId']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('studentId', 'desc');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // print_r($result);
        return $result;
    }

    //Sales Representative Data from Table
    function getAllUsers()
    { 
        $query = $this->db->get('users');
        $query = $this->db->query('SELECT * FROM users where roleId=2');
        return $query->result();
    }

    //Fetch sales data for count
    function getSalesCount($params = array())
    {
        $this->db->select('count(*)');
        $this->db->from($this->salestable);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("batchId", $params)) {
                $this->db->where('batchId', $params['batchId']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('batchId', 'desc');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
        return $result;
    }

    //Fetch student committed, given and remaining
    function getFeeDetails($params = array())
    {
        $result = $this->db->query("SELECT SUM(coursePriceCommited), 
                                    SUM(couesePriceGiven), 
                                    SUM(coursePriceRemain) FROM 
                                    thebatra_incentive.sales WHERE batchId =" . $params['batchId'])->result_array();
        return $result;
    }

    /* Insert batch data into the database*/

    public function insert($data = array())
    {
        if (!empty($data)) {
            // Add created and modified date if not included
            if (array_key_exists("createdDate", $data)) {
                date_default_timezone_set("Asia/Kolkata");
                $data['createdDate'] = date("Y-m-d H:i:s");
            }

            // Insert batch data
            $insert = $this->db->insert($this->table, $data);

            // Return the status
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

    /*select  dropdown */
    function getAllGroups()
    {
        $query = $this->db->get('courses');
        $query = $this->db->query('SELECT * FROM courses');
        return $query->result();
    }
    /* Update batch data into the database */
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            // Add modified date if not included
            if (array_key_exists("updatedDate", $data)) {
                date_default_timezone_set("Asia/Kolkata");
                $data['updatedDate'] = date("Y-m-d H:i:s");
            }

            // Update batch data
            $update = $this->db->update($this->table, $data, array('batchId' => $id));

            // Return the status
            return $update ? true : false;
        }
        return false;
    }


    /* Delete batch data from the database*/
    public function delete($id)
    {
        // Delete batch data
        $delete = $this->db->delete($this->table, array('batchId' => $id));

        // Return the status
        return $delete ? true : false;
    }
}
