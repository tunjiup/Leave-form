<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_employee extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function insertNew($data) {
		return $this->db->insert('employee',$data);
	}

	/**
	* Get Leave Balance
	* @return String
	* @return Int
	*/
	public function getLeave($dept) {
		$where = array('e.department' => $dept);
		$this->db->select('e.name, l.vacationleave, l.sickleave, l.birthleave, u.username, e.id, u.active');
		$this->db->from('employee e');
		$this->db->join('leavebalance l','l.employee_id = e.id');
		$this->db->join('users u','u.employee_id = e.id');
		$this->db->where($where);
		$res = $this->db->get();
		return $res->result();

	}

	public function getEmployeesData($id) {
		$data = array();
		$where = array('employee_id' => $id);
		$this->db->where($where);
		$res = $this->db->get('users');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function vacationLeaveBalance($total) {
		$where = array('employee_id' => $this->session->userdata('empid'));
		$data = array('vacationleave' => $total);
		$this->db->where($where);
		return $this->db->update('leavebalance',$data);
	}

	public function sickLeaveBalance($total) {
		$where = array('employee_id' => $this->session->userdata('empid'));
		$data = array('sickleave' => $total);
		$this->db->where($where);
		return $this->db->update('leavebalance',$data);
	}

	public function birthdayLeave() {
		$where = array('employee_id' => $this->session->userdata('empid'));
		$data = array('birthleave' => 0);
		$this->db->where($where);
		return $this->db->update('leavebalance',$data);
	}

	/**
	* @param Int Employee Id
	* @return Boolean
	*/
	public function getMyleave() {
		$data = array();
		$where = array('employee_id' => $this->session->userdata('empid'));
		$this->db->where($where);
		$res = $this->db->get('leavebalance');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	/**
	* Get Birthday of the month
	* @return String
	* @return Date
	*/
	public function getdob($dept) {

		$this->db->where("MONTH(dob) = MONTH(NOW()) AND department = '$dept'");
		$this->db->order_by('DAY(dob)', 'ASC');
		$res = $this->db->get('employee');
		return $res->result();

	}

	public function getRejected() {

		$where = array('employee_id' => $this->session->userdata('empid'));
		$this->db->where($where);
		$res = $this->db->get('leavehistory');
		return $res->result();

	}

	/**
	* Get Event
	* @param Date
	* @return String
	*/
	public function getEvents($start, $end, $dept) {

		$where = array('l.start >=' => $start, 'l.end <=' => $end, 'e.department' => $dept, 'l.active' => 1);
		$this->db->select('u.username, l.*');
		$this->db->from('users u');
		$this->db->join('leavehistory l','u.employee_id = l.employee_id','LEFT');
		$this->db->join('employee e','u.employee_id = e.id','LEFT');
		$this->db->where($where);
		$res = $this->db->get();
		return $res->result();

	}

	/**
	* Insert Event
	*/
	public function addEvents() {

		return $this->db->insert('leavehistory',$data);

	}

	/**
	* Update Event
	* @param Int $id
	*/
	public function updateEvents($id) {

		$this->db->where('id',$id);
		return $this->db->update('leavehistory',$data);

	}

}
?>