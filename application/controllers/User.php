<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$data = array();
	}
	public function login(){
		$this->load->view('frontend/login');
	}
	public function loginForm(){
		$data= array();
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$check = $this->user_model->checkUser($data);
		if ($check){
			$sdata = array() ;
			$sdata['userid'] = $check->userid ;
			$sdata['userlogin'] = TRUE ;
			$this->session->set_userdata($sdata);
			redirect('Admin');
		}else{
			$savedata = array();
			$savedata['msg'] = '<span style="color:yellow">Opps... Incorrect Password !</span>';
			$this->session->set_flashdata($savedata);
			redirect('user/login');
		}
	}
	public function logout(){
		$this->session->unset_userdata($userid);
		$this->session->set_userdata('userlogin', FALSE);
		$this->session->sess_destroy();
		redirect('user/login');
	}
}
