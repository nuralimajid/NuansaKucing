<?php
defined('BASEPATH') or exit('NO direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('Model_user','user');
    }

    public function user_get(){
        $id=$this->get('id');

        if($id === null){
            $users = $this->user->getUser();
        }else{
            $users = $this->user->getUser($id);
        }

        if(Users){
            $this->response([
                'status' => true,
                'message' => 'data ada'
            ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status' => false,
                'message' => 'not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}