<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $_table = "tbl_admin";

    public $id;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [
                'field' => 'password_lama',
                'label' => 'Password Lama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'password_baru',
                'label' => 'Password baru',
                'rules' => 'required|trim|min_length[5]|matches[verifikasi_password]'
            ],
            [
                'field' => 'verifikasi_password',
                'label' => 'Verifikasi Password',
                'rules' => 'required|trim|min_length[5]|matches[password_baru]'
            ],
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


    public function update()
    {
        $pass = md5($this->input->post('password_baru'));
        $data = array(
            'password' => $pass
        );

        $this->db->update($this->_table, $data);
    }

    public function cek_old()
    {
        $old = md5($this->input->post('password_lama'));
        $this->db->where('password', $old);
        $query = $this->db->get('admin');
        return $query->result();;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
