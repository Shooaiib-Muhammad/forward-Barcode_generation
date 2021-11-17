<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skill_model extends CI_Model
{
    public $skillName;
    public $Status;

    public function findall()
    {
        $query = $this->db
                    ->select("*")
                    ->where("Status", 1)
                    ->get('tbl_DMMS_Skills');

        return $query->result();
    }

    public function insert($data){
        $this->skillName = $data['name'];
        $this->Status = $data['status'];
    
        $this->db->insert("tbl_DMMS_Skills",$this);
    }

    public function delete($id){
        $this->db->where('SkillID', $id);
        $this->db->delete('tbl_DMMS_Skills');
    }
}