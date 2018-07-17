<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_comment extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function insertMessage($data) {
		return $this->db->insert('comments',$data);
	}

	public function getFeedBack() {
		
		$this->db->select('c.*, u.username, u.userid');
		$this->db->from('comments c');
		$this->db->join('users u','u.userid = c.userid','LEFT');
		$this->db->where('c.status IS NULL');
		$this->db->order_by('c.created_at','DESC');
		$res = $this->db->get();
		return $res->result();
		
	}

	public function getAllFeedBack() {
		$hide = Constant::C_HIDE;
		$this->db->select('c.*, u.username, u.userid');
		$this->db->from('comments c');
		$this->db->join('users u','u.userid = c.userid','LEFT');
		$this->db->where("c.status != '$hide'");
		$this->db->order_by('c.created_at','DESC');
		$res = $this->db->get();
		return $res->result();
		
	}

	public function getComment($id) {
		$data = array();
		$where = array('c.id' => $id);
		$this->db->select('c.*, u.username, u.userid');
		$this->db->from('comments c');
		$this->db->join('users u','u.userid = c.userid','LEFT');
		$this->db->where($where);
		$res = $this->db->get();
		if($res->num_rows() > 0){
			$data = $res->row_array();
		}
		$res->free_result();
		return $data;
	}

	public function seen() {
		
		$data = array('status' => Constant::C_SEEN);
		$this->db->where('status IS NULL');
		return $this->db->update('comments',$data);

	}

	public function commentHide($id,$data) {

		$where = array('id' => $id);
		$this->db->where($where);
		return $this->db->update('comments',$data);

	}
}