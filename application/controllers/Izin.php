<?php

class Izin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Izin_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['izin'] = $this->Izin_model->getAllIzin();
		$data['judul'] = 'Data Surat Izin';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('izin/index', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Surat Izin';
		// $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('nm_usaha', 'Nama_usaha', 'required');
		$this->form_validation->set_rules('jenis_usaha', 'jenis_usaha', 'required');
		$this->form_validation->set_rules('alamat_usaha', 'Alamat_usaha', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('izin/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Izin_model->tambahSuratIzin($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('izin');
		}
	}

	public function hapus($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Izin_model->hapusSuratIzin($no_surat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('izin');
	}

	public function detail($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Surat';
		$data['izin'] = $this->Izin_model->getIzinById($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('izin/detail', $data);
		$this->load->view('templates/footer');
	}


	public function acc($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Izin_model->prosesSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('izin/index', $data);
		$this->load->view('templates/footer');
	}

	public function denied($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Izin_model->tolakSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('izin/index', $data);
		$this->load->view('templates/footer');
	}


	public function cetak_surat($no_surat)
	{
		$data['cetaksurat'] = $this->Izin_model->getAllSuratIzin($no_surat);
		$this->load->view('izin/cetak_surat', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
