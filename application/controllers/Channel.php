<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Channel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('channel_model');
		$this->load->helper('url','form');
		$data = array();
	}

	public function addChannels()
	{
		$data = array();
		$data['title'] = 'Video Streaming System';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['addChannels'] = $this->load->view('backend/channels/addChannels', '', true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/channelsAdd', $data);
	}

	public function addChannelsForm()
	{
		$data['ch_name'] = $this->input->post('ch_name', true);
//		$data['image'] = $this->input->post('image', true);

		//image section
		$config['upload_path'] = 'images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
		$config['max_width'] = 1500;
		$config['max_height'] = 1500;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('backend/channelsAdd', $error);
		} else {
			$data = array('image_metadata' => $this->upload->data());
			$this->load->view('backend/channelsAdd', $data);
		}


		$this->channel_model->saveChannel($data);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Channel Added Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('channel/addChannels');

	}

	public function listChannels()
	{
		$data = array();
		$data['title'] = 'Video Streaming System';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['channelsData'] = $this->channel_model->getAllChannelsData();
		$data['indexChannels'] = $this->load->view('backend/channels/indexChannels', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/channelsList', $data);
	}

	public function editChannels($id)
	{
		$data['title'] = 'Video Streaming System';
		$data['header'] = $this->load->view('backend/pages/inc/header', $data, true);
		$data['sidebar'] = $this->load->view('backend/pages/inc/sidebar', '', true);
		$data['channelsByID'] = $this->channel_model->getChannelsByID($id);
		$data['editChannels'] = $this->load->view('backend/channels/editChannels', $data, true);
		$data['footer'] = $this->load->view('backend/pages/inc/footer', '', true);
		$this->load->view('backend/channelsEdit', $data);
	}

	public function updateChannelsForm()
	{
		$data['ch_id'] = $this->input->post('ch_id');
		$data['name'] = $this->input->post('name');

		$id = $data['ch_id'];
		$name = $data['name'];
		if (empty($name)) {
			$savedata = array();
			$savedata['msg'] = '<span style="color:red">Field must not be empty ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('channel/editChannels/' . $id);
		} else {
			$this->channel_model->updateChannel($data);
			$savedata = array();
			$savedata['msg'] = '<span style="color:green">Channel Updated Successfully ! </span>';
			$this->session->set_flashdata($savedata);
			redirect('channel/editChannels/' . $id);
		}
	}

	public function delChannels($id)
	{
		$this->channel_model->delChannelByID($id);
		$savedata = array();
		$savedata['msg'] = '<span style="color:green">Channel Deleted Successfully ! </span>';
		$this->session->set_flashdata($savedata);
		redirect('channel/listChannels/');
	}


}
