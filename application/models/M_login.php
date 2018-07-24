<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* Insert loin activity data
	* @param String $username date
	* @return Boolean
	*/
	public function insert_logs($data) {
		return $this->db->insert('login_history',$data);
	}

	/**
	* Insert activity logs data
	* @param String
	* @return Boolean
	*/
	public function activityLogs($data) {
		return $this->db->insert('activity_logs',$data);
	}

	public function updateLogin_logs($data) {
		$where = array('username' => $this->session->userdata('uname'), 'logout_date' => NULL);
		$this->db->where($where);
		return $this->db->update('login_history',$data);
	}

	/**
	* Get Data
	* @param String $username
	* @return String User's Details
	*/
	public function getUserDetails($username) {
		$data = array();
		$this->db->select('e.*, u.*');
		$this->db->from('employee e');
		$this->db->join('users u','u.employee_id = e.id');
		$this->db->where("u.username = '$username' OR e.name = '$username'");
		$res = $this->db->get();
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}
	
	/**
	* Update User for online
	* @param Int $id
	* @return Boolean
	*/
	public function getOnline($id) {
		$where = array('userid' => $id);
		$data = array('active' => 1);
		$this->db->where($where);
		return $this->db->update('users',$data);
	}

	/**
	* Update User for Offline
	* @param Int $id
	* @return Boolean
	*/
	public function getOffline($id) {
		$where = array('userid' => $id);
		$data = array('active' => 0);
		$this->db->where($where);
		return $this->db->update('users',$data);
	}

	/**
	* Check Email if Existed
	* @param String $email
	* @return Boolean
	*/
	public function checkEmail($email) {
		$data = array();
		$q = $this->db->get_where('users', array('email' => $email), 1);
		if ($q->num_rows() > 0) {
			$data = $q->row_array();
		}
		$q->free_result();
		return $data;
	}

	/**
	* Update Data
	* @param Int $id
	* @param String $code
	* @return True
	*/
	public function updateData($data,$code) {
		$this->db->where("userid = '$code' OR resetpasskey = '$code'");
		return $this->db->update('users',$data);
	}

	/**
	* Check Code if Existing then count if exist
	* @param Int $code
	* @return Int
	*/
	public function checkCode($code) {
		$where = array('resetpasskey' => $code);
		$data = array();
		$this->db->where($where);
		$q = $this->db->get('users');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();
		}
		$q->free_result();
		return $data;
	}

}
?>