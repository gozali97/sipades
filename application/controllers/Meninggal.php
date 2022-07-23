<?php

class Meninggal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Meninggal_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['meninggal'] = $this->Meninggal_model->getAllMeninggal();
		$data['judul'] = 'Data Surat Meninggal';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('meninggal/index', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Surat Izin';
		// $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('hari_m', 'hari meninggal', 'required');
		$this->form_validation->set_rules('tgl_m', 'tanggal meninggal', 'required');
		$this->form_validation->set_rules('sebab', 'sebab', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('meninggal/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Meninggal_model->tambahSuratMeninggal($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('meninggal');
		}
	}

	public function hapus($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Meninggal_model->hapusSuratMati($no_surat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('meninggal');
	}

	public function detail($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Surat';
		$data['Meninggal'] = $this->Meninggal_model->getMatiById($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('meninggal/detail', $data);
		$this->load->view('templates/footer');
	}

	public function acc($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Meninggal_model->prosesSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('meninggal/index', $data);
		$this->load->view('templates/footer');
	}

	public function denied($no_surat)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Proses Data Surat';
		// $data['pengajuan'] = $this->Pengajuan_model->getPengajuanById($no_surat);
		$this->Meninggal_model->tolakSurat($no_surat);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('meninggal/index', $data);
		$this->load->view('templates/footer');
	}
	public function cetak_surat($no_surat)
	{
		$data['cetaksurat'] = $this->Meninggal_model->getAllSuratMati($no_surat);
		$this->load->view('meninggal/cetak_surat', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
