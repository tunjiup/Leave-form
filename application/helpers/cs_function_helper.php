<?php
if (!function_exists('save_login_history')) {

	/**
	* Save admin login history
	*/
	function save_login() {

		$ci = & get_instance();
		$ci->load->model('admin/M_login', 'login');

		$uri = $ci->uri->segment(1);

		if($uri == 'login') {
			$data = array(
			'username' => $ci->session->userdata('uname'),
			'login_date' => date('Y-m-d H:i:s')
			);
			$ci->login->insert_logs($data);
		} elseif($uri == 'logout') {
			$data = array('logout_date' => date('Y-m-d H:i:s'));
			$ci->login->updateLogin_logs($data);
		} else {
			$data = array(
			'username' => $ci->session->userdata('uname'),
			'login_date' => date('Y-m-d H:i:s'),
			'logout_date' => date('Y-m-d H:i:s')
			);
			$ci->login->insert_logs($data);
		}
	}

}

if (!function_exists('save_action')) {

	/**
	* Save admin login action
	*/
	function save_action($params = NULL) {

		$ci = & get_instance();

		if ($params != null) {

			$ci->load->model('admin/M_login', 'login');

			$data = array(
				'userid' => $ci->session->userdata('userid'),
				'module' => $params['module'],
				'action' => $params['action'],
				'object_id' => isset($params['object_id']) ? $params['object_id'] : '0',
				'object_ids' => isset($params['object_ids']) ? $params['object_ids'] : '0',
				'processed_date' => date('Y-m-d H:i:s'),
			);

			$ci->login->activityLogs($data);
		}
		return;
	}

}