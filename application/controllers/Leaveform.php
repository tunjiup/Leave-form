<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leaveform extends MY_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		$this->load->model('M_user','user');
		$this->load->model('M_leave','leave');
		$this->load->model('M_employee','employee');
	}

	public function index() {

		$data['vl'] = $this->zeroLeave();
		$data['sl'] = $this->zeroSickLeave();
		$data['bl'] = $this->zeroBirthLeave();
		$data['leave'] = $this->employee->getMyleave();
		$data['mydata'] = $this->user->getAllmyData();
		$this->parser->parse('leave-form',$data);
	}

	public function add() {

		if(!$this->session->userdata('logged_in')) redirect('login');

		$res = $this->user->getAllmyData();

		$config = $this->config->item('forms');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$datefrom = $this->input->post('dateFrom');
			$dateto = $this->input->post('dateTo');
			$timefrom = $this->input->post('dateTimeFrom');
			$timeto = $this->input->post('dateTimeTo');
			if($datefrom == NULL) {
				$conFrom = date('Y-m-d',strtotime($timefrom));
				$conTo = date('Y-m-d',strtotime($timeto));
			} else {
				$conFrom = date('Y-m-d',strtotime($datefrom));
				$conTo = date('Y-m-d',strtotime($dateto));
			}

			$data['employee_id'] = $this->session->userdata('empid');
			$data['title'] = $this->input->post('contLeave').' Leave';
			$data['types'] = $this->input->post('regular');
			$data['reason'] = $this->input->post('reason');
			$data['days'] = $this->input->post('noDays');
			$data['start'] = $conFrom;
			$data['end'] = $conTo;
			$data['processedby'] = $this->session->userdata('uname');
			$data['created_at'] = date("Y-m-d H:i:s");
			
			if($data['title'] == Constant::L_SICK) {

				if($this->zeroSickLeave() == 0) {
					echo "You have zero sick leave balance";
				} else {
					if($this->leave->insertLeave($data)) {

						$this->updateSickLeaveBal($data);

						$this->sentManager($res,$data);

						$this->trigerSend();

						echo "Successfully created";
					}
				}

			} elseif($data['title'] == Constant::L_BIRTHDAY) {

				if($this->zeroBirthLeave() == 0) {
					echo "You have zero birthday leave balance";
				} else {
					if($this->leave->insertLeave($data)) {

						$this->employee->birthdayLeave();

						$this->sentManager($res,$data);

						$this->trigerSend();

						echo "Birthday leave successfully created";
					}
				}

			} else {
				
				if($this->zeroLeave() == 0) {
					echo "You have zero leave balance";
				} else {
					if($this->leave->insertLeave($data)) {

						$this->updateVacationLeaveBal($data);

						$this->sentManager($res,$data);

						$this->trigerSend();

						echo "Successfully created";
					}
				}
			}
		}
	}

	/**
	* Retrieve vacation leave
	* @return Int
	*/
	public function zeroLeave() {

		$_z = $this->employee->getMyleave();

		$ex = explode('/', $_z['vacationleave']);

		return $ex[0];
	}

	/**
	* Retrieve birthday leave
	* @return Int
	*/
	public function zeroBirthLeave() {

		$_z = $this->employee->getMyleave();

		return $_z['birthleave'];
	}

	/**
	* Retrieve sick leave
	* @return Int
	*/
	public function zeroSickLeave() {

		$_z = $this->employee->getMyleave();

		$ex = explode('/', $_z['sickleave']);

		return $ex[0];
	}

	/**
	* Update vacation leave
	* @return True
	*/
	public function updateVacationLeaveBal($data) {

		$leave = $this->employee->getMyleave();

		$ex = explode('/', $leave['vacationleave']);

		$leaveBal = $ex[0] - $data['days'];

		$total = $leaveBal.'/'.$ex[1];

		$this->employee->vacationLeaveBalance($total);
	}

	/**
	* Update Sick leave
	* @return True
	*/
	public function updateSickLeaveBal($data) {

		$leave = $this->employee->getMyleave();

		$ex = explode('/', $leave['sickleave']);

		$leaveBal = $ex[0] - $data['days'];

		$total = $leaveBal.'/'.$ex[1];

		$this->employee->sickLeaveBalance($total);
	}
		
}

?>
