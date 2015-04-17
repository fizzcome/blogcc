<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

    /**
     * 后台用户登录
     */
    public function login_admin () {
//     	var_dump($this->session->userdata('item'));
		if($this->session->userdata('admin')){
			redirect('admin/index');
			return;
		}
    	$this->load->model('user_model');

        if ($_POST) {
            $email = $this->input->post('email');

            $password = $this->input->post('password');

            $rtninfo = $this->user_model->login_check($email, md5($password));

            switch ($rtninfo['error']) {
                case '0':
                    redirect('admin');
                    break;
                case '1':
                    $data['err_msg'] = '邮箱或密码错误';
            }
            redirect('admin');return;
        }else{
        	$this->load->view('admin/login_admin');
        }
    }
	
	// 报名详细信息
	public function info_detail_admin(){
		$uid = $this->uri->segment(3);
		// 通过uid获取email
		$query = $this->db->get_where('user',array('id'=>$uid));
		$res_arr = $query->result_array();
		$email = $res_arr[0]['email'];
        // 根据邮件查看报名详情
        $query = $this->db->get_where('info_detail',array('email'=>$email));
        if($query->result()){
            $data['info_detail'] = $query->result_array();
            $this->load->view('user/info_detail',$data);
        }
	}

	// 审核
	public function check(){
		if(!$this->session->userdata('admin')){
			redirect('admin/login_admin');
			return;
		}
// 		echo 3;exit;
		$type = $this->uri->segment(3);
		$sn_id = $this->uri->segment(4);
		// 通过uid获取email
// 		$query = $this->db->get_where('user',array('id'=>$uid));
// 		$res_arr = $query->result_array();
// 		$email = $res_arr[0]['email'];
		$query = $this->db->get_where('sn_check',array('sn_id'=>$sn_id));
		$status = $res_arr[0]['pay_status'];
		if($status > 1){
			header("location:".getenv("HTTP_REFERER"));
			return;
		}

		if($this->db->update('sn_check',array('pay_status'=>$type),array('sn_id'=>$sn_id))){
			redirect('admin/index');
			return;
		}else{
			header('location:'.getenv("HTTP_REFERER"));
		}
	}
	

	/**
	 * reg_info_view
	 */
	    public function reg_info_view(){
	    	if(!$this->session->userdata('admin')){
	    		redirect('/admin/login_admin');
	    		return;
	    	}
	    		$uid = $this->uri->segment(3);
	    		$query = $this->db->get_where('sn_check',array('sn_id'=>$uid));
	    		$res_arr = $query->result_array();
	    		$email = $res_arr[0]['email'];
	    		// 获取注册信息
	    		// $query = $this->db->get_where('info_detail');
	    	$query = $this->db->get_where('info_detail',array('email'=>$email));
	    	$res_arr = $query->result_array();
// 	    	$data['info'] = $res_arr[0];
// 	    	$this->load->view('user/reg_info_view',$data);
	    	
	    	if(!$query->result()){
	    		header("location:".getenv("HTTP_REFERER"));
	    		return false;
	    	}
	    	$final = array();
	    	foreach ($res_arr as $k =>$v){
	    		$final = $v;
	    	}
	    	$data['info'] = $final;
	    	$this->load->view('user/reg_info_view',$data);
	
	    }


	public function index(){
// 		dd($this->session->userdata());
		if(!$this->session->userdata('admin')){
			redirect('admin/login_admin');
			return;
		}
		$query = $this->db->get('user');
		$res_arr = $query->result_array();
		if($res_arr){
			foreach ($res_arr as $k => $v) {
				$querys = $this->db->order_by("time","desc")->get_where('sn_check',array('email'=>$v['email']),1);
				$res_arrs = $querys->result_array();
				if($res_arrs){
					switch ($res_arrs[0]['pay_type']) {
						case '1':
							$res_arrs[0]['pay_type_name'] = "微信支付";
							break;
						case '2':
							$res_arrs[0]['pay_type_name'] = "支付宝支付";
							break;
						case '3':
							$res_arrs[0]['pay_type_name'] = "银行卡支付";
							break;
					}
					switch ($res_arrs[0]['pay_status']) {
						case '1':
							$res_arrs[0]['pay_status_name'] = "待审核";
							break;
						case '2':
							$res_arrs[0]['pay_status_name'] = "审核通过";
							break;
						case '3':
							$res_arrs[0]['pay_status_name'] = "审核不通过";
							break;
					}
					foreach ($res_arrs[0] as $key => $value) {
						$res_arr[$k][$key] = $value;
					}
				}
				// array_merge($res_arr[$k],$res_arrs[0]);
			}
		}

		$data['user_list'] = $res_arr;
		// dd($data);
		$this->load->view('admin/index',$data);
	}
	

}


 ?>