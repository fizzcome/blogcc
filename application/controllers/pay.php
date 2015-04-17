<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pay extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	/**
	 * 填写详细信息
	 */
	public function info_detail(){
		if(!$_POST){
			$this->load->view('info_detail');
			return;
		}
		$data = $this->input->post();
		if($this->db->insert('info_detail',$data)){
			redirect('/');
		}else{
			header("location:".getenv("HTTP_REFERER"));
		}
	}
	
	/*
	 * 接收支付信息
	 */
	public function pay_info(){
		if(!$_POST){
			$this->load->view('user/pay_info');
			return;
		}
		//文件上传信息
		  $config['upload_path'] = '/data/upload/';
		  $config['allowed_types'] = 'gif|jpg|png';
		  $config['max_size'] = '10000';
		  $config['max_width']  = '10240';
		  $config['max_height']  = '7680';
		  $this->load->library('upload', $config);

		  $field_name = time().'.jpg';
		  $this->upload->do_upload($field_name);

  		//图像处理信息
		// $img_name = time().'jpg';
		// $img_source = $this->
		// $config['image_library'] = 'gd2';
		// $config['source_image'] = '/path/to/image/mypic.jpg';
		// $config['create_thumb'] = TRUE;
		// $config['maintain_ratio'] = TRUE;
		// $config['width'] = 75;
		// $config['height'] = 50;
		// $config['new_image'] = '/data/upload/new_image.jpg';
		// $config['create_thumb'] = TRUE;
		// $this->load->library('image_lib', $config);
		// $config['create_thumb'] = TRUE;
// 		$this->image_lib->initialize($config);

		$pay_type = $this->input->post('type');
		$pay_sn = $this->input->post('sn');
		$img_name = $field_name;
		$email = $this->session->userdata('email');
		if($this->db->get_where('sn_check',array('pay_sn'=>$pay_sn))){
			redirect('/');
			return;
		}
		$data = array(
			'pay_type' 	=> $pay_type,
			'pay_sn'	=> $pay_sn,
			'img_name'	=> $img_name,
			'email'		=> $email,
			'time'		=> time()
			);
		if($this->db->insert('sn_check',$data)){
			成功
			$this->load->view('');
		}else{
			失败
			$this->load->view('');
		}
		
	}

}