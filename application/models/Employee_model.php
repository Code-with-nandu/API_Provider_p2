<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    // Method to insert data into the employee table
    public function insert_employee() 
    {
        $query = $this->db->get('employee');
        return  $query->result();
    }
    public function inn_employee($data)
    {
        return $this ->db->insert('employee',$data); 
    }
    public function get_all_employees_descending() {
        $this->db->order_by('id', 'DESC'); // Change 'id' to the appropriate field if needed
        $query = $this->db->get('employees');
        return $query->result_array(); // Return as an array
    }
    public function findEmp($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('employee');
        return $query->row();
    }

    public function update_employee($id,$data)
    {
        $this->db->where('id',$id);
        return  $this->db->update('employee',$data);
    }
   public function delete_emp($id)
    {
        $this->db->where('id',$id);
        return  $this->db->delete('employee',['id'=>$id]);
    }
    public function get_employees_paginated($limit, $offset)
    {
        $query = $this->db->get('employees', $limit, $offset); // Assuming 'employees' is your table
        return $query->result();
    }

    // Get the total count of employees
    public function get_total_employees()
    {
        return $this->db->count_all('employees'); // Assuming 'employees' is your table
    }






}
