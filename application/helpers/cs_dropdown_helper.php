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

	/*Position*/
	if (!function_exists('position')) {

		function position() {

			$ci = & get_instance();

			$ci->load->model('M_role', 'role');

			$res = $ci->role->getRole();

			foreach ($res as $key) {

				$option[''] = 'Select Position';

				if($ci->session->userdata('role') == $key->roleid) {

				} else {
					$option[$key->roleid] = $key->rolename;
				}
				
			}
			return $option;
		}
	}
?>
