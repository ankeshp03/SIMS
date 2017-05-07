<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {

		$this->load->library('session');
		
		if($this->session->userdata('level') != "1") {
			redirect('loginController');
		}
		$this->load->view('adminDashboard');
	}

	public function studentRegistration() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['title'] = 'Student Admission Form';
		$data['profile'] = 'adminController/adminProfile';
		$data['link1'] = 'adminController/studentRegistration#';
		$data['link2'] = 'adminController/facultyRegistration';
		$data['color1'] = 'blue';
		$data['color2'] = 'grey';
		$this->load->view('template/adminNavbarTop', $data);
		$this->load->view('template/adminSidenavLarge', $data);
		$this->load->view('template/adminSidenavMedSmall', $data);
		$this->load->view('newStudentRegistration');
	}

	public function addStudentDB() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		//loading the model where the data will be sent to store in the database
		$this->load->model('adminModel');

		//passing the variables as paramater to the function that is in the model which will store the data in the database. if the condition is true then the data are added to the database
		if ($this->adminModel->addStudent()) {
			echo "Added to database";
		}
		else {
			echo "Not added";
		}
	}

	public function facultyRegistration() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$data['title'] = 'Faculty Registration Form';
		$data['profile'] = 'adminController/adminProfile';
		$data['link1'] = 'adminController/studentRegistration';
		$data['link2'] = 'adminController/facultyRegistration#';
		$data['color1'] = 'grey';
		$data['color2'] = 'blue';
		$this->load->view('template/adminNavbarTop', $data);
		$this->load->view('template/adminSidenavLarge', $data);
		$this->load->view('template/adminSidenavMedSmall', $data);
		$this->load->view('newFacultyRegistration');
	}

	public function addFacultyDB() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		//loading the model where the data will be sent to store in the database
		$this->load->model('adminModel');

		//passing the variables as paramater to the function that is in the model which will store the data in the database. if the condition is true then the data are added to the database
		if ($this->adminModel->addFaculty()) {
			echo "Added to database";
		}
		else {
			echo "Not added";
		}
	}

	public function getInstitution() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->getInstitute();
	}

	public function getDepartments() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->getDepartment();
	}

	public function AUIDexists() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->AUIDexist();
	}

	public function USNexists() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->USNexist();
	}

	public function Emailexists() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->Emailexist();
	}

	public function employeeIdExists() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->employeeIdExist();
	}

	/* --- The below function can be used for faculty also but needs to be implemented in the respective controllers --- */

	public function adminProfile() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$adminData = $this->adminModel->getAdminDetails($this->session->userdata('employeeID'));

		$data['title'] = $this->session->userdata('username');
		$data['profile'] = 'adminController/adminProfile#';
		$data['link1'] = 'adminController/studentRegistration';
		$data['link2'] = 'adminController/facultyRegistration';
		$data['color1'] = 'grey';
		$data['color2'] = 'grey';
		$this->load->view('template/adminNavbarTop', $data);
		$this->load->view('template/adminSidenavLarge', $data);
		$this->load->view('template/adminSidenavMedSmall', $data);
		$this->load->view('adminView', $adminData);
	}
}