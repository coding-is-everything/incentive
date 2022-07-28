<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	 function check_user($useremail,$password){
		$this->db->select('*');
		$this ->db->from('users');
		$this->db->where('userEmail',$useremail);
		$this->db->where('userPassword',base64_encode($password));
		$query = $this->db->get();
		//print($this->db->last_query()); exit();
		return $query;

		
	}
	


}
