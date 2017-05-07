<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HeadProctorController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {

		$this->load->library('session');
		
		if($this->session->userdata('level') != "2") {
			redirect('loginController');
		}

		$this->load->model("headProctorModel");
		$value = $this->headProctorModel->year($this->session->userdata('institute_department'));

		$data['title'] = 'Head Proctor';
		$data['profile'] = 'headProctorController/headProctorProfile';
		$data['link1'] = 'headProctorController/assignStudentFaculties';
		$data['color1'] = 'blue';
		$data['text'] = 'Home';
		$this->load->view('template/headProctorNavbarTop', $data);
		$this->load->view('template/headProctorSidenavLarge', $data);
		$this->load->view('template/headProctorSidenavMedSmall', $data);
		$this->load->view('headProctorDashboard', $value);
	}

	public function assignStudentFaculties($year) {

		$this->load->library('session');
		
		if($this->session->userdata('level') != "2") {
			redirect('loginController');
		}

		$yearVal['year'] = $year;
		$data['title'] = 'Proctor Assignment';
		$data['profile'] = 'headProctorController/headProctorProfile';
		$data['link1'] = 'headProctorController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text'] = 'Home';
		$this->load->view('template/headProctorNavbarTop', $data);
		$this->load->view('template/headProctorSidenavLarge', $data);
		$this->load->view('template/headProctorSidenavMedSmall', $data);
		$this->load->view('studentProctorAssignment', $yearVal);
	}

	public function getStudents() {

		$this->load->library('session');
		
		if($this->session->userdata('level') != "2") {
			redirect('loginController');
		}

		$this->load->model("headProctorModel");
		$students = $this->headProctorModel->studentsList($this->session->userdata('institute_department'));
	}

	public function getFaculties() {

		$this->load->library('session');
		
		if($this->session->userdata('level') != "2") {
			redirect('loginController');
		}

		$this->load->model("headProctorModel");
		$students = $this->headProctorModel->facultiesList($this->session->userdata('institute_department'));
	}
}