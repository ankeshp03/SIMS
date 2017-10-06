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
			'student_email_id' => $this->input->post('studentEmail') . "@acharya.ac.in",
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

		if($this->input->post('pan')) {
			$data['parent_pan_no'] = $this->input->post('pan');
		}

		if($this->input->post('pgExam')) {
			$data['pg_exam_name'] = $this->input->post('pgExam');
		}
		
		if($this->input->post('pgUniversity')) {
			$data['pg_university'] = $this->input->post('pgUniversity');
		}
		if($this->input->post('pgPassingYear')) {
			$data['pg_passing_year'] = $this->input->post('pgPassingYear');
		}
		if($this->input->post('pgSubject1')) {
			$data['pg_subject1'] = $this->input->post('pgSubject1');
		}

		if($this->input->post('pgSubject2')) {
			$data['pg_subject2'] = $this->input->post('pgSubject2');
		}
		
		if($this->input->post('pgSubject3')) {
			$data['pg_subject3'] = $this->input->post('pgSubject3');
		}
		if($this->input->post('pgSubject4')) {
			$data['pg_subject4'] = $this->input->post('pgSubject4');
		}
		if($this->input->post('pgSubject5')) {
			$data['pg_subject5'] = $this->input->post('pgSubject5');
		}

		if($this->input->post('pgSubject6')) {
			$data['pg_subject6'] = $this->input->post('pgSubject6');
		}
		
		if($this->input->post('pgMarksYear1')) {
			$data['pg_marks_year1'] = $this->input->post('pgMarksYear1');
		}
		if($this->input->post('pgMarksYear2')) {
			$data['pg_marks_year2'] = $this->input->post('pgMarksYear2');
		}
		if($this->input->post('pgMarksYear3')) {
			$data['pg_marks_year3'] = $this->input->post('pgMarksYear3');
		}
		if($this->input->post('pgMarksYear4')) {
			$data['pg_marks_year4'] = $this->input->post('pgMarksYear4');
		}

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
				<div class='col s6'>
				<span>$key->student_name</span>
				</div>
				<div class='col s6'>
				<span>$key->auid</span>
				</div>
				<div class='col s1 student-div'>
				<button class='btn-floating waves-effect' onclick='toggleDialogue(\"#$key->auid-dialogue\", \"#$key->auid\")'>
				<i class='material-icons'>more_vert</i>
				</button>
				<div id='$key->auid-dialogue' class='dialogue-box'>
				<a class='view-details' onclick='viewDetails(\"$key->auid\", \"$key->student_name\", \"student\")' href='#'>View Details</a>
				<a class='edit-details' onclick='editDetails(\"$key->auid\", \"$key->student_name\", \"student\")' href='#'>Edit Details</a>
				<a class='remove-details' onclick='removeDetails(\"$key->auid\", \"$key->student_name\", \"student\")' href='#'>Remove</a>
				</div>
				</div>
				</div>";
			}
		}
		else {

			echo "No Recent Admissions!";
		}
	}

	public function recentFacultyRegistrations() {

		$this->db->select('*');
		$this->db->order_by('doj', 'DESC');
		$this->db->limit('4');
		$result = $this->db->get('faculty');
		if($result->num_rows() > 0) {

			foreach ($result->result() as $key) {

				echo "
				<div id='$key->employee_code' class='faculty-div row'>
				<div class='col s6'>
				<span>$key->faculty_name</span>
				</div>
				<div class='col s6'>
				<span>$key->employee_code</span>
				</div>
				<div class='col s1 student-div'>
				<button class='btn-floating waves-effect' onclick='toggleDialogue(\"#$key->employee_code-dialogue\", \"#$key->employee_code\")'>
				<i class='material-icons'>more_vert</i>
				</button>
				<div id='$key->employee_code-dialogue' class='dialogue-box'>
				<a class='view-details' onclick='viewDetails(\"$key->employee_code\", \"$key->faculty_name\", \"faculty\")' href='#'>View Details</a>
				<a class='edit-details' onclick='editDetails(\"$key->employee_code\", \"$key->faculty_name\", \"faculty\")' href='#'>Edit Details</a>
				<a class='remove-details' onclick='removeDetails(\"$key->employee_code\", \"$key->faculty_name\", \"faculty\")' href='#'>Remove</a>
				</div>
				</div>
				</div>";
			}
		}
		else {

			echo "No Recent Registrations!";
		}
	}

	public function getStudentDetails() {
		
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student.auid', $this->input->post('id'));
		$this->db->join('institute_department', 'student.institute_department = institute_department.id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {

			$path = "assets/images/students/".$query->row()->usn.'.';
			$ext = array("jpg", "jpeg", "png");
			for($x = 0; $x < 3; $x++) {
				$temp = $path.$ext[$x];
				if(file_exists($temp)) {
					$path = $temp;
				}
			}

			echo '
			<div class="modal-row container">
			<div class="row center">
			<img src="'.base_url().$path.'" class="user-img"/>
			</div>
			<div class="row">
			<div class="col s12">
			Applicant’s Personal Information
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Name
			</div>
			<div class="col s7">
			' . $query->row()->student_name . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			AUID
			</div>
			<div class="col s7">
			' . $query->row()->auid . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			USN
			</div>
			<div class="col s7">
			' . $query->row()->usn . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Institution
			</div>
			<div class="col s7">
			' . $query->row()->institution . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Department
			</div>
			<div class="col s7">
			' . $query->row()->department . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Admission
			</div>
			<div class="col s7">
			' . $query->row()->date_of_admission . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Gender
			</div>
			<div class="col s7">
			' . $query->row()->gender . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Nationality
			</div>
			<div class="col s7">
			' . $query->row()->nationality . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Birth
			</div>
			<div class="col s7">
			' . $query->row()->date_of_birth . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Permanent Address
			</div>
			<div class="col s7">
			' . $query->row()->permanent_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Correspondance Address
			</div>
			<div class="col s7">
			' . $query->row()->correspondence_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Student Email ID
			</div>
			<div class="col s7">
			' . $query->row()->student_email_id . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Student Mobile
			</div>
			<div class="col s7">
			' . $query->row()->student_mobile . '
			</div>
			</div>
			<div class="row">
			<div class="col s12">
			Category
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			SC/ST or BC/BT
			</div>
			<div class="col s7">
			';
			if($query->row()->category) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			NRI/Foreign National
			</div>
			<div class="col s7">
			';
			if($query->row()->nri_or_foreign_national) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s12">
			Parent / Guardian Information
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			' . $query->row()->parent_guardian . ' Name
			</div>
			<div class="col s7">
			' . $query->row()->parent_name . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Occupation
			</div>
			<div class="col s7">
			' . $query->row()->parent_occupation . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Designation
			</div>
			<div class="col s7">
			' . $query->row()->parent_designation . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Office Address
			</div>
			<div class="col s7">
			' . $query->row()->parent_office_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Email ID
			</div>
			<div class="col s7">
			';
			if($query->row()->parent_email) {
				echo $query->row()->parent_email;
			}
			else {
				echo 'No Data';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Mobile No
			</div>
			<div class="col s7">
			' . $query->row()->parent_mobile . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			PAN No
			</div>
			<div class="col s7">
			';
			if($query->row()->parent_pan_no) {
				echo $query->row()->parent_pan_no;
			}
			else {
				echo 'No Data';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s12">
			Additional Info
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Local Address
			</div>
			<div class="col s7">
			' . $query->row()->student_local_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Student Local Mobile
			</div>
			<div class="col s7">
			' . $query->row()->student_local_mobile . '
			</div>
			</div>
			<div class="row">
			<div class="col s12">
			Academic Information
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th Board or University Name
			</div>
			<div class="col s7">
			' . $query->row()->tenth_board . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th College Name
			</div>
			<div class="col s7">
			' . $query->row()->tenth_school . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th Maximum Marks
			</div>
			<div class="col s7">
			' . $query->row()->tenth_max_marks . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th Total Marks Scored
			</div>
			<div class="col s7">
			' . $query->row()->tenth_marks . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th Percentage
			</div>
			<div class="col s7">
			' . $query->row()->tenth_percentage . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			12th Board or University Name
			</div>
			<div class="col s7">
			' . $query->row()->twelve_board . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			12th College Name
			</div>
			<div class="col s7">
			' . $query->row()->twelve_school . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			12th Maximum Marks
			</div>
			<div class="col s7">
			' . $query->row()->twelve_max_marks . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			12th Total Marks Scored
			</div>
			<div class="col s7">
			' . $query->row()->twelve_marks . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			12th Percentage
			</div>
			<div class="col s7">
			' . $query->row()->twelve_percentage . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Entrance/Qualfifying Exam
			</div>
			<div class="col s7">
			' . $query->row()->entrance_exam . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			State
			</div>
			<div class="col s7">
			' . $query->row()->entrance_state . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Year
			</div>
			<div class="col s7">
			' . $query->row()->entrance_year . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Score
			</div>
			<div class="col s7">
			' . $query->row()->entrance_score . '
			</div>
			</div>
			';
			if($query->row()->pg_exam_name) {
				echo '
				<div class="row">
				<div class="col s12">
				P G Admission
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Name of the exam passed
				</div>
				<div class="col s7">
				' . $query->row()->pg_exam_name . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				University
				</div>
				<div class="col s7">
				' . $query->row()->pg_university . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Year of Passing
				</div>
				<div class="col s7">
				' . $query->row()->pg_passing_year . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 1
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject1 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 2
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject2 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 3
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject3 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 4
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject4 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 5
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject5 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				Subject 6
				</div>
				<div class="col s7">
				' . $query->row()->pg_subject6 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				1st Year
				</div>
				<div class="col s7">
				' . $query->row()->pg_marks_year1 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				2nd Year
				</div>
				<div class="col s7">
				' . $query->row()->pg_marks_year2 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				3rd Year
				</div>
				<div class="col s7">
				' . $query->row()->pg_marks_year3 . '
				</div>
				</div>
				<div class="row">
				<div class="col s5">
				4th Year
				</div>
				<div class="col s7">
				' . $query->row()->pg_marks_year4 . '
				</div>
				</div>
				';
			}
			echo '
			<div class="row">
			<div class="col s12">
			Enclosures
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Marks Cards of 10+2
			</div>
			<div class="col s7">
			';
			if($query->row()->puc) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			10th Std. Certificate
			</div>
			<div class="col s7">
			';
			if($query->row()->sslc) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Transfer Certificate
			</div>
			<div class="col s7">
			';
			if($query->row()->tc) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Conduct Certificate
			</div>
			<div class="col s7">
			';
			if($query->row()->conduct_certificate) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Migration Certificate
			</div>
			<div class="col s7">
			';
			if($query->row()->migration_certificate) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Entrance Exam Score Card
			</div>
			<div class="col s7">
			';
			if($query->row()->entrance_scorecard) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Category Certificate (SC/ST or BC/BT)
			</div>
			<div class="col s7">
			';
			if($query->row()->category_certificate) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Copy of Passport
			</div>
			<div class="col s7">
			';
			if($query->row()->nri_or_foreign_certificate) {
				echo 'Yes';
			}
			else {
				echo 'No';
			}
			echo '
			</div>
			</div>
			<div class="row">
			<div class="col s12">
			Fee Details
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Amount Paid
			</div>
			<div class="col s7">
			' . $query->row()->total_amt . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Receipt No
			</div>
			<div class="col s7">
			' . $query->row()->receipt_no . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Fee Paid Date
			</div>
			<div class="col s7">
			' . $query->row()->fees_paid_date . '
			</div>
			</div>
			</div>
			';
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

			$path = "assets/images/faculties/".$query->row()->employee_code.'.';
			$ext = array("jpg", "jpeg", "png");
			for($x = 0; $x < 3; $x++) {
				$temp = $path.$ext[$x];
				if(file_exists($temp)) {
					$path = $temp;
				}
			}

			if($query->row()->level == "1") {
				$level = "Admin";
			}
			else if($query->row()->level == "2") {
				$level = "HoD";
			}
			else if($query->row()->level == "3") {
				$level = "Head Proctor";
			}
			else if($query->row()->level == "4") {
				$level = "Proctor";
			}
			else if($query->row()->level == "5") {
				$level = "Faculty";
			}
			
			echo '
			<div class="modal-row container">
			<div class="row center">
			<img src="'.base_url().$path.'" class="user-img"/>
			</div>
			<div class="row" style="margin-top:20px;">
			<div class="col s5">
			Employee ID
			</div>
			<div class="col s7">
			' . $query->row()->employee_code . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Name
			</div>
			<div class="col s7">
			' . $query->row()->faculty_name . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Qualification
			</div>
			<div class="col s7">
			' . $query->row()->qualification . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Designation
			</div>
			<div class="col s7">
			' . $query->row()->designation . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Institution
			</div>
			<div class="col s7">
			' . $query->row()->institution . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Department
			</div>
			<div class="col s7">
			' . $query->row()->department . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Birth
			</div>
			<div class="col s7">
			' . $query->row()->dob . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Joining
			</div>
			<div class="col s7">
			' . $query->row()->doj . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Employee Type
			</div>
			<div class="col s7">
			' . $level . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Mobile No.
			</div>
			<div class="col s7">
			' . $query->row()->mobile_no . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Email ID
			</div>
			<div class="col s7">
			' . $query->row()->email_id . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Permanent Address
			</div>
			<div class="col s7">
			' . $query->row()->permanent_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Current Address
			</div>
			<div class="col s7">
			' . $query->row()->current_address . '
			</div>
			</div>
			</div>
			';
		}
		else {
			return null;
		}
	}

	public function editFacultyDetails() {

		$this->db->select('*');
		$this->db->from('faculty');
		$this->db->where('faculty.employee_code', $this->input->post('id'));
		$this->db->join('institute_department', 'faculty.institute_department = institute_department.id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {

			$path = "assets/images/faculties/".$query->row()->employee_code.'.';
			$ext = array("jpg", "jpeg", "png");
			for($x = 0; $x < 3; $x++) {
				$temp = $path.$ext[$x];
				if(file_exists($temp)) {
					$path = $temp;
				}
			}

			if($query->row()->level == "1") {
				$level = "Admin";
			}
			else if($query->row()->level == "2") {
				$level = "HoD";
			}
			else if($query->row()->level == "3") {
				$level = "Head Proctor";
			}
			else if($query->row()->level == "4") {
				$level = "Proctor";
			}
			else if($query->row()->level == "5") {
				$level = "Faculty";
			}
	
			echo '
			<div class="modal-row container">
			<div class="row center">
			<img src="'.base_url().$path.'" class="user-img"/>
			</div>
			<div class="row" style="margin-top:20px;">
			<div class="col s5">
			Employee ID
			</div>
			<div class="col s7">
			' . $query->row()->employee_code . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Name
			</div>
			<div class="col s7">
			' . $query->row()->faculty_name . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Qualification
			</div>
			<div class="col s7">
			' . $query->row()->qualification . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Designation
			</div>
			<div class="col s7">
			' . $query->row()->designation . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Institution
			</div>
			<div class="col s7">
			' . $query->row()->institution . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Department
			</div>
			<div class="col s7">
			' . $query->row()->department . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Birth
			</div>
			<div class="col s7">
			' . $query->row()->dob . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Date of Joining
			</div>
			<div class="col s7">
			' . $query->row()->doj . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Employee Type
			</div>
			<div class="col s7">
			' . $level . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Mobile No.
			</div>
			<div class="col s7">
			' . $query->row()->mobile_no . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Email ID
			</div>
			<div class="col s7">
			' . $query->row()->email_id . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Permanent Address
			</div>
			<div class="col s7">
			' . $query->row()->permanent_address . '
			</div>
			</div>
			<div class="row">
			<div class="col s5">
			Current Address
			</div>
			<div class="col s7">
			' . $query->row()->current_address . '
			</div>
			</div>
			</div>
			';
		}
	}

	public function removeStudentDetails() {
		$this->db->delete('student', array('auid' => $this->input->post('id'), 'student_name'=> $this->input->post('name')));
		if($this->db->affected_rows('student') > 0) {
			echo "Done";
		}
		else {
			echo "Not Done";
		}
	}

	public function removeFacultyDetails() {
		$this->db->delete('faculty', array('employee_code' => $this->input->post('id'), 'faculty_name'=> $this->input->post('name')));
		if($this->db->affected_rows('faculty') > 0) {
			echo "Done";
		}
		else {
			echo "Not Done";
		}
	}
}

?>