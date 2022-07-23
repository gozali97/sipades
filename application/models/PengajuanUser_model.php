<?php
class PengajuanUser_model extends CI_Model
{


	public function getUserSurat($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_pengajuan_surat.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_validasi',
			'tbl_pengajuan_surat.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_pengajuan_surat')->result_array();
	}

	public function tambahDataPengajuan($id_user)
	{
		$data = [
			"kode_surat" => $this->input->post('kode_surat', true),
			"tanggal" => $this->input->post('tanggal', true),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => $this->input->post('nm_surat', true),
			"id_user" => $id_user
		];

		$this->db->insert('tbl_pengajuan_surat', $data);
		// redirect('pengajuan_user');
	}

	public function tambahSuratKeterangan($id_user)
	{
		$data = [
			"kode_surat" => '145.1',
			"tanggal" => date('Y-m-d'),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => 'Surat Keterangan',
			"keterangan" => 'Orang tersebut benar benar warga Desa Dukuhmulyo Kec. Jakenan Kab. Pati dan benar-benar berkelakuan baik',
			"id_user" => $id_user
		];

		$this->db->insert('tbl_surat_ket', $data);
		redirect('pengajuan_user/view_ket');
	}

	public function getSuratKet($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_surat_ket.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_ket.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_surat_ket')->result_array();
	}

	public function tambahSuratIzin($id_user)
	{
		$data = [
			"kode_surat" => '503',
			"tanggal" => date('Y-m-d'),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => 'Surat Izin usaha',
			"nm_usaha" => $this->input->post('nm_usaha', true),
			"jenis_usaha" => $this->input->post('jenis_usaha', true),
			"alamat_usaha" => $this->input->post('alamat_usaha', true),
			"keterangan" => 'Orang tersebut diatas benar-benar mempunyai usaha :',
			"id_user" => $id_user
		];

		$this->db->insert('tbl_surat_izin', $data);
		redirect('pengajuan_user/view_izin');
	}

	public function getSuratIzin($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_surat_izin.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_izin.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_surat_izin')->result_array();
	}
	public function tambahSuratMeninggal($id_user)
	{
		$data = [
			"kode_surat" => '474.3',
			"tanggal" => date('Y-m-d'),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => 'Surat Kematian',
			"hari_m" => $this->input->post('hari_m', true),
			"tgl_m" => $this->input->post('tgl_m', true),
			"sebab" => $this->input->post('sebab', true),
			"alamat_m" => $this->input->post('alamat_m', true),
			"id_user" => $id_user
		];

		$this->db->insert('tbl_surat_mati', $data);
		redirect('pengajuan_user/view_mati');
	}

	public function getSuratMati($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_surat_mati.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_mati.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_surat_mati')->result_array();
	}


	public function tambahSuratPindah($id_user)
	{
		$data = [
			"kode_surat" => '474',
			"tanggal" => date('Y-m-d'),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => 'Surat Pindah',
			"alamat_baru" => $this->input->post('alamat_baru', true),
			"jml_kel" => $this->input->post('jml_kel', true),
			"id_user" => $id_user
		];

		$this->db->insert('tbl_surat_pindah', $data);
		redirect('pengajuan_user/view_pindah');
	}

	public function getSuratPindah($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_surat_pindah.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_pindah.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_surat_pindah')->result_array();
	}
}
