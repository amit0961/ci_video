<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function admin_model_info($email_address, $password){
		$this->db->SELECT('*');
		$this->db->FROM('admin');
		$this->db->WHERE('email_address',$email_address);
		$this->db->WHERE('password',$password);
		$query_result = $this->db->get();
		$result= $query_result->row();
		return $result ;
	}
	public function save_student_info(){
		$data = array();
		$data['student_name'] = $this->input->post('student_name', true);
		$data['student_phone'] = $this->input->post('student_phone', true);
		$data['student_roll'] = $this->input->post('student_roll', true);
		$this->db->insert('student', $data);
	}
	public function all_student_info(){
		$this->db->SELECT('*');
		$this->db->FROM('student');
		$query_result = $this->db->get();
		$student_info = $query_result -> result();
		return $student_info ;
	}
	public function updateStudent($id){
		$this->db->SELECT('*');
		$this->db->FROM('student');
		$this->db->WHERE('student_id',$id);
		$query_result = $this->db->get();
		$result = $query_result -> row();
		return $result ;
	}




}
