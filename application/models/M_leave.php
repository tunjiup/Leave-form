<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_leave extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function insertLeaveBalance($data) {
		return $this->db->insert('leavebalance',$data);
	}

	public function batchInserleave($data) {
		return $this->db->insert_batch('leavebalance',$data);
	}

	public function UpdateLeave_balance($data,$id) {
		$where = array('employee_id' => $id);
		$this->db->where($where);
		return $this->db->update('leavebalance',$data);
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

	public function checkToken($token) {
		$data = array();
		$this->db->where("token = '$token' OR code = '$token'");
		$res = $this->db->get('leavehistory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	/**
	* Get Approved Leave data
	* @param Int $id
	* @param Boolean
	*/
	public function getLeavedata($code) {
		$data = array();
		$id = $this->session->userdata('userid');
		$where = array('u.userid' => $id, 'u.active' => 1, 'l.code' => $code);
		$this->db->select('e.*, u.*, l.*');
		$this->db->from('employee e');
		$this->db->join('users u','u.employee_id = e.id');
		$this->db->join('leavehistory l', 'e.id = l.employee_id');
		$this->db->where($where);
		$res = $this->db->get();
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
		$this->db->where("token = '$token' OR code = '$token'");
		return $this->db->update('leavehistory',$data);
	}

	public function insertMoveDate($data) {
		return $this->db->insert('movedate',$data);
	}

	public function updateMoveDate($id,$update) {
		$where = array('leavecode' => $id);
		$this->db->where($where);
		return $this->db->update('movedate',$update);
	}

	public function getMoveDate($id) {
		$data = array();
		$where = array('leavecode' => $id);
		$this->db->where($where);
		$res = $this->db->get('movedate');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function getAllLeave() {
		$empid = $this->session->userdata('empid');
		$date =  date('Y-m-d');
		$enddate = date('Y-m-d', strtotime('12/31'));
		$where = array('l.employee_id' => $empid, 'l.active' => 1, 'l.classname' => Constant::CN_APPROVED, 'l.start >=' => $date, 'l.start <=' => $enddate);
		$this->db->select('l.*, m.leavecode,m.classname as mstatus');
		$this->db->from('leavehistory l');
		$this->db->join('movedate m', 'm.leavecode = l.code', 'LEFT');
		$this->db->where($where);
		$this->db->order_by('l.created_at','DESC');
		$res = $this->db->get();
		return $res->result();

	}

	public function leaveValidation() {
		$data = array();
		$where = array('employee_id' => $this->session->userdata('empid'), 'active' => 1);
		$this->db->where($where);
		$res = $this->db->get('leavehistory');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function genCSV() {
		$where = array('active' => 1, 'employee_id' => $this->session->userdata('empid'));
		$this->db->select('title,types,reason,start,end,days');
		$this->db->where($where);
		$query = $this->db->get('leavehistory');

		return $query;

	}
}
?>