<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url');
	}

	/**
	 * 浏览博客内容
	 */
	public function blog_detail(){
		$id = $this->uri->segment(3);
		$query = $this->db->get_where('blog',array('id'=>$id));
		$data['detail'] = $query->result_array();
		$this->load->view('blog/blog_detail',$data);
	}

	/**
	 * 编辑博客
	 */
	public function edit(){
		if(!$_POST){
			$id = $this->uri->segment(3);
			$query = $this->db->get_where('blog',array('id'=>$id));
			$data['edit'] = $query->result_array();
			$this->load->view('blog/blog_edit',$data);
			return;
		}

	}	

	/**
	 * 发布博客
	 */
	// 发布博客页面
	public function add_view(){
		//加载form辅助函数
		$this->load->helper('form');
		$this->load->helper('category');				//调用无限极分类辅助函数
		$query = $this->db->get('category');			//查询所有分类
		$query_array = $query->result_array();			//格式化查询结果为数组形式
		$data['cate_list'] = get_cate($query_array);	//调用分类函数并得出结果
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
			redirect('/');
		}else{
			echo "<script>alert('操作失败!');history.back();</script>";
		}
	}

	/**
	 * 分类管理
	 */
	// 添加分类
	public function category_add(){
		// V($_POST);exit;
		$pid = $this->input->post('cate_id');
		$name = $this->input->post('category-name');
		$query = $this->db->select('path')->get_where('category',array('id'=>$pid));
		$query_array = ($query->result_array());
		$path = $query_array[0]['path'];
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
		$id = $this->input->post('cate_id');
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
		$id = $this->input->post('cate_id');
		$name = $this->input->post('category-name');
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

