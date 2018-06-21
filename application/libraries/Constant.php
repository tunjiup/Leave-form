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

	//MSW Department
	const D_WEBDEV = 'MSW - Webdev';

	//Class Name
	const CN_PENDING = "Pending";
	const CN_APPROVED = "Approved";
	const CN_REJECT = "Rejected";
}

?>