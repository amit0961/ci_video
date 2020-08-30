<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

	public function saveVideo($data){
		$this->db->insert('video',$data);
	}
	public function getAllVideosData(){
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getCategoriesByID($id){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateCategory($data){
		$this->db->set('name', $data['name']);
		$this->db->where('id', $data['id']);
		$this->db->update('category',$data);
	}
	public function delCategoryByID($id){
		$this->db->where('id', $id);
		$this->db->delete('category');

	}

}
