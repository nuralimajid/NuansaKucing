<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Komentar extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_komentar');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $komentar = $this->Model_komentar->getKomentar();
        } else {
            $komentar = $this->Model_kategori->getKategori($id);
        }


        if ($komentar) {
            $this->response([
                'status'        => true,
                'dataKomentar'  => $komentar
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'        => false,
                'message'       => 'tidak ada komentar'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = [
            'comment_subjek'    => $this->post('komentar'),
            'comment_post'   => $this->post('postingan'),
            'comment_by'       => $this->post('user')
        ];

        if ($this->Model_komentar->createKomentar($data) > 0) {
            $this->response([
                'status'        => true,
                'message'       => 'berhasil membuat komentar'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'        => false,
                'message'       => 'tidak ada komentar'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'comment_subjek'    => $this->put('komentar'),
            'comment_post'      => $this->put('postingan'),
            'comment_by'        => $this->put('user')
        ];

        // print_r($data);
        // $update = $this->Model_postingan->updatePost($data, $post_id);
        if ($this->Model_komentar->updateKomentar($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Komentar berhasil di update'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'gagal update komentar'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($delete = $this->Model_komentar->deleteKomentar($id) > 0) {
                $this->response([
                    'status'    => true,
                    'id'        => $id,
                    'message'   => 'Postingan berhasil di dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'gagal delete postingan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
