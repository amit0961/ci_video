<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
		$this->load->model('channel_model');
		$this->load->model('category_model');

		$data = array();
	}
	public function addVideos(){
		$data = array();
		$data['title'] = 'Video Streaming System' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['channelsData'] = $this->channel_model->getAllChannelsData();
		$data['categoriesData'] = $this->category_model->getAllCategoriesData();
		$data['addVideos'] = $this->load->view('backend/videos/addVideos', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/videosAdd', $data);
	}
	public function addVideosForm(){
		$data['name'] = $this->input->post('name');

		$name = $data['name'];
		if(empty($name)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('category/addCategories');
		}else{
			$this->category_model->saveCategory($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Category Added Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('category/addCategories');
		}
	}
	public function listCategories(){
		$data = array();
		$data['title'] = 'Video Streaming System' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['categoriesData'] = $this->category_model->getAllCategoriesData();
		$data['indexCategories'] = $this->load->view('backend/categories/indexCategories', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/categoriesList', $data);
	}
	public function editCategories($id){
		$data['title'] = 'Video Streaming System' ;
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true) ;
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['categoriesByID'] = $this->category_model->getCategoriesByID($id);
		$data['editCategories'] = $this->load->view('backend/categories/editCategories', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true) ;
		$this->load->view('backend/categoriesEdit', $data);
	}
	public function updateCategoriesForm(){
		$data['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');

		$id = $data['id'];
		$name = $data['name'];
		if(empty($name)){
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('category/editCategories/'.$id);
		}else{
			$this->category_model->updateCategory($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Category Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('category/editCategories/'.$id);
		}
	}
	public function delCategories($id){
		$this->category_model->delCategoryByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Category Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('category/listCategories/');
	}


}
