<?php

	class TestHashModel extends CI_Model {

		public function addHash($pass) {

			$data = array(
				'email' => $this->input->post('email'),
				'password' => $pass);

			$query = $this->db->insert('users', $data);

			if($query) {

				echo "done";
				return true;
			} else {
				echo "not done";
				return false;
			}
		}

		public function checkHash() {

			$this->db->where('email', $this->input->post('remail'));

			$query = $this->db->get('users');

			if($query->num_rows() > 0) {
		    	return $query->result();
			}
			else {
				echo "not passed";
			}
		}
	}