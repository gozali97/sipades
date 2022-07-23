<?php
class PengaduanUser_model extends CI_Model
{
	public function getPengaduan($role_id, $id_user)
	{
		$this->db->select('*');
		$this->db->join(
			'tbl_user',
			'tbl_pengaduan.id_user=tbl_user.id_user',
			'inner'
		);
		$this->db->join(
			'tbl_tindakan',
			'tbl_pengaduan.id_pengaduan=tbl_tindakan.id_pengaduan',
			'inner'
		);
		$this->db->where('tbl_user.role_id', $role_id);
		$this->db->where('tbl_user.id_user', $id_user);
		return $this->db->get('tbl_pengaduan')->result_array();
	}

	public function tambahPengaduan($id_user)
	{
		$data = [
			"tgl_pengaduan" => date('Y-m-d'),
			"nik" => $this->input->post('nik', true),
			"isi_laporan" => $this->input->post('isi_laporan', true),
			"foto" => $this->input->post('foto', true),
			"status" => "Proses",
			"id_user" => $id_user
		];

		$this->db->insert('tbl_pengaduan', $data);
		redirect('pengaduanuser');
	}
}
