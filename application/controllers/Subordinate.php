<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subordinate extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->check_if_logged_in();
		$this->load->model('M_employee','employee');
		$this->load->model('M_user','user');
		$this->load->model('M_leave','leave');
	}

	public function formAction() {

		$config = $this->config->item('createNew');

		$this->require_validation($config);

		if($this->form_validation->run()) {
			$uname = $this->input->post('username');
			$email = $this->input->post('email');
			$gender = $this->input->post('gender');
			$dob = date('Y-m-d',strtotime($this->input->post('dob')));
			$data['name'] = $this->input->post('name');
			$data['dob'] = $dob;
			$data['position'] = $this->input->post('position');
			$data['department'] = $this->input->post('department');
			$data['manager'] = $this->input->post('manager');
			$data['active'] = 1;
			$data['departmenthead'] = $this->input->post('departmenthead');
			$data['created_at'] = date("Y-m-d H:i:s");
			$first = strtolower(substr($this->input->post('name'), 0, 1));
			$x = explode(' ', $this->input->post('name'));
			$_count = count($x) - 1;
			$dp = $first.strtolower($x[$_count]);

			if($this->employee->insertNew($data)) {
				$empid = $this->db->insert_id();
				$leave['vacationleave'] = '0/0';
				$leave['sickleave'] = '0/0';
				$leave['birthleave'] = 1;
				$leave['employee_id'] = $empid;
				$leave['created_at'] = date("Y-m-d H:i:s");
				$user['username'] = $uname;
				$user['email'] = $email;
				$user['gender'] = $gender;
				$user['employee_id'] = $empid;
				$user['activate'] = 1;
				$user['created_at'] = date("Y-m-d H:i:s");
				$user['created_by'] = $this->session->userdata('uname');


				$new = array('uname' => $dp,'vl' => $leave['vacationleave'],'sl' => $leave['sickleave'],'bl' => $leave['birthleave'], 'id' => $this->db->insert_id());

				if($this->user->insertNewUser($user)) {

					$this->leave->insertLeaveBalance($leave);

					$this->client->initialize();
					$this->client->emit("new_employee",$new);
					$this->client->close();

					save_action(array('module' => Constant::M_SUBORDINATE, 'action' => Constant::A_ADD, 'object_id' => $this->db->insert_id()));

				}
			}

		}
	}

	public function leaveUpdateBalance() {

		$id = $this->uri->segment(2);
		$config = $this->config->item('leave');

		$year = $this->employee->getUpdateLeaveYear($id);

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$data['vacationleave'] = $this->input->post('vacation');
			$data['sickleave'] = $this->input->post('sick');

			if($year['year'] != date('Y')) {

				$this->leave->UpdateLeave_balance($data,$id);
				
				save_action(array('module' => Constant::M_SUBORDINATE, 'action' => Constant::A_UPDATE.' Leave', 'object_id' => $id));

			} else {
				if($year['vacationleave'] == Constant::D_LEAVE || $year['sickleave'] == Constant::D_LEAVE) {

					$this->leave->UpdateLeave_balance($data,$id);

					save_action(array('module' => Constant::M_SUBORDINATE, 'action' => Constant::A_UPDATE.' Leave', 'object_id' => $id));

				} else {
					show_error("Can't Update");
				}
			}

		}
	}

}