<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Events
$route['events'] = 'Welcome/showEvents';

//Employee
$route['team-member'] = 'Welcome/getEmployee';

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
$route['employees/create'] = 'Subordinate/formAction';

//LeaveForm
$route['leave-form'] = 'Leaveform';
$route['leave-form/add'] = 'Leaveform/add';
$route['edit-leave-form/(:num)'] = 'Leaveform/editForm/$1';
$route['edit-leave-action/(:num)'] = 'Leaveform/edit/$1';

//Download Form
$route['download-leave/(:num)'] = 'Leaveform/downloadForm/$1';

//Leave Status
$route['approved/(:any)'] = 'Leaveform/approvedLeave/$1';
$route['rejected/(:any)'] = 'Leaveform/rejectLeave/$1';
$route['reject-form'] = 'Leaveform/rejectForm';
$route['change-leave-date/(:num)'] = 'Leaveform/change_leaveDate/$1';
$route['approved/token/(:num)'] = 'Leaveform/changeApprovedLeaveDate/$1';
$route['rejected/token/(:num)'] = 'Leaveform/changeRejectLeaveDate/$1';
$route['update-leave-balance/(:num)'] = 'Subordinate/leaveUpdateBalance/$1';
$route['leave-cancel/(:num)'] = 'Leaveform/leaveCancel/$1';

//comment section
$route['submit-comment'] = 'Welcome/form';
$route['view-comment/(:num)'] = 'Comment/view/$1';
$route['comment-seen'] = 'Comment/seenComment';
$route['resolve-comment/(:num)'] = 'Comment/resolveComment/$1';
$route['comment-hide/(:num)'] = 'Comment/hideComment/$1';
$route['feeds'] = 'Welcome/Allfeedback';
$route['feedback-count'] = 'Comment/countnewFeed';

//Generate report History
$route['download-history-leave'] = 'Leaveform/csvReport';

//Upload
$route['bulk-upload/import'] = 'BulkUpload/import';
$route['bulk-upload'] = 'BulkUpload';

//Database
$route['database/table-list'] = 'Mydatabase/tableList';
$route['database/backup'] = 'Mydatabase/backupAll';
$route['database/table/backup/(:any)'] = 'Mydatabase/backuptable/$1';
$route['database/table/repair/(:any)'] = 'Mydatabase/tableRepair/$1';
$route['database/table/optimize/(:any)'] = 'Mydatabase/tableOptimize/$1';
$route['database/table/rename/(:any)'] = 'Mydatabase/tableRename/$1';
$route['database/backup/data/(:any)'] = 'Mydatabase/backupTableData/$1';
$route['database/describe/(:any)'] = 'Mydatabase/describeTable/$1';