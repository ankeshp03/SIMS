<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HeadProctorModel extends CI_Model {

	public function year($institute_department) {

		$this->db->select('DISTINCT(current_year)');
		$this->db->where('institute_department', $institute_department);
		$years = $this->db->get('student')->num_rows();

		for($i = 1; $i <= 4; $i++) {

			$this->db->where('current_year', $i);
			$this->db->where('institute_department', $institute_department);
			$data['year'.$i] = $this->db->count_all_results('student');
		}
		return $data;
	}

	public function studentsList($institute_department) {

		$this->db->select('student_name, usn');
		$this->db->where('institute_department', $institute_department);
		$this->db->where('current_year', $this->input->post('year'));
		$query = $this->db->get('student');

		echo "<ul style='padding-left:20%;'>";
		foreach ($query->result() as $key) {

			$this->db->where('usn', $key->usn);
			$query = $this->db->get('proctor')->num_rows();
			if($query <= 0) {
				echo "<li><input id='$key->usn' type='checkbox' name='$key->usn' class='check_list' value='$key->usn'><label for='$key->usn'>".$key->student_name."</label></li>";
			}
		}
		echo "</ul>";
	}

	public function facultiesList($institute_department) {

		$this->db->select('faculty_name, employee_code');
		$this->db->where('institute_department', $institute_department);
		$this->db->where('level', '5');
		$query = $this->db->get('faculty');

		echo "<ul style='padding-left:35%'>";
		foreach ($query->result() as $key) {
			echo "<li><input id='$key->employee_code' type='radio' class='col' name='facultyName' value='$key->employee_code'><label for='$key->employee_code'>".$key->faculty_name."</label></li>";
		}
		echo "</ul>";
	}

	public function proctorStudentAssignment($institute_department) {

		if(isset($_POST['checked_list'])) {
			foreach ($this->input->post('checked_list') as $list) {

				$data = array(
					'eid' => $this->input->post('faculty'),
					'usn' => $list,
					'current_year' => $this->input->post('year')
					);

				$query = $this->db->insert('proctor', $data);
			}
			if($query) {
				$data = array('level' => 4);
				$this->db->where('employee_code', $this->input->post('faculty'));
				$query = $this->db->update('faculty', $data);
			}
		}
	}

	public function proctorReassignment($institute_department) {

		$this->db->select('usn');
		$this->db->where('current_year', $this->input->post('year'));
		$this->db->where('institute_department', $institute_department);
		$query = $this->db->get('student');

		foreach ($query->result() as $key) {
			
			$this->db->select('eid');
			$this->db->where('usn', $key->usn);
			$query = $this->db->get('proctor')->row();

			$data = array('level' => 5);
			$this->db->where('employee_code', $query->eid);
			$this->db->update('faculty', $data);

			$this->db->where('usn', $key->usn);
			$this->db->delete('proctor');
		}
	}

	public function getHeadProctorDetails($employeeId) {

		$this->db->select('*');
		$this->db->from('faculty');
		$this->db->where('faculty.employee_code', $employeeId);
		$this->db->join('institute_department', 'faculty.institute_department = institute_department.id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['qualification'] = $row->qualification;
				$res['designation'] = $row->designation;
				$res['dob'] = $row->dob;
				$res['doj'] = $row->doj;
				$res['mobile_no'] = $row->mobile_no;
				$res['email_id'] = $row->email_id;
				$res['institution'] = $row->institution;
				$res['department'] = $row->department;
				return $res;
			}
		}
		else {
			return null;
		}
	}
}
