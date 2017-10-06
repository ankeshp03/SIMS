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

	public function studentAdmission() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['title'] = 'Student Admission Form';
		$data['profile'] = 'adminController/adminProfile';
		$data['link1'] = 'adminController/studentAdmission#';
		$data['link2'] = 'adminController/facultyRegistration';
		$data['link3'] = 'adminController/recentRegistrations';
		$data['color1'] = 'blue';
		$data['color2'] = 'grey';
		$data['color3'] = 'grey';
		$data['color4'] = 'grey';
		$navViews['top'] = $this->load->view('navbar/adminNavbarTop', $data, TRUE);
		$navViews['sideLarge'] = $this->load->view('navbar/adminSidenavLarge', $data, TRUE);
		$navViews['sideSmall'] = $this->load->view('navbar/adminSidenavMedSmall', $data, TRUE);
		$this->load->view('newStudentAdmission', $navViews);
	}

	public function addStudentDB() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		//uploading image
		if(isset($_FILES["photo"]["name"]) && $this->adminModel->USNexist('1')) {
			$config['upload_path'] = './assets/images/students/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name'] = $this->input->post('usn');
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('photo')) {
				echo $this->upload->display_errors();
			}
			else {
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
		$data['link1'] = 'adminController/studentAdmission';
		$data['link2'] = 'adminController/facultyRegistration#';
		$data['link3'] = 'adminController/recentRegistrations';
		$data['color1'] = 'grey';
		$data['color2'] = 'blue';
		$data['color3'] = 'grey';
		$data['color4'] = 'grey';
		$navViews['top'] = $this->load->view('navbar/adminNavbarTop', $data, TRUE);
		$navViews['sideLarge'] = $this->load->view('navbar/adminSidenavLarge', $data, TRUE);
		$navViews['sideSmall'] = $this->load->view('navbar/adminSidenavMedSmall', $data, TRUE);
		// $this->load->view('newFacultyRegistration', $navViews);
		$this->load->view('editFacultyDetails', $navViews);
	}

	public function recentRegistrations() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$data['title'] = 'Recent Registrations';
		$data['profile'] = 'adminController/adminProfile';
		$data['link1'] = 'adminController/studentAdmission';
		$data['link2'] = 'adminController/facultyRegistration';
		$data['link3'] = 'adminController/recentRegistrations#';
		$data['color1'] = 'grey';
		$data['color2'] = 'grey';
		$data['color3'] = 'blue';
		$data['color4'] = 'grey';
		$navViews['top'] = $this->load->view('navbar/adminNavbarTop', $data, TRUE);
		$navViews['sideLarge'] = $this->load->view('navbar/adminSidenavLarge', $data, TRUE);
		$navViews['sideSmall'] = $this->load->view('navbar/adminSidenavMedSmall', $data, TRUE);
		// $this->output->cache(3);
		$this->load->view('recentRegistrationView', $navViews);
	}

	public function addFacultyDB() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		//uploading image
		if(isset($_FILES["photo"]["name"]) && $this->adminModel->employeeIdExist('1')) {
			$config['upload_path'] = './assets/images/faculties/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['file_name'] = $this->input->post('employeeId');
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('photo')) {
				echo $this->upload->display_errors();
			}
			else {

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

		$this->adminModel->USNexist("2");
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

		$this->adminModel->employeeIdExist("2");
	}

	public function getRecentStudentList() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->recentStudentAdmissions();
	}

	public function getRecentFacultyList() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');

		$this->adminModel->recentFacultyRegistrations();
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
		$data['link1'] = 'adminController/studentAdmission';
		$data['link2'] = 'adminController/facultyRegistration';
		$data['link3'] = 'adminController/recentRegistrations';
		$data['color1'] = 'grey';
		$data['color2'] = 'grey';
		$data['color3'] = 'grey';
		$data['color4'] = 'blue';
		$adminData['top'] = $this->load->view('navbar/adminNavbarTop', $data, TRUE);
		$adminData['sideLarge'] = $this->load->view('navbar/adminSidenavLarge', $data, TRUE);
		$adminData['sideSmall'] = $this->load->view('navbar/adminSidenavMedSmall', $data, TRUE);
		$this->load->view('adminView', $adminData);	
	}

	public function getDetails() {
		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');
		
		if($this->input->post('user') == 'student') {
			$this->adminModel->getStudentDetails();
		}
		else {
			$this->adminModel->getFacultyDetails();	
		}
	}

	public function editDetails($usr, $id) {
		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');
		$d['usr'] = $usr;
		$d['id'] = $id;
		
		if($usr == 'student') {
			$this->load->view('editStudentDetails', $d);
		}
		else {
			// $this->adminModel->editFacultyDetails();	
			$this->load->view('editFacultyDetails', $d);
		}
	}
	
	public function removeUser() {

		$this->load->library('session');
		if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('adminModel');
		
		if($this->input->post('user') == 'student') {
			$this->adminModel->removeStudentDetails();
		}
		else {
			$this->adminModel->removeFacultyDetails();	
		}
	}
}