<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class StudentRegistration extends CI_Controller {

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
	}

	public function index()
	{
		$this->load->view('newReg_min');
	}

	public function lmReg() {
		$this->load->view('metReg');
	}

	public function studentList() {

		$this->load->view('studList');
	}

	public function regValidate() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[registration.email]');
		$this->form_validation->set_rules('password','Password','required|md5|trim');

		$this->form_validation->set_message('is_unique', 'Email address already exists!');

		if ($this->form_validation->run()) {

			$this->load->model('studentModel');
	
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			if ($this->studentModel->addStudent($email, $password)) {
				echo 'added to database';
			}
			else
				echo 'not added';
		}
		else {
			$this->load->view('metReg');
		}
	}

	public function validate_credentials() {

		$this->load->model('studentModel');

		if ($this->studentModel->can_log_in()) {
			return true;
		}
		else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password');
			return false;
		}
	}
}
