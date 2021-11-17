<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Department_model', 'model');
    }

    public function index()
    {
        $data['data'] = $this->model->findall();
        $this->load->view("departments", $data);
    }

    public function newdepartment()
    {
        $title = "New Department";

        if($this->input->method() == 'post'){
			$rules = array(
				array(
					'field' => 'name',
					'label' => 'Department Name',
					'rules' => 'required'
				)
				
			);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
                $this->model->insert($this->input->post());
                $this->session->set_flashdata('success', 'Department Saved Successfully');
                 
			}
            $data['data'] = $this->model->findall();
                 $this->load->view("departments", $data);
        }else{
        
            $data['title'] = $title;
            $this->load->view('new_department', $data);
        }

    }

    public function delete($id)
    {
        $this->model->delete($id);
        redirect("index.php/departments");
    }
    public function update(){
           $Status = $this->input->post('onoffswitch');
           if($Status=='on'){
$Status=1;
           }else{
               $Status=0;
            }
                $dept = $this->input->post('dept');
                 $deptID = $this->input->post('deptID');
                 $this->model->update($Status,$dept,$deptID);
    }
}