<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Skill_model', 'model');
    }

    public function index()
    {
        $data['skills'] = $this->model->findall();
        $this->load->view("skills", $data);
    }
}