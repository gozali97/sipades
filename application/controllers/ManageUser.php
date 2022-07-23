<?php

class ManageUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ManageUser_model');
		$this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Data User';
		$data['datauser'] = $this->ManageUser_model->getAllUser();
		if ($this->input->post('keyword')) {
			$data['datauser'] = $this->ManageUser_model->cariDataUser();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('manageuser/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_user($id_user)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->ManageUser_model->hapusDataUser($id_user);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('manageuser/index');
	}

	public function tambah_user()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Tambah User';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
			'is_unique' => 'Email sudah pernah didaftarkan!'
		]);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'password tidak sama!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('manageuser/tambah_user');
			$this->load->view('templates/footer');
		} else {
			$this->ManageUser_model->tambahDataUser();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('manageuser');
		}
	}

	public function profil()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data = $this->db->get('tbl_user')->result_array();
		$data['judul'] = 'Profil';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('manageuser/profil', $data);
		$this->load->view('templates/footer');
	}

	public function ubah_user($id_user)

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Ubah Data User';
		$data['user'] = $this->ManageUser_model->getUserById($id_user);


		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('manageuser/ubah_user', $data);
			$this->load->view('templates/footer');
		} else {
			$this->ManageUser_model->ubahDataUser($data['user']['id_user']);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('manageuser');
		}
	}
}
