<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function insertNewUser($data) {
		return $this->db->insert('users',$data);
	}

	/**
	* Update Data
	* @param Int $id
	* @param String $data
	* @return Boolean
	*/
	public function updateMydata($data,$id) {
		$where = array('userid' => $id);
		$this->db->where($where);
		return $this->db->update('users',$data);
	}

	/**
	* Get active data
	* @param Int $id
	* @param Boolean
	*/
	public function getMydata() {
		$data = array();
		$id = $this->session->userdata('userid');
		$where = array('userid' => $id);
		$this->db->where($where);
		$res = $this->db->get('users');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	/**
	* Get active data
	* @param Int $id
	* @param Boolean
	*/
	public function getAllmyData() {
		$data = array();
		$id = $this->session->userdata('userid');
		$where = array('u.userid' => $id, 'u.active' => 1);
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