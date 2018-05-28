<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	/*Gender*/
	if (!function_exists('gender')) {

		function gender() {
			$gender[''] = 'Select Gender';
			$gender['male'] = 'Male';
			$gender['female'] = 'Female';
			return $gender;
		}
	}
?>