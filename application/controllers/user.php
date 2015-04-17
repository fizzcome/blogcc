<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
    }
    public function index(){
        if(!$this->session->userdata('email')){
            redirect('/user/login');
            return;
        }
    	$this->load->view('user/user_center');
    }

    /**
     * reg_info_view
     */
    public function reg_info_view(){
        if(!$this->session->userdata('email')){
            redirect('/user/login');
            return;
        }
        $email = $this->session->userdata('email');
        $query = $this->db->get_where('info_detail',array('email'=>$email));
        $res_arr = $query->result_array();
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

    /**
     * 用户后台
     */
    // 查看详细信息
    public function user_center(){
        if(!$this->session->userdata('email')){
            redirect('/user/login');
            return;
        }
        $email = $this->session->userdata('email');
        $query = $this->db->get_where('info_detail',array('email'=>$email));
        if($query->result()){
            $data['info_detail'] = $query->result_array();
            $this->load->view('user/user_center',$data);
        }
    }
    //用户中心
    //查看审核状态
    public function check_status(){
    	if(!$this->session->userdata('email')){
    		redirect('/user/login');
    		return;
    	}
    	$email = $this->session->userdata('email');
    	$query = $this->db->order_by('time','desc')->get_where('sn_check',array('email'=>$email),1);
    	if($query->result()){
    		$res = $query->result_array();

    		switch ($res[0]['pay_status']) {
    			case '1':
    				$this->load->view('/user/success');return;
    				break;
    			case '2':
    				$email = $this->session->userdata('email');
    				$query = $this->db->get_where('info_detail',array('email'=>$email));
    				$res_arr = $query->result_array();
    				if($query->result()){
    					header("location:".getenv("HTTP_REFERER"));
    					return false;
    				}
    				$this->load->view('/user/check_pass');return;
    				break;
    			case '3':
    				$this->load->view('/user/check_fail');return;
    				break;
    			default:
    				redirect('/user/pay_info');return;
    				break;
    		}
    	}
    				redirect('/user/pay_info');return;
    	header("location:".getenv("HTTP_REFERER"));
    }

    
    //用户填写报名信息
    public function reg_info(){
//     	dd($_POST);
    	if(!$this->session->userdata('email')){
    		redirect('user/login');
    		return;
    	}
    	$email = $this->session->userdata('email');
    	if(!$_POST){
    		$this->load->view('user/reg_info');
    		return;
    	}
    	$info = $this->input->post();
//     	$query = $this->db->get_where('info_detail',array('email'=>$email));
//     	if($query->result()){
//     		echo 2;exit;
//     		redirect('user');
//     		return;
//     	}
    	$info['email'] = $email;
    	//插入信息表
    	if($this->db->insert('info_detail',$info)){
//     		echo 3;exit;
    		redirect('user');
    		return;
    	}else{
    		header("location:".getenv("HTTP_REFERFER"));
    	}
    	
    }
    
    
    
    /*
     * 找回密码
     */
    // 发送email验证
    public function email_send(){
    	
    }
    // 验证email返回
    public function email_check(){
    	
    }
    
    /*
     * 用户详细信息
     */
    public function userinfo(){
    	if($_POST){
    		echo 3;
    	}else{
    		$this->load->view('user/userinfo');
    	}
    }
    
    /**
     * 许可协议
     */
    public function policy(){
    	if($_POST){
    		$radiobutton = $this->input->post('radiobutton');
    		if($radiobutton == 'agree'){
    			redirect('/user/register');
    		}else{
    			header("location:".getenv("HTTP_REFERER"));
    		}
    		return;
    	}
    	$this->load->view('user/policy');
    }

    /**
     * 注册
     */
    public function register () {

        $data['html_title'] = '注册';
        $data['sub_title'] = '填写注册信息';

        if ($_POST) {
            // 密码
            $password = trim($this->input->post('password'));
            // 确认密码
            $repassword = trim($this->input->post('repassword'));
            // 邮箱
            $email = trim($this->input->post('email'));

            if($password != $repassword){
                $data['msg'] = '两次密码不一致';
                $this->load->view('user/register',$data);
                return;
            }

            // 服务器端数据验证
            $query = $this->db->get_where('user',array('email'=>$email));
            if ($query->result()) {
                $data['msg'] = '邮箱已存在';
                // echo 3;exit;
                $this->load->view('user/register',$data);
                return;
            }

            // 执行添加操作
            $user_info = array();
            // 用户登录密码
            $user_info['login_password'] = md5($password);
            // 用户邮箱
            $user_info['email'] = $email;
            // 邮箱验证
            $user_info['email_check'] = '0';
            // 注册时间
            $user_info['reg_time'] = time();
            // 注册IP
            $user_info['reg_ip'] = $this->input->server('REMOTE_ADDR');
            // 最后登陆时间
            $user_info['last_time'] = time();
            // 最后登陆IP          
            $user_info['last_ip'] = $this->input->server('REMOTE_ADDR');
            // 用户状态
            $user_info['user_status'] = '0';

            $uid = $this->user_model->user_add($user_info);
            
            if($uid){
            	redirect('user/login');
            	return;
            }
            redirect('user/register');
            return;
        }
        
        $this->load->view('user/register', $data);
    }

    /**
     * 用户登录
     */
    public function login () {

        $data['err_msg'] = '';
        if ($_POST) {
            $email = $this->input->post('email');

            $password = $this->input->post('password');

            $rtninfo = $this->user_model->login_check($email, md5($password));

            switch ($rtninfo['error']) {
                case '0':
                    redirect('user');
                    break;
                case '1':
                    $data['err_msg'] = '邮箱或密码错误';
            }
        }
        $this->load->view('user/login', $data);
    }
    
    /*
     * 退出
     */
    public function logout(){
    	$this->session->sess_destroy();
    	redirect('/');
//     	$this->load->view('/user/login');
    }

    public function getpassword(){
    	redirect('user/login');
//         $this->load->view('user/getpassword');
    }
    /*
     * 接收支付信息
     */
    public function pay_info(){
    	$this->load->helper('form');
    	if(!$_POST){
    		$this->load->view('user/pay_info');
    		return;
    	}
    	$email = $this->session->userdata('email');
    	$query = $this->db->get_where('sn_check',array('email'=>$email,'pay_status >'=>0,'pay_status <'=>3));
    	if($query->result()){
    		redirect('user');
    		return;
    	}
    	//文件上传信息
    	$config['upload_path'] = '/data/upload/';
    	$config['allowed_types'] = 'gif|jpg|png';
    	$config['max_size'] = '10000';
    	$config['max_width']  = '10240';
    	$config['max_height']  = '7680';
    	$field_name = time().'.jpg';
    	$config['new_image'] = '/data/upload/'.$field_name;

    	$this->load->library('upload', $config);
    	$this->upload->do_upload($this->input->post('file'));
    	
    	$this->upload->display_errors('<p>', '</p>');
//     	vv($this->upload->data());
    
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
    	$query = $this->db->get_where('sn_check',array('pay_sn'=>$pay_sn));
    	if($query->result()){
    		redirect('user');
    		return;
    	}
    	$data = array(
    			'pay_type' 	=> $pay_type,
    			'pay_sn'	=> $pay_sn,
    			'img_name'	=> $img_name,
    			'email'		=> $email,
    			'time'		=> time(),
    			'pay_status'    => 1
    	);
    	if($this->db->insert('sn_check',$data)){
//     		redirect('user/success');
    		$this->load->view('user/success');
    		return;
//     		$this->load->view('user');
    	}else{
    		header("location:".getenv("HTTP_REFERER"));
    	}
    
    }





}
