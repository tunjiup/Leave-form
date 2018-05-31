<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_login','login');
	}

	public function index() {
		
		if($this->session->userdata('logged_in')) redirect(base_url());

		$config = $this->config->item('login');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$res = $this->login->getUserDetails($username);

			if(count($res)) {
				$pass = $res['password'];

				if(password_verify($password,$pass)) {
					if($res['activate'] != 0) {

						if($res['resetpasskey'] != NULL) {
							$sess = array(
								'userid' => $res['userid']
							);
							$this->session->set_userdata($sess);
							redirect('change-password');
						} else {
							$sess = array(
								'userid' => $res['userid'],
								'key' => $res['resetpasskey'],
								'empid' => $res['employee_id'],
								'uname' => $res['username'],
								'email' => $res['email'],
								'fullname' => $res['fullname'],
								'logged_in' => TRUE
							);
							$this->session->set_userdata($sess);
							if($res['fullname'] == NULL) {
								$this->session->set_flashdata('complete','Please complete your deatils');
							}
							redirect(base_url());
						}
						
					} else {

						$this->session->set_flashdata('error','<div class="alert alert-danger"> Account not yet activated </div>');

					}
				} else {

					$this->session->set_flashdata('error','<div class="alert alert-danger"> Invalid Password </div>');

				}
			} else {

				$this->session->set_flashdata('error','<div class="alert alert-danger"> Invalid Username </div>');

			}

		}
		$this->load->view('login');
	}

	/**
	* Generate New Password
	* @param Email
	*/
	public function forgotpass() {

		$config = $this->config->item('forgotpassword');

		$this->require_validation($config);

		if($this->form_validation->run()) {

			$email = $this->input->post('email');

			$res = $this->login->checkEmail($email);

			$reset = $this->genCode(50);
			$data['resetpasskey'] = $reset;
			$data['resetdate'] = date("Y-m-d H:i:s");

			if(count($res)) {

				$this->resetEmailTemplate($res,$reset);

				if($this->login->updateData($data,$res['userid'])) {

					$this->trigerSend();
				}

			} else {
				$this->session->set_flashdata('error', '<div class="alert alert-danger"> Email does not exist </div>');
			}


		}
		$this->load->view('forgot-pass');
	}

	/**
	* Change password
	* @return True OR False
	*/
	public function changepass() {

		$code = $this->uri->segment(2);

		$codeCheck = $this->login->checkCode($code);

		if($codeCheck > 0) {

			$config = $this->config->item('changepass');

			$this->require_validation($config);

			if($this->form_validation->run()) {
				$pass = $this->input->post('password');
				$data['password'] = password_hash($pass,1);
				$data['resetpasskey'] = NULL;

				if($this->login->updateData($data,$code)) {

					$this->session->set_flashdata('success','<div class="alert alert-success">Password successfully Change</div>');
					
					redirect('login');

				}
			}
			$this->load->view('change-pass');

		} else {
			show_error('Invalid Code');
		}

	}

	public function updatePassword() {

		$code = $this->session->userdata('userid');

		$config = $this->config->item('changepass');

		$this->require_validation($config);

		if($this->form_validation->run()) {
			$pass = $this->input->post('password');
			$data['password'] = password_hash($pass,1);
			$data['resetpasskey'] = NULL;

			if($this->login->updateData($data,$code)) {

				$this->session->set_flashdata('success','<div class="alert alert-success">Password successfully Change</div>');
				
				redirect('login');

			}
		}
		$this->load->view('change-pass');
	}

	//logout function
	public function logout(){

		$id = $this->session->userdata('userid');
		$sess = array('userid' => '', 'key' => '', 'uname' => '', 'email' => '', 'fullname' => '', 'logged_in' => FALSE);
		$this->session->unset_userdata($sess);
		$this->session->sess_destroy();
		redirect('login');
	}

}

?>