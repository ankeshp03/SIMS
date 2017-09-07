<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	//the data passed comes here and they are store in the array and passed to the insert function so that it can be added in the database
	public function addStudent() {

		$this->db->select('id');
		$this->db->where('institution', $this->input->post('institution'));
		$this->db->where('department', $this->input->post('department'));
		$res = $this->db->get('institute_department');

		foreach ($res->result() as $key) {
			$institute_department_id = $key->id;
		}

		$data = array(
			'student_name' => $this->input->post('studentName'),
			'auid' => $this->input->post('auid'),
			'usn' => $this->input->post('usn'),
			'institute_department' => $institute_department_id,
			'date_of_admission' => $this->input->post('doa'),
			'gender' => $this->input->post('gender'),
			'nationality' => $this->input->post('nationality'),
			'date_of_birth' => $this->input->post('dob'),
			'permanent_address' => $this->input->post('permanentAddress'),
			'correspondence_address' => $this->input->post('correspondanceAddress'),
			'student_email_id' => $this->input->post('studentEmail'),
			'student_password' => hash ( "sha256", strtolower($this->input->post('usn'))),
			'student_mobile' => $this->input->post('studentMobile'),
			'category' => $this->input->post('category'),
			'nri_or_foreign_national' => $this->input->post('nriForeign'),
			'parent_guardian' => $this->input->post('parentType'),
			'parent_name' => $this->input->post('parentName'),
			'parent_occupation' => $this->input->post('parentOccupation'),
			'parent_designation' => $this->input->post('parentDesignation'),
			'parent_office_address' => $this->input->post('officeAddress'),
			'parent_email' => $this->input->post('parentEmail'),
			'parent_mobile' => $this->input->post('parentMobile'),
			'parent_pan_no' => $this->input->post('pan'),
			'student_local_address' => $this->input->post('localAddress'),
			'student_local_mobile' => $this->input->post('studentLocalMobile'),
			'tenth_board' => $this->input->post('tenthBoard'),
			'twelve_board' => $this->input->post('twelveBoard'),
			'tenth_school' => $this->input->post('tenthSchool'),
			'twelve_school' => $this->input->post('twelveSchool'),
			'tenth_max_marks' => $this->input->post('tenthMaxMarks'),
			'twelve_max_marks' => $this->input->post('twelveMaxMarks'),
			'tenth_marks' => $this->input->post('tenthMarks'),
			'twelve_marks' => $this->input->post('twelveMarks'),
			'tenth_percentage' => $this->input->post('tenthPercentage'),
			'twelve_percentage' => $this->input->post('twelvePercentage'),
			'entrance_exam' => $this->input->post('entranceExam'),
			'entrance_state' => $this->input->post('entranceState'),
			'entrance_year' => $this->input->post('entranceYear'),
			'entrance_score' => $this->input->post('entranceScore'),
			'pg_exam_name' => $this->input->post('pgExam'),
			'pg_university' => $this->input->post('pgUniversity'),
			'pg_passing_year' => $this->input->post('pgPassingYear'),
			'pg_subject1' => $this->input->post('pgSubject1'),
			'pg_subject2' => $this->input->post('pgSubject2'),
			'pg_subject3' => $this->input->post('pgSubject3'),
			'pg_subject4' => $this->input->post('pgSubject4'),
			'pg_subject5' => $this->input->post('pgSubject5'),
			'pg_subject6' => $this->input->post('pgSubject6'),
			'pg_marks_year1' => $this->input->post('pgMarksYear1'),
			'pg_marks_year2' => $this->input->post('pgMarksYear2'),
			'pg_marks_year3' => $this->input->post('pgMarksYear3'),
			'pg_marks_year4' => $this->input->post('pgMarksYear4'),
			'puc' => $this->input->post('pucCertificate'),
			'sslc' => $this->input->post('sslcCertificate'),
			'tc' => $this->input->post('tc'),
			'conduct_certificate' => $this->input->post('conductCertificate'),
			'migration_certificate' => $this->input->post('migrationCertificate'),
			'entrance_scorecard' => $this->input->post('entranceScorecard'),
			'category_certificate' => $this->input->post('categoryCertificate'),
			'nri_or_foreign_certificate' => $this->input->post('nriForeignCertificate'),
			'total_amt' => $this->input->post('totalAmount'),
			'receipt_no' => $this->input->post('receiptNo'),
			'fees_paid_date' => $this->input->post('feePaidDate')
			);

		//variable query has the query for inserting data
		$query = $this->db->insert('student', $data);

		//if the query is executed then it returns true
		if ($query)
			return true;
		else
			return false;
	}

	public function addFaculty() {

		$this->db->select('id');
		$this->db->where('institution', $this->input->post('institution'));
		$this->db->where('department', $this->input->post('department'));
		$res = $this->db->get('institute_department');

		foreach ($res->result() as $key) {
			$institute_department_id = $key->id;
		}

		$data = array(
			'employee_code' => $this->input->post('employeeId'),
			'faculty_name' => $this->input->post('name'),
			'qualification' => $this->input->post('qualification'),
			'designation' => $this->input->post('designation'),
			'dob' => $this->input->post('dob'),
			'doj' => $this->input->post('doj'),
			'level' => $this->input->post('employeeLevel'),
			'mobile_no' => $this->input->post('employeeMobile'),
			'email_id' => $this->input->post('email') . "@acharya.ac.in",
			'permanent_address' => $this->input->post('permanentAddress'),
			'current_address' => $this->input->post('currentAddress'),
			'password' => hash ( "sha256", strtolower($this->input->post('employeeId'))),
			'institute_department' => $institute_department_id
			);

		//variable query has the query for inserting data
		$query = $this->db->insert('faculty', $data);

		//if the query is executed then it returns true
		if ($query)
			return true;
		else
			return false;	
	}

	public function getInstitute() {

		$this->db->select('institution');
		$this->db->group_by('institution');
		$result = $this->db->get('institute_department');

		echo "<option value='select' disabled selected>select</option>";

		foreach ($result->result() as $key) {
			echo "<option value='$key->institution'>".$key->institution."</option>";
		}
	}

	public function getDepartment() {

		$this->db->select('department');
		$this->db->where('institution', $this->input->post('institution'));
		$result = $this->db->get('institute_department');

		echo "<option disabled selected>select</option>";

		foreach ($result->result() as $key) {
			echo "<option value='$key->department'>".$key->department."</option>";
		}
	}

	public function AUIDexist() {

		$this->db->where('auid', $this->input->post('auid'));
		$query = $this->db->get('student');

		if($query->num_rows() > 0) {
			echo "AUID already exists!";
		}
		else {
			echo "no";
		}
	}

	public function USNexist($val) {

		$this->db->where('usn', $this->input->post('usn'));
		$query = $this->db->get('student');

		if($query->num_rows() > 0) {
			if($val == '1') {
				return 0;
			}
			else {
				echo "USN already exists!";
			}
		}
		else {
			if($val == '1') {
				return 1;
			}
			else {
				echo "no";
			}
		}
	}

	public function employeeIdExist($val) {

		$this->db->where('employee_code', $this->input->post('employeeId'));
		$query = $this->db->get('faculty');

		if($query->num_rows() > 0) {
			if($val == '1') {
				return 0;
			}
			else {
				echo "Employee Id already exists!";
			}
		}
		else {
			if($val == '1') {
				return 1;
			}
			else {
				echo "no";
			}
		}
	}

	public function Emailexist() {

		if($this->input->post('user') == "student") {
			$this->db->where('student_email_id', $this->input->post('email'));
			$query = $this->db->get('student');
		}
		else if($this->input->post('user') == "faculty") {
			$this->db->where('email_id', $this->input->post('email'));
			$query = $this->db->get('faculty');
		}

		if($query->num_rows() > 0) {
			echo "yes";
		}
		else {
			echo "no";
		}
	}

	public function getAdminDetails($employeeId) {

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

	public function recentStudentAdmissions() {

		$this->db->select('*');
		$this->db->order_by('date_of_admission', 'DESC');
		$this->db->limit('4');
		$result = $this->db->get('student');
		if($result->num_rows() > 0) {

			foreach ($result->result() as $key) {

				echo "
				<div id='$key->auid' class='student-div row'>
					<div class='col s5'>
						<span>$key->student_name</span>
					</div>
					<div class='col s5'>
						<span>$key->auid</span>
					</div>
					<div class='col s1 student-div'>
						<button class='btn-floating waves-effect' onclick='toggleDialogue(\"#$key->auid-dialogue\", \"#$key->auid\")'>
							<i class='material-icons'>more_vert</i>
						</button>
						<div id='$key->auid-dialogue' class='dialogue-box'>
							<a class='view-details' onclick='viewDetails(\"$key->auid\", \"$key->student_name\", \"student\")' href='#'>View Details</a>
							<a href='#'>Edit Details</a>
							<a href='#'>Remove</a>
						</div>
					</div>
				</div>";
			}
		}
		else {

			echo "<div class='noData'><span>No Recent Admissions!</span></div>";
		}
	}

	public function recentFacultyRegistrations() {

		$this->db->select('*');
		$this->db->order_by('doj', 'DESC');
		$this->db->limit('4');
		$result = $this->db->get('faculty');
		if($result->num_rows()>0) {

			foreach ($result->result() as $key) {

				echo "
				<div id='$key->employee_code' class='faculty-div row'>
					<div class='col s5'>
						<span>$key->faculty_name</span>
					</div>
					<div class='col s5'>
						<span>$key->employee_code</span>
					</div>
					<div class='col s1 student-div'>
						<button class='btn-floating waves-effect' onclick='toggleDialogue(\"#$key->employee_code-dialogue\", \"#$key->employee_code\")'>
							<i class='material-icons'>more_vert</i>
						</button>
						<div id='$key->employee_code-dialogue' class='dialogue-box'>
							<a class='view-details' onclick='viewDetails(\"$key->employee_code\", \"$key->faculty_name\", \"faculty\")' href='#'>View Details</a>
							<a href='#'>Edit Details</a>
							<a href='#'>Remove</a>
						</div>
					</div>
				</div>";
			}
		}
		else {

			echo "<div class='noData'><span>No Recent Registrations!</span></div>";
		}
	}

	public function getStudentDetails() {
		
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student.auid', $this->input->post('id'));
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
			}
			echo $res['institute'] . " " . $res['email'];
		}
		else {
			return null;
		}
	}

	public function getFacultyDetails() {

		$this->db->select('*');
		$this->db->from('faculty');
		$this->db->where('faculty.employee_code', $this->input->post('id'));
		$this->db->join('institute_department', 'faculty.institute_department = institute_department.id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			foreach ($query->result() as $row)
			{
				$res['empid'] = $row->employee_code;
				$res['name'] = $row->faculty_name;
				$res['qualification'] = $row->qualification;
				$res['designation'] = $row->designation;
				$res['institution'] = $row->institution;
				$res['department'] = $row->department;
				$res['dob'] = $row->dob;
				$res['doj'] = $row->doj;
				// $res['type'] = $row->type;
				$res['mobile_no'] = $row->mobile_no;
				$res['email_id'] = $row->email_id;
				$res['permanentAddress'] = $row->permanent_address;
				$res['currentAddress'] = $row->current_address;
			}
			echo '
			<div class="input-field col s12">
				<table cellpadding="10">
					<tr>
						<div class="row">
							<th class="col s4">
								Employee ID
							</th>
							<td class="col s8">
								' . $res["empid"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4">
								Name
							</th>
							<td class="col s8">
								' . $res["name"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4">
								Date of Birth
							</th>
							<td class="col s8">
								' . $res["dob"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4">
								Mobile No.
							</th>
							<td class="col s8">
								' . $res["mobile_no"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4 m3">
								Date of Joining
							</th>
							<td class="col s8 m9">
								' . $res["doj"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4 m3">
								Email ID
							</th>
							<td class="col s8 m9">
								' . $res["email_id"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4 m3">
								Institute
							</th>
							<td class="col s8 m9">
								' . $res["institution"] . '
							</td>
						</div>
					</tr>
					<tr>
						<div class="row">
							<th class="col s4 m3">
								Department
							</th>
							<td class="col s8 m9">
								' . $res["department"] . '
							</td>
						</div>
					</tr>
				</table>
			</div>
			';
		}
		else {
			return null;
		}
	}
}

?>