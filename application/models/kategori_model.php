<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "tbl_kategori";

    public $kat_id;
    public $kat_nama;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($kat_id)
    {
        return $this->db->get_where($this->_table, ["kat_id" => $kat_id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id = uniqid();
        $this->kat_nama = $post["nama"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        // $this->id = uniqid();
        $this->kat_id = $post["id"];
        $this->kat_nama = $post["nama"];
        $this->db->update($this->_table, $this, array('kat_id' => $post['id']));
    }
    public function delete($kat_id)
    {
        return $this->db->delete($this->_table, array("kat_id" => $kat_id));
    }
}
