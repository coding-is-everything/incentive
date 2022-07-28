<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{

function __construct() {
        // Set table name
        $this->table = 'sales';
    }
    function getAllFees()
    { 
        $query = $this->db->get('sales');
        $query = $this->db->query('SELECT sales.saleId, batches.batchName, SUM(sales.coursePriceRemain) AS total FROM sales INNER JOIN batches ON sales.batchId=batches.batchId GROUP BY sales.batchId ORDER BY sales.saleId ASC');
        return $query->result();
    }
    function getTotalFees()
    { 
        $query = $this->db->get('sales');
        $query = $this->db->query('SELECT SUM(coursePriceRemain) AS totalfees from sales');
        return $query->result();
    }
    
} 




