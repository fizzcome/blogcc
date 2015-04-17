<?php
class Furen extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * 辅仁主页
	 */
	public function index(){
// 		$this->session->sess_destroy();
// 		$this->session->unset_userdata('item');
// 		vv($this->session->userdata());
		$this->load->view('index');
	}
}