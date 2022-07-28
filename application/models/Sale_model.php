<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sale_model extends CI_Model
{
    function __construct()
    {
        // Set table name
        $this->table = 'sales';
    }
    /* Fetch  data from the database */
    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);
        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("saleId", $params)) {
                $this->db->where('saleId', $params['saleId']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('saleId', 'desc');
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }
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
    function getAllBatches()
    {
        $query = $this->db->get('batches');
        $query = $this->db->query('SELECT * FROM batches INNER JOIN courses ON batches.courseId=courses.courseId');
        return $query->result();
        //SELECT * FROM batches INNER JOIN courses ON batches.courseId=courses.courseId
    }
    function getAllUsers()
    {
        $query = $this->db->get('users');
        $query = $this->db->query('SELECT * FROM users where roleId=2');
        return $query->result();
    }
    function getAllStudents()
    {
        $query = $this->db->get('students');
        $query = $this->db->query('SELECT * FROM students');
        return $query->result();
    }

    function getFeeAmount()
    {
        $result = $this->db->query("SELECT SUM(coursePriceCommited), 
                                    SUM(couesePriceGiven), 
                                    SUM(coursePriceRemain) FROM 
                                    thebatra_incentive.sales")->result_array();
        return $result;
    }

    function getIncentiveAmount()
    {
        $result = $this->db->query("SELECT SUM(courseIncentive), 
                                    SUM(courseIncentiveTeam) FROM 
                                    thebatra_incentive.sales")->result_array();
        return $result;
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
            $update = $this->db->update($this->table, $data, array('saleId' => $id));

            // Return the status
            return $update ? true : false;
        }
        return false;
    }


    /* Delete batch data from the database*/
    public function delete($id)
    {
        // Delete batch data
        $delete = $this->db->delete($this->table, array('saleId' => $id));
        // Return the status
        return $delete ? true : false;
    }
}
