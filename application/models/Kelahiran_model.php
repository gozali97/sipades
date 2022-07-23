<?php
class Kelahiran_model extends CI_Model
{
	public function getAllLahir()
	{
		return $this->db->get('tbl_kelahiran')->result_array();
	}
}
