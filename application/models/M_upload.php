<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_upload extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* Insert Batch data
	* @param String
	* @return Boolean
	*/
	public function bulkInsertEmployees($data) {

		return $this->db->insert_batch('employee', $data);
	}

	/**
	* Insert Batch data
	* @param String
	* @return Boolean
	*/
	public function bulkInsertUser($data) {
		
		return $this->db->insert_batch('users', $data);
	}

	/**
	* Count data not equal in actual upload, use for incrementation in users table
	* @return Int
	*/
	public function getID() {

		$where = array('created_at !=' => date('Y-m-d H:i:s'));
		$this->db->where($where);
		return $this->db->count_all_results('employee');
	}
}