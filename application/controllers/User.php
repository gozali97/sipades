<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}
	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['judul'] = 'Home';
		$data['info'] = $this->User_model->getAllInformasi();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function profil()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('user/profil', $data);
		$this->load->view('templates/footer');
	}

	public function edit_user()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Ubah Data User';


		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('user/edit_user', $data);
			$this->load->view('templates/footer');
		} else {
			$this->User_model->ubahDataUser();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('user');
		}
	}
}
