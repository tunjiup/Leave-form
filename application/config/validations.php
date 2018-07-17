<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'forms' => array(
		array(
			'field' => 'contLeave',
			'label' => 'Type of Leave Requested',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'dateTimeFrom',
			'label' => 'Dates of Leave From',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'dateTimeTo',
			'label' => 'Dates of Leave To',
			'rules' => 'trim|required|xss_clean'
			
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
		),
		array(
			'field' => 'g-recaptcha-response',
			'label' => 'Captcha',
			'rules' => 'trim|required|xss_clean|callback_googleCaptcha'
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
	),
	'rejectReason' => array(
		array(
			'field' => 'reasons',
			'label' => 'Reasons',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'changeLeaveDate' => array(
		array(
			'field' => 'datefrom',
			'label' => 'From',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'dateto',
			'label' => 'To',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'noDays',
			'label' => 'Days',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'comments' => array(
		array(
			'field' => 'commentbox',
			'label' => 'Feedback',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'createNew' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'trim|required|xss_clean|valid_emails'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'name',
			'label' => 'Fullname',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'dob',
			'label' => 'Birthdate',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'position',
			'label' => 'Position',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'department',
			'label' => 'Department',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'manager',
			'label' => 'Immediate Supervisor',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'departmenthead',
			'label' => 'Depart. Head',
			'rules' => 'trim|required|xss_clean'
		)
	),
	'leave' => array(
		array(
			'field' => 'vacation',
			'label' => 'Vacation Leave',
			'rules' => 'trim|required|xss_clean'
		),
		array(
			'field' => 'sick',
			'label' => 'Sick Leave',
			'rules' => 'trim|required|xss_clean'
		)
	)

);

?>