<?php

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model');
	}

	public function surat()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Semua Surat';
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$data['suratket'] = $this->Laporan_model->getAllSurat();
		// $data['suratket'] = $this->Laporan_model->getAllLaporan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

	public function print_surat()
	{
		$data['laporan'] = $this->Laporan_model->getAllSurat();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}

	public function surat_keterangan()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Surat Keterangan';
		$data['suratketerangan'] = $this->Laporan_model->getAllSuratKeterangan();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/surat_keterangan', $data);
		$this->load->view('templates/footer');
	}

	public function print_surat_ket()
	{
		$data['laporan'] = $this->Laporan_model->getAllSuratKeterangan();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}

	public function surat_izin()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Surat Kelahiran';
		$data['suratizin'] = $this->Laporan_model->getAllSuratIzin();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/surat_izin', $data);
		$this->load->view('templates/footer');
	}
	public function print_surat_izin()
	{
		$data['laporan'] = $this->Laporan_model->getAllSuratIzin();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}

	public function surat_kematian()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Surat Kematian';
		$data['suratmati'] = $this->Laporan_model->getAllSuratKematian();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/surat_kematian', $data);
		$this->load->view('templates/footer');
	}
	public function print_surat_kematian()
	{
		$data['laporan'] = $this->Laporan_model->getAllSuratKematian();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}


	public function surat_domisili()

	{

		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Surat Domisili';
		$data['suratdomisili'] = $this->Laporan_model->getAllSuratDomisili();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/surat_domisili', $data);
		$this->load->view('templates/footer');
	}

	public function print_surat_domisili()
	{
		$data['laporan'] = $this->Laporan_model->getAllSuratDomisili();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}


	public function surat_pindah()

	{

		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Surat Pindah';
		$data['suratpindah'] = $this->Laporan_model->getAllSuratPindah();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/surat_pindah', $data);
		$this->load->view('templates/footer');
	}

	public function print_surat_pindah()
	{
		$data['laporan'] = $this->Laporan_model->getAllSuratPindah();
		$this->load->view('laporan/cetak_laporan', $data);
		// var_dump($data['laporan']);
		// die();
	}

	public function pengaduan()

	{

		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['datasurat'] = $this->Laporan_model->getAllKeterangan();
		$data['judul'] = 'Pengaduan';
		$data['pengaduan'] = $this->Laporan_model->getAllpengaduan();
		if ($this->input->post('keyword')) {
			$data['keterangan'] = $this->Laporan_model->cariDataKeterangan();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function print_pengaduan()
	{
		$data['laporan'] = $this->Laporan_model->getAllpengaduan();
		$this->load->view('laporan/cetak_pengaduan', $data);
		// var_dump($data['laporan']);
		// die();
	}
}
