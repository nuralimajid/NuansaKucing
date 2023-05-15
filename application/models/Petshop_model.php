<?php defined('BASEPATH') or exit('No direct script access allowed');

class Petshop_model extends CI_Model
{
    private $_table = "tbl_petshop";

    public $id;
    public $nama;
    public $alamat;
    public $nohp;
    public $logo = "default.png";
    public $lat;
    public $long;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'nohp',
                'label' => 'Nohp',
                'rules' => 'required|numeric'
            ],

            [
                'field' => 'lat',
                'label' => 'Lat',
                'rules' => 'required'
            ],

            [
                'field' => 'long',
                'label' => 'Long',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id = uniqid();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->lat = $post["lat"];
        $this->long = $post["long"];
        $this->logo = $this->_uploadImage();
        $this->nohp = $post["nohp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->lat = $post["lat"];
        $this->long = $post["long"];


        if (!empty($_FILES["images"]["name"])) {
            $this->logo = $this->_uploadImage();
        } else {
            $this->logo = $post["old_image"];
        }

        $this->nohp = $post["nohp"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }

    private function _deleteImage($id)
    {
        $petshop = $this->getById($id);
        if ($petshop->logo != "default.png") {
            $filename = explode(".", $petshop->logo)[0];
            return array_map('unlink', glob(FCPATH . "upload/user/$filename.*"));
        }
    }
}
