<?php
class Pengajuan_model extends CI_Model
{
	public function getAllPengajuan()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_pengajuan_surat.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_pengajuan_surat.nik=tbl_penduduk.nik',
			'inner'
		);
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
		redirect('pengajuan');
	}

	public function hapusDataPengajuan($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$this->db->delete('tbl_pengajuan_surat');
	}

	public function getPengajuanById($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_pengajuan_surat.nik',
			'inner'
		);
		$this->db->where('tbl_pengajuan_surat.no_surat', $no_surat);

		return $this->db->get('tbl_pengajuan_surat')->row_array();
	}

	public function cariDataPengajuan()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('kode_surat', $keyword);
		$this->db->or_like('tanggal', $keyword);
		$this->db->or_like('nik', $keyword);
		$this->db->or_like('nm_surat', $keyword);
		return $this->db->get('tbl_pengajuan_surat')->result_array();
	}

	public function ubahDataPengajuan()
	{
		$data = [
			"kode_surat" => $this->input->post('kode_surat', true),
			"tanggal" => $this->input->post('tanggal', true),
			"nik" => $this->input->post('nik', true),
			"nm_surat" => $this->input->post('nm_surat', true)
		];
		$this->db->where('no_surat', $this->input->post('no_surat'));
		$this->db->update('tbl_pengajuan_surat', $data);
		redirect('pengajuan');
	}

	public function prosesSurat($no_surat)
	{
		$data = [
			"status_surat" => 'Selesai',
			"tanggal" => date('Y-m-d'),
		];
		$this->db->where('no_surat', $no_surat);
		$this->db->update('tbl_validasi', $data);
		redirect('pengajuan');
	}

	public function getAllSurat($no_surat)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_pengajuan_surat.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_pengajuan_surat.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_pengajuan_surat.no_surat', $no_surat);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');
		return $this->db->get('tbl_pengajuan_surat')->row_array();
	}
}
