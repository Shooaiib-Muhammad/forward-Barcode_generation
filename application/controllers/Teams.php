<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Team_model', 'model');
		$this->load->model('Department_model', 'd');
		$this->load->model('Skill_model', 's');

	}
	public function updateStatus($id,$Status){
 

		$this->model->update($id,$Status);
	}
	public function index()
	{

		 $deptId =  $this->session->userdata('DeptID');
$id=$deptId;
 $AdminStatus=  $this->session->userdata('isAdmin');
	if($AdminStatus==1){
$data['data'] = $this->model->findallData();
		}else{
$data['data'] = $this->model->findall($id);
		}
		$data['skills'] = $this->s->findall();
		$title = "Maintenance Team";
		$data['title'] = $title;
		$data['dept'] = $this->d->findall();
		$this->load->view('team', $data);
	}
public function update(){
	
	$id=$this->input->post("id");
		$Skill=$this->input->post("Skill");
			$Email=$this->input->post("Email");
				$Phone=$this->input->post("Phone");
	$Status = $this->input->post('onoffswitch');
           if($Status=='on'){
$Status=1;
           }else{
               $Status=0;
            }
		$this->model->updateTeam($id,$Status,$Skill,$Phone,$Email);

}
	public function newteam()
	{
			$deptId =  $this->session->userdata('DeptID');
$id=$deptId;
 $AdminStatus=  $this->session->userdata('isAdmin');
		//$data['dept'] = $this->d->findall();
		if($AdminStatus==1){
$data['dept'] = $this->d->findall($id);
		}else{
$data['dept'] = $this->d->getDept($id);
		}
			
		$data['skills'] = $this->s->findall();
		$data['title'] = "New Team Member";
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
				array(
					'field' => 'skill',
					'label' => 'Skill',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){
				$this->model->insert($this->input->post());
				 $this->session->set_flashdata('success', 'New User Saved Successfully');
			}
	$data['data'] = $this->model->findall($id);
		$data['skills'] = $this->s->findall();
			$this->load->view('team', $data);

		}else{
					
		if($AdminStatus==1){
$data['data'] = $this->model->findallData();
		}else{
$data['data'] = $this->model->findall($id);
		}
			
				$data['skills'] = $this->s->findall();
		$this->load->view('new_team', $data);
		}

	}

	public function delete($id)
	{
		$this->model->delete($id);
		$q = $this->input->get('q');
		redirect("/index.php/teams?q=$q");
	}

	public function team_by_dept_json($dept)
	{
		$data = $this->model->findByDept($dept);
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
	}
		public function AssignTeam()
	{
	 $data['data'] = $this->model->findallData();
  $data['dept'] = $this->d->getallDept();
		$data['team']=$this->model->findTeam();
		$this->load->view('AssignTeam', $data);
	}

public function AssignTeammember($Dept,$section ,$teammamber)
	{
		$data = $this->model->Assihntemmambers($Dept,$section ,$teammamber);
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
	}

		public function getTeam($id)
	{
	
		$data['Team'] = $this->model->getTeam($id);
		$this->load->view('team', $data);
	}
Public function getteamDetsils($id){
	 if($id==1){
$data['title'] = "Airless Mini Team";
 }elseif($id==3){
     $data['title'] = "Thermo Bounded Team";
 }elseif($id==6){
     $data['title'] = "Machine Stitch Hall 1 Team";
 }elseif($id==7){
     $data['title'] = "Machine Stitch Hall 2 Team";
 }elseif($id==24){
     $data['title'] = "Laminated FootBall Team";
 }
	$data['getTeam'] = $this->model->getteamDetsils($id);
		$this->load->view('teamdetails', $data);
}
}
