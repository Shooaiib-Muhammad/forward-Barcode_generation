<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Parameter_model', 'model');
        $this->load->model('Department_model', 'd');
        $this->load->model('Machine_model', 'm');
    }


    public function index(){
        $id = $this->input->get("machine");
        $data['machines'] = $this->m->findall();
        $data['params'] = $this->model->findByMachine();
        $data['id'] = $id;
   $data['durations'] = $this->model->getDuration();
   $data['title'] = "Machine Parameter";
        $this->load->view("params", $data);
    }

    public function delete($id)
    {
        $mid = $this->input->get("machine");

        $this->model->delete($id);

        redirect("index.php/parameters?machine=$mid");
    }



    public function json_by_machine($SECID, $dur){
        $data = $this->model->findByMachineAndDur($SECID, $dur);
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode($data));
    }



    public function newparam()
    {

        $mid = $this->input->get("machine");
        $data['machines'] = $this->m->findall();
        $data['durations'] = $this->model->getDuration();
        $data['dept'] = $this->d->findall();
        $data['title'] = "New Machine Parameter";
        $data['mid'] = $mid;

        if($this->input->method() == 'post'){
            $rules = array(
                array(
                    'field' => 'machine',
                    'label' => 'Machine',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'duration',
                    'label' => 'Duration',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required'
                )
                
            );
    
            $this->form_validation->set_rules($rules);

            if($this->form_validation->run() == TRUE){
                $this->model->insert($this->input->post());
                
            }
           
              
        }
$this->load->view('new_param', $data);
        


        
    }
    public function update(){
        $Status = $this->input->post('onoffswitch');
           if($Status=='on'){
$Status=1;
           }else{
               $Status=0;
            }
            $Machine= $this->input->post('Machine');
                $ParamName = $this->input->post('ParamName');
                 $ParamID = $this->input->post('ParamID');
                 $duration = $this->input->post('duration');
                 $this->model->update($ParamID,$ParamName,$duration,$Status,$Machine);
    }
    public function AddNew(){
       
        $MID= $this->input->post('MID');
                $name = $this->input->post('name');
                 $duration = $this->input->post('duration');
                 $DMID= $this->input->post('DMID');
                      $department= $this->input->post('department');
                           $section= $this->input->post('section');
                  $this->model->Addnewpere($MID,$name,$duration,$DMID,$department,$section);
    }
     public function updatepere(){
        $Status = $this->input->post('onoffswitch');
           if($Status=='on'){
$Status=1;
           }else{
               $Status=0;
            }
            $Machine= $this->input->post('Machine');
                $ParamName = $this->input->post('ParamName');
                 $ParamID = $this->input->post('ParamID');
                 $DMID = $this->input->post('DMID');
                
                 $this->model->updatepere($ParamID,$ParamName,$Status,$Machine,$DMID);
    }
}