<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel_model extends CI_Model {

	public function saveChannel($data){
		$this->db->insert('channel',$data);
	}
	public function getAllChannelsData(){
		$this->db->select('*');
		$this->db->from('channel');
		$this->db->order_by('ch_id', 'desc');
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result ;
	}
	public function getChannelByID($id){
		$this->db->select('*');
		$this->db->from('channel');
		$this->db->where('ch_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result ;
	}
	public function updateChannel($data){
		$this->db->set('name', $data['name']);
		$this->db->where('ch_id', $data['ch_id']);
		$this->db->update('channel',$data);
	}
	public function delChannelByID($id){
		$this->db->where('ch_id', $id);
		$this->db->delete('channel');

	}

}
