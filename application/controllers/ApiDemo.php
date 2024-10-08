<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class ApiDemo extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        // Load models if necessary
    }

    public function users_get()
    {
        $emp = new Employee_model;
        $result_emp = $emp->insert_employee();



        // Respond with data and HTTP status code
        $this->response($result_emp, RestController::HTTP_OK);
    }
    public function storeEmp_post()
    {
        $emp = new Employee_model;
        $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
        ];
        $result = $emp->inn_employee($data);
        // $this ->response($data,$resul,200);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'New Employee created'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to  created employee'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    // Find employee by ID
    public function findEmp_get($id)
    {
        $result_find = $this->Employee_model->findEmp($id);

        if ($result_find) {
            $this->response($result_find, RestController::HTTP_OK); // 200 OK
        } else {
            $this->response([
                'status' => false,
                'message' => 'Employee not found'
            ], RestController::HTTP_NOT_FOUND); // 404 Not Found
        }
    }
    //  Update Employee 

    public function updateEmp_put($id)
    {
        $emp = new Employee_model;
        $data = [
            'first_name' => $this->put('first_name'),
            'last_name' => $this->put('last_name'),
            'phone' => $this->put('phone'),
            'email' => $this->put('email'),
        ];
        $update_result = $emp->update_employee($id, $data);
        // $this ->response($data,$resul,200);
        if ($update_result > 0) {
            $this->response([
                'status' => true,
                'message' => 'New Employee updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to  update employee'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }


    public function deleteEmp_delete($id)
    {
        $emp = new Employee_model;
        $result = $emp->delete_emp($id);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'New Employee deleted'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to  Delete employee'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
