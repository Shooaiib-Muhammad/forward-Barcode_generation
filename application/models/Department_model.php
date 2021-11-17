<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department_model extends CI_Model
{
    public $DeptName;
    public $status;

    public function findall()
    {
        $query = $this->db
                    ->select("*")
                    //->where("Status", 1)
                    ->get('tbl_DMMS_Dept');

        return $query->result();
    }
        public function getDept($id)
    {
        $query = $this->db
                    ->select("*")
                    ->where("DeptID", $id)
                    ->get('tbl_DMMS_Dept');

        return $query->result();
    }

    public function insert($data){
        $this->DeptName = $data['name'];
        $this->status = $data['status'];
    
       $insertion= $this->db->insert("tbl_DMMS_Dept",$this);
       
    }

    public function findByID($id)
    {
        $query = $this->db
                ->select("*")
                ->where('DeptID', $id)
                ->get('tbl_DMMS_Dept');

        return $query->row();
    }

    public function delete($id){
        $this->db->where('DeptID', $id);
        $this->db->delete('tbl_DMMS_Dept');
    }
    public function update($Status,$dept,$deptID){
        
        $query = $this->db->query("UPDATE tbl_DMMS_Dept
        Set DeptName='$dept', Status=$Status
        WHERE
        DeptID=$deptID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('index.php/departments');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('index.php/departments');
       }
    }
    public function getallDept()
    {
        $query = $this->db
                    ->select("*")
                    ->where("Status", true)
                    ->get('tbl_DMMS_Dept');

        return $query->result();
    }
    public function getDeptID($SecID){
       


                $this->db->select("*")->from("tbl_DMMS_Sections");
        $this->db->where("SecID", $SecID);
        
        return $this->db->get()->result();
        
    }
}