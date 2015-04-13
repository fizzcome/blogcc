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
		// $query = $this->blog_model->get_blog_list();
		$query = $this->db->get('category');
		$query = $this->db->get('blog');
		$data['list'] = $query->result();
		$this->load->view('blog/blog_list',$data);
	}
	
	public function test(){
		return 2;
	}
	
	public function test2(){
		$this->load->helper('category');
		echo get_cate();
	}

	/**
	 * 获取分类
	 */
	public function get_cate_list(){
		$query = $this->db->get('category');
		$query_array = $query->result_array();
		$this->load->helper('category');
		echo "<pre>";
		V(get_cate($query_array));
	}
	

	/**
	 * 发布博客
	 */
	// 发布博客页面
	public function add_view(){
		//加载form辅助函数
		$this->load->helper('form');
		$query = $this->db->get('category');
		$data = $query->result_array();
// 		get_cate_list($data);exit;
		$this->load->view('blog/blog_add', $data);
	}
	// 处理发布博客页面
	public function add(){
		$data = $this->input->post();
		if(empty($data['time_publish'])){		//如果没有设定定时发布
			$data['time_publish'] = time();		//当前发布时间
			$data['tag_blog_status'] = 1;		//立即发布
		}else{
			$data['tag_blog_status'] = 0;		//定时发布(未发布)
		}
		if($this->db->insert('blog',$data)){
			echo "<script>alert('操作成功!');</script>";
			redirect('blog');
		}else{
			echo "<script>alert('操作失败!');history.back();</script>";
		}
	}

	/**
	 * 分类管理
	 */
	// 添加分类
	public function category_add(){
		$pid = $this->input->post('cate_id');
		$name = $this->input->post('category-name');
		$path = $this->db->select('path')->get_where('category',array('id'=>$pid));
		$data = array(
			'name' 	=> $name,
			'pid'	=> $pid,
			'path'	=> $path.$pid.','
			);
		if($this->db->insert('category',$data)){
			echo "<script>alert('操作成功!');</script>";
			redirect('blog/add_view');
			// header("location:".getenv("HTTP_REFERER"));   //   返回其调用页面
		}else{
			echo "<script>alert('操作失败!');history.back();</script>";
		}
	}
	// 删除分类
	public function category_del(){
		$id = $this->input->post('id');
		$where = array('id'=>$id);
		if($this->db->delete('category',$where)){
			echo "<script>alert('操作成功!');</script>";
			redirect('blog/add_view');
		}else{
			echo "<script>alert('操作失败!');history.back();</script>";
		}
	}
	// 编辑分类
	public function category_edit(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$data = array('name'=>$name);
		$where = array('id'=>$id);
		if($this->db->update('category',$data,$where)){
			echo "<script>alert('操作成功!');</script>";
			redirect('blog/add_view');
		}else{
			echo "<script>alert('操作失败!');history.back();</script>";
		}
	}

}

