<?php
defined('BASEPATH') or exit('NO direct script access allowed');

class Model_petshop extends CI_Model
{

    function getPetshop($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_petshop')->result_array();
        } else {
            return $this->db->get_where('tbl_petshop', ['id' => $id])->result_array();
        }
    }
}
