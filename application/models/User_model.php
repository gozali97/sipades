<?php
class User_model extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('tbl_user')->result_array();
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('tbl_user', ['id_user' => $id_user])->row_array();
	}

	public function ubahDataUser()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'email' => $this->input->post('email', true),
			// 'image' => 'user.png',
			"image" => $this->input->post('image', true),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('tbl_user', $data);
		redirect('user/profil');
	}

	public function getAllInformasi()
	{
		return $this->db->get('tbl_informasi')->result_array();
	}
}
