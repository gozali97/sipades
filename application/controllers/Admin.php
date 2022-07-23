<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['judul'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
}
