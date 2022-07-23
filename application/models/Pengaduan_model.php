<?php
class Pengaduan_model extends CI_Model
{

	public function getAllPengaduan()
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_tindakan',
			'tbl_pengaduan.id_pengaduan=tbl_tindakan.id_pengaduan',
			'inner'
		);
		$this->db->join(
			'tbl_penduduk',
			'tbl_pengaduan.nik=tbl_penduduk.nik',
			'inner'
		);
		return $this->db->get('tbl_pengaduan')->result_array();
	}

	public function getPengaduanById($id_pengaduan)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_pengaduan.nik',
			'inner'
		);
		$this->db->where('tbl_pengaduan.id_pengaduan', $id_pengaduan);

		return $this->db->get('tbl_pengaduan')->row_array();
	}
	public function Balas($id_pengaduan)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_penduduk',
			'tbl_penduduk.nik=tbl_pengaduan.nik',
			'inner'
		);
		$this->db->join(
			'tbl_tindakan',
			'tbl_tindakan.id_pengaduan=tbl_pengaduan.id_pengaduan',
			'inner'
		);
		$this->db->where('tbl_pengaduan.id_pengaduan', $id_pengaduan);

		return $this->db->get('tbl_pengaduan')->row_array();
	}

	public function balasPengaduan($id_pengaduan)
	{

		$data = [
			"status" => 'Ditanggapi',
		];
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('tbl_pengaduan', $data);
	}

	public function Balasan($id_pengaduan)
	{
		$data = [
			"tanggapan" => $this->input->post('tanggapan', true),
			"tgl_tanggapan" => date('Y-m-d'),
		];
		// var_dump($data);
		// die();
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('tbl_tindakan', $data);
		redirect('pengaduan');
	}

	public function prosesPengaduan($id_pengaduan)
	{
		$data = [
			"status" => 'Selesai',
		];
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('tbl_pengaduan', $data);
		redirect('pengaduan');
	}

	public function hapusDataPengaduan($id_pengaduan)
	{
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->delete('tbl_pengaduan');
	}
}
