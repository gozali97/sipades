<?php

class Informasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Informasi Desa';

		$data['info'] = $this->Informasi_model->getAllInformasi();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('informasi/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Tambah Informasi';
		$this->form_validation->set_rules('judul_informasi', 'judul_informasi', 'required');
		$this->form_validation->set_rules('ket_informasi', 'ket_informasi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('informasi/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Informasi_model->tambahInformasi();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('informasi');
		}
	}


	public function hapus($id_informasi)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Informasi_model->hapusInformasi($id_informasi);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('informasi');
	}

	public function ubah($id_informasi)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Tambah Informasi';
		$data['informasi'] = $this->Informasi_model->getInformasiById($id_informasi);
		// var_dump($data);
		// die();
		$this->form_validation->set_rules('judul_informasi', 'judul_informasi', 'required');
		$this->form_validation->set_rules('ket_informasi', 'ket_informasi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('informasi/ubah');
			$this->load->view('templates/footer');
		} else {
			$this->Informasi_model->ubahInformasi();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('informasi');
		}
	}
}
