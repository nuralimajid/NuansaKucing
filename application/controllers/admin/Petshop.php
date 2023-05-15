<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petshop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("petshop_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["petshop"] = $this->petshop_model->getAll();
        $this->load->view("admin/petshop/list", $data);
    }

    public function add()
    {

        $petshop = $this->petshop_model;
        $validation = $this->form_validation;
        $validation->set_rules($petshop->rules());

        if ($validation->run()) {
            $petshop->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/petshop');
        }
        $this->load->view("admin/petshop/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/petshop');

        $petshop = $this->petshop_model;
        $validation = $this->form_validation;
        $validation->set_rules($petshop->rules());

        if ($validation->run()) {
            $petshop->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect('admin/petshop');
        }

        $data["petshop"] = $petshop->getById($id);
        if (!$data["petshop"]) show_404();

        $this->load->view("admin/petshop/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->petshop_model->delete($id)) {
            redirect(site_url('admin/petshop'));
        }
    }
}
