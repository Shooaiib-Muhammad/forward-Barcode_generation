<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {
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
        //$data['data'] = $this->model->findall();
        if($this->input->method() == 'post'){

            $rules = array(
                array(
                    'field' => 'department',
                    'label' => 'Department',
                    'rules' => 'required' 
                ),
                array(
                    'field' => 'section',
                    'label' => 'Section',
                    'rules' => 'required' 
                ),
                array(
                    'field' => 'from_date',
                    'label' => 'Start Date',
                    'rules' => 'required'
                ),
                
            );

            $this->form_validation->set_rules($rules);
            

            if($this->form_validation->run() == TRUE){
                $dept = $this->input->post('department');
                $sec = $this->input->post('section');
                $from = $this->input->post('from_date');
                $to = $this->input->post('end_date');
               $data['data'] = $this->model->findByDepartmentSectionBetweenDate($dept, $sec, $from, $to);
            }

        }


        $this->load->view("schedules", $data);
    }


    public function newschedule()
    {
       
       
        $data['dept'] = $this->d->findall();
        $data['durations'] = $this->p->getDuration();
        $data['title'] = "New Schedule";
         $DSMID = $this->input->post('machine');
      
        if($this->input->method() == 'post'){
            $rules = array(
                array(
                    'field' => 'duration',
                    'label' => 'Duration',
                    'rules' => 'required' 
                ),
                array(
                    'field' => 'department',
                    'label' => 'Department',
                    'rules' => 'required' 
                ),
                array(
                    'field' => 'section',
                    'label' => 'Section',
                    'rules' => 'required' 
                ),
                array(
                    'field' => 'date',
                    'label' => 'Date',
                    'rules' => 'required|date'
                ),
               
                      
            );
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run() == TRUE){
               
                  //$Status = $this->input->post('Status');
                
                $duration = $this->input->post('duration');
                $dateSchedule = $this->input->post('date');
                $ParamName = $this->input->post('ParamName');
$MID = $this->input->post('MID');
                $date_exploded=explode('-',$dateSchedule);
              
                
                $arr = $this->input->post();
                

                if($duration==1){
                    $counter=0;
                   counting_again:
                   $track =0;
                    for($i=$date_exploded[2];$i<=cal_days_in_month(CAL_GREGORIAN, $date_exploded[1],$date_exploded[0]);$i++){

                      
                        $date = $date_exploded[0] ."-". $date_exploded[1] . "-" . $i; //'2011-01-01';
                        $timestamp = strtotime($date);
                        $weekday= date("l", $timestamp );
                        $normalized_weekday = strtolower($weekday);
                        
               
                        if ($normalized_weekday == "sunday" && $track !=$i) {
                            $track = $i+1;
                           
                        } 
                        else{
                            $arr['date'] = $date;
                            $this->model->insert_by_section($arr);
                             $normalized_weekday . " ". ($i . "- " . $date_exploded[1] . "-" . $date_exploded[0] );echo "<br/>";
                           $counter++;
                         if($counter==365)
                         {
                             break;
                         }
                        }


                    }
                    if($counter<365)
                   {
                        if($date_exploded[1]<12){
                           
                            $date_exploded[1]+=1;
                            $date_exploded[2]=1;
                          

                        }else{

                            $date_exploded[1]=1;
                            $date_exploded[2]=1;
                            $date_exploded[0]+=1;
                      
                        }
                        
                        goto counting_again;
                    }
              
                    $date_exploded[0]=1 && $date_exploded[1];

                    $date = strtotime($dateSchedule[2] . " - " . $dateSchedule[1] . " - " - $dateSchedule[0]);
                    $date = date('l');
              

                }
                else if($duration==2){
                    for($i=0;$i<12;$i++){

                        if($date_exploded[1]==12){
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];
                            $arr['date'] = $new_date;

                            $this->model->insert_by_section($arr);
                            $date_exploded[1]=1;
                            $date_exploded[0]+=1;

                        }else{
                            
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];

                            $arr['date'] = $new_date;
                            $this->model->insert_by_section($arr);
                            $date_exploded[1]++;
                        }
                    }
                }

                else if($duration==3){
                    for($i=1;$i<=12;$i++){
                        if($i % 3==0){
                           
                        if($date_exploded[1]==12){
                
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];
                            $arr['date'] = $new_date;
                            
                            $this->model->insert_by_section($arr);
                            $date_exploded[1]=1;
                            $date_exploded[0]+=1;

                        }else{
                            if($date_exploded[1]>12){
                                $date_exploded[1] = $date_exploded[1] - 12;
                                $date_exploded[0]+=1;
                                $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];

                                $arr['date'] = (String)$new_date;
                                $this->model->insert_by_section($arr);
                                $date_exploded[1] +=3;
                               
                            }else{
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];

                                $arr['date'] = (String)$new_date;
                                $this->model->insert_by_section($arr);
                                $date_exploded[1] +=3;
                            }
                        }
                    }else{
                   
                        continue;
                    }
                    }
                }
                else if($duration==4){
                    for($i=1;$i<=12;$i++){
                        if($i % 6==0){
                           
                        if($date_exploded[1]==12){
                
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];
                            $arr['date'] = $new_date;
                            
                            $this->model->insert_by_section($arr);
                            $date_exploded[1]=1;
                            $date_exploded[0]+=1;

                        }else{
                            if($date_exploded[1]>12){
                                $date_exploded[1] = $date_exploded[1] - 12;
                                $date_exploded[0]+=1;
                                $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];

                                $arr['date'] = (String)$new_date;
                                $this->model->insert_by_section($arr);
                                $date_exploded[1] +=6;
                               
                            }else{
                            $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];

                                $arr['date'] = (String)$new_date;
                                $this->model->insert_by_section($arr);
                                $date_exploded[1] +=6;
                            }
                        }
                    }else{
                   
                        continue;
                    }
                    }
                }

                else if($duration==5){
                    $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];
                    $arr['date'] = $new_date;
                 
                    $this->model->insert_by_section($arr);

                    $date_exploded[0]+=1;
                    $new_date=$date_exploded[0]. "-". $date_exploded[1] . "-" . $date_exploded[2];
                    $arr['date'] = $new_date;
                 
                    $this->model->insert_by_section($arr);
                   // $date_exploded[1]=1;
               
                
                }

               
                
               $this->session->set_flashdata("success", "Save successfully");
            }
             $data['dept'] = $this->d->findall();
        $data['data'] = $this->model->findall();
        
        redirect("index.php/machines/sectionwisemachine/$DSMID");
             // $this->load->view("new_schedule", $data);
        }else{
            
             redirect("index.php/machines/sectionwisemachine/$DSMID");
        }
       
       
    }

/////////////////////////////////////////////////////// New Working Start (Update,Delete) //////////////////////////////////////
    public function delete($id)
    {
        $this->model->delete($id);
        redirect("index.php/schedules");
    }

    public function deleteSchedule($Id,$DMID){
        //$proId = $_POST['llid'];
        $this->model->deleteSchedule($Id,$DMID);	
    
    }

    public function bulk_save()
    {
        if($this->input->method() == 'post'){
            $postData = $this->input->post();
   
            $this->model->bulk_save($postData);
        }
    }
    
    public function bulk_delete()
    {
        if($this->input->method() == 'post'){
            $data = $this->input->post();
            $this->model->bulk_delete($data);
        }
    }
    
///////////////////////////////////////////////////// End New Working /////////////////////////////////////////////////////////
    public function view($id)
    { 
        
        $data['get_schedule'] = $this->model->getschedulesDMID($id);
        
       //Print_r($data['get_schedule']);
    
       $ParamName=$data['get_schedule'][0]->ParamName;
$SID=$data['get_schedule'][0]->SID;
$Name=$data['get_schedule'][0]->Name;
 $DeptName=$data['get_schedule'][0]->DeptName;
  $SecName=$data['get_schedule'][0]->SecName;
$MID=$data['get_schedule'][0]->MID;
$DeptID=$data['get_schedule'][0]->DeptID;
$DMID=$data['get_schedule'][0]->DMID;
$DurName=$data['get_schedule'][0]->DurName;
$Desc=$data['get_schedule'][0]->Description;
 $data['DMID']=$DMID;
  $data['MID']=$MID;
  $data['DeptID']=$DeptID;
  $data['SID']=$SID;
$data['Name']=$Name;
 $data['DeptName']=$DeptName;
  $data['SecName']=$SecName;
  $data['DurName']=$DurName;
  $SDate=$data['get_schedule'][0]->SDate;
  $data['Desc']=$Desc;
  $data['ParamName']=$ParamName;
  $data['SDate']=$SDate;
  $data['title'] = $DeptName." / ". $SecName ." Schedule";
  
        $this->load->view("new_schedule", $data);
    }


    public function maintenance()
    {
        $data['title'] = 'Preventive Maintenance Record';
        $this->load->view("sample", $data);
    }

    public function inventory()
    {
        $data['title'] = 'Parts Inventory';
        $this->load->view("isample", $data);
    }
public function Working(){
      if($this->input->method() == 'post'){
          
$arr = $this->input->post();

$this->model->AddWork($arr);

            
        }       
}
public function DailyWorking(){
    echo "heloo";
    die;
      if($this->input->method() == 'post'){
$arr = $this->input->post();
$this->model->AddWorkDaily($arr);

            }
        }       


public function getworking($SID){
    $data['Get_Working'] = $this->model->getworking($SID);
    
       $data['Team'] = $this->model->maintanceTeam($SID);
    //print_r($data['Get_Working']);
    
     $SID=$data['Get_Working'][0]->SID;
  $SDate=$data['Get_Working'][0]->SDate;
$Name=$data['Get_Working'][0]->Name;
 $DeptName=$data['Get_Working'][0]->DeptName;
  $SecName=$data['Get_Working'][0]->SecName;
$ParamName=$data['Get_Working'][0]->ParamName;
$DurName=$data['Get_Working'][0]->DurName;
$mainDesc=$data['Get_Working'][0]->mainDesc;
$StartTime=$data['Get_Working'][0]->StartTime;
$EndTime=$data['Get_Working'][0]->EndTime;
$Remarks=$data['Get_Working'][0]->Remarks;
$Date=$data['Get_Working'][0]->Date;
$Description=$data['Get_Working'][0]->Description;
 $SDate=$data['Get_Working'][0]->SDate;
 $DMID=$data['Get_Working'][0]->DMID;
 $Solution=$data['Get_Working'][0]->Solution;
$Status=$data['Get_Working'][0]->Status;
$data['Name']=$Name;
 $data['DeptName']=$DeptName;
  $data['SecName']=$SecName;
$data['ParamName']=$ParamName;
$data['DurName']=$DurName;
$data['mainDesc']=$mainDesc;
$data['StartTime']=$StartTime;
$data['EndTime']=$EndTime;
$data['Remarks']=$Remarks;
$data['Date']=$Date;
$data['Description']=$Description;
$data['SID']=$SID;
$data['SDate']=$SDate;
  $data['DMID']=$DMID;
   $data['Solution']=$Solution;
     $data['Status']=$Status;
 // Die;
  $data['title'] = $DeptName." / ". $SecName ." / ". $Name ." / ". " Maintance";
     //$data['title'] = 'Working Maintenance.' $';
        $this->load->view("getworking", $data);
}

public function data($date1,$date2,$DMID){
  
     $data['schedules']= $this->model->getschedules($date1,$date2,$DMID);
      $data['working']= $this->model->getallworking($date1,$date2,$DMID);
$data['SectionWIsemachine'] = $this->m->machineLocations($DMID);
//print_r($data['SectionWIsemachine']);
 $machinename=$data['SectionWIsemachine'][0]['Name'];
 $DeptName=$data['SectionWIsemachine'][0]['DeptName'];
  $SecName=$data['SectionWIsemachine'][0]['SecName'];
$MID=$data['SectionWIsemachine'][0]['MID'];
$DeptID=$data['SectionWIsemachine'][0]['DeptID'];
$SectionID=$data['SectionWIsemachine'][0]['SectionID'];
$data['peremerters'] = $this->m->machienperemters($DMID);
 $data['DMID']=$DMID;
  $data['MID']=$MID;
  $data['DeptID']=$DeptID;
  $data['SectionID']=$SectionID;
   $data['durations'] = $this->p->getDuration();
        $data['title'] =$DeptName ." / ". $SecName ." / ". $machinename;
        //$data['schedules']= $this->s->getschedule($DMID);
        //print_r($data['schedules']);
        $deptId =  $this->session->userdata('DeptID');
$id=$deptId;
         $data['team'] = $this->model->getTeam($id);
 $this->load->view("Miantance", $data);
}
}