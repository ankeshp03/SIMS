<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HeadProctorModel extends CI_Model {

	public function year($institute_department) {

		$this->db->select('DISTINCT(year)');
		$this->db->where('institute_department', $institute_department);
		$years = $this->db->get('student')->num_rows();

		for($i = 1; $i <= $years; $i++) {

			$this->db->where('year', $i);
			$this->db->where('institute_department', $institute_department);
			$data['year'.$i] = $this->db->count_all_results('student');
		}
		return $data;
	}

	public function studentsList($institute_department) {

		$this->db->select('student_name, usn');
		$this->db->where('institute_department', $institute_department);
		$this->db->where('year', $this->input->post('year'));
		$query = $this->db->get('student');

		foreach ($query->result() as $key) {

			echo "<input id='$key->usn' type='checkbox' name='$key->usn' value='$key->usn'><label for='$key->usn'>".$key->student_name."</label>";
		}
	}

	public function facultiesList($institute_department) {

		$this->db->select('faculty_name, employee_code');
		$this->db->where('institute_department', $institute_department);
		$query = $this->db->get('faculty');

		foreach ($query->result() as $key) {
			echo "<div class='row'><div class='col s12'>";
			echo "<input id='$key->employee_code' type='radio' class='col' name='$key->employee_code' value='$key->employee_code'><label for='$key->employee_code'>".$key->faculty_name."</label>";
			echo "</div></div>";
		}
	}
}
