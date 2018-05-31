<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) redirect('login');
		$this->load->model('M_employee','employee');
		$this->load->model('M_user','user');
	}

	public function index() {

		$data['mydata'] = $this->user->getMydata();
		$data['employee'] = $this->getEmployee();
		$data['dob'] = $this->getEmployeedob();
		$this->parser->parse('dashboard',$data);
	}

	public function edit() {

		if(!$this->session->userdata('logged_in')) redirect('login');

		$config = $this->config->item('edit');

		$this->require_validation($config);

		if($this->form_validation->run()) {
			
			$id = $this->session->userdata('userid');

			$data['username'] = $this->input->post('username');
			$data['fullname'] = $this->input->post('fullname');
			$data['address'] = $this->input->post('address');
			$data['email'] = $this->input->post('email');
			$data['cp_no'] = $this->input->post('phone');
			$data['gender'] = $this->input->post('gender');

			if($this->user->updateMydata($data,$id)) {
				$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Successfully update!</strong></div>');
				redirect(base_url());
			}
		}
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

			$str = date('Y-m-d',strtotime($event->end . ' +1 day'));

			$allEvents[] = array(
				'id' => $event->employee_id,
				'title' => $event->username.' - '.$event->title,
				'start' => $event->start,
				'end' => $str
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
			if($this->session->userdata('uname') == $val->username) {
				$modal = 'class="leave-wrapper-inactive" data-toggle="modal" data-target="#editProfile"';
				$active = '<span class="dot"></span>';
			} else {
				$modal = 'class="leave-wrapper" data-id="'.$val->id.'"';
				$active = '';
			}
			$output .= '
				<div class="col-sm">
					<div '.$modal.'>
						<div class="lv-name">'.$active.$val->username.'</div>
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

	public function modalDir($id = NULL) {

		$data = $this->employee->getEmployeesData($id);

		$output = '
			<label>
				Fullname<input type="text" class="form-control" value="'.$data['fullname'].'"  readonly>
			</label>
			<label>
				Address<input type="text" class="form-control" value="'.$data['address'].'"  readonly>
			</label>
			<label>
				Email<input type="email" class="form-control" value="'.$data['email'].'"  readonly>
			</label>
			<label>
				Phone<input type="text" class="form-control" value="'.$data['cp_no'].'" readonly/>
			</label>';

		echo $output;
		
	}
}

?>
