<?php
class Meninggal_model extends CI_Model
{
	public function getAllMeninggal()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_mati.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_mati.nik=tbl_penduduk.nik',
			'inner'
		);

		return $this->db->get('tbl_surat_mati')->result_array();
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
		redirect('meninggal');
	}

	public function hapusSuratMati($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$this->db->delete('tbl_surat_mati');
	}

	public function getMatiById($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_surat_mati.nik',
			'inner'
		);
		$this->db->where('tbl_surat_mati.no_surat', $no_surat);

		return $this->db->get('tbl_surat_mati')->row_array();
	}

	public function prosesSurat($no_surat)
	{
		$data = [
			"status_surat" => 'Selesai',
			"tanggal" => date('Y-m-d'),
			"ket" => 'Permohonan surat disetujui',
		];
		$this->db->where('no_surat', $no_surat);
		$this->db->update('tbl_validasi', $data);
		redirect('meninggal');
	}

	public function tolakSurat($no_surat)
	{
		$data = [
			"status_surat" => 'Ditolak',
			"tanggal" => date('Y-m-d'),
			"ket" => 'Mohon maaf data yang anda inputkan belum lengkap',
		];
		$this->db->where('no_surat', $no_surat);
		$this->db->update('tbl_validasi', $data);
		redirect('meninggal');
	}


	public function getAllSuratMati($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_mati.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_mati.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_surat_mati.no_surat', $no_surat);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');
		return $this->db->get('tbl_surat_mati')->row_array();
	}
}
