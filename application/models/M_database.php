<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_database extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	public function getTableList_comment(){

		$db = _DB_DATABASE_;
		$res = $this->db->query("SELECT t.TABLE_NAME AS myTables, t.TABLE_COMMENT as comment FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = '$db' ");

		return $res->result();
	}

	public function describe($table) {
		$res = $this->db->query("DESCRIBE $table");
		return $res->result();
	}

	public function insertHolidays($data) {
		return $this->db->insert('holidays',$data);
	}
}

?>