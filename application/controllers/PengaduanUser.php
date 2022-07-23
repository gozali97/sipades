<?php

class PengaduanUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengaduanUser_model');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'lihat pengaduan';
		$data['pengaduan'] = $this->PengaduanUser_model->getPengaduan($data['user']['role_id'], $data['user']['id_user']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengaduan_user/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Pengaduan';

		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('isi_laporan', 'Laporan', 'required');
		$this->form_validation->set_rules('foto', 'FOTO', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengaduan_user/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->PengaduanUser_model->tambahPengaduan($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengaduanuser');
		}
	}
}
