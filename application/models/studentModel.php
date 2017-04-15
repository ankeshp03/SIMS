<?php 

class StudentModel extends CI_Model {

	public function getStudentDetails($usn) {

		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student.usn', $usn);
		$this->db->join('institute_department', 'student.institute_department = institute_department.id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['auid'] = $row->auid;
				$res['institute'] = $row->institution;
				$res['department'] = $row->department;
				$res['dob'] = $row->date_of_birth;
				$res['email'] = $row->student_email_id;
				$res['mobile'] = $row->student_local_mobile;
				$res['permanent_address'] = $row->permanent_address;
				$res['local_address'] = $row->student_local_address;
				return $res;
			}
		}
		else {
			return null;
		}
	}

	public function getAttendance($usn) {

		$this->db->select('*');
		$this->db->where('usn', $usn);
		$result = $this->db->get('attendance');

		echo "<table class='centered striped bordered'><thead><tr><th>Subject Code</th><th>Total Days</th><th>Days Attended</th><th>Percentage</th></tr></thead><tbody>";

		foreach ($result->result() as $key) {
			echo "<tr><td>".$key->subject_code."</td>";
			echo "<td>".$key->total_days."</td>";
			echo "<td>".$key->days_attended."</td>";
			echo "<td>".$key->percentage."</td></tr>";
		}

		echo "</tbody></table>";
	}

	public function getMarks($usn) {

		$this->db->select('DISTINCT(internal)');
		$this->db->where('usn', $usn);
		$result = $this->db->get('marks');

		echo "<table class='centered striped bordered'><thead><tr><th width='25%'>Subject Code</th>";

		foreach ($result->result() as $key) {
			echo "<th>Internal ".$key->internal."</th>";
		}

		echo "</tr></thead><tbody>";

		$this->db->select('DISTINCT(subject_code)');
		$this->db->where('usn', $usn);
		$result = $this->db->get('marks');

		foreach ($result->result() as $key) {
			echo "<tr><td>".$key->subject_code."</td>";
			$this->db->select('marks');
			$this->db->where('usn', $usn);
			$this->db->where('subject_code', $key->subject_code);
			$res = $this->db->get('marks');
			foreach ($res->result() as $key) {
				echo "<td>".$key->marks."</td>";
			}
			echo "</tr>";
		}

		echo "</tbody></table>";

		/*echo "<table class='centered striped bordered'><thead><tr><th>Subject Code</th><th>Total Days</th><th>Days Attended</th><th>Percentage</th></tr></thead>";

		foreach ($result->result() as $key) {
			echo "<tr><td>".$key->subject_code."</td>";
			echo "<td>".$key->total_days."</td>";
			echo "<td>".$key->days_attended."</td>";
			echo "<td>".$key->percentage."</td></tr>";
		}*/
	}
}

?>