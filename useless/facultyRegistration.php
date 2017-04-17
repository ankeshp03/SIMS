<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacultyRegistration extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {

		$this->load->library('session');
        $sessionVal = $this->session->userdata('email');
		
		if(!$sessionVal) {
			redirect('loginController');
		}
		
		$data['title'] = 'Faculty';
		$data['link1'] = 'studentRegistration/';
		$data['link2'] = 'facultyRegistration#';
		$data['color1'] = 'grey';
		$data['color2'] = 'blue';
		$this->load->view('template/navbarTop', $data);
		$this->load->view('template/sidenavLargeMed', $data);
		$this->load->view('template/sidenavSmall', $data);
		$this->load->view('newFacultyRegistration');
	}

	public function addFacultyDB() {

		//loading the model where the data will be sent to store in the database
		$this->load->model('facultyModel');
	
		//passing the variables as paramater to the function that is in the model which will store the data in the database. if the condition is true then the data are added to the database
		if ($this->facultyModel->addFaculty()) {
			redirect('facultyRegistration');
		}
		else {
			echo "not added";
			$this->load->view('newfacultyRegistration');
		}
	}
}