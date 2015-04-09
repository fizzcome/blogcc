<?php 
class Blog_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

/**
 * get_blog_list 获取博客列表
 */
public function get_blog_list(){
	return $this->db->get('blog');
}


}