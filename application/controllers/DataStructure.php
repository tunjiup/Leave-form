<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataStructure extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->check_if_logged_in();
		$this->load->model('M_database','database');
		if(!$this->session->userdata('role') == '1') redirect(base_url());
	}

	public function describeTable($table) {
		$result = $this->database->describe($table);
		$output = NULL;

		foreach ($result as $res) {
			$output .= '
					<tr>
						<td>'.$res->Field.'</td>
						<td>'.$res->Type.'</td>
						<td>'.$res->Null.'</td>
						<td>'.$res->Key.'</td>
						<td>'.$res->Default.'</td>
						<td>'.$res->Extra.'</td>
					</tr>
				
			';
		}
		echo $output;
	}

	public function backupTableData() {
		$table = $this->uri->segment(4);
		$res = $this->database->getTableList_comment();
		foreach ($res as $val) {
			$_table[] = $val->myTables;
		}
		if($table != NULL) {
			if(in_array($table,$_table)) {
				$this->load->dbutil();

				$query = $this->db->query("SELECT * FROM $table");

				$backup = $this->dbutil->csv_from_result($query);
				$loc = $this->file_location().$table.'.csv';
				write_file($loc, $backup);
				save_action(array('module' => Constant::M_MYDATABASE, 'action' => Constant::A_BACKUP.' Table Data '.$table));
			}
		}
	}

	public function tableRepair($table) {
		
		if($this->dbutil->repair_table($table)) {

			save_action(array('module' => Constant::M_MYDATABASE, 'action' => Constant::A_REPAIR.' Table '.$table));

			$this->session->set_flashdata('repair','Successfully Repaired');
		}
	}

	public function tableOptimize($table) {

		if($this->dbutil->optimize_table($table)) {

			save_action(array('module' => Constant::M_MYDATABASE, 'action' => Constant::A_OPTIMIZE.' Table '.$table));

			$this->session->set_flashdata('optimize','Successfully Optimize');
		}

	}

	public function backuptable($table) {

		if($table != NULL) {
			$this->preference($table);
			save_action(array('module' => Constant::M_MYDATABASE, 'action' => Constant::A_BACKUP.' Table '.$table));
		} else {
			show_error('Page Not Found');
		}
	}

	public function backupAll() {

		$this->backup_db();

		save_action(array('module' => Constant::M_MYDATABASE, 'action' => Constant::A_BACKUP.' Entire Database'));
	}

}

?>