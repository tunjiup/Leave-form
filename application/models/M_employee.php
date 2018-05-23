<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_employee extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* Get Leave Balance
	* @return String
	* @return Int
	*/
	public function getLeave() {

		$this->db->select('e.name, l.vacationleave, l.sickleave, l.birthleave, u.username');
		$this->db->from('employee e');
		$this->db->join('leavebalance l','l.employee_id = e.id');
		$this->db->join('users u','u.employee_id = e.id');
		$res = $this->db->get();
		return $res->result();

	}

	/**
	* Get Birthday of the month
	* @return String
	* @return Date
	*/
	public function getdob() {

		$this->db->where('MONTH(dob) = MONTH(NOW())');
		$res = $this->db->get('employee');
		return $res->result();

	}

	/**
	* Get Event
	* @param Date
	* @return String
	*/
	public function getEvents($start, $end) {

		$where = array('start >=' => $start, 'end <=' => $end);
		$this->db->select('u.username, l.*');
		$this->db->from('users u');
		$this->db->join('leavehistory l','u.employee_id = l.employee_id');
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