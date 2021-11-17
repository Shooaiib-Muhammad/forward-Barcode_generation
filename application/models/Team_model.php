<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{
    public $name;
    public $skill;
    public $phone;
    public $email;
    public $cardNo;
    public $DeptID;

    public function update($id ,$Status){
// $query = $this->db->query("UPDATE  tbl_DMMS_Assign_Team
//         Set Status='$Status'
//         WHERE
//         TID='$id'");
//          return $query;

         $query = $this->db->query("UPDATE  tbl_DMMS_Assign_Team
        Set Status=$Status 
        WHERE
        TID=$id");
    }
    public function findall($id)
    {
        $query = $this->db
                    ->select(" t.ID, t.Name, t.Phone, t.Email, t.CardNo, t.DeptID, t.Skill, t.Status, t.Username, t.Password, t.isAdmin, t.SStatus, s.SkillID, s.SkillName, s.Status AS ss, d.DeptName, d.Status AS DStatus")
                    ->join("tbl_DMMS_Skills s", 's.SkillID = t.Skill')
                    ->join("tbl_DMMS_Dept d", 'd.DeptID = t.DeptID')
                      //->where("t.Status", true)
                          ->where("t.DeptID", $id)
                    ->get('tbl_DMMS_Team t');

        return $query->result();
    }
  public function findallData()
    {
        $query = $this->db
                    ->select(" t.ID, t.Name, t.Phone, t.Email, t.CardNo, t.DeptID, t.Skill, t.Status, t.Username, t.Password, t.isAdmin, t.SStatus, s.SkillID, s.SkillName, s.Status AS ss, d.DeptName, d.Status AS DStatus")
                    ->join("tbl_DMMS_Skills s", 's.SkillID = t.Skill')
                    ->join("tbl_DMMS_Dept d", 'd.DeptID = t.DeptID')
                      //->where("t.Status", true)
                          //->where("t.DeptID", $id)
                    ->get('tbl_DMMS_Team t');

        return $query->result();
    }
     public function findTeam()
    {
        $query = $this->db
                    ->select("*")
                    
                      //->where("t.Status", true)
                          //->where("t.DeptID", $id)
                    ->get('view_DMMS_Assign_member');

        return $query->result();
    }
    public function findByDept($id)
    {
        $query = $this->db
                    ->select("*")
                    ->where("t.DeptID", $id)
                    ->where("t.Status", 1)
                    ->join("tbl_DMMS_Skills s", 's.SkillID = t.Skill')
                    ->join("tbl_DMMS_Dept d", 'd.DeptID = t.DeptID')
                    ->get('tbl_DMMS_Team t');

        return $query->result();
    }

    public function insert($data){
        $this->name = $data['name'];
        $this->skill = $data['skill'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->cardNo = $data['card'];
        $this->DeptID = $data['department'];
         $this->Username = $data['name'];
          $this->Password = $data['password'];
         $this->Status = 1;
          $this->isAdmin = 0;

        $this->db->insert("tbl_DMMS_Team",$this);

    }

    public function delete($id){
        $this->db->where('ID', $id);
        $this->db->delete('tbl_DMMS_Team');
    }

    public function countamb($id)
    {
        return $this->db->get("tbl_DMMS_Dept")->num_rows();
    }
    public function countms1($id)
    {
        return $this->db->get("View_DMMS_Section")->num_rows();
    }
    public function countms2($id)
    {
        return $this->db->get("tbl_DMMS_Machine")->num_rows();
    }
    public function countlfb($id)
    {
        return $this->db->get("View_DMMS_Install_Machine")->num_rows();
    }
    public function counttm($id)
    {
        return $this->db->get("View_DMMS_Machine_peremters")->num_rows();
    }
  public function getteamDetsils($id)
    {
      

         $query = $this->db
                    ->select("*")
                      ->where("t.DeptID", $id)
                    ->join("tbl_DMMS_Skills s", 's.SkillID = t.Skill')
                    ->join("tbl_DMMS_Dept d", 'd.DeptID = t.DeptID')
                    ->get('tbl_DMMS_Team t');
                      
        return $query->result();
    }

    public function updateTeam($id,$Status,$Skill,$Phone,$Email){
        $query = $this->db->query("UPDATE  tbl_DMMS_Team
        Set Status=$Status ,Phone='$Phone' ,Email='$Email' ,Skill=$Skill 
        WHERE
        ID=$id");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect("index.php/teams/");
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
       redirect("index.php/index.php/teams/");
       } 
    }
    
    public function Assihntemmambers($Dept,$section ,$teammamber){
        // $this->Deptid = $Dept;
        // $this->SectionID = $section;
        // $this->TeamMember = $teammamber;
        //  $this->Status = 1;
        //$this->db->insert("tbl_DMMS_Assign_Team",$this);
$query =$this->db->query("INSERT  INTO tbl_DMMS_Assign_Team
      (Deptid,SectionID,TeamMember,Status) VALUES ('$Dept', '$section',$teammamber,1)");;

    }

}