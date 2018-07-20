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
								'role' => $res['role'],
								'key' => $res['resetpasskey'],
								'empid' => $res['employee_id'],
								'uname' => $res['username'],
								'email' => $res['email'],
								'fullname' => $res['fullname'],
								'position' => $res['position'],
								'logged_in' => TRUE
							);
							$this->session->set_userdata($sess);
							save_login();
							if($this->login->getOnline($res['userid'])) {
								$this->client->initialize();
								$this->client->emit("online",$sess);
								$this->client->close();
							}
							$this->set_Cookies($res['fullname']);

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
				
				redirect(base_url());

			}
		}
		$this->load->view('change-pass');
	}

	//logout function
	public function logout(){

		$id = $this->session->userdata('userid');
		$name = $this->session->userdata('fullname');
		$this->delete_Cookies($name);
		$offline = array('uname' => $this->session->userdata('uname'));
		if($this->login->getOffline($id)){
			$this->client->initialize();
			$this->client->emit("offline",$offline);
			$this->client->close();
		}
		save_login();
		$sess = array('userid' => '', 'role' => '', 'key' => '', 'empid' => '', 'uname' => '', 'email' => '', 'fullname' => '', 'position' => '', 'logged_in' => FALSE);
		$this->session->unset_userdata($sess);
		$this->session->sess_destroy();
		redirect('login');
	}

	public function googleCaptcha($str='') {
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		$secret = '6Lei1l8UAAAAAPBwtbx5mqZVOImNcTNTudVRjW08';
		$ip = $_SERVER['REMOTE_ADDR'];
		$url = $google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		$res = curl_exec($curl);
		curl_close($curl);
		$res= json_decode($res, true);

		//reCaptcha success check
		if($res['success']) {
			return TRUE;
		} else {
			$this->form_validation->set_message('googleCaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
			return FALSE;
		}
	}

}

?>
