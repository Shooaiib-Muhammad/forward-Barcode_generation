<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parameter_model extends CI_Model
{
    public $ParamName;
    public $MID;
    public $DID;
    public $Status;

    public function getDuration()
    {
       return  $this->db->get("tbl_DMMS_Duration")->result();
    }

    public function insert($data)
    {
        $this->ParamName = $data['name'];
        $this->MID = $data['machine'];
        $this->DID = $data['duration'];
        $this->Status = $data['status'];

        $this->db->insert("tbl_DMMS_Machine_Params", $this);
    }

    public function findByMachine()
    {
        return  $this->db
                //->where("MID", $id)
                //->join("tbl_DMMS_Duration d", "mp.DID = d.DID")
                ->get("View_DMMS_Machine_peremters mp")
                ->result();
    }

    public function delete($id)
    {
        $this->db->where("ParamID", $id)->delete('tbl_DMMS_Machine_Params');
    }

    public function findByMachineAndDur($SECID, $dur)
    {
       
       $user_id =  $this->session->userdata('user_id');
$user_id=$user_id;
        return  $this->db
                ->where("mp.SectionID", $SECID)
                 ->where("mp.UserID", $user_id)
                 ->where("mp.status", 1)
                ->where("mp.DID", $dur)
                ->join("tbl_DMMS_Duration d", "mp.DID = d.DID")
                ->get("tbl_DMMS_Machine_Params mp")
                ->result();
    }

    public function existsByDurationAndMachine($dur, $machine){
        return $this->db->where("MID", $machine)->where("DID", $dur)->from("tbl_DMMS_Machine_Params")->get()->num_rows();
    }
    public function update($ParamID,$ParamName,$duration,$Status,$Machine){
        $query = $this->db->query("UPDATE tbl_DMMS_Machine_Params
        Set ParamName='$ParamName',DID=$duration, Status=$Status,MID=$Machine
        WHERE
        ParamID=$ParamID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('index.php/Parameters');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/Parameters');
       } 
    }
    public function Addnewpere($MID,$name,$duration,$DMID,$department,$section){
         $user_id =  $this->session->userdata('user_id');
$user_id=$user_id;
         $query = $this->db->query("INSERT  INTO dbo.tbl_DMMS_Machine_Params 
        (ParamName,MID,DID,Status,DMID,SectionID,DeptID,MStatus,SecStatus,UserID)
        VALUES 
        ('$name',$MID,$duration,1,$DMID,$section,$department,1,1,$user_id)");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been inserted');
        redirect("index.php/machines/sectionwisemachine/$DMID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect("index.php/machines/sectionwisemachine/$DMID");
       } 
    }
       public function updatepere($ParamID,$ParamName,$Status,$Machine,$DMID){
        $query = $this->db->query("UPDATE  tbl_DMMS_Machine_Params
        Set ParamName='$ParamName',Status=$Status,MID=$Machine ,MStatus=$Status
        WHERE
        ParamID=$ParamID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect("index.php/machines/sectionwisemachine/$DMID");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
       redirect("index.php/machines/sectionwisemachine/$DMID");
       } 
    }
    
}