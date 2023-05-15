<?php
defined('BASEPATH') or exit('NO direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Petshop extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_petshop');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $petshop = $this->Model_petshop->getPetshop();
        } else {
            $petshop = $this->Model_petshop->getPetshop($id);
        }

        if ($petshop) {
            $this->response([
                'status' => true,
                'dataPet' => $petshop
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
