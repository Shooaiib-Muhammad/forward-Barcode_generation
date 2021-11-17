<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChartController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        
        $this->load->model('Schedule_model', 'model');
        $this->load->model('Department_model', 'd');
        $this->load->model('Machine_model', 'm');
        $this->load->model('Parameter_model', 'p');
    }

    public function index()
    {
        $data['title'] = "Schedules";
        $data['dept'] = $this->d->findall();
        $data['data'] = $this->model->findall();
        $this->load->view("chartjs", $data);
    }

    public function json_data(){
      $month = $_POST['month'];
      $year = $_POST['year'];
      $department = $_POST['dept'];
      $section = $_POST['section'];
      $DMID= $_POST['DMID'];
      $DurID= $_POST['DurID'];
      $PID= $_POST['PID'];
      $data['ChartValue'] =   $this->model->get_schedule_chart($month, $year,$department,$section,$DMID, $DurID, $PID);
      $arr=$data['ChartValue'];

      echo json_encode($arr);
    

      //  return "Hello ";
    
        
        
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
        }
        
            $data['title'] = $title;
            $this->load->view('new_department', $data);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        redirect("index.php/departments");
    }
}