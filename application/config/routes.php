<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Events
$route['events'] = 'Welcome/showEvents';

//Login
$route['login'] = 'Login';
$route['logout'] = 'Login/logout';

//Forgot password
$route['forgot-password'] = 'Login/forgotpass';

//Change pass
$route['verify/(:any)'] = 'Login/changepass/$1';
$route['change-password'] = 'Login/updatePassword';

//User
$route['profile/update'] = 'Welcome/edit';
$route['employee/profile/(:any)'] = 'Welcome/modalDir/$1';

//LeaveForm
$route['leave-form'] = 'Leaveform';
$route['leave-form/add'] = 'Leaveform/add';

//Download Form
$route['download-leave'] = 'Leaveform/downloadForm';

//Leave Status
$route['approved/(:any)'] = 'Leaveform/approvedLeave/$1';
$route['rejected/(:any)'] = 'Leaveform/rejectLeave/$1';
$route['reject-form'] = 'Leaveform/rejectForm';