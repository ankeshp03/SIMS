	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {

	    parent::__construct();
		$this->load->helper('url');
		$this->load->database();

   }
   // used to load studentInProctor ,  proctorDashboard
	public function index()
	{
		$this->load->view('proctorDashboard');

	}
	
    // to push data in Db
	public function addfacultyDb()
	{
		$this->load->model('Samplem');
		$this->Samplem->addfaculty();
		
		$this->load->view('confirm');
	}
	// this retrieve_data() function will return json formatted data  to line.js file
	public function retrieve_data()
	{
		$this->load->model('Samplem');
		$this->data['matches'] = $this->Samplem->getdata();
		//$this->load->view('dataview', $this->data);

		// for json data include this header
		header('Content-Type: application/json');


		$data1 = array();

		foreach ($this->data['matches'] as $key) { 
			 
			$data1[] = $key;
			
		 }
		 // returns  data in json format
		  echo json_encode($data1);
		  

	}

	// this view will be loaded first before any thing which in  turn will call retrieve_data() function
	public function loadStudentReport($data)
	{


		$this->data['usn'] = $data;
		// usn of student is passed as a parameter so that attendanceGraph.php can use it
		$this->load->view('studentInformation', $this->data);


		//echo $data;
		//$usn = $data;
	}

	public function attendance($data1) //  for students marks and attendance testing data
	{

		$this->load->model('Samplem');
		$this->data['attendance'] = $this->Samplem->fetchdata();

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
		$this->load->model('Samplem');
		$this->data['marks'] = $this->Samplem->getMarks();

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
	public function studentInProctor()
	{
		$this->load->model("Samplem");
		$this->data['studentInProctor'] = $this->Samplem->studentInProctorDb();

		$this->load->view('studentInProctor', $this->data);
	}
	public function retrievePersonalInformation($usn)
	{
		$this->load->model("Samplem");
		$this->data['pinfo'] = $this->Samplem->personalInformationMethod();

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

	public function proctorPersonalInfo()
	{
		
	}


	
}
