<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Web_hooks {
    
private $_ci = null;

	function __construct(){
		// We need an instance of CI as we will be using some CI classes    
		$this->_ci =& get_instance();
	}

	public function log_activity() {

		// Start off with the session stuff we know
		$data = array();
		$data['page'] = current_url();
		$data['ip_address'] = $this->_ci->input->ip_address();
		$data['user_agent'] = $this->_ci->agent->agent_string();      
		$data['request_method'] = $this->_ci->input->server('REQUEST_METHOD');
		$data['request_params'] = serialize($this->_ci->input->get_post(NULL, TRUE));        
		$data['uri_string'] = $this->_ci->uri->uri_string();
		$data['created_at'] = date('Y-m-d h:i:s');

		if ($this->verify_activity())  {
			// And write it to the database
			$this->_ci->db->insert('hooks', $data);
		}
	}

	public function verify_activity() {

		$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
 
		if($pageWasRefreshed) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
