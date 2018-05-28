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
}
?>