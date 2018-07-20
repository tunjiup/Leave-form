<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->check_if_logged_in();
		$this->load->model('M_employee','employee');
		$this->load->model('M_user','user');
		$this->load->model('M_leave','leave');
		$this->load->model('M_comment','comment');
		$this->load->model('M_database','database');
	}

	/**
	* index Page
	*/
	public function index($val = NULL) {

		$data['year'] = $this->leave->getUpdateLeaveYear();
		$data['mydata'] = $this->user->getMydata();
		$data['leaveHistory'] = $this->leave->getAllLeave();
		$data['dob'] = $this->getEmployeedob();
		$data['holiday'] = $this->phHolidays();
		$data['employees'] = $this->getEmployee();
		$data['database'] = $this->dbList();
		$this->parser->parse('dashboard',$data);

	}

	public function form() {

		$config = $this->config->item('comments');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$data['userid'] = $this->session->userdata('userid');
			$data['message'] = $this->input->post('commentbox');
			$data['created_at'] = date("Y-m-d H:i:s");

			if($this->comment->insertMessage($data)) {
				$new = array('id' => $data['userid'],'message' => $data['message'],'date' => date('M j, Y',strtotime($data['created_at'])),'from' => $this->session->userdata('uname'), 'count' => $this-> _feedCount());
				$this->client->initialize();
				$this->client->emit("new_comment",$new);
				$this->client->close();
			}

		}
	}

	public function dbList() {
		$table = $this->database->getTableList_comment();
		$output = NULL;
		foreach ($table as $list) {
			$output .= '
				<tr>
					<td>'.$list->myTables.'</td>
					<td>'.$list->comment.'</td>
					<td>
						<a href="#" data-id="'.$list->myTables.'" class="optimization" data-toggle="tooltip" title="Optimization"><i class="fas fa-tachometer-alt"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-id="'.$list->myTables.'" class="repair" data-toggle="tooltip" title="Repair"><i class="fas fa-toolbox"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-id="'.$list->myTables.'" class="tableBackup" data-toggle="tooltip" title="Table Structure"><i class="far fa-hdd"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-id="'.$list->myTables.'" class="tableData" data-toggle="tooltip" title="Table Data"><i class="fas fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-id="'.$list->myTables.'" class="tableStructure" data-toggle="tooltip" title="Data Type"><i class="fas fa-cubes"></i></a>
					</td>
				</tr>
			';
		}

		return $output;
	}

	/**
	* Edit for account
	* @param String
	* @return True
	*/

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

				$this->session->set_flashdata('success','Yess');

				redirect(base_url());

			}

		}

	}

	/**
	* Show All Events
	* @return JSON String
	*/
	public function showEvents() {

		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$empid = $this->session->userdata('empid');
		$res = $this->user->getAllmyData();
		if($this->session->userdata('role') == 3) {
			$clause = $res['manager'];
		} else {
			$clause = $res['department'];
		}
		$events = $this->employee->getEvents($start, $end, $clause);

		$allEvents = array();

		foreach ($events as $event) {


				if($this->session->userdata('empid') == $event->employee_id) {
					if($event->classname == Constant::CN_APPROVED) {
						$url = base_url('download-leave/').$event->code;
					} else {
						$url = base_url('edit-leave-form/').$event->code;
					}
				} else {
					$url = '';
				}

			$allEvents[] = array(

				'id' => $event->employee_id,
				'title' => $event->username.' - '.$event->title.' ('.$event->types.')',
				'start' => date('Y-m-d',strtotime($event->start)),
				'end' => date('Y-m-d',strtotime($event->end . ' +1 day')),
				'url' => $url,
				'className' => $event->classname

			);

		}

		echo json_encode($allEvents);

	}



	public function getRejectedReason() {

		$output = NULL;
		$results = $this->employee->getRejected();

		foreach ($results as $res) {

			$output .= $res->reject_msg;

		}
		echo $output;
	}



	/**
	* Show Employee with Leave Balance
	* @return String
	* @return Int
	*/

	public function getEmployee() {

		$output = NULL;
		$res = $this->user->getAllmyData();
		if($this->session->userdata('role') == 3) {
			$clause = $res['manager'];
		} else {
			$clause = $res['department'];
		}

		$data = $this->employee->getLeave($clause);

		foreach ($data as $val) {

			$first = strtolower(substr($val->name, 0, 1));
			$dp = $first.strtolower($val->lastname);

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

			if($val->active == 1) {
				$active = ' dot';
			} else {
				$active = '';
			}

			if($this->session->userdata('uname') == $val->username) {
				$modal = 'class="leave-wrapper-inactive" data-toggle="modal" data-target="#editProfile"';
			} else {
				$modal = 'class="leave-wrapper" data-id="'.$val->id.'"';
			}

			$output .= '

				<div class="col-sm">
					<div '.$modal.'>
						<div class="lv-name">'.$dp.'<span class="user-details-'.$val->username.$active.'"></span></div>
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
		$res = $this->user->getAllmyData();
		$dept = $res['department'];
		$data = $this->employee->getdob($dept);

		foreach ($data as $val) {

			$_x = explode(' ', $val->name);

			$output .= '
				<li class="ev-birthday">
					<div class="event-type">Birthday</div>
					<div class="ev-date">'.date('M d', strtotime($val->dob)).'</div>
					<div class="event-details">
						<div class="ev-name">'.ucfirst($_x[0]).' '.ucfirst($_x[1]).'</div>
					</div>
				</li>
			';
		}
		return $output;
	}

	/**
	* Display holiday
	*/
	public function phHolidays() {

		$output = NULL;
		$holiday = $this->displayHoliday();
		
		foreach ($holiday['holidays'] as $val) {

			$output .= '
					<li>
						<div class="event-type">Holidays</div>
						<div class="ev-date">'.date('M d', strtotime($val['date'])).'</div>
						<div class="event-details">
							<div class="ev-name">'.$val['name'].'</div>
						</div>
					</li>
				';
		}
		return $output;
	}

	/**
	* Profile Directory
	* @param Int $id
	* @return String
	*/
	public function modalDir($id = NULL) {

		$data = $this->employee->getEmployeesData($id);

		$output = '
				<input type="hidden" value="'.$data['employee_id'].'"  id="employeeid">
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
				</label>
			</div>';

		echo $output;
	}

	public function Allfeedback() {

		$output = $this->_feedBack();

		echo $output;
	}

}



?>
