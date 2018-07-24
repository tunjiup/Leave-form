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

	//Manager
	const PROJECT_MANAGER = 'Project manager';

	//Folder Name
	const FOLDER_DB = 'database/';

	//Comment Status
	const C_SEEN = 'seen';
	const C_HIDE = 'hide';

	//Leave Default
	const D_LEAVE = '0/0';

	//Module
	const M_DASHBOARD = 'Dashboard';
	const M_SUBORDINATE = 'Subordinate';
	const M_MYDATABASE = 'Mydatabase';
	const M_Login = 'Login';
	const M_BULKUPLOAD = 'BulkUpload';
	const M_COMMENT = 'Comment';
	const M_LEAVEFORM = 'Leaveform';

	//Actions
	const A_ADD = 'Add';
	const A_UPDATE = 'Update';
	const A_VIEW = 'View';
	const A_HIDE = 'Hide';
	const A_APPROVED = 'Approved';
	const A_BACKUP = 'Backup';
	const A_REPAIR = 'Repair';
	const A_OPTIMIZE = 'Optimize';
	const A_FORGOT = 'Forgot Password';
	const A_REJECT = "Rejected";
	const A_MOVELEAVE = "Move Leave";
	const A_CANCEL = "Cancel";
	const A_DOWNLOAD = "Download";
	const A_CHANGEPASSWORD = "Change Password";

}

?>