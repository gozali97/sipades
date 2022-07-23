<?php

class Pindah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pindah_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pindah'] = $this->Pindah_model->getAllPindah();
		$data['judul'] = 'Data Surat Pindah';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pindah/index', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Surat Izin';
		// $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('alamat_baru', 'alamat_baru', 'required');
		$this->form_validation->set_rules('jml_kel', 'jml_kel', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pindah/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Pindah_model->tambahSuratPindah($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pindah');
		}
	}

	public function hapus($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Pindah_model->hapusSuratPindah($no_surat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pindah');
	}

	public function detail($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Surat';
		$data['pindah'] = $this->Pindah_model->getPindahById($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pindah/detail', $data);
		$this->load->view('templates/footer');
	}

	public function acc($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Pindah_model->prosesSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pindah/index', $data);
		$this->load->view('templates/footer');
	}

	public function denied($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Pindah_model->tolakSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pindah/index', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_surat($no_surat)
	{
		$data['cetaksurat'] = $this->Pindah_model->getAllSuratPindah($no_surat);
		$this->load->view('pindah/cetak_surat', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
