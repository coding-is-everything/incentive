<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{

function __construct() {
        // Set table name
        $this->table = 'students';
    }
     /* Fetch course data from the database */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("studentId", $params)){
                $this->db->where('studentId', $params['studentId']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('studentId', 'desc');                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        return $result;
    }

     /* Insert course data into the database
     */
    public function insert($data = array()) {
        if(!empty($data)){
            // Add created and modified date if not included
            if(array_key_exists("createdDate", $data)){
                date_default_timezone_set("Asia/Kolkata");
                $data['createdDate'] = date("Y-m-d H:i:s");
            }
            
            // Insert course data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

     /* Update course data into the database */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            // Add modified date if not included
            if(array_key_exists("updatedDate", $data)){
                date_default_timezone_set("Asia/Kolkata");
                $data['updatedDate'] = date("Y-m-d H:i:s");
            }
            
            // Update course data
            $update = $this->db->update($this->table, $data, array('studentId' => $id));
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }

   
     /* Delete course data from the database*/
    public function delete($id){
        // Delete course data
        $delete = $this->db->delete($this->table, array('studentId' => $id));
        
        // Return the status
        return $delete?true:false;
    }

}


