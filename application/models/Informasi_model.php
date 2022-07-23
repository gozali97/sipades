<?php
class Informasi_model extends CI_Model
{
	public function getAllInformasi()
	{
		return $this->db->get('tbl_informasi')->result_array();
	}

	public function tambahInformasi()
	{
		$data = [
			"judul_informasi" => $this->input->post('judul_informasi', true),
			"ket_informasi" => $this->input->post('ket_informasi', true),
			"gambar" => $this->input->post('gambar', true),
			"tanggal" => date('Y-m-d'),

		];

		$this->db->insert('tbl_informasi', $data);
		redirect('informasi');
	}

	public function hapusInformasi($id_informasi)
	{
		$this->db->where('id_informasi', $id_informasi);
		$this->db->delete('tbl_informasi');
	}

	public function getInformasiById($id_informasi)
	{
		return $this->db->get_where('tbl_informasi', ['id_informasi' => $id_informasi])->row_array();
	}

	public function ubahInformasi()
	{
		$data = [
			"judul_informasi" => $this->input->post('judul_informasi', true),
			"ket_informasi" => $this->input->post('ket_informasi', true),
			"gambar" => $this->input->post('gambar', true),
			"tanggal" => date('Y-m-d'),

		];
		$this->db->where('id_informasi', $this->input->post('id_informasi'));
		$this->db->update('tbl_informasi', $data);
		redirect('informasi');
	}
}
