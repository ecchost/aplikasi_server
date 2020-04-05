<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class mozarella extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mozarella_model','barang');
    }
    public function index_get(){
        $id = $this->get('barang_id');
        if ($id === null){
            $barang = $this->barang->getMozarella();
        } else {
            $barang = $this->barang->getMozarella($id);
        }

        if($barang){
            $this->response([
                'status' => true,
                'data' => $barang
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete(){
        $id=$this->delete('barang_id');

        if ($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->barang->deleteMozarella($id) > 0){
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post(){
        $data = [
            'barang_id' => $this->post('barang_id'),
            'kategori_id' => $this->post('kategori_id'),
            'nama_barang' => $this->post('nama_barang'),
            'harga' => $this->post('harga')
        ];

        if ($this->barang->createMozarella($data) > 0){
            $this -> response([
                'status' => true,
                'message' => 'new mozarella has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this-> response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id = $this->put('barang_id');
        $data = [
            'barang_id' => $this->put('barang_id'),
            'kategori_id' => $this->put('kategori_id'),
            'nama_barang' => $this->put('nama_barang'),
            'harga' => $this->put('harga')
        ];

        if ($this->barang->updateMozarella($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data mozarella has been updated'
            ],REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

/* End of file Controllername.php */
}

?>
