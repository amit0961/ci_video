<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function checkUser($data){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', md5($data['password']));
		$query_result = $this->db->get();
		$hasUser = $query_result->num_rows();
		if ($hasUser === 1 ){
			$result = $query_result->row();
			return $result;
		}
	}

}
