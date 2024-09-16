<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $result_emp = $emp ->insert_employee();
    
    

        // Respond with data and HTTP status code
        $this->response($result_emp, RestController::HTTP_OK);
    }
}
