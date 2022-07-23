<?php

class Penduduk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penduduk_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Data Penduduk';
		$data['penduduk'] = $this->Penduduk_model->getAllPenduduk();
		if ($this->input->post('keyword')) {
			$data['penduduk'] = $this->Penduduk_model->cariDataPenduduk();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('penduduk/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Tambah Data Penduduk';
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]');
		$this->form_validation->set_rules('nm_lengkap', 'Nama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('penduduk/tambah_penduduk');
			$this->load->view('templates/footer');
		} else {
			$this->Penduduk_model->tambahDataPenduduk();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('penduduk');
		}
	}

	public function hapus($nik)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Penduduk_model->hapusDataPenduduk($nik);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('penduduk');
	}

	public function detail($nik)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Data Penduduk';
		$data['penduduk'] = $this->Penduduk_model->getPendudukById($nik);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('penduduk/detail_penduduk', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($nik)

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Form Ubah Data Penduduk';
		$data['penduduk'] = $this->Penduduk_model->getPendudukById($nik);
		$data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
		$data['status_kawin'] = ['Belum Kawin', 'Kawin'];
		$data['status_penduduk'] = ['Penduduk tetap', 'Pindahan'];


		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
		$this->form_validation->set_rules('nm_lengkap', 'Nama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('penduduk/ubah_penduduk', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Penduduk_model->ubahDataPenduduk();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('penduduk');
		}
	}
}
