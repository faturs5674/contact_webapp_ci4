<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\M_setting;

class restful extends ResourceController

{

    use ResponseTrait;
    // get all product
    public function index()
    {

        $model = new M_setting();
        $data = $model->findAll();
        foreach ($data as $key => $value) {
            $data[$key]['id'] = '<div class="d-block text-nowrap">';
            $data[$key]['id'] .= "<button  onclick=\"detail($value[id])\"id=\"$value[id]\"class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></button>";
            $data[$key]['id'] .= '</div>';
        }
        // echo json_encode($data);
        return $this->respond($data, 200);
    }

    // get single product
    public function show($id = null)
    {
        $model = new M_setting();
        $data = $model->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }

    // create a product
    // public function create()
    // {
    //     $model = new M_setting();
    //     $data = [
    //         'product_name' => $this->request->getPost('product_name'),
    //         'product_price' => $this->request->getPost('product_price')
    //     ];
    //     $data = json_decode(file_get_contents("php://input"));
    //     //$data = $this->request->getPost();
    //     $model->insert($data);
    //     $response = [
    //         'status'   => 201,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Saved'
    //         ]
    //     ];

    //     return $this->respondCreated($data, 201);
    // }

    // update product
    public function update($id = null)
    {
        $model = new M_setting();
        $json = $this->request->getJSON();
        // $id = $this->request->getJSON('id');
        if ($json) {
            $data = [

                'set_invoice_cooldown' => $json->set_invoice_cooldown - 1,
                // 'product_price' => $json->product_price
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [

                'set_invoice_cooldown' => $input['set_invoice_cooldown'],
                // 'product_price' => $input['product_price']
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    // delete product
    // public function delete($id = null)
    // {
    //     $model = new M_setting();
    //     $data = $model->find($id);
    //     if ($data) {
    //         $model->delete($id);
    //         $response = [
    //             'status'   => 200,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Data Deleted'
    //             ]
    //         ];

    //         return $this->respondDeleted($response);
    //     } else {
    //         return $this->failNotFound('No Data Found with id ' . $id);
    //     }
    // }

}
