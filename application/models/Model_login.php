<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
}
