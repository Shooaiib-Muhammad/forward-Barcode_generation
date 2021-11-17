<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Machine_model extends CI_Model
{
    public $MachineName;
    public $Status;

    public function loginn($username, $password)
    {
      
      $query = $this->db->query("SELECT  *
      FROM           tbl_DMMS_Team
      WHERE        (Username = '$username') AND (Password = '$password') ");

        if ($query->num_rows() > 0) {
            $result = $query->row();
            $session_data = array(
                'user_id' => $result->ID,
                'Username' => $result->Username,
                'DeptID' => $result->DeptID,
                'userStus' => 1,
                'Status' => $result->Status,
                'isAdmin' => $result->isAdmin,
                 'Email' => $result->Email,
             
                
            );
    
            $Status = $result->Status;
         
           //echo $Status;
           // Die;
      
            if($Status==0){
                $this->session->set_flashdata('info', 'Your Account Has Been Disable');
                redirect('index.php/main');
            }else{
                if($password=='123'){
                    $this->session->set_flashdata('info', 'Please Change Your Password First');
                }else{
                $this->session->set_flashdata('info', 'Welcome in AMS');
                }

            $this->session->set_userdata($session_data);
                

            }
           
        } else {
            //echo "Hello";
            //Die;

            $this->session->set_flashdata('info', 'Your User Name OR Password is In Correct ');
            redirect('');
        }
    

    }

    public function findall()
    {

        return $this->db->get('tbl_DMMS_Machine')->result();
    }


    public function findbyid()
    {

        return $this->db->get('tbl_DMMS_Machine')->row();
    }

  public function findbyMid($id)
    {
        $query = $this->db->query("SELECT        dbo.tbl_DMMS_Dept.DeptName, dbo.tbl_DMMS_Sections.SecName, dbo.tbl_DMMS_Dept_Machine.DMID, dbo.tbl_DMMS_Dept_Machine.Name
FROM            dbo.tbl_DMMS_Dept INNER JOIN
                         dbo.tbl_DMMS_Dept_Machine ON dbo.tbl_DMMS_Dept.DeptID = dbo.tbl_DMMS_Dept_Machine.DeptID INNER JOIN
                         dbo.tbl_DMMS_Sections ON dbo.tbl_DMMS_Dept_Machine.SectionID = dbo.tbl_DMMS_Sections.SecID
WHERE        (dbo.tbl_DMMS_Dept_Machine.DMID = '$id')"
    );
    
    return $query->result_array();
    }
 public function getAllmachines()
    {

         $query = $this->db->query("SELECT      *
FROM            tbl_DMMS_Machine 
WHERE        (dbo.tbl_DMMS_Machine.Status = 1)
        "
        );
        return $query->result_array();
    }

    public function insert($data)
    {
    $this->MachineName = $data['name'];
    $this->Status = $data['status'];

        $this->db->insert("tbl_DMMS_Machine", $this);
    }

    public function delete($id)
    {

        $this->db->where("MID", $id)->delete("tbl_DMMS_Machine");
    }

    // public function update($data, $id)
    // {
    // $this->MachineName = $data['name'];
    // $this->Status = $data['status'];

    //     $this->db->where('MID', $id)->update("tbl_DMMS_Machine", $this);
    // }

public function Checkmaintance($DMID){
 $Month=date('m');
         $Year=date('Y');
         $Day=date('d');
         $Date= date("d/m/Y");



         $query = $this->db->query("SELECT        DMID, CONVERT(varchar, Date, 103) AS Expr1
FROM            dbo.view_DMMS_maintance_Done
WHERE        (DMID = $DMID) AND (CONVERT(varchar, Date, 103) = '$Date')"
        );
        return $query->result_array();
}
    public function install_machines($data, $id)
    {
        $dept = $data['department'];
        $sec = $data['section'];
        $mno = $this->get_next_machine_no($id, $dept, $sec);
        $array = array();
        for($i = 1; $i <= $data['quantity']; $i++){
            array_push($array, array(
                "MNO" => $mno,
                "DeptID" => $dept,
                "SectionID" => $sec,
                "MID"=> $id,
                "Status" => true
            ));

            $mno = $mno + 1;
        }

        if(count($array) > 0){
            $this->db->insert_batch("tbl_DMMS_Dept_Machine",$array);
        }
    }

 public function countpackingInstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }

    public function countambInstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }

    public function countms1InstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }


      public function countms2InstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }

      public function counttmInstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }

      public function countlfbInstalledMachines($id)
    {
        return $this->db->where("DeptId", $id)->where("Status", 1)->get("View_DMMS_DeptWise_Sections")->num_rows();
    }

    public function department_machines($dept = null, $sec = null)
    {
       $this->db->select("TOP (100) PERCENT dbo.tbl_DMMS_Dept_Machine.MID, dbo.tbl_DMMS_Dept_Machine.DMID, dbo.tbl_DMMS_Dept_Machine.DeptID, dbo.tbl_DMMS_Dept_Machine.SectionID, dbo.tbl_DMMS_Dept_Machine.Status, 
                         dbo.tbl_DMMS_Dept_Machine.MNO, dbo.tbl_DMMS_Machine.MachineName, dbo.tbl_DMMS_Dept.DeptName, dbo.tbl_DMMS_Sections.SecName")->from("tbl_DMMS_Dept_Machine");
       if($dept){
           $this->db->where("tbl_DMMS_Dept_Machine.DeptID", $dept);
       }

       if($sec){
           $this->db->where("tbl_DMMS_Dept_Machine.SectionID", $sec);
       }

       $this->db->join("tbl_DMMS_Machine", "tbl_DMMS_Machine.MID = tbl_DMMS_Dept_Machine.MID");
       $this->db->join("tbl_DMMS_Dept", "tbl_DMMS_Dept.DeptID = tbl_DMMS_Dept_Machine.DeptID");
       $this->db->join("tbl_DMMS_Sections", "tbl_DMMS_Sections.SecID = tbl_DMMS_Dept_Machine.SectionID");
      // $this->db->where("tbl_DMMS_Dept_Machine.Status", 1);
       $this->db->where("tbl_DMMS_Dept_Machine.MNO", NUll);
       return $this->db->get()->result();
    
    }

   

    public function get_next_machine_no($mid, $dept, $sec)
    {
       $row = $this->db->select("MNO")
        ->where("DeptId", $dept)
        ->where("SectionID", $sec)
        ->where("MID", $mid)
        ->get("tbl_DMMS_Dept_Machine")->row();

        if($row){
            return $row->MNO + 1;
        }else{
            return 1;
        }
    }


    public function get_installed_machine($dept, $sec,$MID)
    {
        $this->db->select("*")->from("View_DMMS_Install_Machine");
        $this->db->where("DeptID", $dept);
        $this->db->where("SectionID", $sec);
         $this->db->where("MID", $MID);
        return $this->db->get()->result();
    }
  public function getmachineBydept($id)
    {
         $this->db->select("*")->from("View_DMMS_Install_Machine");
        $this->db->where("View_DMMS_Install_Machine.SectionID", $id);
      
       $this->db->where("View_DMMS_Install_Machine.MachineStatus", 1);
       return $this->db->get()->result();
    }
public function update($Status,$MID,$MachineName){
        $query = $this->db->query("UPDATE tbl_DMMS_Machine
        Set MachineName='$MachineName', Status=$Status
        WHERE
        MID=$MID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('index.php/machines');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/machines');
       } 
    }
   
    public function updatemac($Status,$DMID,$MachineName,$SecID){
        $query = $this->db->query("UPDATE tbl_DMMS_Dept_Machine 
        Set Name='$MachineName', Status=$Status
        WHERE
        DMID=$DMID");
    
     
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect("index.php/machines/machinebysections/$SecID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/machines/machinebysections/$SecID");
       } 
    }
    public function insertion($department,$MID,$section,$Status){
           $query = $this->db->query("INSERT  INTO dbo.tbl_DMMS_Dept_Machine 
        (MID,DeptID,SectionID,Status)
        VALUES
        ($MID,$department,$section,$Status)");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been inserted');
        redirect('index.php/machines/department');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/machines/department');
       } 
    }
    public function machineLocations($id){
    
         $query = $this->db->query("SELECT        TOP (100) PERCENT dbo.tbl_DMMS_Dept_Machine.MID, dbo.tbl_DMMS_Dept_Machine.DMID, dbo.tbl_DMMS_Dept_Machine.DeptID, dbo.tbl_DMMS_Dept_Machine.SectionID, dbo.tbl_DMMS_Dept_Machine.Status, 
                         dbo.tbl_DMMS_Dept_Machine.MNO, dbo.tbl_DMMS_Machine.MachineName, dbo.tbl_DMMS_Dept.DeptName, dbo.tbl_DMMS_Sections.SecName, dbo.tbl_DMMS_Dept_Machine.Name

FROM            dbo.tbl_DMMS_Dept_Machine INNER JOIN
                         dbo.tbl_DMMS_Machine ON dbo.tbl_DMMS_Dept_Machine.MID = dbo.tbl_DMMS_Machine.MID INNER JOIN
                         dbo.tbl_DMMS_Dept ON dbo.tbl_DMMS_Dept_Machine.DeptID = dbo.tbl_DMMS_Dept.DeptID INNER JOIN
                         dbo.tbl_DMMS_Sections ON dbo.tbl_DMMS_Dept_Machine.SectionID = dbo.tbl_DMMS_Sections.SecID
WHERE        (dbo.tbl_DMMS_Dept_Machine.DMID = $id)");
        return $query->result_array();

    }
    public function updatelocation($Status,$MID,$DMID,$department,$section){
        $query = $this->db->query("UPDATE tbl_DMMS_Dept_Machine
        Set DeptID='$department',SectionID= $section,Status=$Status,MID=$MID
        WHERE
        DMID=$DMID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('index.php/machines/department');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/machines/department');
       } 
    }
    public function insertionmac($DeptiD,$MID,$SecID,$machienname){
        

           $query = $this->db->query("INSERT  INTO dbo.tbl_DMMS_Dept_Machine 
        (MID,DeptID,SectionID,Status,Name)
        VALUES 
        ($MID,$DeptiD,$SecID,1,'$machienname')");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been inserted');
        redirect("index.php/machines/machinebysections/$SecID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/machines/machinebysections/$SecID");
       } 
    }
    public function  getmachienname($MID){
         $this->db->select("*")->from("tbl_DMMS_Machine");
        $this->db->where("MID", $MID);
        
        return $this->db->get()->result();
    }
    public function machienperemters($SectionID){
         $user_id =  $this->session->userdata('user_id');
$user_id=$user_id;
        $this->db->select("*")->from("View_DMMS_machine_peremeters");
        $this->db->where("SectionID", $SectionID);
        $this->db->where("UserID", $user_id);
        
        return $this->db->get()->result();
    }
    
    function addDataSchedule($machinId,$workDes){
    date_default_timezone_set("Asia/Karachi");
    $ST = date("Y-m-d h:i:s");
    $status=0;
    $query = $this->db->query(" INSERT INTO  dbo.tbl_DMMS_QRCode 
    ( machine_id
    , des_work_required 
    , WorkStatus
    ,StartTime
,Counter
    )
VALUES
    ('$machinId',
     '$workDes',
     '$status',  
     '$ST','1')"
    );

}

function addDataTransaction($transactionId,$solDes,$sol,$prbm){
    date_default_timezone_set("Asia/Karachi");
    $ET = date("Y-m-d h:i:s");
    $status=1;
    $date = date("Y-m-d");
   $user_id =  $this->session->userdata('user_id');
    $query = $this->db->query("UPDATE  tbl_DMMS_QRCode
    Set WorkStatus='$status',
    EndTime='$ET',
    Solution='$sol',
    SOultionDescption='$solDes',
    tbl_DMMS_QRCode.Date='$date',Counter='2'
    ,tbl_DMMS_QRCode.user_id=$user_id
    ,tbl_DMMS_QRCode.ProblemID='$prbm'
    WHERE
    ID='$transactionId'     
     "
    );


}

function Approval($transactionId,$Status){
    //date_default_timezone_set("Asia/Karachi");
   if($Status=='1'){
       $counter=3;
   }else{
       $counter=1;
   }
    $query = $this->db->query("UPDATE  tbl_DMMS_QRCode 
    Set Counter='$counter',Approved='$Status'
    WHERE ID='$transactionId'");


}
public function getcounter($TID){
    
$query = $this->db->query("SELECT        ID, Counter
FROM            dbo.tbl_DMMS_QRCode
WHERE        (ID = '$TID')" );
        return $query->result_array();
}
public function getdata($DMID){
    
 $query = $this->db->query("SELECT        ISNULL(WorkStatus, 0) AS WorkStatus, MAX(ID) AS ID, MAX(Counter) AS Counter
FROM            dbo.tbl_DMMS_QRCode
WHERE        (machine_id = $DMID)
GROUP BY ISNULL(WorkStatus, 0)" );
        return $query->result_array();
}
public function checkissue($id)
    {
        $query = $this->db->query("  SELECT  *   
        From view_DMMS_Check_issue Where (machine_id=$id)  and (EndTime IS NULL) 
        " );
        return $query->result_array();
    }
    public function checkSolution($id)
    {
        $query = $this->db->query("SELECT        Counter,    machine_id, ISNULL(WorkStatus, 0) AS WorkStatus, MAX(ID) AS ID, EndTime
        FROM            dbo.tbl_DMMS_QRCode
        GROUP BY machine_id, EndTime, ISNULL(WorkStatus, 0) ,Counter
        HAVING        (machine_id = $id) AND (EndTime IS NULL) and  (Counter=1)
        " );
        return $query->result_array();
    }
    public function Verifyissue($id)
    {
        $query = $this->db->query("SELECT     Counter,   machine_id, ISNULL(WorkStatus, 0) AS WorkStatus, MAX(ID) AS ID, EndTime
        FROM            dbo.tbl_DMMS_QRCode
        GROUP BY machine_id, EndTime, ISNULL(WorkStatus, 0) ,Counter
        HAVING        (machine_id = $id) AND (EndTime IS NULL) and  (Counter=2)
        " );
        return $query->result_array();
    }
function getissueDetails($id){

    $query = $this->db->query(" SELECT   *
    FROM            dbo.View_DMMS_issue 
    where        (ID = '$id')"
    );
    
    return $query->result_array();
   
}


function getissued(){

    $query = $this->db->query(" SELECT   *
    FROM            dbo.View_DMMS_issued"
    );
    
    return $query->result_array();
   
}

    public function issuedCounter()
    {
        return $this->db->get("View_DMMS_issued")->num_rows();
    }
 public function historyCounter()
    {
        return $this->db->get("view_Dmms_History")->num_rows();
    }
   
function gethistory(){

    $query = $this->db->query(" SELECT   *
    FROM            dbo.view_Dmms_History"
    );
    
    return $query->result_array();
   
}
public function Addproblem($Problem,$machineID){
  
    $query = $this->db->query(" INSERT INTO  dbo.tbl_DMMS_Problem 
    ( ProblemName
    , MID  )
VALUES
    ('$Problem',
     '$machineID')"
    );
}
function getproblems(){

    $query = $this->db->query("SELECT        ProblemName, MID, TID
FROM            dbo.tbl_DMMS_Problem"
    );
    return $query->result_array();
   
}
function EmailAlert($DMID){

    $query = $this->db->query("SELECT        dbo.view_DMMS_Assign_Team.*, DMID
FROM            dbo.view_DMMS_Assign_Team
WHERE        (DMID = $DMID)"
    );
    
    return $query->result_array();
   
}

}
