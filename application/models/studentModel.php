<?php 

	class StudentModel extends CI_Model {

		public function can_log_in() {

			$this->db->where('email', $this->input->post('email'));
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('registration');

			if ($query->num_rows() == 1)
				return true;
			else
				return false;
		}

		public function addStudent($email, $password) {

			$data = array(
				'email' => $this->input->post('email'), 
				'password' => $this->input->post('password'));

			$query = $this->db->insert('registration', $data);

			if ($query)
				return true;
			else
				return false;	
		}
	}

?>