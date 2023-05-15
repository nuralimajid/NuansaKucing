<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tbl_user";

    public $user_id;
    public $username;
    public $nama_lengkap;
    public $email;
    public $no_hp;
    public $jenis_kelamin;
    public $foto = "default.png";
    public $password;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($user_id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $user_id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id = uniqid();
        $this->username = $post["namal"];
        $this->nama_lengkap = $post["nama"];
        $this->email = $post["email"];
        $this->no_hp = $post["nohp"];
        $this->foto = $this->_uploadImage();
        $this->password = md5($post["password"]);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["id"];
        $this->nama_lengkap = $post["nama"];
        $this->username = $post["namal"];
        $this->email = $post["email"];
        $this->no_hp = $post["nohp"];


        if (!empty($_FILES["images"]["nama"])) {
            $this->foto = $this->_uploadImage();
        } else {
            $this->foto = $post["old_image"];
        }

        $this->password = md5($post["password"]);
        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

    public function delete($user_id)
    {
        $this->_deleteImage($user_id);
        return $this->db->delete($this->_table, array("user_id" => $user_id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->user_id;
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }

    private function _deleteImage($user_id)
    {
        $user = $this->getById($user_id);
        if ($user->foto != "default.png") {
            $filename = explode(".", $user->foto)[0];
            return array_map('unlink', glob(FCPATH . "upload/user/$filename.*"));
        }
    }
}
