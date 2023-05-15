<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['status'] !== 1) {
            redirect('');
        }

        $this->load->model('profile_model');

        // if (count($this->session->userdata()) <= 1) {
        // 	redirect(base_url());
        // } else {
        // 	redirect('admin/overview');
        // }
    }

    public function index()
    {

        $data["profile"] = $this->profile_model->getAll();
        $this->load->view("admin/profile/myprofile", $data);
    }


    // public function ChangePassword()
    // {
    //     if (!isset($id)) redirect('admin/profile');

    //     $psswd = $this->profile_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($psswd->rules());

    //     if ($validation->run()) {
    //         $psswd->update();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }
    //     $this->load->view("admin/profile/editpassword");
    // }

    public function ChangePassword($id = null)
    {

        $psswd = $this->profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($psswd->rules());
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/profile/editpassword");
        } else {
            $cek_old = $psswd->cek_old();
            if ($cek_old == False) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama salah</div>');
                $this->load->view("admin/profile/editpassword");
            } else {
                $psswd->update();
                $this->session->sess_destroy();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti, silahkan logout dan masuk kembali!</div>');
                $this->load->view("admin/profile/editpassword");
            } //end if valid_user
        }
    }
}
