<?php
class Izin_model extends CI_Model
{
	public function getAllIzin()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_izin.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_izin.nik=tbl_penduduk.nik',
			'inner'
		);

		return $this->db->get('tbl_surat_izin')->result_array();
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
		redirect('izin');
	}

	public function hapusSuratIzin($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$this->db->delete('tbl_surat_izin');
	}

	public function getIzinById($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_surat_izin.nik',
			'inner'
		);
		$this->db->where('tbl_surat_izin.no_surat', $no_surat);

		return $this->db->get('tbl_surat_izin')->row_array();
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
		redirect('izin');
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
		redirect('izin');
	}

	public function getAllSuratIzin($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_izin.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_izin.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_surat_izin.no_surat', $no_surat);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');
		return $this->db->get('tbl_surat_izin')->row_array();
	}
}
