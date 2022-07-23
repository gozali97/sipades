<?php

class Keterangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Keterangan_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['keterangan'] = $this->Keterangan_model->getAllKeterangan();
		$data['judul'] = 'Data Surat Keterangan';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('keterangan/index', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Surat Keterangan';
		// $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		// $this->form_validation->set_rules('nm_surat', 'Nama_surat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('keterangan/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Keterangan_model->tambahSuratKeterangan($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('keterangan');
		}
	}

	public function hapus($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Keterangan_model->hapusSuratKet($no_surat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('keterangan');
	}

	public function detail($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Surat';
		$data['keterangan'] = $this->Keterangan_model->getKeteranganById($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('keterangan/detail', $data);
		$this->load->view('templates/footer');
	}


	public function acc($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Keterangan_model->prosesSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('keterangan/index', $data);
		$this->load->view('templates/footer');
	}

	public function denied($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Keterangan_model->tolakSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('keterangan/index', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_surat($no_surat)
	{
		$data['cetaksurat'] = $this->Keterangan_model->getAllSuratKet($no_surat);
		$this->load->view('keterangan/cetak_surat', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
