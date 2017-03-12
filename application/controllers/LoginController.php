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

		if($this->loginModel->validate()) {
			echo "successful";
		} else {
			echo "Login Unsuccessful!";
		}
	}

	public function forgotPassword() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->model('loginModel');
		$val = $this->loginModel->keyPresent();
		if($val == null) {
			$key = md5(uniqid());
			$this->loginModel->addHashKey($key);
		}
		else {
			$key = $val;
		}

		if(!$this->loginModel->emailExist()) {
			exit('Email id is not registered!');
		}

		$this->load->library('email', array('mailtype'=>'html'));

		$this->email->from('admin@acharya.ac.in', "Ankesh");
		$this->email->to($this->input->post('emailSendKey'));

		$message = "<p><a href='".base_url()."loginController/validateKey/$key'>Click here</a> to set your password</p>";
		$this->email->message($message);

		if($this->email->send()) {
			echo "<br>Email has been sent to set new password!";
		} else {
			echo "email not sent!";
		}
	}

	public function validateKey($key) {

		$this->load->model('loginModel');

		if($this->loginModel->validateHashKey($key)) {
			$data['key'] = $key;
			$this->load->view('resetPassword', $data);
		} else {
			echo "Unable to validate email!";
		}
	}

	public function setPassword() {

		$key = $this->input->post('key');
		$this->load->model('loginModel');

		if($this->loginModel->deleteHashKey($key)) {
			echo "valid";
		}
		else{
			echo "invalid";
		}
	}

	public function logout() {
		redirect('loginController');
	}
}