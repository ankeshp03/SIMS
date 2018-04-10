<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index()  {

		$this->load->view('login');
	}

	public function validateUser() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$this->load->model('loginModel');

		$this->load->library('session');

		if (1 == preg_match("/^[a-zA-Z]+\.[a-zA-Z]+\.([0-9][1-9]|[1-9][0-9])@acharya\.ac\.in$/", $this->input->post('email'))) {
			$user = $this->loginModel->validateStudent();
			if($user != null) {
				$this->session->set_userdata('usn', $user['usn']);	
			}
		}
		else {
			$user = $this->loginModel->validateFaculty();
			if($user != null) {
				$this->session->set_userdata('employeeID', $user['employeeID']);
				$this->session->set_userdata('level', $user['level']);
				$this->session->set_userdata('institute_department', $user['institute_department']);
			}	
		}

		if($user != null) {
			$this->session->set_userdata('email', $this->input->post('email'));
			$this->session->set_userdata('username', $user['username']);
			if($this->session->userdata('level') && !$this->session->userdata('usn')) {
				switch ($user['level']) {
					case 1:
					$this->session->set_userdata('quote', $user['quote']);
					$this->session->set_userdata('user', 'admin');
					break;
					case 2:
					$this->session->set_userdata('user', 'hod');
					break;
					case 3:
					$this->session->set_userdata('user', 'head proctor');
					break;
					case 4:
					$this->session->set_userdata('user', 'proctor');
					break;
					default:
					$this->session->set_userdata('user', 'faculty');
					break;
				}
			}
			else {
				$this->session->set_userdata('user', 'student');
			}
			if($user["firstTime"] == "true") {
				echo "firstTime";
			}
			else {
				echo $this->session->userdata('user');
			}

		}
		else {
			echo "Login Unsuccessful!";
		}
	}

	/* --- Use in live server, won't work in localhost

	public function forgotPassword() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		
		$this->load->model('loginModel');

		if(!$this->loginModel->emailExist()) {
			exit('Email id is not registered!');
		}

		$val = $this->loginModel->keyPresent();
		if($val == null) {
			$key = md5(uniqid());
			$this->loginModel->addHashKey($key);
		}
		else {
			$key = $val;
		}
		$this->load->library('encrypt');
		
		$ciphertext = ''; //cyphertext for password
		
	    $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ank.paramanik@gmail.com',
            'smtp_pass' => $this->encrypt->decode($ciphertext),
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
		
		$this->load->library('email', $config); //array('mailtype'=>'html')
		$this->email->set_newline("\r\n");


		$this->email->from('admin@acharya.ac.in', "Ankesh");
		$this->email->to($this->input->post('emailSendKey'));
		$this->email->subject("Student Information Management System | Reset Password Link");

		$message = "<p><a href='".base_url()."loginController/validateKey/$key'>Click here</a> to set your password</p>";
		$this->email->message($message);
		
		if($this->email->send()) {
			echo "<br>Email has been sent to set new password! ";
		} else {
			echo "email not sent!";
		}
	} --- */

	public function forgotPassword() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		
		$this->load->model('loginModel');

		if(!$this->loginModel->emailExist()) {
			exit('Email id is not registered!');
		}

		$val = $this->loginModel->keyPresent();
		if($val == null) {
			$key = md5(uniqid());
		}
		else {
			$key = $val;
		}
		
		$this->load->library('My_PHPMailer');
		$this->load->library('encrypt');

		//Here the cyphertext is the password used to login to the gmail account

		$ciphertext = 'Ql7jmznM/sWwRvQVma/mhfoHrA7YALRHAVpD7z+QOIJY+/bzDh4O0WR4/SEpbjp8RzBRXVMUduBMWW7OBb+AcA==';

		$mail = new PHPMailer;

		$mail->isSMTP();                                  
		$mail->Host = 'smtp.gmail.com';                   
		$mail->SMTPAuth = true;                           
		$mail->Username = 'ank.paramanik@gmail.com'; //Email ID from where the reset password mail will be sent
		//$mail->Password = 'password'; Password used to loginn to your account
		$mail->Password = $this->encrypt->decode($ciphertext); //can be removed when previous line is used
		$mail->SMTPSecure = 'tls';                        
		$mail->Port = 587;                                

		$mail->setFrom('ank.paramanik@gmail.com', 'Ankesh');
		$mail->addAddress($this->input->post('emailSendKey'));  

		$mail->isHTML(true); 

		$bodyContent = "<p><a href='".base_url()."loginController/validateKey/$key'>Click here</a> to set your password</p>";

		$mail->Subject = 'SIMS Reset Password';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) {
			echo 'Email could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$this->loginModel->addHashKey($key);
			echo '<br>Email has been sent to set new password!';
		}
	}

	public function setFirstPasswordFunc() {

		$data['key'] = "firstTime";
		$this->load->view('resetPassword', $data);	
	}	

	public function validateKey($key) {

		$this->load->model('loginModel');

		if($this->loginModel->validateHashKey($key)) {
			$data['key'] = $key;
			$this->load->view('resetPassword', $data);
		} else {
			echo "You have already reset the password!"; //Unable to validate email
		}
	}

	public function setPassword() {

		$key = $this->input->post('key');
		$this->load->model('loginModel');

		if($key == "firstTime") {
			if($this->loginModel->setFirstPassword($this->session->userdata('email'))) {
				echo "valid";
			}
			else{
				echo "invalid";
			}
		}
		else {
			if($this->loginModel->deleteHashKey($key)) {
				echo "valid";
			}
			else{
				echo "invalid";
			}
		}
	}

	public function logout() {

		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('loginController');
	}
}