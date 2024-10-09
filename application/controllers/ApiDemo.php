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

<<<<<<< HEAD
    // public function users_get()
    // {
    //     $emp = new Employee_model;
    //     $result_emp = $emp ->insert_employee();

    //     // Respond with data and HTTP status code
    //     $this->response($result_emp, RestController::HTTP_OK);
    // }


    public function users_get()
{
    $page = $this->input->get('page') ? (int)$this->input->get('page') : 1; // Get current page from the query string, default to 1
    $limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 10; // Get the limit from the query string, default to 10
    $offset = ($page - 1) * $limit; // Calculate the offset

    $emp = new Employee_model;

    // Fetch employees with pagination
    $result_emp = $emp->get_employees_paginated($limit, $offset); // Create a method to handle pagination

    // Total count of records
    $total_count = $emp->get_total_employees(); // Add a method to return total employee count

    // Calculate total pages
    $total_pages = ceil($total_count / $limit);

    $response_data = [
        'data' => $result_emp,
        'current_page' => $page,
        'total_pages' => $total_pages,
        'total_records' => $total_count,
    ];

    // Respond with paginated data and HTTP status code
    $this->response($response_data, RestController::HTTP_OK);
}

    public function storeEmp_post(){
        $emp = new Employee_model;
        $data=[
            'first_name'=> $this->input->post('first_name'),
            'last_name'=> $this->input->post('last_name'),
            'phone'=> $this->input->post('phone'),
            'email'=> $this->input->post('email'),
        ];
        $result =$emp ->inn_employee($data);
        // $this ->response($data,$resul,200);
        if($result>0)
        {
            $this->response([
                'status'=> true,
                'message'=> 'New Employee created'
            ] ,RestController::HTTP_OK );
        }
        else
        {
            $this->response([
                'status'=> false,
                'message'=> 'Failed to  created employee'
            ] ,RestController::HTTP_BAD_REQUEST );

        }
    }
     // Find employee by ID
     public function findEmp_get($id)
     {
         $result_find = $this->Employee_model->findEmp($id);
 
         if($result_find) {
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
         $data=[
             'first_name'=> $this->put('first_name'),
             'last_name'=> $this->put('last_name'),
             'phone'=> $this->put('phone'),
             'email'=> $this->put('email'),
         ];
         $update_result =$emp ->update_employee($id,$data);
         // $this ->response($data,$resul,200);
         if($update_result>0)
         {
             $this->response([
                 'status'=> true,
                 'message'=> 'New Employee updated'
             ] ,RestController::HTTP_OK );
         }
         else
         {
             $this->response([
                 'status'=> false,
                 'message'=> 'Failed to  update employee'
             ] ,RestController::HTTP_BAD_REQUEST );
 
         }
 
     }

     
     public function deleteEmp_delete($id)
=======
    public function users_get()
    {
        $emp = new Employee_model;
        $result_emp = $emp->insert_employee();



        // Respond with data and HTTP status code
        $this->response($result_emp, RestController::HTTP_OK);
    }
    public function storeEmp_post()
>>>>>>> krishnendu/pagination
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
