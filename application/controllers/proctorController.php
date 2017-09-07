<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProctorController extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('url');
		$this->load->database();

	}

	public function index()
	{

		$this->load->library('session');

		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$this->load->model("proctorModel");
		$value = $this->proctorModel->year($this->session->userdata('institute_department'));

		$data['title'] = 'Proctor';
		$data['profile'] = 'proctorController/proctorProfile';
		$data['link1'] = 'proctorController/assignStudentFaculties';
		$data['color1'] = 'blue';
		$data['text1'] = 'Home';
		$this->load->view('navbar/proctorNavbarTop', $data);
		$this->load->view('navbar/proctorSidenavLarge', $data);
		$this->load->view('navbar/proctorSidenavMedSmall', $data);
		$this->load->view('proctorDashboard', $value);

	}

	// this view will be loaded first before any thing which in  turn will call retrieve_data() function
	public function loadStudentReport($usn)
	{

		$this->load->library('session');

		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$data['title'] = 'Student Information';
		$data['profile'] = 'proctorController/proctorProfile';
		$data['link1'] = 'proctorController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$this->load->view('navbar/proctorNavbarTop', $data);
		$this->load->view('navbar/proctorSidenavLarge', $data);
		$this->load->view('navbar/proctorSidenavMedSmall', $data);
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
		
		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$this->load->model('proctorModel');
		$this->data['attendance'] = $this->proctorModel->fetchdata();

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
		
		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$this->load->model('proctorModel');
		$this->data['marks'] = $this->proctorModel->getMarks();

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

// proctor first page which enlist name of all under this->proctor
	public function studentInProctor($year)
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$data['title'] = 'Student List';
		$data['profile'] = 'proctorController/proctorProfile';
		$data['link1'] = 'proctorController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$this->load->view('navbar/proctorNavbarTop', $data);
		$this->load->view('navbar/proctorSidenavLarge', $data);
		$this->load->view('navbar/proctorSidenavMedSmall', $data);

		$this->load->model("proctorModel");
		$this->data['studentInProctor'] = $this->proctorModel->studentInProctorDb($this->session->userdata('institute_department'), $year);

		$this->load->view('studentInProctor', $this->data);
	}

	public function retrievePersonalInformation($usn)
	{

		$this->load->library('session');
		
		if($this->session->userdata('level') != "4") {
			redirect('loginController');
		}

		$this->load->model("proctorModel");
		$this->data['pinfo'] = $this->proctorModel->personalInformationMethod();

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

	public function proctorProfile() {

		$this->load->library('session');
		if($this->session->userdata('level') != "4" || $this->session->userdata('user') != "proctor") {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->load->model('proctorModel');

		$proctorData = $this->proctorModel->getProctorDetails($this->session->userdata('employeeID'));

		$path = './assets/faculties/';

		$data['title'] = $this->session->userdata('username');
		$data['profile'] = 'proctorController/proctorProfile';
		$data['link1'] = 'proctorController/assignStudentFaculties';
		$data['color1'] = 'grey';
		$data['text1'] = 'Home';
		$data['path'] = $path;
		$data['ext'] = pathinfo($path, PATHINFO_EXTENSION);
		$this->load->view('navbar/proctorNavbarTop', $data);
		$this->load->view('navbar/proctorSidenavLarge', $data);
		$this->load->view('navbar/proctorSidenavMedSmall', $data);
		$this->load->view('proctorView', $proctorData);
	}
}
