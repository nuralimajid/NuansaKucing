<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_postingan extends CI_Model
{

    public function getPostingan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tbl_post')->result_array();
        } else {
            return $this->db->get_where('tbl_post', ['post_id' => $id])->result_array();
        }
    }

    public function createPost($data)
    {
        // $test = $this->db->insert('tbl_post', $data);
        $sql = "INSERT INTO tbl_post SET 
                    post_judul = '{$data['post_judul']}',
                    post_konten = '{$data['post_konten']}',
                    post_by = '{$data['post_by']}',
                    post_kat = '{$data['post_kat']}' ";
        return $this->db->query($sql);
        // print_r($test);
    }

    public function updatePost($data, $id)
    {
        // $sql = "UPDATE tbl_post SET 
        //             post_judul = '{$data['post_judul']}',
        //             post_konten = '{$data['post_konten']}',
        //             post_by = '{$data['post_by']}',
        //             post_kat = '{$data['post_kat']}' 
        //             WHERE post_id ='{$id}'  ";
        // // // print_r($sql);
        // if ($this->db->query($sql)) {
        //     return true;
        // } else {
        //     return false;
        // }

        $this->db->update('tbl_post', $data, ['post_id' => $id]);
        return $this->db->affected_rows();
        // // print_r($test);
    }

    public function deletePost($id)
    {
        // $sql = "DELETE from tbl_post WHERE post_id ='{$id}'";

        // if ($this->db->query($sql)) {
        //     return true;
        // } else {
        //     return false;
        // }
        $this->db->delete('tbl_post', ['post_id' => $id]);
        return $this->db->affected_rows();
    }
}
