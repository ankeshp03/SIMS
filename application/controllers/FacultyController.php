<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacultyController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
		$this->load->database();

	}

	public function index()
	{

		$this->load->library('session');

		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$this->load->model("facultyModel");
		$value = $this->facultyModel->year($this->session->userdata('institute_department'));

		$data['title'] = 'Faculty';
		$data['profile'] = 'facultyController/facultyProfile';
		$data['link1'] = 'facultyController/assignStudentFaculties';
		$data['color1'] = 'blue';
		$data['text1'] = 'Home';
		$this->load->view('navbar/facultyNavbarTop', $data);
		$this->load->view('navbar/facultySidenavLarge', $data);
		$this->load->view('navbar/facultySidenavMedSmall', $data);
		$this->load->view('facultyDashboard', $value);

	}

	// this view will be loaded first before any thing which in  turn will call retrieve_data() function
	public function loadStudentReport($usn)
	{

		$this->load->library('session');

		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$data['title'] = 'Student Information';
		$data['profile'] = 'facultyController/facultyProfile';
		$data['link1'] = 'facultyController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$this->load->view('navbar/facultyNavbarTop', $data);
		$this->load->view('navbar/facultySidenavLarge', $data);
		$this->load->view('navbar/facultySidenavMedSmall', $data);
		$this->data['usn'] = $usn;
		// usn of student is passed as a parameter so that attendanceGraph.php can use it
		$this->load->view('studentInformation', $this->data);

		//echo "hi";

		//echo $data;
		//$usn = $data;
	}

	public function attendance($data1) //  for students marks and attendance testing data
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$this->load->model('facultyModel');
		$this->data['attendance'] = $this->facultyModel->fetchdata();

		// for json format data include this header
		header('Content-Type:application/json');

		$data  = array( );

		foreach ($this->data['attendance'] as $key ) {
			if ($key->usn == $data1) {	// comparison of usn
				$data[] = $key;
			}
		}
		echo json_encode($data);
		
	}

// returns data of student marks
	public function returnMarks($usn)
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$this->load->model('facultyModel');
		$this->data['marks'] = $this->facultyModel->getMarks();

		header('Content-Type:application/json');

		$data = array( );

		foreach ($this->data['marks'] as $key)
		{
			if ($key->usn == $usn) 
			{
				$data[] = $key;
			}
		}

		echo json_encode($data);
	}

// faculty first page which enlist name of all under this->faculty
	public function studentInFaculty($year)
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$data['title'] = 'Student List';
		$data['profile'] = 'facultyController/facultyProfile';
		$data['link1'] = 'facultyController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$this->load->view('navbar/facultyNavbarTop', $data);
		$this->load->view('navbar/facultySidenavLarge', $data);
		$this->load->view('navbar/facultySidenavMedSmall', $data);

		$this->load->model("facultyModel");
		$this->data['studentInFaculty'] = $this->facultyModel->studentInFacultyDb($this->session->userdata('institute_department'), $year);

		$this->load->view('studentInFaculty', $this->data);
	}

	public function retrievePersonalInformation($usn)
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "5") {
			redirect('loginController');
		}

		$this->load->model("facultyModel");
		$this->data['pinfo'] = $this->facultyModel->personalInformationMethod();

		header('Content-Type:application/json');

		$data = array( );

		foreach ($this->data['pinfo'] as $key)
		{
			if ($key->usn == $usn) 
			{
				$data[] = $key;
			}
		}

		echo json_encode($data);
		
	}

	public function facultyProfile() {

		$this->load->library('session');
		if($this->session->userdata('level') != "5" || $this->session->userdata('user') != "faculty") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('facultyModel');

		$facultyData = $this->facultyModel->getFacultyDetails($this->session->userdata('employeeID'));

		$path = './assets/faculties/';

		$data['title'] = $this->session->userdata('username');
		$data['profile'] = 'facultyController/facultyProfile';
		$data['link1'] = 'facultyController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$data['path'] = $path;
		$data['ext'] = pathinfo($path, PATHINFO_EXTENSION);
		$this->load->view('navbar/facultyNavbarTop', $data);
		$this->load->view('navbar/facultySidenavLarge', $data);
		$this->load->view('navbar/facultySidenavMedSmall', $data);
		$this->load->view('facultyView', $facultyData);
	}
}
