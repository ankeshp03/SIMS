<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentRegistration extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		
		$data['title'] = 'Student Registration Form';
		$data['link1'] = '#';
		$data['link2'] = 'facultyRegistration/';
		$this->load->view('template/navbarTop');
		$this->load->view('template/sidenavLargeMed', $data);
		$this->load->view('template/sidenavSmall', $data);
		$this->load->view('newStudentRegistration');
	}

	public function addStudentDB() {

		//loading the model where the data will be sent to store in the database
		$this->load->model('studentModel');
	
		//passing the variables as paramater to the function that is in the model which will store the data in the database. if the condition is true then the data are added to the database
		if ($this->studentModel->addStudent()) {
			redirect('studentRegistration');
		}
		else {
			echo "not added";
			$this->load->view('newStudentRegistration');
		}
	}
}