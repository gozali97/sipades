<?php
class Pindah_model extends CI_Model
{
	public function getAllPindah()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_pindah.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_pindah.nik=tbl_penduduk.nik',
			'inner'
		);

		return $this->db->get('tbl_surat_pindah')->result_array();
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
		redirect('pindah');
	}

	public function hapusSuratPindah($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$this->db->delete('tbl_surat_pindah');
	}

	public function getPindahById($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_surat_pindah.nik',
			'inner'
		);
		$this->db->where('tbl_surat_pindah.no_surat', $no_surat);

		return $this->db->get('tbl_surat_pindah')->row_array();
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
		redirect('pindah');
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
		redirect('pindah');
	}

	public function getAllSuratPindah($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_pindah.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_pindah.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_surat_pindah.no_surat', $no_surat);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');
		return $this->db->get('tbl_surat_pindah')->row_array();
	}
}
