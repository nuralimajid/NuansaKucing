<?php
defined('BASEPATH') or exit('NO direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Kategori extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $kategori = $this->Model_kategori->getKategori();
        } else {
            $kategori = $this->Model_kategori->getKategori($id);
        }

        if ($kategori) {
            $this->response([
                'status' => true,
                'dataPet' => $kategori
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
