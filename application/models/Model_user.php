<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function getUser($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_user')->result_array();
        } else {
            return $this->db->get_where('tbl_user', ['id' => $id])->result_array();
        }
    }

    // public function deleteUser($id)
    // {
    //     $this->db->delete('tbl_user', ['id' => $id]);
    //     return $this->db->affected_rows();
    // }
}
