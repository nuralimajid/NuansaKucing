<?php defined('BASEPATH') or exit('No direct access allowed');

class Model_komentar extends CI_Model
{

    public function getKomentar($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_comment')->result_array();
        } else {
            return $this->db->get_where('tbl_comment', ['comment_id' => $id])->result_array();
        }
    }

    public function createKomentar($data)
    {
        // $test = $this->db->insert('tbl_post', $data);
        $sql = "INSERT INTO tbl_comment SET 
                    comment_subjek = '{$data['comment_subjek']}',
                    comment_post = '{$data['comment_post']}',
                    comment_by = '{$data['comment_by']}'";
        return $this->db->query($sql);
        // print_r($test);
    }

    public function updateKomentar($data, $id)
    {
        $this->db->update('tbl_comment', $data, ['comment_id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteKomentar($id)
    {
        $this->db->delete('tbl_comment', ['comment_id' => $id]);
        return $this->db->affected_rows();
    }
}
