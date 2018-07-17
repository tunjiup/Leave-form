<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leaveform extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->check_if_logged_in();
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
	
	/**
	* Leave Tracking & generate unique code
	* @return Numeric
	*/
	public function leaveTracking() {
		
		$code = $this->genNum(6);
		$tracked = $this->leave->getTrackCode($code);

		if($tracked > 0) {
			$tracking = $this->genNum(7);
		} else {
			$tracking = $code;
		}

		return $tracking;
	}

	/**
	* Add Form
	* @return Boolean
	*/
	public function add() {

		$res = $this->user->getAllmyData();

		$config = $this->config->item('forms');

		$_leave = $this->leave->leaveValidation();

		$start = date('Y-m-d',strtotime($_leave['start']));

		$this->require_validation($config);

		if($this->form_validation->run()) {
			$token = $this->genCode(30);
			$timefrom = $this->input->post('dateTimeFrom');
			$timeto = $this->input->post('dateTimeTo');

			$data['employee_id'] = $this->session->userdata('empid');
			$data['title'] = $this->input->post('contLeave').' Leave';
			$data['types'] = $this->input->post('regular');
			$data['reason'] = $this->input->post('reason');
			$data['days'] = $this->input->post('noDays');
			$data['start'] = date('Y-m-d H:i:s',strtotime($timefrom));
			$data['end'] = date('Y-m-d H:i:s',strtotime($timeto));
			$data['code'] = $this->leaveTracking();
			$data['classname'] = Constant::CN_PENDING;
			$data['token'] = $token;
			$data['active'] = 1;
			$data['processedby'] = $this->session->userdata('uname');
			$data['created_at'] = date("Y-m-d H:i:s");

			if($start == date('Y-m-d',strtotime($timefrom))) {
				show_error('Duplicate');
			} else {
				if($this->leave->insertLeave($data)) {

					$this->sentManager($res,$data,$token);

					$this->trigerSend();

					echo "Successfully created";
				}
			}
			
		}
	}

	public function editForm($id) {

		if($id != NULL) {

			$code = $this->leave->getTrackCode($id);

			if($code > 0) {

				$data['leave'] = $this->employee->getMyleave();
				$data['mydata'] = $this->user->getAllmyData();
				$data['vl'] = $this->zeroLeave();
				$data['sl'] = $this->zeroSickLeave();
				$data['bl'] = $this->zeroBirthLeave();
				$data['edit'] = $this->leave->checkToken($id);
				$this->parser->parse('edit-leave-form',$data);
				
			} else {
				show_error('The page you requested was not found.');
			}
		} else {
			show_error('The page you requested was not found.');
		}
		
	}
	/**
	* Edit Form
	* @param Int $id
	* @return Boolean
	*/
	public function edit($id) {

		$verify = $this->leave->checkToken($id);

		$res = $this->user->getAllmyData();

		$config = $this->config->item('forms');

		$_leave = $this->leave->leaveValidation();

		$this->require_validation($config);

		if($this->form_validation->run()) {
			$from = date('Y-m-d',strtotime($this->input->post('from')));
			$timefrom = $this->input->post('dateTimeFrom');
			$timeto = $this->input->post('dateTimeTo');
			$data['leavecode'] = $id;
			$data['title'] = $this->input->post('contLeave').' Leave';
			$data['types'] = $this->input->post('regular');
			$data['reason'] = $this->input->post('reason');
			$data['days'] = $this->input->post('noDays');
			$data['start'] = date('Y-m-d H:i:s',strtotime($timefrom));
			$data['end'] = date('Y-m-d H:i:s',strtotime($timeto));
			$data['created_at'] = date("Y-m-d H:i:s");
			$data['classname'] = Constant::CN_PENDING;
			
			if($from != date('Y-m-d',strtotime($timefrom))) {
				if(date('Y-m-d',strtotime($_leave['start'])) == date('Y-m-d',strtotime($timefrom))) {
					show_error('Duplicate');
				} else {
					$this->_check_Code($data,$verify,$res);
				}
			} else {
				$this->_check_Code($data,$verify,$res);
			}
			
			
		}
	}

	/**
	* Triger mail sent to manager and update or insert in table
	* @param Object
	* @return Boolean
	*/
	public function _check_Code($data,$verify,$res) {

		$_res = $this->leave->getMoveDate($verify['code']);

		if(count($_res) > 0) {

			$update = array(
				'title' => $data['title'],
				'types' => $data['types'], 
				'days' => $data['days'],
				'start' => date('Y-m-d H:i:s',strtotime($data['start'])),
				'end' => date('Y-m-d H:i:s',strtotime($data['end'])),
				'update_at' => date("Y-m-d H:i:s"),
				'classname' => Constant::CN_PENDING
			);

			$this->leave->updateMoveDate($data['leavecode'],$update);
			$this->moveLeave($data,$verify,$res,$_res);

		} else {

			$this->leave->insertMoveDate($data);
			$this->moveLeave($data,$verify,$res,$_res);
			
		}

		$sess = array('token' => '');
				
		$this->session->unset_userdata($sess);
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
	* @return Boolean
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
	* @return Boolean
	*/
	public function updateSickLeaveBal($data) {

		$leave = $this->employee->getMyleave();

		$ex = explode('/', $leave['sickleave']);

		$leaveBal = $ex[0] - $data['days'];

		$total = $leaveBal.'/'.$ex[1];

		$this->employee->sickLeaveBalance($total);
	}

	/**
	* Leave approved function, once approved it will update data in database
	* @param Token
	* @return Boolean
	*/
	public function approvedLeave() {

		$token = $this->uri->segment(2);

		$verify = $this->leave->checkToken($token);

		if(count($verify) > 0) {

			$data = array('classname' => Constant::CN_APPROVED, 'token' => NULL);

			$this->leave->updateLeaveHistory($token,$data);

			$this->_leaveTypes($verify);

			$this->getApprovedfile($verify);
			
		} else {
			show_error('The page you requested was not found.');
		}
	}

	/**
	* mail trigered sent to manager
	* @param String
	* @return Boolean
	*/
	public function getApprovedfile($verify) {

		$empid = $verify['employee_id'];
		$data = $this->leave->getEmployeesEmail($empid);

		$this->approvedMail($data,$verify);

	}

	/**
	* Leave reject function, once rejected it will update data in database
	* State reason of rejecting
	* @param Token
	* @return Boolean
	*/
	public function rejectForm() {

		$config = $this->config->item('rejectReason');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$token = $this->session->userdata('token');

			$verify = $this->leave->checkToken($token);

			$reject_msg = $this->input->post('reasons');

			$data = array('classname' => Constant::CN_REJECT, 'token' => NULL, 'reject_msg' => $reject_msg, 'active' => 0);

			$this->leave->updateLeaveHistory($token,$data);

			$this->getRejectedfile($verify,$reject_msg);

			$sess = array('token' => '');

			$this->session->unset_userdata($sess);

		}
	}

	/**
	* mail trigered sent to requestor
	* @param String
	* @return Boolean
	*/
	public function getRejectedfile($verify,$reject_msg) {

		$empid = $verify['employee_id'];
		$data = $this->leave->getEmployeesEmail($empid);
		
		$this->rejectMail($data,$verify,$reject_msg);
	}

	public function changeApprovedLeaveDate() {
		$id = $this->uri->segment(3);
		$res = $this->leave->getMoveDate($id);
		if(count($res) > 0) {
			$emp = $this->leave->checkToken($res['leavecode']);
			$_res = $this->leave->getEmployeesEmail($emp['employee_id']);

			$data['title'] = $res['title'];
			$data['reason'] = $res['reason'];
			$data['start'] = $res['start'];
			$data['end'] = $res['end'];
			$data['days'] = $res['days'];
			$data['update_at'] = date("Y-m-d H:i:s");

			$this->leave->updateLeaveHistory($res['leavecode'],$data);

			$update = array('classname' => Constant::CN_APPROVED, 'update_at' => date("Y-m-d H:i:s"));

			$this->leave->updateMoveDate($res['leavecode'],$update);

			$this->approvedMoveLeave($_res);

		} else {

			show_error('The page you requested was not found.');

		}

	}

	public function changeRejectLeaveDate() {
		$id = $this->uri->segment(3);
		$res = $this->leave->getMoveDate($id);
		if(count($res) > 0) {

			$emp = $this->leave->checkToken($res['leavecode']);
			$_res = $this->leave->getEmployeesEmail($emp['employee_id']);
			
			$update = array('classname' => Constant::CN_REJECT, 'update_at' => date("Y-m-d H:i:s"));

			$this->leave->updateMoveDate($res['leavecode'],$update);

			$this->rejectMoveLeave($_res);
			
		} else {

			show_error('The page you requested was not found.');

		}

	}

	/**
	* check token if valid, if valid set token in session.
	* @param Token
	* @return True
	*/
	public function rejectLeave() {

		$token = $this->uri->segment(2);

		$verify = $this->leave->checkToken($token);

		if(count($verify) > 0) {

			$this->setNewSession($token);

			$this->session->set_flashdata('rejected','Leave has been rejected');

			redirect(base_url());
			
		} else {
			show_error('The page you requested was not found.');
		}
	}

	/**
	* leave cancelation
	* @param Int $code
	* @return Boolean
	*/
	public function leaveCancel($code) {

		$token = $this->leave->getTrackCode($code);

		if($token > 0) {
			$data = array('active' => 0, 'token' => NULL, 'update_at' => date("Y-m-d H:i:s"));
			if($this->leave->updateLeaveHistory($code,$data)) {

				$this->session->set_flashdata('leavecancel','Yess');

				redirect(base_url());
			}
		} else {
			show_error('Invalid ID');
		}
	}

	/**
	* check types of leave and update leave balance.
	* @param String
	* @return True
	*/
	public function _leaveTypes($data) {

		if($data['title'] == Constant::L_SICK) {

			$this->updateSickLeaveBal($data);

		} elseif($data['title'] == Constant::L_BIRTHDAY) {

			$this->employee->birthdayLeave();

		} else {
				
			$this->updateVacationLeaveBal($data);
		}
	}

	/**
	* Save PDF file
	* @return True
	*/
	public function downloadForm() {

		$id = $this->uri->segment(2);

		$this->pdf->WriteHTML($this->outputHTML($id));

		$filename = "leave-".$id.".pdf";

		//$this->pdf->Output($path.$name, $this->_savePDF);

		$this->pdf->Output($filename, "D");

	}

	/**
	* Generate leave history
	* @return Object
	*/
	public function csvReport() {

		$query = $this->leave->genCSV();
		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
		$filename = $this->session->userdata('uname').'-leave.csv';
		$res = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
		force_download($filename, $res);
	}

	/**
	* HTML Template for PDF
	* @return True
	*/
	public function outputHTML($id) {

		$res = $this->leave->getLeavedata($id);
		if(Constant::L_SICK == $res['title']) {
			$sick = 'checked="checked"';
		} else {
			$sick = '';
		}

		if(Constant::L_VACATION == $res['title']) {
			$vacation = 'checked="checked"';
		} else {
			$vacation = '';
		}

		if(Constant::L_BEREAVEMENT == $res['title']) {
			$Bereavement = 'checked="checked"';
		} else {
			$Bereavement = '';
		}

		if(Constant::L_OFFSETTING == $res['title']) {
			$offsetting = 'checked="checked"';
		} else {
			$offsetting = '';
		}

		if(Constant::L_EMERGENCY == $res['title']) {
			$emergency = 'checked="checked"';
		} else {
			$emergency = '';
		}

		if(Constant::L_MA_PA == $res['title']) {
			$mapa = 'checked="checked"';
		} else {
			$mapa = '';
		}

		if(Constant::L_UNDERTIME == $res['title']) {
			$undertime = 'checked="checked"';
		} else {
			$undertime = '';
		}

		if(Constant::L_BIRTHDAY == $res['title']) {
			$birthday = 'checked="checked"';
		} else {
			$birthday = '';
		}

		if(Constant::L_HOSPITALIZATION == $res['title']) {
			$Hospitalization = 'checked="checked"';
		} else {
			$Hospitalization = '';
		}

		if(Constant::LWP == $res['types']) {
			$lwp = 'checked="checked"';
		} else {
			$lwp = '';
		}

		if(Constant::LWOP == $res['types']) {
			$lwop = 'checked="checked"';
		} else {
			$lwop = '';
		}

		$output = '
		<style>

		@page {
			size: 210mm 290mm;
			font-family: Arial;
			sheet-size: A4;
			margin: 10px 0.65in;
        }


		</style>

		<div class="wrapper" style="font-size: 9.5pt;font-family: Arial;">

				<div class="main formPaper" id="formPaper">

					<div style=" height: 1.12in; width: 100%; overflow: hidden; position: relative;">

						<img src="https://media.megasportsworld.com/msw-dev-leave-sites/assets/img/ocvi_logo.jpg" style="width:0.9in;">

						<div class="address" style="display:block;font-size:7pt;">43/F Yuchengco Tower, RCBC Plaza Ayala Ave. cor. Gil Puyat Ave., Makati City </div>

					</div>

					<div class="content" style="margin-top:-10px;">

						<div class="title" style="font-size:12pt;font-weight:bold;text-align:center;font-family: Arial;"> Leave Application Form </div>

						<div class="section">

							<div class="s-title" style="background:#000;color:#fff;font-size:10pt;text-align:center;font-weight:bold;">Leave Information</div>

							<div class="form" style="padding: 0 10px; padding-top: 5px;">

								<table class="inpt-grp" style="width: 100%;font-size: 9.5pt;font-family: Arial;">

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;" style="width: 1.18in; height:0.3in; ">Employee Name: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" colspan="3">

											<div style="width: 100%;">'.$res['fullname'].'</div>

										</td>

									</tr>

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;">Position: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" ><div style="width: 100%;">'.$res['position'].'</div></td>

										<td class="lbl" style="width: 0.97in">Department: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" ><div style="width: 100%;">'.$res['department'].'</div></td>

									</tr>

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;">Manager: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" colspan="3" ><div style="width: 100%;">'.$res['manager'].'</div></td>

									</tr>

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;" colspan="4">Type of Leave Requested: </td>

									</tr>

									<tr>

										<td class="inpt tplr" colspan="4" style="height: 0.3in;">

											<table id="checkTypes" style="width: 100%">

												<tr>

													<td class="space" style="height: 0.3in;width: 0.24in;"></td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in">
														<input type="checkbox" style="font-size: 18px;" '.$sick.'>
													</td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Sick</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$vacation.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Vacation</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$Bereavement.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Bereavement</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$offsetting.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Offsetting</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;"></td>

												</tr>

												<tr>

													<td class="space" style="height: 0.3in;width: 0.24in;"></td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$emergency.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Emergency</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$mapa.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Maternity/Paternity</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$undertime.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Under time</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$birthday.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Birthday</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$Hospitalization.'></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Hospitalization </td>

												</tr>

											</table>

										</td>

									</tr>

								</table>

								<table style="width: 100%;font-size: 9.5pt;font-family: Arial;">


									<tr>
									
										<td class="lbl" style="width: 1.68in; height: 0.3in;">Dates of Leave From: </td>

										<td style="width: 2.44in; text-align: center; border-bottom: 1px solid #000;">

											<div>'.date('m/d/Y H:i',strtotime($res['start'])).'</div>

										<td class="lbl" style="width: 0.28in; height: 0.3in">to</td>

										<td style="width: 2.61in; text-align: center; border-bottom: 1px solid #000;">

											<div>'.date('m/d/Y H:i',strtotime($res['end'])).'</div>

										</td>

									</tr>

									<tr>

										<td colspan="4" class="lv-container">

											<br />

											<div class="lv-checkbox">

												<table style="width: 100%">


													<tr>

														<td class="space" style="height: 0.3in;width: 0.24in;"></td>

														<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$lwp.'></td>

														<td style="width: 1.2in">LWP</td>

														<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;" '.$lwop.'></td>

														<td style="width: 0.8in">LW/OP</td>

														<td style="width: 1.75in">TOTAL NUMBER OF DAYS: <span style="width: 0.2in;border-bottom: 1px solid #000;">'.$res['days'].'</span></td>

														<td style="width: 0.2in;"></td>

														<td class="endSpace" style=" width: 0.50in;"></td>

													</tr>

												</table>

											</div>

											<table style=" margin: 9.5pt 0; padding: 9.5pt 9.5pt 9.5pt 4pt; border: 1px solid #000; width: 100%; border-left: 0; display: block;">

												<tr><td class="rfl-lbl" style="display: block;">Reason for Leave:</td></tr>

												<tr>
													<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;"><div style="width: 100%;">'.$res['reason'].'</div></td>
												</tr>

											</table>

										</td>

									</tr>

									<tr>

										<td colspan="4"><i style="font-size: 9pt;">You must submit requests for absences, other than sick leave, two days prior to the first day you will be absent.</i></td>

									</tr>

								</table>

							</div>

						</div>

						<div class="section">

							<div class="s-title" style="background:#000;color:#fff;font-size:10pt;text-align:center;font-weight:bold;margin-top: 9.5pt;">HR Use only</div>

							<div class="hr-tbl" style="padding: 10px;">

								<table style="font-size: 10pt; border-collapse: collapse; font-family: Arial;">

									<tr>

										<td class="hr-lbl" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.26in; text-align: center; font-size: 8.5pt;"></td>

										<td class="hr-lbl-col" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.26in; font-size: 8.5pt; text-align: center;">Unused Leaves from Previous Year</td>

										<td class="hr-lbl-col" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.26in; font-size: 8.5pt; text-align: center;">Sick</td>

										<td class="hr-lbl-col" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.26in; font-size: 8.5pt; text-align: center;">Vacation</td>

										<td class="hr-lbl-col" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.26in; font-size: 8.5pt; text-align: center;">Others</td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.28in; padding-left: 10px;">Previous Balance</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.28in; padding-left: 10px;">2013 Entitlement</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.28in; padding-left: 10px;">Taken Previously (YTD)</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.28in; padding-left: 10px;">Balance before this Application</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.30in; padding-left: 10px;">Taken (this application)</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row" style=" border: 1px solid #585858; vertical-align: top; width: 1.71in; height: 0.30in; padding-left: 10px;">Balance carried forward:</td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

										<td class="hr-lbl-rowcol" style=" border: 1px solid #585858; vertical-align: top; width: 1.3in; height: 0.25in; padding-left: 10px;"></td>

									</tr>

								</table>

							</div>

						</div>

						<div class="section">

							<div class="s-title" style="background:#000;color:#fff;font-size:10pt;text-align:center;font-weight:bold;margin-top: 9.5pt;">Approvals</div>

							<div class="ap-tbl" style="padding: 10px;">

								<table style=" font-family: Arial; font-size: 11pt; border-collapse: collapse;">

									<tr>

										<td class="ap-lbl" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.16in; text-align: center; font-size: 11pt;">Action</td>

										<td class="ap-lbl" style="border: 1px solid #585858; vertical-align: middle; width: 2.04in; height: 0.16in; text-align: center; font-size: 11pt;">Name</td>

										<td class="ap-lbl" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.16in; text-align: center; font-size: 11pt;">Signature</td>

										<td class="ap-lbl" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.16in; text-align: center; font-size: 11pt;">Date</td>

									</tr>

									<tr>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.56in; text-align: left; font-size: 11pt; padding: 5px 0 0 5px">Requested by: Employee Name</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: middle; width: 2.04in; height: 0.46in; text-align: center; font-size: 11pt;">'.$res['fullname'].'</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: middle; width: 2.04in; height: 0.46in; text-align: center; font-size: 11pt;">'.date('M d, Y').'</td>

									</tr>

									<tr>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.56in; text-align: left; font-size: 11pt; padding: 5px 0 0 5px">Recommended by: Immediate Supervisor</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: middle; width: 2.04in; height: 0.46in; text-align: center; font-size: 11pt;">'.$res['manager'].'</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

									</tr>

									<tr>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.56in; text-align: left; font-size: 11pt; padding: 5px 0 0 5px">Approved by: Department Head/COO</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: middle; width: 2.04in; height: 0.46in; text-align: center; font-size: 11pt;">'.$res['departmenthead'].'</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

									</tr>

									<tr>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt; padding: 5px 0 0 5px">Checked and Verified: HR Department</td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

										<td class="ap-lbl-row" style="border: 1px solid #585858; vertical-align: top; width: 2.04in; height: 0.46in; text-align: left; font-size: 11pt;"></td>

									</tr>

								</table>

							</div>

						</div>

					</div>

					<table style=" width: 100%; height: 0.5in; font-size: 10pt; font-style: italic; padding: 10pt;  font-family: Arial; ">

						<tr>

							<td>Revised form as of September 2009</td>
							<td style="text-align: center">HRD-LEF002</td>

						</tr>

					</table>

				</div>

		</div>';

		return $output;

	}

		

}
?>