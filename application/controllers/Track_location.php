<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Track_location extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_usertracker','tracker');
	}

	public function userlocation() {
		$ip = trim(stripslashes(htmlspecialchars($this->uri->segment(2))));
		$data['ip_address'] = $this->validate_ip($ip);
		$data['latitude'] = trim(stripslashes(htmlspecialchars($this->uri->segment(3))));
		$data['longitude'] = trim(stripslashes(htmlspecialchars($this->uri->segment(4))));
		$data['created_at'] = date('Y-m-d H:i:s');

		$this->tracker->insert_location($data);
		
	}

	public function validate_ip($ipaddress) {

		if (filter_var($ipaddress, FILTER_VALIDATE_IP)) {
		    $ip = $ipaddress;
		} else {
		    return false;
		}
		return $ip;
	}

}