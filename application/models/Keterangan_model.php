<?php
class Keterangan_model extends CI_Model
{
	public function getAllKeterangan()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_ket.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_ket.nik=tbl_penduduk.nik',
			'inner'
		);
		return $this->db->get('tbl_surat_ket')->result_array();
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
		redirect('keterangan');
	}

	public function hapusSuratKet($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$this->db->delete('tbl_surat_ket');
	}

	public function getKeteranganById($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_surat_ket.nik',
			'inner'
		);
		$this->db->where('tbl_surat_ket.no_surat', $no_surat);

		return $this->db->get('tbl_surat_ket')->row_array();
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
		redirect('keterangan');
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
		redirect('keterangan');
	}

	public function getAllSuratKet($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_ket.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_ket.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_surat_ket.no_surat', $no_surat);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');
		return $this->db->get('tbl_surat_ket')->row_array();
	}
}
