<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'forms' => array(
		array(
			'field' => 'contLeave',
			'label' => 'Type of Leave Requested',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'dateFrom',
			'label' => 'Dates of Leave From',
			'rules' => 'trim|xss_clean'
		),
		array(
			'field' => 'dateTo',
			'label' => 'Dates of Leave To',
			'rules' => 'trim|xss_clean'
			
		),
		array(
			'field' => 'dateTimeFrom',
			'label' => 'Dates of Leave From',
			'rules' => 'trim|xss_clean'
		),
		array(
			'field' => 'dateTimeTo',
			'label' => 'Dates of Leave To',
			'rules' => 'trim|xss_clean'
			
		),
		array(
			'field' => 'reason',
			'label' => 'Reason for Leave',
			'rules' => 'trim|required|xss_clean'
			
		),
		array(
			'field' => 'regular',
			'label' => 'LWOP OR LW/OP',
			'rules' => 'trim|required|xss_clean'
			
		),
		array(
			'field' => 'noDays',
			'label' => 'TOTAL NUMBER OF DAYS',
			'rules' => 'trim|required|xss_clean'
			
		)
	),
	'login' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'edit' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'fullname',
			'label' => 'Fullname',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'trim|required|xss_clean|valid_emails'
		),
		array(
			'field' => 'phone',
			'label' => 'Phone Number',
			'rules' => 'trim|required|xss_clean|numeric'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'forgotpassword' => array(
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'trim|required|xss_clean|valid_emails'
		)
	),
	'changepass' => array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'confirmpassword',
			'label' => 'Confirm Password',
			'rules' => 'trim|required|xss_clean|matches[password]'
		)
	)

);

?>