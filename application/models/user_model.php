<?php
/**
 * 用户模型
 * @author hu
 */

class User_model extends CI_Model {

	/**
	 * construct
	 */
	public function __construct() {
		parent::__construct();

		$this->_table = "user";
	}

	/**
	 * 验证某字段是否存在
	 */
// 	public function check_exists ($value) {

// 		// 可用字段列表
// 		$enable_list = array(
// 			'email'
// 			);

// 		// 验证字段是否合法
// 		if (!in_array($item, $enable_list)) {
// 			return false;
// 		}
// 		$query = $this->db->get_where('user',array('email'=>$value));

// 		$res = $query->result();

// 		return $res;
// 	}

	/**
	 * 根据某字段获取用户信息
	 */
	public function get_userinfo ($item, $value) {
		// 可用字段列表
		$enable_list = array(
			'id',
			'email'
			);

		// 验证字段是否合法
		if (!in_array($item, $enable_list)) {
			return null;
		}

		$sql = sprintf('select * from user where %s = ? limit 1', $item);

		return $this->db->query($sql, array($value))->row();
	}

	/**
	 * 执行添加数据
	 */
	public function user_add ($user_info) {
		$this->db->insert('user', $user_info);

		return $this->db->insert_id();
	}

	/**
	 * 保存用户信息
	 */
	public function save_userinfo ($id, $info) {
		$key = array('id' => $id);

		$this->db->update('user', $info, $key);
	}

	/**
	 * 登录验证
	 */
	public function login_check ($email, $password) {
		$sql = 'select * from user where email = ? and login_password = ?';

		$userinfo = $this->db->query($sql, array($email, $password))->row();

		// 用户名或密码错误
		if (empty($userinfo)) {
			return array('error' => '1', 'msg' => '邮箱或密码错误');
		}
		
		$sess_info = array();
		// 用户id
		$sess_info['uid']			= $userinfo->id;
		// 用户邮箱
		$sess_info['email']			= $userinfo->email;
		// 最后登陆时间
		$sess_info['last_time']		= $userinfo->last_time;
		// 最后登陆IP
		$sess_info['last_ip']		= $userinfo->last_ip;
		// 用户状态
		$sess_info['user_status']	= $userinfo->user_status;
		// 管理员信息
		if($email == 'admin@qq.com'){
			$sess_info['admin'] = 1;
		}
		$this->session->set_userdata($sess_info);

		// 更新登录信息
		$info['last_time'] = time();
		$info['last_ip'] = $this->input->server('REMOTE_ADDR');
		$this->save_userinfo($userinfo->id, $info);
		

		return array('error' => '0', 'msg' => '正常登录');
	}

	/**
	 * 更新用户缓存信息
	 */
	public function update_user_info ($flag = false) {

		$sess_uid = null;
		if (isset($this->session->userdata['uid'])) {
			$sess_uid = $this->session->userdata['uid'];
		}

		if (!$sess_uid) {
			// 获取用户信息
			$userinfo = $this->get_userinfo('email', $email);

			if (empty($userinfo)) {
				$this->session->sess_destroy();
			} else {
				$sess_info = array();
				// 用户id
				$sess_info['uid']			= $userinfo->id;
				// 用户邮箱
				$sess_info['email']			= $userinfo->email;
				// 最后登陆时间
				$sess_info['last_time']		= $userinfo->last_time;
				// 最后登陆IP
				$sess_info['last_ip']		= $userinfo->last_ip;
				// 用户状态
				$sess_info['user_status']	= $userinfo->user_status;
				$this->session->set_userdata($sess_info);
			}
		}
	}

}
