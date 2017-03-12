<?php 

class Samplem extends CI_Model
{
	public function modeldata()
	{
		$a=array(
			'name'=>$this->input->post('name'),
			'usn'=>$this->input->post('usn'),
			'dob'=>$this->input->post('dob')
			);
		$query=$this->db->insert('stureg',$a);
	if ($query)
				return true;
			else
				return false;	
		}
		public function getdata1()
		{
			$this->db->select("name,usn,dob");
			$this->db->from("stureg");
			$query1=$this->db->get();
			return $query1->result();
		}

	}
