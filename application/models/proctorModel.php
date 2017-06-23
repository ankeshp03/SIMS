<?php 
class ProctorModel extends CI_Model{

	public function year($institute_department) {

		$this->db->select('DISTINCT(year)');
		$this->db->where('institute_department', $institute_department);
		$years = $this->db->get('student')->num_rows();

		for($i = 1; $i <= 4; $i++) {

			$this->db->where('year', $i);
			$this->db->where('eid', $this->session->userdata('employeeID'));
			$data['year'.$i] = $this->db->count_all_results('proctor');
		}
		return $data;
	}

// returns data of students attendance 
	public function fetchdata()
	{
		$this->db->select("usn, subject_code, total_days, days_attended");
		$this->db->from("attendance");
		$q = $this->db->get();
		return $q->result();
		
	}

// returns data of students marks
	public function getMarks()
	{
		$this->db->select("usn, subject_code, internal, marks");
		$this->db->from("marks");
		$q = $this->db->get();
		return $q->result();
	}

	public function studentInProctorDb($institute_department, $year)
	{
		/*$this->db->select("student_name, usn");
		$this->db->from("student");
		$this->db->where("institute_department", $institute_department);
		$this->db->where("year", $year);
		$query = $this->db->get();
		return $query->result();*/

		$this->db->select("student.usn, student.student_name");
		$this->db->from('student');
		$this->db->join('proctor', 'student.usn = proctor.usn');
		$this->db->where("eid", $this->session->userdata('employeeID'));
		$query = $this->db->get();
		return $query->result();
	}

	public function personalInformationMethod()
	{
		$this->db->select("usn, student_name, parent_name, auid, student_email_id, student_local_mobile, student_local_address");
		$this->db->from("student");
		$query = $this->db->get();

		return $query->result();
	}

	public function getProctorDetails($employeeId) {

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