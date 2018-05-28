<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	* Get Data
	* @param String $username
	* @return String User's Details
	*/
	public function getUserDetails($username) {
		$data = array();
		$where = array('username' => $username);
		$this->db->where($where);
		$res = $this->db->get('users');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
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

	public function checkCode($code) {
		$where = array('resetpasskey' => $code);
		$this->db->where($where);
		return $this->db->count_all_results('users');
	}

}
?>