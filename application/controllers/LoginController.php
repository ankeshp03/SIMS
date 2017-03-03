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
		
		$this->load->model('loginModel');

		if($this->loginModel->validate()) {
			redirect('studentRegistration');
		} else {
			echo "inside else";
			redirect('LoginController');
		}
	}

	public function forgotPassword() {

		$key = md5(uniqid());
		$this->load->model('loginModel');
		$this->load->library('email', array('mailtype'=>'html'));

		$this->email->from('admin@acharya.ac.in', "Ankesh");
		$this->email->to($this->input->post('emailSendKey'));

		$message = "<p><a href='".base_url()."LoginController/validateKey/$key'>Click here</a> to set your password</p>";
		$this->email->message($message);

		if($this->loginModel->addHashKey($key)) {
			if($this->email->send()) {
				echo "<br>Email has been sent to set new password!";
			} else {
			echo "email not sent!";
			}
		} else {
			echo "Problem adding to databse";
		}
	}

	public function validateKey($key) {

		$data['key'] = $key;
		$this->load->model('loginModel');

		if($this->loginModel->validateHashKey('$key')) {
			//redirect('loginController/resetPasswordFunction');
			$this->load->view('resetPassword', $data);
		} else {
			echo "Unable to validate email!";
		}
	}

	public function setPassword() {

		$key = $this->input->post('key');
		$this->load->model('loginModel');

		if($this->loginModel->deleteHashKey($key)) {
			redirect('LoginController');
		}
		
	}
}