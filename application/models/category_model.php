<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function saveCategory($data){
		$this->db->insert('category',$data);
	}
	public function getAllCategoriesData(){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->order_by('cid', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getCategoriesByID($id){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cid', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateCategory($data){
		$this->db->set('name', $data['name']);
		$this->db->where('cid', $data['cid']);
		$this->db->update('category',$data);
	}
	public function delCategoryByID($id){
		$this->db->where('cid', $id);
		$this->db->delete('category');

	}

}
