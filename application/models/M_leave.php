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
}
?>