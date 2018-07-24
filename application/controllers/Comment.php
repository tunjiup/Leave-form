<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->check_if_logged_in();
		$this->load->model('M_comment','comment');
		if(!$this->session->userdata('role') == '1') redirect(base_url());
	}

	public function view($id) {
		$res = $this->comment->getComment($id);

		save_action(array('module' => Constant::M_COMMENT, 'action' => Constant::A_VIEW, 'object_id' => $id));

		if(count($res) > 0) {
			$output = '
				<p class="feedFrom">From: '.$res['username'].'</p>
				<p class="feedMessage">'.$res['message'].'</p>
			';
		} else {
			$output = '
				p> Invalid ID</p>
			';
		}

		echo $output;
	}

	public function countnewFeed() {
		
		$count = $this-> _feedCount();

		echo $count;
	}

	public function seenComment() {

		$this->comment->seen();

	}

	public function hideComment($id) {

		if($id != NULL) {

			$data = array('status' => Constant::C_HIDE);

			if($this->comment->commentHide($id,$data)) {
				
				$this->session->set_flashdata('HideComment','Yess');

				save_action(array('module' => Constant::M_COMMENT, 'action' => Constant::A_HIDE, 'object_id' => $id));

				redirect(base_url());
			}

		} else {
			show_error('Invalid ID');
		}
		
	}

}