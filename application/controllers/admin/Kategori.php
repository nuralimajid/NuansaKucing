<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['status'] !== 1) {
            redirect('login');
        }

        $this->load->model("Kategori_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kategori"] = $this->Kategori_model->getAll();
        $this->load->view("admin/kategori/listkategori", $data);
    }

    public function add()
    {
        $kategori = $this->Kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/kategori');
        }
    }

    public function edit($kat_id = null)
    {
        if (!isset($kat_id)) redirect('admin/Kategori');
        

        $kat = $this->Kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kat->rules());
        
        if ($validation->run()) {
            $kat->update();
            // $this->session->set_flashdata('success', 'Berhasil diupdate');
            // redirect('admin/kategori');
        } else {
            echo "<script>alert('Gagal')</script>";
        }

        $data["kat"] = $kat->getById($kat_id);
        if (!$data["kat"]) show_404();

        $this->load->view("admin/kategori/listKategori", $data);
    }

    public function delete($kat_id = null)
    {
        if (!isset($kat_id)) show_404();

        if ($this->kategori_model->delete($kat_id)) {
            redirect(site_url('admin/kategori'));
        }
    }
}
