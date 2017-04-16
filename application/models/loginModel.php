<?php

class LoginModel extends CI_Model {

	public function validateStudent() {

		$this->db->where('student_email_id', $this->input->post('email'));
		$this->db->where('student_password', $this->input->post('password'));

		$query = $this->db->get('student');

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['usn'] = $row->usn;
				$res['username'] = $row->student_name;
				return $res;
			}
		}
		else {
			return null;
		}
	}

	public function validateFaculty() {

		$this->db->where('email_id', $this->input->post('email'));
		$this->db->where('password', $this->input->post('password'));

		$query = $this->db->get('faculty');

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['employeeID'] = $row->employee_code;
				$res['level'] = $row->level;
				$res['username'] = $row->faculty_name;
				return $res;
			}
		}
		else {
			return null;
		}
	}
	/*---
	public function getTotal() {

		$this->db->select('email');
		$query = $this->db->get('users');

		return $query->num_rows();
	} ---*/

	public function emailExist() {

		if (1 == preg_match("/^[a-zA-Z]+\.[a-zA-Z]+\.([0-9][1-9]|[1-9][0-9])@acharya\.ac\.in$/", $this->input->post('emailSendKey'))) {
			$this->db->where('student_email_id', $this->input->post('emailSendKey'));
			$query = $this->db->get('student');
		}
		else {
			$this->db->where('email_id', $this->input->post('emailSendKey'));
			$query = $this->db->get('faculty');
		}

		if($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function keyPresent() {

		$this->db->where('email', $this->input->post('emailSendKey'));
		$query = $this->db->get('forgotPasswordUsers');
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				return $row->hashKey;
			}
		}
		else {
			return null;
		}
	}

	public function addHashKey($key) {

		$data = array(
			'email' => $this->input->post('emailSendKey'),
			'hashKey' => $key
			);

		$query = $this->db->insert('forgotPasswordUsers', $data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function validateHashKey($key) {

		$this->db->where('hashKey', $key);
		$query = $this->db->get('forgotPasswordUsers');

		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteHashKey($key) {

		$this->db->select('email');
		$this->db->where('hashKey', $key);
		$query = $this->db->get('forgotPasswordUsers');
		$email = null;
		foreach ($query->result() as $row)
		{
			$email = $row->email;
		}

		if (1 == preg_match("/^[a-zA-Z]+\.[a-zA-Z]+\.([0-9][1-9]|[1-9][0-9])@acharya\.ac\.in$/", $email)) {
			$data = array('student_password' => $this->input->post('password'));
			$this->db->where('student_email_id', $email);
			$query = $this->db->update('student', $data);
		}
		else {
			$data = array('password' => $this->input->post('password'));
			$this->db->where('email_id', $email);
			$query = $this->db->update('faculty', $data);
		}

		$this->db->where('hashKey', $key);
		$query = $this->db->delete('forgotPasswordUsers');

		if($query) {
			return true;
		} else {
			return false;
		}
	}
}
?>