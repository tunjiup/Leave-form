<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_role extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	public function getRole() {
		$res = $this->db->get('role');
		return $res->result();
	}
}

?>
