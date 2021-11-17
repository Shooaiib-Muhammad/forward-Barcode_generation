<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_model extends CI_Model
{
    public $SDate;
    public $DMID;
    public $DurID;
    public $Description;
    public $Status;
    public $WorkStatus;

    public function findall()
    {
        $query = $this->db
                    ->select("*")
                    ->get('view_DMMS_Schedule');

        return $query->result();
    }


    public function findByDepartmentSectionBetweenDate($dep, $sec, $start, $end = null)
    {
        if(!$end){
            $end = date('Y-m-d');
        }
        $query = $this->db->where("DeptID", $dep)
        ->where("SectionID", $sec)
        ->where("SDate >=", $start)
        ->where("SDate <=", $end)
        ->get('view_DMMS_Schedule');
        return $query->result();
    }


    public function findByID($id)
    {
        $query = $this->db
                ->select("*")
                ->where('DeptID', $id)
                ->get('tbl_DMMS_Schedule');

        return $query->row();
    }

    public function delete($id){
        $this->db->where('SID', $id);
        $this->db->delete('tbl_DMMS_Schedule');
    }

    public function insert($data)
    {
        $this->SDate = $data['date'];
        $this->DMID = $data['machine'];
        $this->DurID = $data['duration'];
        $this->Description = $data['description'];
        $this->Status = $data['status'];
        $this->WorkStatus = false;
        

        $this->db->insert("tbl_DMMS_Schedule", $this);

        $sid = $this->db->insert_id();

        $array = array();
        foreach ($data['team'] as $team) {
            array_push($array, array(
                "TeamID" => $team,
                "MID" => $data['MID'],
                "date" => $this->SDate,
                "SID" => $sid,
                "Status" => True
            ));
        }

        $this->db->insert_batch("tbl_DMMS_Schedule_Team", $array);
    }

//////////////////////////////////////////////////// Schedule Save, Delete ////////////////////////////////////////////
    public function deleteSchedule($Id,$DMID){
      
        $query=$this->db->query("DELETE FROM   dbo.tbl_DMMS_Schedule
         WHERE  SID='$Id'");
        //          return true;
          if ($query) {
           
           $this->session->set_flashdata('ProDelDepinfo', 'Schedule has been Deleted. ');
           redirect("index.php/machines/sectionwisemachine/$DMID");
          } else {
            
             $this->session->set_flashdata('danger', 'There is an error while Deleting Schedule.');
           redirect("index.php/machines/sectionwisemachine/$DMID");
            } 
       }

public function getschedulesDMID($DMID)
{
    
    $query = $this->db
        ->select("*")
         ->where('SID', $DMID)
        ->get('View_DMMS_FInal_Schedule');
       
        return $query->result();
}
       public function bulk_save($data)
       {
        date_default_timezone_set("Asia/Karachi");
           $leaves = $data['leaves'];
     
           $ST = date("Y-m-d h:i:s");
           
              $date =date("Y-m-d");

           for($i=0;$i<count($leaves);$i++){
           
               $query = array(
                   'SID' => $leaves[$i]['id'],
                   "mainDesc"=>'',
                   "StartTime" => $ST,
                   "EndTime" => $ST,
                   "Remarks" => $leaves[$i]['remarks'],
                 "Date" => $date,
                 "Solution"=>$leaves[$i]['solution'],
                  "status"=>$leaves[$i]['status']
                 
               );
               $this->db->insert("tbl_DMMS_Maintance", $query);

               $query1 = array(
                'TeamID' => $leaves[$i]['team'],
                "MID" => $leaves[$i]['dmid'],
                "date" => $date,
                "SID" => $leaves[$i]['id'],
                "Status" => true
            );
           $this->db->insert("tbl_DMMS_Schedule_Team", $query1);

           $idGet = $leaves[$i]['id'];;
            $this->db->query("UPDATE tbl_DMMS_Schedule
            Set WorkStatus=1
            WHERE
            SID=$idGet");
     
        }

           return true;
       }
   
   
       public function bulk_delete($data)
       {

           $leaves = $data['leaves'];

           for($i=0;$i<count($leaves);$i++){

           $idGet = $leaves[$i]['id'];;
           $query=$this->db->query("DELETE FROM  dbo.tbl_DMMS_Schedule
           WHERE  SID=$idGet");
     
        }
        return true;
     }

   
           
       

////////////////////////////////////////////////////////////// End Working \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function insert_by_section($data)
    {
        $dept = $data['department'];
        $sec = $data['section'];
         $MID = $data['MID'];
        $DMID = $data['machine'];
     
 $ParamName= $data['ParamName'];

        $date = $data['date'];
        $DurID = $data['duration'];
        $Description = $data['description'];
        $Status = $data['status'];
        $WorkStatus = false;
        

if($Status=='on'){
$Status=1;
                }else{
$Status=0;
                }

       //foreach ($machines as $k => $v) {
           
          $array = array(
              "SDate" => $date,
              "DurID" => $DurID,
              "Description" => $Description,
              "Status" => $Status,
              "WorkStatus" => $WorkStatus,
              "DMID" => $DMID,
              "PID"=>$ParamName
          );

          $this->db->insert("tbl_DMMS_Schedule", $array);
          $id = $this->db->insert_id();

          
       //}
    }





    public function get_schedule_team($id)
    {
        $query = $this->db
        ->select("*")
         ->where('SID', $id)
        ->get('View_DMMS_FInal_Schedule');
       
        return $query->result();
    }


     public function get_schedule_chart($month, $year,$department,$section,$DMID,$DurID,$PID)
    {
/*          echo $DMID;
        die();   */
        
        $query = $this->db->query("SELECT      dbo.view_Final_DMMS_Data.*, Month, Year, SectionID, DeptID ,DMID,DurID,PID
        FROM            dbo.view_Final_DMMS_Data
        WHERE        (Month = '$month') AND (Year ='$year') AND (SectionID ='$section') AND (DeptID ='$department') and (DMID='$DMID')and (DurID='$DurID')and (PID='$PID')
        "
        );
      
        return $query->result_array();
    }


    public function getschedule($DMID)
{
    
    $query = $this->db
        ->select("*")
         ->where('DMID', $DMID)
        ->get('View_DMMS_FInal_Schedule');
       
        return $query->result();
}
 public function getschedules($date1,$date2,$DMID)
{
   
    $query = $this->db->query("SELECT   *
FROM            dbo.View_DMMS_FInal_Schedule
WHERE        (DMID = $DMID) AND (SDate1 BETWEEN '$date1' AND '$date2')");
        return $query->result_array();
}


public function AddWork($data){
     date_default_timezone_set("Asia/Karachi");
        $SID = $data['SID'];
        $description = $data['description'];
        $ST = $data['ST'];
        $ET = $data['ET'];
        $DMID = $data['DMID'];
          $Remarks = $data['Remarks'];
           $date = $data['date'];
           $Solution=$data['Solution'];
          $array = array(
              "SID" => $SID,
              "mainDesc" => "$description",
              "StartTime" => $ST,
              "EndTime" => $ET,
              "Remarks" => $Remarks,
              "Date" => $date,
              "Solution"=>$Solution
          );

          $this->db->insert("tbl_DMMS_Maintance", $array);
          $id = $this->db->insert_id();

        $Month=date('m');
        $Year=date('Y');
        $Day=date('d');
        $CurrentDate=$Year.'-'.$Month.'-'.$Day;
          foreach ($data['team'] as $key) {
   
            $teamdata = array(
                "TeamID" => $key,
                "MID" => $DMID,
                "date" => $date,
                "SID" => $SID,
                "Status" => True
            );


           $query = $this->db->insert("tbl_DMMS_Schedule_Team", $teamdata);
 //$coutter=$coutter+1;
        }
       
  
     if($query){
       $query = $this->db->query("UPDATE tbl_DMMS_Schedule
        Set WorkStatus=1
        WHERE
        SID=$SID");
      
     if($query){
        $this->session->set_flashdata('info', 'Record Has Been inserted');
        redirect("index.php/machines/sectionwisemachine/$DMID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/machines/sectionwisemachine/$DMID");
       } 
}


}
public function AddWorkDaily($data){
   
        $SID = $data['SID'];
        $description = '';
        $Team=$data['team'];
     $Solution=$data['Solution'];
        $ST = date("Y-m-d h:i:s");
        
         
        $DMID = $data['DMID'];
          $Remarks = $data['Remarks'];
           $date =date("Y-m-d");
          
           $array = array(
              "SID" => $SID,
              "mainDesc" => "$description",
              "StartTime" => $ST,
              "EndTime" => $ST,
              "Remarks" => $Remarks,
              "Date" => $date,
              "Solution"=>$Solution
          );
         
          $this->db->insert("tbl_DMMS_Maintance", $array);
          $id = $this->db->insert_id();

    
        //   foreach ($data['team'] as $key) {
   
            $teamdata = array(
                "TeamID" => $Team,
                "MID" => $DMID,
                "date" => $date,
                "SID" => $SID,
                "Status" => True
            );

//  print_r($teamdata);
// die;
           $query = $this->db->insert("tbl_DMMS_Schedule_Team", $teamdata);
 //$coutter=$coutter+1;
        //}
       
  
     if($query){
       $query = $this->db->query("UPDATE tbl_DMMS_Schedule
        Set WorkStatus=1
        WHERE
        SID=$SID");
      
     if($query){
        $this->session->set_flashdata('info', 'Record Has Been inserted');
        redirect("index.php/machines/sectionwisemachine/$DMID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/machines/sectionwisemachine/$DMID");
       } 
}


}
 public function getworking($SID){
     $query = $this->db
        ->select("*")
         ->where('SID', $SID)
        ->get('View_DMMS_Working');
       
        return $query->result();
 }
 public function maintanceTeam($SID){
   

          $query = $this->db->query("SELECT  *
        FROM             dbo.View_DMMS_Maintance_Team 
        Where (SID=$SID)"
        );
        return $query->result_array();
 }
public function getTeam($id){
  
    $query = $this->db->query("SELECT Status,DeptID, Name, ID
FROM            dbo.tbl_DMMS_Team
WHERE        (DeptID = $id) and (Status =1)"
        );
        return $query->result_array();
}

public function getallworking($date1,$date2,$DMID){
   
    $query = $this->db->query("SELECT   *
FROM            dbo.View_DMMS_Working
WHERE        (DMID = $DMID) AND (Date BETWEEN '$date1' AND '$date2')");
        return $query->result_array();
}
}
