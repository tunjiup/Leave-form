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

		$data['leave'] = $this->employee->getMyleave();
		$data['mydata'] = $this->user->getAllmyData();
		$this->parser->parse('leave-form',$data);
	}

	public function add() {

		if(!$this->session->userdata('logged_in')) redirect('login');

		$config = $this->config->item('forms');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$from = $this->input->post('dateFrom');
			$to = $this->input->post('dateTo');
			$data['employee_id'] = $this->session->userdata('empid');
			$data['title'] = $this->input->post('contLeave').' Leave';
			$data['types'] = $this->input->post('regular');
			$data['reason'] = $this->input->post('reason');
			$data['days'] = $this->input->post('noDays');
			$data['start'] = date('Y-m-d',strtotime($from));
			$data['end'] = date('Y-m-d',strtotime($to));
			$data['processedby'] = $this->session->userdata('uname');
			$data['created_at'] = date("Y-m-d H:i:s");

			if($this->leave->insertLeave($data)) {

				if($data['title'] == Constant::L_SICK) {
					$this->updateSickLeaveBal($data);
				} elseif($data['title'] == Constant::L_BIRTHDAY) {
					$this->employee->birthdayLeave();
				} else {
					$this->updateVacationLeaveBal($data);
				}

				$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Leave has succesfully save</strong></div>');

				redirect(base_url());
			}
		}
	}

	public function updateVacationLeaveBal($data) {

		$leave = $this->employee->getMyleave();

		$ex = explode('/', $leave['vacationleave']);

		$leaveBal = $ex[0] - $data['days'];

		$total = $leaveBal.'/'.$ex[1];

		$this->employee->vacationLeaveBalance($total);
	}

	public function updateSickLeaveBal($data) {

		$leave = $this->employee->getMyleave();

		$ex = explode('/', $leave['sickleave']);

		$leaveBal = $ex[0] - $data['days'];

		$total = $leaveBal.'/'.$ex[1];

		$this->employee->sickLeaveBalance($total);
	}
		
}

?>
