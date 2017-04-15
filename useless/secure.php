<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		
		$this->load->view('hashPass');
	}

	public function check() {

		$this->load->helper('phpass');
		$this->load->model('testHashModel');
		$password = $this->input->post('pass');
		$hasher = new PasswordHash(8, FALSE);
		$hashedPassword = $hasher->HashPassword($password);
		if($this->testHashModel->addHash($hashedPassword)) {
			$this->load->view('rehashpass');
		}
	}

	public function recheck() {

		$this->load->helper('phpass');
		$this->load->model('testHashModel');
		$res = $this->testHashModel->checkHash($this->testHashModel->checkHash(), $this->check->hashedPassword);
		if($res) {
			echo "done!";
		}
		else {
			echo "not done!";
		}
	}
}