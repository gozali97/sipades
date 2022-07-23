<?php

class Pengajuan_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajuanUser_model');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()

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
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengajuan_user/index');
			$this->load->view('templates/footer');
		} else {
			$this->PengajuanUser_model->tambahDataPengajuan($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan_user/view');
		}
	}

	public function view()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Buat Surat';
		$data['lihatsurat'] = $this->PengajuanUser_model->getUserSurat($data['user']['role_id'], $data['user']['id_user']);
		if ($this->input->post('keyword')) {
			$data['datasurat'] = $this->Pengajuan_model->cariDataSurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengajuan_user/view', $data);
		$this->load->view('templates/footer');
	}
	public function keterangan()
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
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengajuan_user/keterangan');
			$this->load->view('templates/footer');
		} else {
			$this->PengajuanUser_model->tambahSuratKeterangan($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan_user/index');
		}
	}

	public function view_ket()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Buat Surat';
		$data['suratket'] = $this->PengajuanUser_model->getSuratKet($data['user']['role_id'], $data['user']['id_user']);
		if ($this->input->post('keyword')) {
			$data['datasurat'] = $this->Pengajuan_model->cariDataSurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengajuan_user/view_ket', $data);
		$this->load->view('templates/footer');
	}
	public function izin()
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
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengajuan_user/izin');
			$this->load->view('templates/footer');
		} else {
			$this->PengajuanUser_model->tambahSuratIzin($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan_user');
		}
	}

	public function view_izin()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Buat Surat';
		$data['suratizin'] = $this->PengajuanUser_model->getSuratIzin($data['user']['role_id'], $data['user']['id_user']);
		if ($this->input->post('keyword')) {
			$data['datasurat'] = $this->Pengajuan_model->cariDataSurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengajuan_user/view_izin', $data);
		$this->load->view('templates/footer');
	}

	public function meninggal()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tambah Surat Izin';
		// $this->form_validation->set_rules('kode_surat', 'Kode_surat', 'required|numeric');
		// $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('hari_m', 'hari meninggal', 'required');
		$this->form_validation->set_rules('tgl_m', 'tanggal meninggal', 'required');
		$this->form_validation->set_rules('sebab', 'sebab', 'required');
		$this->form_validation->set_rules('alamat_m', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengajuan_user/meninggal');
			$this->load->view('templates/footer');
		} else {
			$this->PengajuanUser_model->tambahSuratMeninggal($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan_user');
		}
	}

	public function view_mati()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Buat Surat';
		$data['suratmati'] = $this->PengajuanUser_model->getSuratMati($data['user']['role_id'], $data['user']['id_user']);
		if ($this->input->post('keyword')) {
			$data['datasurat'] = $this->Pengajuan_model->cariDataSurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengajuan_user/view_mati', $data);
		$this->load->view('templates/footer');
	}

	public function pindah()
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
			$this->load->view('templates/user_sidebar', $data);
			$this->load->view('pengajuan_user/pindah');
			$this->load->view('templates/footer');
		} else {
			$this->PengajuanUser_model->tambahSuratPindah($data['user']['id_user']);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengajuan_user');
		}
	}

	public function view_pindah()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Buat Surat';
		$data['suratpindah'] = $this->PengajuanUser_model->getSuratPindah($data['user']['role_id'], $data['user']['id_user']);
		if ($this->input->post('keyword')) {
			$data['datasurat'] = $this->Pengajuan_model->cariDataSurat();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/user_sidebar', $data);
		$this->load->view('pengajuan_user/view_pindah', $data);
		$this->load->view('templates/footer');
	}
}
