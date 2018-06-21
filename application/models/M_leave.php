<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_leave extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* Get Data
	* @param String $username
	* @return String User's Details
	*/
	public function insertLeave($data) {
		return $this->db->insert('leavehistory',$data);
	}

	public function getTrackCode($code) {
		$where = array('code' => $code);
		$this->db->where($where);
		return $this->db->count_all_results('leavehistory');
	}

	public function getManagerEmail($name) {
		$data = array();
		$where = array('e.name' => $name);
		$this->db->select('e.*, u.*');
		$this->db->from('employee e');
		$this->db->join('users u','u.employee_id = e.id');
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function checkToken($token) {
		$data = array();
		$where = array('token' => $token);
		$this->db->where($where);
		$res = $this->db->get('leavehistory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function getEmployeesEmail($empid) {
		$data = array();
		$where = array('employee_id' => $empid);
		$this->db->where($where);
		$res = $this->db->get('users');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function updateLeaveHistory($token,$data) {
		$where = array('token' => $token);
		$this->db->where($where);
		return $this->db->update('leavehistory',$data);
	}
}
?>