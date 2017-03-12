<?php

class Samplec extends CI_Controller
{
	public function new1()
	{
		$this->load->view('samplev');
	}

	public function ret_data()
	{
		$this->load->model('samplem');
		$var['data']=$this->samplem->getdata1();
		$this->load->view('samplev2', $var);

	}

	public function adddata()
	{
			$this->load->model('samplem');
			
			$this->samplem->modeldata(); 
			//$this->load->view('samplev');
			redirect('samplec/ret_data');
			
	}
}