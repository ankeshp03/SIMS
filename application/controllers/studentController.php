<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
	}

	public function index()  {

		$this->load->library('session');
		if($this->session->userdata('user') != "student") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('studentModel');

		$studentData = $this->studentModel->getStudentDetails($this->session->userdata('usn'));

		$this->load->view('studentView', $studentData);
	}

	public function getAttendanceFunc() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('user') != "student") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('studentModel');

		$this->studentModel->getAttendance($this->session->userdata('usn'));
	}

	public function getMarksFunc() {

		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$this->load->library('session');
		if($this->session->userdata('user') != "student") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('studentModel');

		$this->studentModel->getMarks($this->session->userdata('usn'));
	}
}
?>