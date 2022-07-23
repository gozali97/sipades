<?php

class Pengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuan_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['datapengajuan'] = $this->Pengajuan_model->getAllPengajuan();
		$data['judul'] = 'Data Pengajuan';
		if ($this->input->post('keyword')) {
			$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengajuan/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Pengajuan';
		$this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric');
		$this->form_validation->set_rules('nm_surat', 'Nama_surat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pengajuan/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Pengajuan_model->tambahDataPengajuan($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan');
		}
	}


	public function hapus($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Pengajuan_model->hapusDataPengajuan($no_surat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pengajuan');
	}

	public function detail($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Surat';
		$data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengajuan/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($no_surat)

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Ubah Data Pengajuan';
		$data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$data['kode_surat'] = [
			'474.1',
			'474.3',
			'470',
			'474',
			'145.1'
		];
		$data['jenis_surat'] = [
			'Surat Izin Usaha',
			'Surat Kematian',
			'Surat Domisili',
			'Surat Pindah',
			'Surat Keterangan'
		];

		$this->form_validation->set_rules('kode_surat', 'Kode', 'required|numeric');
		$this->form_validation->set_rules('tanggal', 'TGL', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nm_surat', 'Nama_surat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pengajuan/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Pengajuan_model->ubahDataPengajuan();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('pengajuan');
		}
	}

	public function acc($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		$data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Pengajuan_model->prosesSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengajuan/index', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_surat($no_surat)
	{
		$data['cetaksurat'] = $this->Pengajuan_model->getAllSurat($no_surat);
		$this->load->view('pengajuan/cetak_surat', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
