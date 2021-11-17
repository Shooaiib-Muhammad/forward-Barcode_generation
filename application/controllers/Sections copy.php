<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Section_model', 'model');
        $this->load->model('Department_model', 'd');
    }

    public function index()
    {
        $id = $this->input->get("department");
        if($id){
            $sections = $this->model->findByDept($id);
        }else{
            $sections = $this->model->findByDept();
        }
       
        $data['dept'] = $this->d->findall();
        $data['sections'] = $sections;
        $data['department'] = $id;
        $data['title'] = "Sections";
        $this->load->view("sections", $data);
    }

    public function newsection()
    {
        if($this->input->method() == 'post'){
			$rules = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'department',
					'label' => 'Department',
					'rules' => 'required'
				),
			);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == FALSE){
				$data['title'] = "New Section";
				$data['q'] = $this->input->get('q');
				$this->load->view('new_section', $data);
			}else{
				$this->model->insert($this->input->post());
                 $this->session->set_flashdata('success', 'New Section  Saved Successfully');
			}

			

		}
		$data['title'] = "New Section";
		$data['q'] = $this->input->get('q');
		$data['dept'] = $this->d->findall();
		$this->load->view('new_section', $data);
    }

    public function delete($id)
	{
        $this->model->delete($id);
        $q = $this->input->get('q');
		redirect("/index.php/sections?q=$q");
    }
    
    public function json_sections($dept)
    {
        $data = $this->model->findByDept($dept);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
}