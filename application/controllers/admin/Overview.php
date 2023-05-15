<?php defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata['status'] !== 1) {
			redirect('');
		}

		// if (count($this->session->userdata()) <= 1) {
		// 	redirect(base_url());
		// } else {
		// 	redirect('admin/overview');
		// }
	}

	public function index()
	{
		// load view admin/overview.php
		$this->load->view("admin/overview");
	}
}
