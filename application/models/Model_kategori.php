<?php
defined('BASEPATH') or exit('NO direct script access allowed');

class Model_kategori extends CI_Model
{

    function getKategori($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_kategori')->result_array();
        } else {
            return $this->db->get_where('tbl_kategori', ['kat_id' => $id])->result_array();
        }
    }
}
