<?php
class ManageUser_model extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('tbl_user')->result_array();
	}

	public function hapusDataUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('tbl_user');
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('tbl_user', ['id_user' => $id_user])->row_array();
	}

	public function tambahDataUser()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'email' => $this->input->post('email', true),
			'image' => 'user.png',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->insert('tbl_user', $data);
		redirect('manageuser');
	}

	public function ubahDataUser($role_id)
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'email' => $this->input->post('email', true),
			// 'image' => 'user.png',
			"image" => $this->input->post('image', true),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			// 'role_id' => $role_id,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('tbl_user', $data);
		redirect('manageuser');
	}

	// public function cariDataUser()
	// {
	// 	$keyword = $this->input->post('keyword', true);
	// 	$this->getUser()->like('tbl_user' . 'nama', $keyword);
	// 	$this->getUser();
	// }
	// public function getUser()
	// {
	// 	$query = "SELECT *, `user_role`.`role`
	// 	FROM `tbl_user` JOIN `user_role`
	// 	ON `tbl_user`.`role_id` = `user_role`.`id` 
	// 	";
	// 	return $this->db->query($query)->result_array();
	// }
}
