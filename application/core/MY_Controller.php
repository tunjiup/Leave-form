<?php

class MY_Controller extends CI_Controller {
	
	private $_validate_fields = FALSE;
	private $_ci = null;

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->helper('string');
		$this->_ci =& get_instance();
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
}

?>