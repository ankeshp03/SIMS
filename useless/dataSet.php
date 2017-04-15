<?php

	class DataSet extends CI_Controller
	{
		public function index()
		{
			$this->load->view('setData');
		}

		public function insertData()
		{
			$this->load->model('dataModel');
			$this->dataModel->addData();
			redirect('dataSet/retrieveData');
		}

		public function retrieveData()
		{
			$this->load->model('dataModel');
			$data['value'] = $this->dataModel->takeData();
			$this->load->view('getData', $data);
		}
	}