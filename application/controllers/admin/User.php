<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        if ($this->session->userdata['status'] !== 1) {
            redirect('');
        }
    }

    public function index()
    {
        $data["user"] = $this->user_model->getAll();
        $this->load->view("admin/user/list", $data);
    }

    public function add()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/user');
        }

        $this->load->view("admin/user/new_form");
    }

    public function edit($user_id = null)
    {
        if (!isset($user_id)) redirect('admin/User');

        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect('admin/user');
        }

        $data["user"] = $user->getById($user_id);
        if (!$data["user"]) show_404();

        $this->load->view("admin/user/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->user_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus!!');
            redirect(site_url('admin/user'));
        }
    }
}
