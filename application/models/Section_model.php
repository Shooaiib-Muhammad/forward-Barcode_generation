<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section_model extends CI_Model
{
    
    public $SecName;
    public $DeptID;
    public $status;

    public function findByDept($id = null)
    {
        $this->db->select("dbo.tbl_DMMS_Sections.SecID, dbo.tbl_DMMS_Sections.SecName, dbo.tbl_DMMS_Sections.Status, dbo.tbl_DMMS_Sections.DeptID, dbo.tbl_DMMS_Dept.DeptName")
                    ->from('tbl_DMMS_Sections')
                    ->join('tbl_DMMS_Dept', 'tbl_DMMS_Sections.DeptID = tbl_DMMS_Dept.DeptID');
                    $this->db->where("tbl_DMMS_Dept.Status", 1);
        if($id){
            $this->db->where("tbl_DMMS_Sections.DeptID", $id);
        }
    
                    
        $query = $this->db->get();

        return $query->result();
    }

    public function insert($data){
        $this->DeptID = $data['department'];
        $this->SecName = $data['name'];
        $this->status = $data['status'];
 $DeptID= $this->DeptID;
        $Query=$this->db->insert("tbl_DMMS_Sections",$this);
      if($Query){
 $this->session->set_flashdata('info', 'Record Has Been Updates');
         redirect("index.php/Sections/Dept_Sections/$DeptID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
         redirect("index.php/Sections/Dept_Sections/$DeptID");
       }
    }

    public function delete($id){
        $this->db->where('SecID', $id);
        $this->db->delete('tbl_DMMS_Sections');
    }
    public function getSections($id){
       

            $query = $this->db->query("SELECT        dbo.tbl_DMMS_Dept.DeptName, dbo.tbl_DMMS_Sections.SecName, dbo.tbl_DMMS_Sections.DeptID, dbo.tbl_DMMS_Sections.Status, dbo.tbl_DMMS_Sections.SecID
FROM            dbo.tbl_DMMS_Sections INNER JOIN
                         dbo.tbl_DMMS_Dept ON dbo.tbl_DMMS_Sections.DeptID = dbo.tbl_DMMS_Dept.DeptID
WHERE        (dbo.tbl_DMMS_Sections.DeptID = $id) and (dbo.tbl_DMMS_Sections.Status=1)
        "
        );
        return $query->result_array();
       

    }
 public function getSectionCOunter($id){

$query = $this->db->query("SELECT        COUNT(MID) AS Count
FROM            dbo.tbl_DMMS_Dept_Machine
WHERE        (SectionID = $id) and (Status=1)"
);
        return $query->result_array();
 }
 public function update($Status,$SecID,$deptID,$SecName){
      $query = $this->db->query("UPDATE tbl_DMMS_Sections
        Set SecName='$SecName', Status=$Status,DeptID=$deptID
        WHERE
        SecID=$SecID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('index.php/Sections');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/Sections');
       }
 }
 public function updateSec($Status,$SecID,$SecName,$DeptID){
      $query = $this->db->query("UPDATE tbl_DMMS_Sections
        Set SecName='$SecName', Status=$Status
        WHERE
        SecID=$SecID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect("index.php/Sections/Dept_Sections/$DeptID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/Sections/Dept_Sections/$DeptID");
       }
 }
 public function getOnMachine($id){
   $Month = date('m');
      $Year = date('Y');
      $Day = date('d');
      
      
$query = $this->db->query("SELECT        COUNT(TID) AS ID
FROM            dbo.view_DMMS_machineStatus
WHERE        (DeptID =$id) AND (Datee = '$Day/$Month/$Year')");
        return $query->result_array();
 }
 public function getOffMachine($id){
      $Month = date('m');
      $Year = date('Y');
      $Day = date('d');
$query = $this->db->query("SELECT        view_DMMS_machineStatus.*
FROM            dbo.view_DMMS_machineStatus
WHERE       (Datee = '$Day/$Month/$Year') And (DeptID = $id)");
        return $query->result_array();
 }
 public function machinedetils($id){
      $Month = date('m');
      $Year = date('Y');
      $Day = date('d');
      
$query = $this->db->query("SELECT        DeptName, SecName, Name, Datee, Status, DeptID, Teammember,Solution
FROM            dbo.view_DMMS_machineStatus
GROUP BY DeptName, SecName, Name, Datee, Status, DeptID, Teammember,Solution
HAVING        (Datee = '$Day/$Month/$Year') AND (DeptID = $id)");
        return $query->result_array();

 }

 public function Offmachinedetils($id){
   $Month = date('m');
      $Year = date('Y');
      $Day = date('d');
$query = $this->db->query("SELECT        view_DMMS_machineStatus.*
FROM            dbo.view_DMMS_machineStatus
WHERE        (Datee = '$Day/$Month/$Year') AND (DeptID = $id)");
        return $query->result_array();

 }
}