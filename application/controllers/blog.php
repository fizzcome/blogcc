<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url');
	}

	/**
	 * index 展示博客列表
	 */
	public function index(){
		$query = $this->blog_model->get_blog_list();
		$data['list'] = $query->result();
		$this->load->view('blog/blog_list',$data);
	}
	/**
	 * insert 发布博客
	 */
	public function insert_view(){
		$this->load->view('blog/blog_add');
	}
	public function insert(){
		$data = $this->input->post();
		if(empty($data['time_publish'])){		//如果没有设定定时发布
			$data['time_publish'] = time();		//当前发布时间
			$data['tag_blog_status'] = 1;		//立即发布
		}else{
			$data['tag_blog_status'] = 0;		//定时发布(未发布)
		}
		if($this->db->insert('blog',$data)){
			echo "发布成功";
			$this->load->helper('url');
			redirect('blog/index');
		}else{
			show_error('您的博客发布失败!', 200, '发布失败');
		}
	}

}

