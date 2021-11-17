

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include("./application/views/includes/Exception.php");
include("./application/views/includes/PHPMailer.php");
include("./application/views/includes/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class QRController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Department_model', 'd');
        $this->load->model('Machine_model', 'm');
        $this->load->model('Team_model', 't');
    }

	public function index()
	{
        $this->load->view('QRForm');
	}

	public function getId()
	{
        $data['machineId'] =  $this->uri->segment(3);
        //Echo $data['machineId'];
       
        $DMID= $data['machineId'];
      
        $data['getdata']=$this->m->getdata($DMID);
       if($data['getdata']){
     
          $TID=$data['getdata'][0]['ID'];
        $data['getcounter']=$this->m->getcounter($TID);
        $counter=$data['getcounter'][0]['Counter'];
// Echo $counter;
// die;
           if($counter=='1'){
            //    $TID=$data['getdata'][0]['ID'];
            // $data['machineissue'] =  $this->m->getissueDetails($TID);
            // $this->load->view('QRFormVerification',$data);
            	redirect('index.php/Main/loginPage');
           }else if($counter=='2'){
                $TID=$data['getdata'][0]['ID'];
            $data['machineissue'] =  $this->m->getissueDetails($TID);
          
            $this->load->view('QRFormVerificationissue',$data);
            
           }else if($counter=='3'){
           
                $data['machineDetails'] =  $this->m->findbyMid($DMID);
           $this->load->view('QRForm',$data);
           }
          
        }else{
         //Echo "Helll";
     
             $data['machineDetails'] =  $this->m->findbyMid($DMID);
            
           $this->load->view('QRForm',$data);
        }
  
        
	}
  public function getIds()
	{
        $data['machineId'] =  $this->uri->segment(3);
        //Echo $data['machineId'];
       
        $DMID= $data['machineId'];
      
        $data['getdata']=$this->m->getdata($DMID);
       if($data['getdata']){
     
          $TID=$data['getdata'][0]['ID'];
        $data['getcounter']=$this->m->getcounter($TID);
        $counter=$data['getcounter'][0]['Counter'];
 
           if($counter=='1'){
            //    $TID=$data['getdata'][0]['ID'];
            // $data['machineissue'] =  $this->m->getissueDetails($TID);
            // $this->load->view('QRFormVerification',$data);
            	redirect('index.php/Main/loginPage');
           }else if($counter=='2'){
                $TID=$data['getdata'][0]['ID'];
            $data['machineissue'] =  $this->m->getissueDetails($TID);
          
            $this->load->view('QRFormVerificationissue1',$data);
            
           }else if($counter=='3'){
           
                $data['machineDetails'] =  $this->m->findbyMid($DMID);
           $this->load->view('QRForm1',$data);
           }
          
        }else{
         //Echo "Helll";
     
             $data['machineDetails'] =  $this->m->findbyMid($DMID);
            
           $this->load->view('QRForm1',$data);
        }
  
        
	}

    public function addData($machinId,$workDes){
        $machinId = $machinId;
        $workDes = $workDes;
        
      // print_r($_POST);
        $this->m->addDataSchedule($machinId,str_replace("%20"," ",$workDes));    
$DMID=$machinId;
 $data['emailalert']=$this->m->EmailAlert($DMID);    
// Echo json_encode($data['emailalert']);
// die;
$Email=$data['emailalert'][0]['Email'];
$Location=$data['emailalert'][0]['Location'];
$username=$data['emailalert'][0]['Username'];
$Desc=$data['emailalert'][0]['des_work_required'];


$EntryDate=$data['emailalert'][0]['EntryDate'];
$StartTime=$data['emailalert'][0]['StartTime'];
$name=$data['emailalert'][0]['name'];

        $mail = new PHPMailer(true);
try{


        //Server settings
    $mail->aaSMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'forwardsportssialkot@gmail.com';                     //SMTP username
    $mail->Password   = 'Forward123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', "DMMS Alert");
    
    $mail->addAddress("$Email");     //Add a recipient
$mail->Subject = "New Issue Generated on ".$Location."";
    $mail->Body    = "Dear ".$username .",<br /> New Issue generated at ". $name ." <br /> on ".$StartTime." That Having problem of ".$Desc." <br /> if you have any Problem Contact to IT Team At Shoaib@Forward.pk";
    $mail->AltBody = 'if you have any Problem Contact to IT Team At Shoaib@Forward.pk';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
      }

      public function addSol($transaction_Id,$solDes,$sol,$PID){
        $transactionId =  $transaction_Id;

        $solDes = $solDes;
        $sol =  $sol;
         $prbm =  $PID;
 
        $this->m->addDataTransaction($transactionId,str_replace("%20"," ",$solDes), $sol,$prbm);    
      }
       public function Approval(){
          
         $transactionId = $_POST['transaction_Id'];
       
        $Status = $_POST['sol'];
      
        $this->m->Approval($transactionId,$Status);    
      }
      
      public function getissueId()
      { 
          $data['machineIssueId'] =  $this->uri->segment(3);
        $data['machineissue'] =  $this->m->getissueDetails($data['machineIssueId']);
        print_r($data['machineissue']);
     
        $this->load->view('QRFormVerification',$data);
         
      }
  public function GetIssued($id){
           $TID=$id;
            $data['machineissue'] =  $this->m->getissueDetails($TID);
            $data['Allproblems'] =  $this->m->getproblems();
            $this->load->view('QRFormVerification',$data);
  }
   public function Addproblem($Problem,$machineID){
           //$TID=$id;
            $data['Data'] =  $this->m->Addproblem(str_replace("%20"," ",$Problem),$machineID);
            //$this->load->view('QRFormVerification',$data);
  }
  
}
