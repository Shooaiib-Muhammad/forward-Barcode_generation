<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
  $this->load->model('Section_model', 's');
        $this->load->model('Department_model', 'd');
        $this->load->model('Machine_model', 'm');
        $this->load->model('Team_model', 't');
    }

	public function index()
	{
			$this->load->view('login');
	
	}
	public function loginPage()
	{
			$this->load->view('page_login');
	
	}
		public function loginPage1()
	{
			$this->load->view('page_login1');
	
	}
	public function loginpafe()
	{
		$this->load->view('login');
	}
	public function Dmms_Dashboard()
	{
			$data['amb_count'] = $this->m->countambInstalledMachines(1);
				$data['amb_team'] = $this->t->countamb(1);
						$data['ms1_count'] = $this->m->countms1InstalledMachines(7);
				$data['ms1_team'] = $this->t->countms1(7);
			$data['ms2_count'] = $this->m->countms2InstalledMachines(6);
				$data['ms2_team'] = $this->t->countms2(6);
				$data['tm_count'] = $this->m->counttmInstalledMachines(3);
				$data['tm_team'] = $this->t->counttm(3);
				$data['lfb_count'] = $this->m->countlfbInstalledMachines(24);
				$data['lfb_team'] = $this->t->countlfb(24);
	$data['packing_count'] = $this->m->countpackingInstalledMachines(25);
				$this->load->view('Dmms_Dashboard', $data);

	}

	public function maintance_login(){

        $user = $this->input->post('username');
		$password = $this->input->post('password');
		$this->m->loginn($user, $password);
		if($this->session->has_userdata('user_id')){
			if($password=='123'){
				redirect('changepwd');
			}else{
				$data['amb_count'] = $this->m->countambInstalledMachines(1);
				$data['amb_team'] = $this->t->countamb(1);
						$data['ms1_count'] = $this->m->countms1InstalledMachines(7);
				$data['ms1_team'] = $this->t->countms1(7);
			$data['ms2_count'] = $this->m->countms2InstalledMachines(6);
				$data['ms2_team'] = $this->t->countms2(6);
				$data['tm_count'] = $this->m->counttmInstalledMachines(3);
				$data['tm_team'] = $this->t->counttm(3);
				$data['lfb_count'] = $this->m->countlfbInstalledMachines(24);
				$data['lfb_team'] = $this->t->countlfb(24);
					$data['packing_count'] = $this->m->countpackingInstalledMachines(25);
				$this->load->view('Maintance_Dashboard', $data);
			}

		}
    }
	public function Maintance_Dashboard(){

        $user = $this->input->post('username');
		$password = $this->input->post('password');
		//$this->m->loginn($user, $password);
	
	

			$data['amb_count'] = $this->m->countambInstalledMachines(1);
				$data['amb_team'] = $this->t->countamb(1);
						$data['ms1_count'] = $this->m->countms1InstalledMachines(7);
				$data['ms1_team'] = $this->t->countms1(7);
			$data['ms2_count'] = $this->m->countms2InstalledMachines(6);
				$data['ms2_team'] = $this->t->countms2(6);
				$data['tm_count'] = $this->m->counttmInstalledMachines(3);
				$data['tm_team'] = $this->t->counttm(3);
				$data['lfb_count'] = $this->m->countlfbInstalledMachines(24);
				$data['lfb_team'] = $this->t->countlfb(24);
	$data['packing_count'] = $this->m->countpackingInstalledMachines(25);
				$this->load->view('Maintance_Dashboard', $data);


		
    }
				
				public function Preventive_Maintance(){


				$this->load->view('Preventive_maintance');


		
    }
					public function Accidental_Maintance(){


	
		$data['Counter'] = $this->m->issuedCounter();
$data['Hcounter'] = $this->m->historyCounter();
				$this->load->view('Maintance_Process',$data);


		
    }
				public function issued(){
						$data['issued'] = $this->m->getissued();
				$this->load->view('issued',$data);
    }
				public function History(){
						$data['history'] = $this->m->gethistory();
				$this->load->view('history',$data);
    }
	public function process_login(){

        $user = $this->input->post('username');
		$password = $this->input->post('password');
		$this->m->loginn($user, $password);
		if($this->session->has_userdata('user_id')){
			if($password=='123'){
				redirect('changepwd');
			}else{
				$data['amb_count'] = $this->m->countambInstalledMachines(1);
				$data['amb_team'] = $this->t->countamb(1);
						$data['ms1_count'] = $this->m->countms1InstalledMachines(7);
				$data['ms1_team'] = $this->t->countms1(7);
			$data['ms2_count'] = $this->m->countms2InstalledMachines(6);
				$data['ms2_team'] = $this->t->countms2(6);
				$data['tm_count'] = $this->m->counttmInstalledMachines(3);
				$data['tm_team'] = $this->t->counttm(3);
				$data['lfb_count'] = $this->m->countlfbInstalledMachines(24);
				$data['lfb_team'] = $this->t->countlfb(24);
					$data['packing_count'] = $this->m->countpackingInstalledMachines(25);
				$this->load->view('Dmms_Dashboard', $data);
			}

		}
    }

	public function dashboard()
    {
		$data['amb_count'] = $this->m->countambInstalledMachines(1);
		$data['amb_team'] = $this->t->countamb(1);
				$data['ms1_count'] = $this->m->countms1InstalledMachines(7);
		$data['ms1_team'] = $this->t->countms1(7);
	$data['ms2_count'] = $this->m->countms2InstalledMachines(6);
		$data['ms2_team'] = $this->t->countms2(6);
		$data['tm_count'] = $this->m->counttmInstalledMachines(3);
		$data['tm_team'] = $this->t->counttm(3);
		$data['lfb_count'] = $this->m->countlfbInstalledMachines(24);
		$data['lfb_team'] = $this->t->countlfb(24);
				$data['packing_count'] = $this->m->countpackingInstalledMachines(25);
		
		$this->load->view('Dmms_Dashboard', $data);
    }


	public function logout()
    {
		$this->session->sess_destroy();
		redirect('');
    }

}
