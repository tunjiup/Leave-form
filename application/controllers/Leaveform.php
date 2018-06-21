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

	public function add() {

		if(!$this->session->userdata('logged_in')) redirect('login');

		$res = $this->user->getAllmyData();

		$config = $this->config->item('forms');

		$this->require_validation($config);

		if($this->form_validation->run()) {
			$token = $this->genCode(30);
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
			$data['code'] = $this->leaveTracking();
			$data['classname'] = Constant::CN_PENDING;
			$data['token'] = $token;
			$data['processedby'] = $this->session->userdata('uname');
			$data['created_at'] = date("Y-m-d H:i:s");
			
			if($this->leave->insertLeave($data)) {

				$this->sentManager($res,$data,$token);

				$this->trigerSend();

				echo "Successfully created";
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

	public function getApprovedfile($verify) {

		$empid = $verify['employee_id'];
		$data = $this->leave->getEmployeesEmail($empid);

		$this->approvedMail($data,$verify);

	}

	public function rejectForm() {

		$config = $this->config->item('rejectReason');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$token = $this->session->userdata('token');

			$verify = $this->leave->checkToken($token);

			$reject_msg = $this->input->post('reasons');

			$data = array('classname' => Constant::CN_REJECT, 'token' => NULL, 'reject_msg' => $reject_msg);

			$this->leave->updateLeaveHistory($token,$data);

			$this->getRejectedfile($verify,$reject_msg);

		}
	}

	public function getRejectedfile($verify,$reject_msg) {

		$empid = $verify['employee_id'];
		$data = $this->leave->getEmployeesEmail($empid);
		
		$this->rejectMail($data,$verify,$reject_msg);

	}

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

	public function _leaveTypes($data) {

		if($data['title'] == Constant::L_SICK) {

			$this->updateSickLeaveBal($data);

		} elseif($data['title'] == Constant::L_BIRTHDAY) {

			$this->employee->birthdayLeave();

		} else {
				
			$this->updateVacationLeaveBal($data);
		}
	}



	public function downloadForm() {



		$this->pdf->WriteHTML($this->outputHTML());

		$name = "Test.pdf";

		$path = "leave-forms/";

		//$this->pdf->Output($path.$name, $this->_savePDF);

		$this->pdf->Output();

	}



	public function outputHTML() {

		$output = '
		<style>

		@page {
			size: 210mm 290mm;
			font-family: Arial ,serif;
			sheet-size: A4;
			margin: 10px 0.65in;
        }


		</style>

		<div class="wrapper" style="font-size: 9.5pt;font-family: Arial ,serif;">

				<div class="main formPaper" id="formPaper">

					<div style=" height: 1.12in; width: 100%; overflow: hidden; position: relative;">

						<img src="https://media.megasportsworld.com/msw-dev-leave-sites/assets/img/ocvi_logo.jpg" style="width:0.9in;">

						<div class="address" style="display:block;font-size:7pt;">43/F Yuchengco Tower, RCBC Plaza Ayala Ave. cor. Gil Puyat Ave., Makati City </div>

					</div>

					<div class="content">

						<div class="title" style="font-size:12pt;font-weight:bold;text-align:center;"> Leave Application Form </div>

						<div class="section">

							<div class="s-title" style="background:#000;color:#fff;font-size:10pt;text-align:center;font-weight:bold;">Leave Information</div>

							<div class="form" style="padding: 0 10px;">

								<table class="inpt-grp" style="width: 100%;font-size: 9.5pt;font-family: Arial ,serif;">

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;" style="width: 1.18in;height:0.3in; ">Employee Name: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" colspan="3">

											<div style="width: 100%;">Mark Anthony Naluz</div>

										</td>

									</tr>

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;">Position: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" ><div style="width: 100%;"></div></td>

										<td class="lbl" style="width: 0.97in">Department: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" ><div style="width: 100%;"></div></td>

									</tr>

									<tr>

										<td class="lbl" style="width: 1.18in;height:0.3in;">Manager: </td>

										<td class="inpt" style="height: 0.3in;border-bottom: 1px solid #000;" colspan="3" ><div style="width: 100%;"></div></td>

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
														<input type="checkbox" style="font-size: 18px;" checked="checked">
													</td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Sick</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Vacation</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Bereavement</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Offsetting</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;"></td>

												</tr>

												<tr>

													<td class="space" style="height: 0.3in;width: 0.24in;"></td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Emergency</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Maternity/Paternity</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Under time</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Birthday</td>

													<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

													<td class="sublbl" style="width: 0.94in;height: 0.3in;">Hospitalization </td>

												</tr>

											</table>

										</td>

									</tr>

								</table>

								<table style="width: 100%;font-size: 9.5pt;font-family: Arial ,serif;">


									<tr>

										<td colspan="4" class="lv-container">

											<br />

											<div class="lv-checkbox">

												<table style="width: 100%">

													<tr>

														<td class="space" style="height: 0.3in;width: 0.24in;"></td>

														<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

														<td style="width: 1.2in">LWP</td>

														<td class="subinpt" style="width: 0.25in; position: relative;height: 0.3in"><input type="checkbox" style="font-size: 18px;"></td>

														<td style="width: 0.8in">LW/OP</td>

														<td style="width: 1.75in">TOTAL NUMBER OF DAYS:</td>

														<td style="width: 0.2in;border-bottom: 1px solid #000;">
															
														</td>

														<td class="endSpace"></td>

													</tr>

												</table>

											</div>

											<div class="rfl" style=" margin: 9.5pt 0; padding: 9.5pt 9.5pt 9.5pt 0; border: 1px solid #000; border-left: 0;">

												<div class="rfl-lbl">Reason for Leave:</div>

												<div class="rfl-inpt"><input type="text" name="reason" id="reason" /></div>

											</div>

										</td>

									</tr>

									<tr>

										<td colspan="4"><span class="reminder">You must submit requests for absences, other than sick leave, two days prior to the first day you will be absent.</span></td>

									</tr>

								</table>

							</div>

						</div>

						<div class="section">

							<div class="s-title w-spc">HR Use only</div>

							<div class="hr-tbl">

								<table>

									<tr>

										<td class="hr-lbl"></td>

										<td class="hr-lbl-col">Unused Leaves from Previous Year</td>

										<td class="hr-lbl-col">Sick</td>

										<td class="hr-lbl-col">Vacation</td>

										<td class="hr-lbl-col">Others</td>

									</tr>

									<tr>

										<td class="hr-lbl-row">Previous Balance</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row">2013 Entitlement</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row">Taken Previously (YTD)</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row">Balance before this Application</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row">Taken (this application)</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

									<tr>

										<td class="hr-lbl-row">Balance carried forward:</td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

										<td class="hr-lbl-rowcol"></td>

									</tr>

								</table>

							</div>

						</div>

						<div class="section">

							<div class="s-title w-spc">Approvals</div>

							<div class="ap-tbl">

								<table>

									<tr>

										<td class="ap-lbl">Action</td>

										<td class="ap-lbl">Name</td>

										<td class="ap-lbl">Signature</td>

										<td class="ap-lbl">Date</td>

									</tr>

									<tr>

										<td class="ap-lbl-row">Requested by: Employee Name</td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

									</tr>

									<tr>

										<td class="ap-lbl-row">Recommended by: Immediate Supervisor</td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

									</tr>

									<tr>

										<td class="ap-lbl-row">Approved by: Department Head/COO</td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

									</tr>

									<tr>

										<td class="ap-lbl-row">Checked and Verified: HR Department</td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

										<td class="ap-lbl-row"></td>

									</tr>

								</table>

							</div>

						</div>

					</div>

					<div class="footer">

						<div class="footer-text">Revised form as of September 2009</div>

						<div class="footer-text right">HRD-LEF002</div>

					</div>

				</div>

		</div>

';

	 return $output;

	}

		

}



?>

