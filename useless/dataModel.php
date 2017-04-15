<?php

	/**
	* 
	*/
	class DataModel extends CI_Model
	{
		
		public function addData()
		{
			$data = array('value' => $this->input->post('data'));
			if($this->db->insert('val', $data))
			{
				return true;
			} 
			else
			{
				return false;
			} 
		}

		public function takeData()
		{
			$this->db->select('value');
			$query = $this->db->get('val');
			return $query->result();
		}
	}