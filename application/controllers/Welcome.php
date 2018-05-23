<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_employee','employee');
	}

	public function index() {

		$data['employee'] = $this->getEmployee();
		$data['dob'] = $this->getEmployeedob();
		$this->parser->parse('dashboard',$data);
	}

	/**
	* Show All Events
	* @return JSON String
	*/
	public function showEvents() {

		// Our Start and End Dates
		$start = $this->input->get("start");
		$end = $this->input->get("end");

		$events = $this->employee->getEvents($start, $end);

		$allEvents = array();

		foreach ($events as $event) {
			
			$allEvents[] = array(
				'id' => $event->employee_id,
				'title' => $event->username.' - '.$event->title.' '.$event->leaveprefix,
				'start' => $event->start,
				'end' => $event->end
			);
		}

		echo json_encode($allEvents);
	}

	/**
	* Show Employee with Leave Balance
	* @return String
	* @return Int
	*/
	public function getEmployee() {
		$output = NULL;

		$data = $this->employee->getLeave();

		foreach ($data as $val) {

			if($val->vacationleave == 0) {
				$v_l = 0;
				$vl = 0;
			} else {
				$_vl = explode('/', $val->vacationleave);
				$v_l = $_vl[0];
				$vl = $_vl[1];
			}

			if($val->sickleave == 0) {
				$s_l = 0;
				$sl = 0;
			} else {
				$_sl = explode('/', $val->sickleave);
				$s_l = $_sl[0];
				$sl = $_sl[1];
			}

			$output .= '
				<div class="col-sm">
					<div class="leave-wrapper">
						<div class="lv-name">'.$val->username.'</div>
						<div class="lv-info">
							<div class="lv-label">VL</div>
							<div class="lv-details"><span>'.$v_l.'</span>/'.$vl.'</div>
						</div>
						<div class="lv-info">
							<div class="lv-label">SL</div>
							<div class="lv-details"><span>'.$s_l.'</span>/'.$sl.'</div>
						</div>
						<div class="lv-info">
							<div class="lv-label">BL</div>
							<div class="lv-details"><span>'.$val->birthleave.'</span>/1</div>
						</div>
					</div>
				</div>

			';
		}

		return $output;
	}

	/**
	* Show Birthday celebrant
	* @return String
	* @return Date
	*/
	public function getEmployeedob() {
		$output = NULL;

		$data = $this->employee->getdob();

		foreach ($data as $val) {
			$_x = explode(' ', $val->name);
			$output .= '
				<li>
					<div class="event-type">Birthday</div>
					<div class="event-details">
						<div class="ev-name">'.ucfirst($_x[0]).' '.ucfirst($_x[2]).'</div>
						<div class="ev-date">'.date('M d', strtotime($val->dob)).'</div>
					</div>
				</li>

			';
		}

		return $output;
	}
}

?>