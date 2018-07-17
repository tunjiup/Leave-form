<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Constant {
	
	//Type of Leave Requested
	const L_SICK = 'Sick Leave';
	const L_VACATION = 'Vacation Leave';
	const L_BEREAVEMENT = 'Bereavement Leave';
	const L_OFFSETTING = 'Offsetting Leave';
	const L_EMERGENCY = 'Emergency Leave';
	const L_MA_PA = 'Maternity/Paternity Leave';
	const L_UNDERTIME = 'Under time Leave';
	const L_BIRTHDAY = 'Birthday Leave';
	const L_HOSPITALIZATION = 'Hospitalization Leave';

	//With or without pay
	const LWP = 'LWP';
	const LWOP = 'LW/OP';

	//MSW Department
	const D_WEBDEV = 'MSW - Webdev';

	//Class Name
	const CN_PENDING = "Pending";
	const CN_APPROVED = "Approved";
	const CN_REJECT = "Rejected";

	//Move leave Date
	const M_LEAVE = "Move Leave Date";

	//Module
	const MODULE_DASHBOARD = 'Dashboard';
	const MODULE_LEAVE = 'Leave Form';
	const MODULE_LOGIN = 'Login';

	//Action
	const A_EDIT = 'Update';
	const A_ADD = 'Add';
	const A_DOWNLOAD = 'Download';

	//Manager
	const PROJECT_MANAGER = 'Project manager';

	//Folder Name
	const FOLDER_DB = 'database/';

	//Comment Status
	const C_SEEN = 'seen';
	const C_HIDE = 'hide';
}

?>