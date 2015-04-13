<?php 
	/**
	 * 网站默认首页
	 */
class Blogcc extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url');
	}
	/**
	 * index 展示博客列表
	 */
	public function index(){
		$query = $this->db->get('blog');
		$data['list'] = $query->result();
		$this->load->view('blog/blog_list',$data);
	}
	
	public function test(){

	}



	/**
	 * 获取分类
	 */
	// public function get_cate_list(){
	// 	$query = $this->db->get('category');
	// 	$query_array = $query->result_array();
	// 	$this->load->helper('category');
	// 	echo "<pre>";
	// 	V(get_cate($query_array));
	// }
	

}

 ?>