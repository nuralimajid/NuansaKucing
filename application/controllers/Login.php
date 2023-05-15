<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->Model('Model_login', 'login');

		// if (count($this->session->userdata()) >= 0) {
		// 	redirect(base_url());
		// } else {
		// 	redirect(base_url());
		// }
	}


	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'valid_email' => 'Please enter a valid email address.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/header');
			$this->load->view('login/login');
			$this->load->view('login/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $username,
			'password' => md5($password)
		);
		$cek = $this->login->cek_login("tbl_admin", $where)->num_rows();

		if ($cek > 0) {
			$data_session = array(
				'nama' => $username,
				'status' => 1
			);
			$this->session->set_userdata($data_session);
			redirect('admin/overview');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password salah!</div>');
			redirect('');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
