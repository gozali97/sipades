<?php
class Penduduk_model extends CI_Model
{
	public function getAllPenduduk()
	{
		return $this->db->get('tbl_penduduk')->result_array();
	}

	public function tambahDataPenduduk()
	{
		$data = [
			"nik" => $this->input->post('nik', true),
			"nm_lengkap" => $this->input->post('nm_lengkap', true),
			"tmpt_lahir" => $this->input->post('tmpt_lahir', true),
			"tgl_lahir" => $this->input->post('tgl_lahir', true),
			"alamat" => $this->input->post('alamat', true),
			"agama" => $this->input->post('agama', true),
			"jk" => $this->input->post('jk'),
			"stts_kawin" => $this->input->post('stts_kawin', true),
			"pekerjaan" => $this->input->post('pekerjaan', true),
			"stts_penduduk" => $this->input->post('stts_penduduk', true),
		];

		$this->db->insert('tbl_penduduk', $data);
		redirect('penduduk');
	}


	public function hapusDataPenduduk($nik)
	{
		$this->db->where('nik', $nik);
		$this->db->delete('tbl_penduduk');
	}

	public function getPendudukById($nik)
	{
		return $this->db->get_where('tbl_penduduk', ['nik' => $nik])->row_array();
	}

	public function ubahDataPenduduk()
	{
		$data = [
			"nik" => $this->input->post('nik', true),
			"nm_lengkap" => $this->input->post('nm_lengkap', true),
			"tmpt_lahir" => $this->input->post('tmpt_lahir', true),
			"tgl_lahir" => $this->input->post('tgl_lahir', true),
			"alamat" => $this->input->post('alamat', true),
			"agama" => $this->input->post('agama', true),
			"jk" => $this->input->post('jk'),
			"stts_kawin" => $this->input->post('stts_kawin', true),
			"pekerjaan" => $this->input->post('pekerjaan', true),
			"stts_penduduk" => $this->input->post('stts_penduduk', true),
		];
		$this->db->where('nik', $this->input->post('nik'));
		$this->db->update('tbl_penduduk', $data);
		redirect('penduduk');
	}

	public function cariDataPenduduk()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nik', $keyword);
		$this->db->or_like('nm_lengkap', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('agama', $keyword);
		$this->db->or_like('jk', $keyword);
		$this->db->or_like('pekerjaan', $keyword);
		return $this->db->get('tbl_penduduk')->result_array();
	}
}
