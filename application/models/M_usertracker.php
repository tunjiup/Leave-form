<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_usertracker extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function insert_location($data) {
		return $this->db->insert('tracker',$data);
	}

	public function getAll_location() {
		$this->db->distinct();
		$this->db->select('ip_address,latitude,longitude');
		$this->db->order_by('created_at', 'DESC');
		$res = $this->db->get('tracker');
		return $res->result();
	}

	public function getdetails($ipaddress) {
		$data = array();
		$where = array('ip_address' => $ipaddress);
		$this->db->where($where);
		$res = $this->db->get('tracker');
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}
}