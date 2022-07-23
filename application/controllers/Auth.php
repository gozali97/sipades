<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

		if ($user) {
			// jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			        Password salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			   Email tidak aktif</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email tidak terdaftar</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
			'is_unique' => 'Email sudah pernah didaftarkan!'
		]);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'password tidak sama!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'user.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('tbl_user', $data);
			// $this->_sendEmail();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat! Daftar sukses. Silahkan Login </div>');
			redirect('auth');
		}
	}

	public function forgotPassword()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
			if ($user) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered!</div>');
				redirect('auth');
			}
		}
	}

	public function changePassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed! Please to Login</div>');
			redirect('auth');
		}
	}

	private function _sendEmail()
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ahmadgozali1003@gmail.com',
			'smtp_pass' => '123456',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('ahmadgozali1003@gmail.com', 'Ahmad Gozali');
		$this->email->to('ahmadmulti10@gmail.com');
		$this->email->subject('Verifikasi email');
		$this->email->message('Hello');
		// $this->email->send();
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda telar keluar </div>');
		redirect('home');
	}
}
