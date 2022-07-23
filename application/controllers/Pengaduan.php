<?php

class Pengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaduan_model');
	}

	public function index()

	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->Pengaduan_model->getAllPengaduan();
		$data['judul'] = 'Data Pengaduan';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengaduan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_pengaduan)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Detail Aduan';
		$data['pengaduan'] = $this->Pengaduan_model->getPengaduanById($id_pengaduan);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengaduan/detail', $data);
		$this->load->view('templates/footer');
	}

	public function balas($id_pengaduan)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Balasan';
		$data['aduan'] = $this->Pengaduan_model->Balas($id_pengaduan);
		$this->Pengaduan_model->balasPengaduan($id_pengaduan);
		$this->form_validation->set_rules('tanggapan', 'Tanggapan1', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('pengaduan/balas');
			$this->load->view('templates/footer');
		} else {
			// var_dump($this->input->post('tanggapan', true));
			// die();
			$this->Pengaduan_model->Balasan($id_pengaduan);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
			redirect('pengaduan');
		}
	}


	public function acc($id_pengaduan)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['judul'] = 'Tanggapan';
		$data['pengaduan'] = $this->Pengaduan_model->getPengaduanById($id_pengaduan);
		$this->Pengaduan_model->prosesPengaduan($id_pengaduan);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengaduan/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus($id_pengaduan)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Pengaduan_model->hapusDataPengaduan($id_pengaduan);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pengaduan');
	}
}
