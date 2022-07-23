<?php

class Home extends CI_Controller
{

	public function index()

	{

		$data['judul'] = 'Home';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/h_header', $data);
		$this->load->view('templates/h_topbar');
		$this->load->view('home/index');
		$this->load->view('templates/h_footer');
	}
	public function profil()

	{

		$data['judul'] = 'Profil';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/h_header', $data);
		$this->load->view('templates/h_topbar');
		$this->load->view('home/profil');
		$this->load->view('templates/h_footer');
	}

	public function layanan()

	{

		$data['judul'] = 'Layanan';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/h_header', $data);
		$this->load->view('templates/h_topbar');
		$this->load->view('home/layanan');
		$this->load->view('templates/h_footer');
	}
	public function kontak()

	{

		$data['judul'] = 'Kontak';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/h_header', $data);
		$this->load->view('templates/h_topbar');
		$this->load->view('home/kontak');
		$this->load->view('templates/h_footer');
	}

	public function statistik()

	{

		$data['judul'] = 'Kontak';
		// if ($this->input->post('keyword')) {
		// 	$data['pengajuan'] = $this->Pengajuan_model->cariDataPengajuan();
		// }
		$this->load->view('templates/h_header', $data);
		$this->load->view('templates/h_topbar');
		$this->load->view('home/statistik');
		$this->load->view('templates/h_footer');
	}
}
