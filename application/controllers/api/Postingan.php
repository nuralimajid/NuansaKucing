<?php defined('BASEPATH') or exit('No direct scriptn access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Postingan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_postingan');
    }

    public function index_get()
    {
        $id = $this->get('id', TRUE);

        if ($id === null) {
            $post = $this->Model_postingan->getPostingan();
        } else {
            $post = $this->Model_postingan->getPostingan($id);
        }

        if ($post) {
            $this->response([
                'status' => true,
                'dataPost' => $post
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'tidak ada postingan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'post_judul'    => $this->post('judul'),
            'post_konten'   => $this->post('konten'),
            'post_kat'      => $this->post('kategori'),
            'post_by'       => $this->post('user')
        ];
        if ($this->Model_postingan->createPost($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'berhasil membuat postingan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'gagal membuat postingan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'post_judul'    => $this->put('judul'),
            'post_konten'   => $this->put('konten'),
            'post_kat'      => $this->put('kategori'),
            'post_by'       => $this->put('user')
        ];

        // print_r($data);
        // $update = $this->Model_postingan->updatePost($data, $post_id);
        if ($this->Model_postingan->updatePost($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Postingan berhasil di update'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'gagal update postingan'
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
            if ($delete = $this->Model_postingan->deletePost($id) > 0) {
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
