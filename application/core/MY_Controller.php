<?php

class MY_Controller extends CI_Controller {
	
	private $_validate_fields = FALSE;
	private $_ci = null;

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->helper('string');
		$this->_ci =& get_instance();
		$this->load->helper('cs_password');
		$this->load->config('validations');
		$this->load->helper('cs_dropdown');
	}


	/**
     * Tell the controller to load the form validation library and set delimiter.
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
	* Generate Activation code
	* @return String
	*/
	public function genCode($int) {

		$code = random_string('alnum', $int);

		return $code;
	}

	/**
	* Email Template
	*/
	public function resetEmailTemplate($res,$reset){
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
		$sitename = strtolower($_SERVER['SERVER_NAME']);
		$from_email = 'no-reply@'.$sitename;

			
		$message = '<b>Hi '.$res['username'].'!</b><br /><br />

					To change yourpassword please click the link below <br />
					<br /> <a href="'.base_url('verify/').$reset.'" style="width: 100px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; background-color: #337ab7; border: 1px solid #2e6da4; text-align: center; color: #fff; text-decoration: none; ">Verify Account</a><br />
					<br /> or Copy this link and paste to browser '.base_url('verify/').$reset;

		$this->email->from($from_email,'Password Reset'); 
		$this->email->to($res['email']);
		$this->email->subject('Password Reset'); 
		$this->email->message($message);
	}

	public function trigerSend() {

		if($this->email->send()) {

			$this->session->set_flashdata('success',"<div class='col-sm-8 offset-md-3'><div class='row'><div class='alert alert-success alert-dismissible text-center'><button type='button' class='close' data-dismiss='alert'>&times;</button>We've sent you an email with password reset instructions.</div></div></div>");
				redirect(base_url());

		} else {
			$this->session->set_flashdata('success','<div class="col-sm-8 offset-md-3"><div class="row"><div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>Oops, Email not sent</div></div></div>');
		}
	}
}

?>