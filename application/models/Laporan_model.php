<?php
class Laporan_model extends CI_Model
{
	public function getAllSurat()
	{

		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_pengajuan_surat.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		// $this->db->where('status_surat = `Selesai`');
		$this->db->join(
			'tbl_penduduk',
			'tbl_pengajuan_surat.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');


		return $this->db->get('tbl_pengajuan_surat')->result_array();

		// $this->db->select('status_surat');
		// $this->db->where('tbl_validasi.status_surat = "Selesai"');
		// return $this->db->get('tbl_validasi')->row_array();
	}

	public function getAllSuratIzin()
	{

		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_izin.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		// $this->db->where('status_surat = `Selesai`');
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_izin.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');


		return $this->db->get('tbl_surat_izin')->result_array();

		// $this->db->select('status_surat');
		// $this->db->where('tbl_validasi.status_surat = "Selesai"');
		// return $this->db->get('tbl_validasi')->row_array();
	}


	public function getAllSuratKeterangan()
	{

		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_ket.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		// $this->db->where('status_surat = `Selesai`');
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_ket.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');


		return $this->db->get('tbl_surat_ket')->result_array();
	}

	public function getAllSuratKematian()
	{

		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_mati.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		// $this->db->where('status_surat = `Selesai`');
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_mati.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');


		return $this->db->get('tbl_surat_mati')->result_array();
	}

	public function getAllSuratPindah()
	{

		$this->db->select('*');
		$this->db->join(
			'tbl_validasi',
			'tbl_surat_pindah.no_surat=tbl_validasi.no_surat',
			'inner'
		);
		// $this->db->where('status_surat = `Selesai`');
		$this->db->join(
			'tbl_penduduk',
			'tbl_surat_pindah.nik=tbl_penduduk.nik',
			'inner'
		);
		$this->db->where('tbl_validasi.status_surat = "Selesai"');


		return $this->db->get('tbl_surat_pindah')->result_array();
	}

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
}

// $querySurat = "SELECT `tbl_pengajuan_surat`.`*`,tbl_validasi.`status_surat`,
		// 				`tbl_penduduk`,`nik`,`tbl_penduduk`,`nm_lengkap`,    
		// 				JOIN `tbl_pengajuan_surat`.`no_surat` = `tbl_validasi`.`no_surat`
		// 				JOIN `tbl_pengajuan_surat`.`nik` = `tbl_penduduk`.`nik`
		// 				WHERE `tbl_validasi`= 'Selesai'";
		// $surat = $this->db->query($querySurat)->result_array();

		// return $this->db->get($surat)->result_array();
